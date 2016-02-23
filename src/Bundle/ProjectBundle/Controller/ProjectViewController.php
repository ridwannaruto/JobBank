<?php

namespace Bundle\ProjectBundle\Controller;

use Bundle\CoreBundle\Controller\BaseController;
use Bundle\CoreBundle\Values\Messages\ProjectMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundle\ProjectBundle\Entity\Project;
use Bundle\TaskBundle\Entity\Task;
use Bundle\ProjectBundle\Form\ProjectType;
use Bundle\NotificationBundle\Entity\Notification;
use Bundle\CommentBundle\Entity\Comment;
use Bundle\CommentBundle\Form\CommentType;

class ProjectViewController extends BaseProjectController {


    public $KEY_PROJECT = 'project';
    public $KEY_PROJECT_ID = 'projectId';

    public function viewAction($projectId, Request $request) {
        $loggedUser = $this->authenticateUser();
        if ($loggedUser) {
            $newComment = New Comment();
            $newComment->setTask(0);
            $newComment->setProject($projectId);
            $CommentForm = $this->createForm(new CommentType(), $newComment, array(
                'action' => $this->generateUrl(RouteName::$ROUTE_COMMENT_NEW),
                'attr' => array(
                    'class' => 'form-horizontal center'
                )
            ));
           
            $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT,$projectId);
	        $notificationsList = $this->getNotificationList($loggedUser->getId());
            
            if ($project == null){
            	return $this->render(TwigTemplate::$TWIG_ERROR, array(
            	'message'=> ProjectMessage::$MESSAGE_PROJECT_NOT_FOUND, 
                 $this->KEY_NOTIFICATION_LIST => $notificationsList));
            }
            
            $commentList = $this->getCommentList($projectId);
            $memberList = $this->getMemberList($project);
            $taskList = $this->getTaskList($project);
            $projectManager = $this->getUser($project->getManager());
            return $this->render(TwigTemplate::$TWIG_PROJECT_DETAIL, array(
                        'Tasks' => $taskList,
                        'Comments' => $commentList,
                        'NewComment' => $CommentForm->createView(),
                        'Manager' => $projectManager,
                        'Project' => $project,
                        'Members' => $memberList,
                        'message' => $request->get('message'),
                        'type' => $request->get('type'),
                $this->KEY_NOTIFICATION_LIST => $notificationsList
            ));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    private function getCommentList($projectId) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.id,c.user, c.comment, c.project, c.task, c.timestamp, u.firstname, u.lastname, u.path FROM Bundle\UserBundle\Entity\User u,Bundle\CommentBundle\Entity\Comment c WHERE  u.id = c.user AND c.project =:projectId')
                ->setParameter($this->KEY_PROJECT_ID, $projectId);
        $comments = $query->getResult();
        return $comments;
    }

    private function getTaskList($Project) {
        $searchParams = array($this->KEY_PROJECT=>$Project->getId());
        $taskList = $this->findUniqueEntities(RepositoryName::$REPOSITORY_TASK,$searchParams);
        $taskDetailList = array();
        if ($taskList != null) {
            foreach ($taskList as $task) {
                $projectManagerName = $this->getUser($task->getLeader())->getFirstName();
                $projectAssigneeName = $this->getUser($task->getUser())->getFirstName();
                $taskDetailList[] = array($task->getId(), $task->getCompleted(), $task->getName(), $task->getType(),$task->getUser(), $projectAssigneeName, $task->getLeader(), $projectManagerName);
            }
            return $taskDetailList;
        }
        return null;
    }

  

    private function getMemberList($Project) {
        $Members = $Project->getMembers();
        $MembersDetails = array();
        if ($Members != null) {
            foreach ($Members as $memberId) {
                $member = $this->getUser($memberId);
                $MembersDetails[] = array($member->getId(), $member->getFirstname() . " " . $member->getLastname(), $member->getPillar(), $member->getPath());
            }
            return $MembersDetails;
        }
        return null;
    }




}