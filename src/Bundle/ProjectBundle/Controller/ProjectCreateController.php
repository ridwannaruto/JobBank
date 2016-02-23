<?php

namespace Bundle\ProjectBundle\Controller;

use Bundle\CoreBundle\Controller\GenericMessage;
use Bundle\ProjectBundle\Messages\ProjectMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\ProjectBundle\Controller\BaseProjectController;
use Bundle\ProjectBundle\Entity\Project;
use Bundle\ProjectBundle\Form\ProjectType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectCreateController extends BaseProjectController {


    public function newProjectAction(Request $request) {
        $loggedUser = $this->authenticateUser();
        if ($loggedUser) {
            $accessLevel = $loggedUser->getAccesslevel();
            $notificationList = $this->getNotificationList($loggedUser->getId());
            if ($accessLevel == $this->USER_ROLE_ADMIN || $accessLevel == $this->USER_ROLE_HEAD) {
                $newProject = new Project();
                $newProjectForm = $this->createForm(new ProjectType(), $newProject, array(
                    'attr' => array(
                        'class' => 'form-horizontal center'
                    )
                ));
                $newProjectForm->handleRequest($request);

                if ($newProjectForm->isValid()) {
                    $newProject = $newProjectForm->getData();
                    $projectManager = $newProject->getManager();
                    $newProject->setManager($projectManager->getId());
                    $newProject->setStatus($this->STATUS_PROJECT_ONGOING);


                    $subscribers = array();
                    $subscribers[] = $projectManager->getId();
                    $newProject->setSubscribers($subscribers);

                    try {
                        $this->saveEntityInstantly($newProject);
                    } catch (\Exception $e) {
                        return $this->render(TwigTemplate::$TWIG_PROJECT_NEW, array(
                                    'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                                    'type' => 'E',
                                    'Notifications' => $notificationList,
                                    'form' => $newProjectForm->createView()
                        ));
                    }

                    $searchParams = array('name' => $newProject->getName());
                    $persistedProject = $this->findOneEntity(RepositoryName::$REPOSITORY_PROJECT,$searchParams);
                    $this->setNotification('You have a new Project',ProjectMessage::$MESSAGE_PROJECT_APPOINTED, 2, $persistedProject->getManager(), $persistedProject->getId());

                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_LIST, array(
                                        'type' => 'S',
                                        'message' => ProjectMessage::$MESSAGE_PROJECT_CREATE_SUCCESS . $projectManager->getFirstname()
                        )));
                }

                return $this->render(TwigTemplate::$TWIG_PROJECT_NEW, array(
                            'form' => $newProjectForm->createView(),
                             $this->KEY_NOTIFICATION_LIST => $notificationList
                ));
            } else {
                return $this->render(TwigTemplate::$TWIG_PERMISSION,array(
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                	));
            }
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }




}