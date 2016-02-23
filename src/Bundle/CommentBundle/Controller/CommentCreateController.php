<?php

namespace Bundle\CommentBundle\Controller;

use Bundle\CommentBundle\Entity\Comment;
use Bundle\CommentBundle\Form\CommentType;

use Bundle\CoreBundle\Values\GenericMessage;
use Bundle\CommentBundle\Messages\CommentMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CommentCreateController extends BaseCommentController {


    public function newCommentAction(Request $request) {
        $commentUserId = $request->getSession()->get($this->SESSION_KEY_USER_ID);
        $commentUserName = $request->getSession()->get($this->SESSION_KEY_FULL_NAME);
        $comment = new Comment();
        $newCommentForm = $this->createForm(new CommentType(), $comment, array(
            'attr' => array(
                'class' => 'form-horizontal center'
            )
        ));

        $newCommentForm->handleRequest($request);

            $comment->setUser($commentUserId);
            $comment->setTimestamp(new \DateTime());

            if ($comment->getTask() == 0) {
               return $this->setProjectNotification($comment,$commentUserName);
            }

            if ($comment->getProject() == 0) {
               return $this->setTaskNotification($comment,$commentUserName);
            }


        return $this->render(TwigTemplate::$TWIG_ERROR);
    }


    private function setTaskNotification($comment, $authorName){
        $projectId = $comment->getProject();
        $taskId = $comment->getTask();
        $task =  $this->findEntityById(RepositoryName::$REPOSITORY_TASK,$taskId);
        $commentList = $task->getComments();
        $commentList[] = $comment->getId();

        $subscriberList = $task->getSubscribers();
        $isThere = false;
        if ($subscriberList != null) {
            foreach ($subscriberList as $subscriber) {
                if ($subscriber == $comment->getUser()) {
                    $isThere = true;
                }
            }
        } else {
            $subscriberList = array();
        }

        if (!$isThere) {
            $subscriberList[] = $comment->getUser();
        }


        $task->setComments($commentList);
        $task->setSubscribers($subscriberList);
        try {
            $this->saveEntityInstantly($task);
            $this->saveEntityInstantly($comment);
        } catch (Exception $ex) {
            return $this->redirect($this->generateUrl(RouteName::$ROUTE_TASK_DETAIL, array(
                'taskId' => $taskId,
                'type' => 'E',
                'message' => GenericMessage::$MESSAGE_ERROR_GENERAL
            )));
        }

        $this->setNotification("New Comment", $authorName. " commented in a Task you are following.", 1, $subscriberList, $projectId, $taskId);

        return $this->redirect($this->generateUrl(RouteName::$ROUTE_TASK_DETAIL, array(
            'taskId' => $taskId,
            'type' => 'S',
            'message' => CommentMessage::$MESSAGE_COMMENT_ADD_SUCCESS
        )));
    }

    private function setProjectNotification($comment, $authorName){
        $projectId = $comment->getProject();
        $taskId = $comment->getTask();

        $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT,$projectId);
        $commentList = $project->getComments();
        $commentList[] = $comment->getId();
        $subscriberList = $project->getSubscribers();
        $isThere = false;
        if ($subscriberList != null) {
            foreach ($subscriberList as $subscriber) {
                if ($subscriber == $comment->getUser()) {
                    $isThere = true;
                }
            }
        }else {
            $subscriberList = array();
        }

        if (!$isThere) {
            $subscriberList[] = $comment->getUser();
        }

        $project->setComments($commentList);
        $project->setSubscribers($subscriberList);
        try {
            $this->saveEntityInstantly($project);
            $this->saveEntityInstantly($comment);
        } catch (Exception $ex) {
            return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
                'projectId' => $projectId,
                'type' => 'E',
                'message' => GenericMessage::$MESSAGE_ERROR_GENERAL
            )));
        }

        $this->setNotification("New Comment", $authorName. " commented in a project you are following.", 1, $subscriberList, $projectId, $taskId);

        return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
            'projectId' => $projectId,
            'type' => 'S',
            'message' => CommentMessage::$MESSAGE_COMMENT_ADD_SUCCESS
        )));
    }

}
