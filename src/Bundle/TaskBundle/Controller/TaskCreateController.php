<?php

namespace Bundle\TaskBundle\Controller;

use Bundle\CoreBundle\Messages\GenericMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\TaskBundle\Entity\Task;
use Bundle\TaskBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TaskCreateController extends BaseTaskController {


    public function newTaskAction(Request $request) {

        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $accessLevel = $authenticatedUser->getAccesslevel();
	        $notificationList = $this->getNotificationList($authenticatedUser->getId());
            if ($accessLevel == $this->USER_ROLE_ADMIN || $accessLevel == $this->USER_ROLE_HEAD) {
                $newTask = new Task();
                $newTaskForm = $this->createForm(new TaskType(), $newTask, array(
                    'attr' => array(
                        'class' => 'form-horizontal center'
                    )
                ));

                $newTaskForm->handleRequest($request);

                if ($newTaskForm->isValid()) {
                    $newTask = $this->getTaskObject($newTaskForm);
                    try {
                        $this->saveEntityInstantly($newTask);
                    } catch (\Exception $e) {
                        return $this->render(TwigTemplate::$TWIG_TASK_NEW, array(
                                    'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                                    'type' => 'E',
                                    'form' => $newTaskForm->createView(),
                                    $this->KEY_NOTIFICATION_LIST => $notificationList
                        ));
                    }

                    $searchParams = array('name' => $newTask->getName());
                    $persistedTask = $this->findOneEntity(RepositoryName::$REPOSITORY_TASK,$searchParams);
                    $searchParams = array('user'=>$newTask->getUser());
                    $trackReport = $this->findOneEntity(RepositoryName::$REPOSITORY_TRACK_REPORT,$searchParams);
                    if ($trackReport == null){
			
			 return $this->render(TwigTemplate::$TWIG_TASK_NEW, array(
                                    'message' => ' task can only be assigned to Volunteers',
                                    'type' => 'E',
                                    'form' => $newTaskForm->createView(),
                                    $this->KEY_NOTIFICATION_LIST => $notificationList
                        ));                    
                   
                    }
                    $this->setNotification('You have a new Task', "You have been assigned a new task to complete", 2, $persistedTask->getUser(), $persistedTask->getId(), $persistedTask->getProject());
                    //$this->sendEmailAction($UserEmail, $UserName, $newTask->getId());


                    $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT,$persistedTask->getProject());
                    $members = $project->getMembers();
                    $isThere = false;
                    if ($members != null){
                    foreach ($members as $member) {
                        if ($member == $persistedTask->getUser()) {
                            $isThere = true;
                        }
                    }

                    if (!$isThere) {
                        $members[] = $persistedTask->getUser();

                    }
                    }
                    else{
                        $members = array();
                        $members[] = $persistedTask->getUser();

                    }
                    
                    
                    $userTasks = $trackReport->getTasks();
                    $userTasks[] = $persistedTask->getId();
                    $trackReport->setTasks($userTasks);
                    
                    $userProjects = $trackReport->getProjects();
                    $userProjects[] = $persistedTask->getProject();
                    $trackReport->setProjects($userProjects);

                    $tasks = $project->getTasks();
                    
                    if ($tasks == null){
                        $tasks = array();                    
                    }
                    $tasks[] = $persistedTask->getId();
                    
                    $project->setMembers($members);
                    $project->setTasks($tasks);
                    try {
                        $this->saveEntityInstantly($trackReport);
                        $this->saveEntityInstantly($project);

                    } catch (\Exception $e) {
                        return $this->render(TwigTemplate::$TWIG_TASK_NEW, array(
                                    'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                                    'type' => 'E',
                                    'form' => $newTaskForm->createView(),
                                    'Notifications' => $notificationList
                        ));
                    }

                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
                                        'type' => 'S',
                                        'message' => "succesfully assigned new task and notified user",
                                        'projectId' => $project->getId()
                    )));
                }

                return $this->render(TwigTemplate::$TWIG_TASK_NEW, array(
                            'form' => $newTaskForm->createView(),
                            $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            }
            return $this->render(TwigTemplate::$TWIG_PERMISSION,array($this->KEY_NOTIFICATION_LIST => $notificationList ));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    private function getTaskObject($newTaskForm){
        $newTask = $newTaskForm->getData();
        $newTask->setLeader($newTask->getLeader()->getId());
        $newTask->setPillar($newTask->getUser()->getPillar());
        $newTask->setUser($newTask->getUser()->getId());
        $newTask->setProject($newTask->getProject()->getId());
        $newTask->setComments(array());
        $newTask->setCompleted(0);
        $newTask->setRate(0);
        return $newTask;
    }


}