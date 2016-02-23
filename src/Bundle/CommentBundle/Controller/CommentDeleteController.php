<?php

namespace Bundle\CommentBundle\Controller;

use Bundle\CoreBundle\Controller\BaseController;
use Bundle\CoreBundle\Values\GenericMessage;
use Bundle\CommentBundle\Messages\CommentMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Moraspirit\EntityBundle\Entity\Comments;
use Moraspirit\EntityBundle\Entity\Notification;
use Moraspirit\EntityBundle\Form\CommentsType;

class CommentDeleteController extends BaseCommentController {


    public function deleteCommentAction($commentId) {
        $commentToDelete = $this->findEntityById(RepositoryName::$REPOSITORY_COMMENT, $commentId);
        $authenticatedUser = $this->authenticateUser();
        if ($commentToDelete->getUser() == $authenticatedUser->getId()) {
            $projectId = $commentToDelete->getProject();
            $taskId = $commentToDelete->getTask();

            if ($projectId == 0) {
                return $this->removeCommentFromTask($commentToDelete);
            }
            if ($taskId == 0 ){
                return $this->removeCommentFromProject($commentToDelete);
            }
        }

        return $this->render(TwigTemplate::$TWIG_PERMISSION);
    }

    private function removeCommentFromProject($commentToDelete){

        $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT,$commentToDelete->getProject());
        $projectCommentList = $project->getComments();
        $newCommentList = array();
        foreach ($projectCommentList as $comment) {
            if ($comment != $commentToDelete->getId()) {
                $newCommentList[] = $comment;
            }
        }

        $project->setComments($newCommentList);

        try {
            $this->saveEntityInstantly($project);
            $this->removeEntity($commentToDelete);
        } catch (Exception $ex) {
            return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
                'projectId' => $commentToDelete->getProject(),
                'type' => 'E',
                'message' => GenericMessage::$MESSAGE_ERROR_GENERAL
            )));
        }

        return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL, array(
            'projectId' => $commentToDelete->getProject(),
            'type' => 'S',
            'message' => CommentMessage::$MESSAGE_COMMENT_DELETE_SUCCESS
        )));
    }

    private function removeCommentFromTask($commentToDelete){
        $task = $this->findEntityById(RepositoryName::$REPOSITORY_TASK,$commentToDelete->getTask());
        $taskCommentList = $task->getComments();
        $newCommentList = array();
        foreach ($taskCommentList as $comment) {
            if ($comment != $commentToDelete->getId()) {
                $newCommentList[] = $comment;
            }
        }
        $task->setComments($newCommentList);

        try {
            $this->saveEntityInstantly($task);
            $this->removeEntity($commentToDelete);
        } catch (Exception $ex) {
            return $this->redirect($this->generateUrl(RouteName::$ROUTE_TASK_DETAIL, array(
                'taskId' => $commentToDelete->getTask(),
                'type' => 'E',
                'message' => GenericMessage::$MESSAGE_ERROR_GENERAL
            )));
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_TASK_DETAIL, array(
            'taskId' => $commentToDelete->getTask(),
            'type' => 'S',
            'message' => CommentMessage::$MESSAGE_COMMENT_DELETE_SUCCESS
        )));
    }


}
