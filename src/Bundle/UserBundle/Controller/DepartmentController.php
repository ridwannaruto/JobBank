<?php

namespace Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Session\Session;

class PillarController extends Controller {

    public function detailsAction($pillarName) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $UserRepository = $em->getRepository('MoraspiritEntityBundle:User');
        $NotificationRepository = $em->getRepository('MoraspiritEntityBundle:Notification');
             
 
        $id = $session->get('user');
        $user = $UserRepository->findOneBy(array('id' => $id));
	$NotificationsQuery = $NotificationRepository->createQueryBuilder('p')
                    ->where('p.userid = :id AND p.seen = 0')
                    ->setParameter('id', $user->getId())
                    ->setMaxResults(10)
                    ->orderBy('p.id', 'DESC')
                    ->getQuery();
	$Notifications = $NotificationsQuery->getResult();
        if ($user) {            
           
            $members = $UserRepository->findBy(array('pillar'=>$pillarName,'accesslevel' => 'Spiriter'));
            $leaders = $UserRepository->findBy(array('pillar'=>$pillarName,'accesslevel' => 'Head'));
            
            $TaskQuery =  $em->createQuery('SELECT t.id,t.user,t.name as taskname,t.duetimestamp, t.description, t.project, p.name as projectname, u.firstname, u.lastname FROM Moraspirit\EntityBundle\Entity\User u,Moraspirit\EntityBundle\Entity\Task t, Moraspirit\EntityBundle\Entity\Project p WHERE  t.user = u.id AND t.project = p.id AND t.completed=0 AND t.pillar=:pillar')
                 ->setParameter('pillar',$pillarName);
                $Tasks = $TaskQuery->getResult();     
                      
		
            return $this->render('MoraspiritSiteBundle:Pillar:pillar.html.twig', array(
                        'members' => $members,
                        'leaders' => $leaders,
                        'Tasks' => $Tasks,
                        'Notifications' => $Notifications
                    ));
        }

         return $this->redirect($this->generateUrl('moraspirit_site_login'));
        
    }

}