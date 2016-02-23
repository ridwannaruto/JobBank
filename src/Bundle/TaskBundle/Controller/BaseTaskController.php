<?php

namespace Bundle\TaskBundle\Controller;

use Bundle\CoreBundle\Controller\BaseController;
use Bundle\NotificationBundle\Entity\Notification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BaseTaskController extends BaseController {


    protected function setNotification($heading, $message, $type, $user, $task, $project) {
        $em = $this->getDoctrine()->getManager();
        $notification = new Notification();
        $notification->setTask($task);
        $notification->setHeading($heading);
        $notification->setDetails($message);
        $notification->setProject($project);
        $notification->setSeen(0);
        $notification->setTimestamp(new \DateTime());
        $notification->setType($type);
        $notification->setUserid($user);
        $em->persist($notification);
        $em->flush();
    }

    protected function sendEmailAction($email, $name, $taskID) {
        $link = "http://www.volma.moraspirit.com" .$this->generateUrl('moraspirit_task_details', array('taskID'=>$taskID));

        // echo "Got Here ".$username." ".$firstname;
        $message = \Swift_Message::newInstance()
                ->setSubject('New Task Assigned')
                ->setFrom('Moraspirit@gmail.com')
                ->setTo($email)
                ->setBcc('rshariffdeen@gmail.com')
                ->setBody(
                $this->renderView(
                        'MoraspiritNotificationBundle:Task:notification.html.twig', array('name' => $name, 'link' => $link)
                ), 'text/html'
                )
        ;
        $this->get('mailer')->send($message);
    }




    protected function getCommentList($taskID) {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.id,c.user, c.comment, c.project, c.task, c.timestamp, u.firstname, u.lastname, u.path FROM Bundle\UserBundle\Entity\User u,Bundle\CommentBundle\Entity\Comment c WHERE  u.id = c.user AND c.task =:taskID ORDER BY c.id')
            ->setParameter('taskID', $taskID);
        $comments = $query->getResult();
        return $comments;
    }

}