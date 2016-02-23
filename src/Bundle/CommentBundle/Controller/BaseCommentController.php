<?php

namespace Bundle\CommentBundle\Controller;

use Bundle\CoreBundle\Controller\BaseController;
use Bundle\NotificationBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class BaseCommentController extends BaseController {


    protected function setNotification($heading, $message, $type, $subscribers, $project, $task) {
        $em = $this->getDoctrine()->getManager();
        foreach ($subscribers as $subscriber) {
            if ($subscriber != $this->authenticateAction()->getId()) {
                $notification = new Notification();
                $notification->setTask($task);
                $notification->setHeading($heading);
                $notification->setDetails($message);
                $notification->setProject($project);
                $notification->setSeen(0);
                $notification->setTimestamp(new \DateTime());
                $notification->setType($type);
                $notification->setUserid($subscriber);
                $em->persist($notification);
                $em->flush();
            }
        }
    }

}
