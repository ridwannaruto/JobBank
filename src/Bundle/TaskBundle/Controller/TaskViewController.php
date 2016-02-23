<?php

namespace Bundle\TaskBundle\Controller;

use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundle\CommentBundle\Entity\Comment;
use Bundle\CommentBundle\Form\CommentType;


class TaskViewController extends BaseTaskController {



    public function viewAction($taskId, Request $request) {
    	$authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $newComment = New Comment();
            $newComment->setProject(0);
            $newComment->setTask($taskId);
            $newCommentForm = $this->createForm(new CommentType(), $newComment, array(
                    'action' => $this->generateUrl(RouteName::$ROUTE_COMMENT_NEW),
                    'attr' => array(
                        'class' => 'form-horizontal center'
                    )
            ));

            $task = $this->findEntityById(RepositoryName::$REPOSITORY_TASK,$taskId);

	    $notificationList = $this->getNotificationList($authenticatedUser->getId());
            
            if ($task == null){
            	return $this->render(TwigTemplate::$TWIG_ERROR, array('message'=>" Task doesn't exists",$this->KEY_NOTIFICATION_LIST => $notificationList));
            }
            
            $commentList = $this->getCommentList($taskId);
            $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT, $task->getProject());
            $taskManager = $this->findEntityById(RepositoryName::$REPOSITORY_USER, $task->getLeader());
            $taskAssignee = $this->findEntityById(RepositoryName::$REPOSITORY_USER, $task->getUser());
            return $this->render(TwigTemplate::$TWIG_TASK_DETAIL, array(
                        'Task' => $task,
                        'Comments' => $commentList,
                        'NewComment' => $newCommentForm->createView(),
                        'Manager' => $taskManager,
                        'Project' => $project,
                        'User' => $taskAssignee,
                        'message' => $request->get('message'),
                        'type' => $request->get('type'),
                        $this->KEY_NOTIFICATION_LIST => $notificationList
            ));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }


}