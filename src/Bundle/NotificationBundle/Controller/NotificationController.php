<?php

namespace Bundle\NotificationBundle\Controller;

use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundle\CoreBundle\Controller\BaseController;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;

class NotificationController extends BaseController
{
    public function seenAction($notificationID)
    {
        $em = $this->getDoctrine()->getManager();
        $Repository = $em->getRepository('MoraspiritEntityBundle:Notification');
        $notification = $Repository->find($notificationID);
        $notification->setSeen(1);
        $em->persist($notification);
        $em->flush();
        
        return $this->redirect($this->generateUrl('moraspirit_homepage'));
    }
    
    public function showAllAction(){
    	$authenticatedUser = $this->authenticateUser();
        $notificationList = $this->getNotificationList($authenticatedUser->getId());
        $searchParams = array('userid'=> $authenticatedUser->getId());
        $notificationArchive = $this->findUniqueEntities(RepositoryName::$REPOSITORY_NOTIFICATION,$searchParams);

    	return $this->render(TwigTemplate::$TWIG_NOTIFICATION_ALL,array(
    		 $this->KEY_NOTIFICATION_LIST => $notificationList,
    		'AllNotifications' => $notificationArchive
    	));
    }

    public function projectNotificationAction($projectId,$notificationId){
        $authenticatedUser = $this->authenticateUser();
        if($authenticatedUser){
            $notification = $this->findEntityById(RepositoryName::$REPOSITORY_NOTIFICATION,$notificationId);
            $notification->setSeen(1);
            $this->saveEntityInstantly($notification);
            return $this->redirect($this->generateUrl(RouteName::$ROUTE_PROJECT_DETAIL,array('projectId'=>$projectId)));
        }
    }

    public function taskNotificationAction($taskId,$notificationId){
        $authenticatedUser = $this->authenticateUser();
        if($authenticatedUser){
            $notification = $this->findEntityById(RepositoryName::$REPOSITORY_NOTIFICATION,$notificationId);
            $notification->setSeen(1);
            $this->saveEntityInstantly($notification);
            return $this->redirect($this->generateUrl(RouteName::$ROUTE_TASK_DETAIL,array('taskId'=>$taskId)));
        }
    }

}