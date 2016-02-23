<?php

namespace Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Moraspirit\EntityBundle\Entity\User;
use Moraspirit\EntityBundle\Entity\TrackReport;
use Moraspirit\EntityBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Session\Session;

class NewsController extends Controller {

    public function newsAction() {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MoraspiritEntityBundle:User');
        $EventRepository = $em->getRepository('MoraspiritEntityBundle:Event');
 
        $id = $session->get('user');
        $user = $repository->findOneBy(array('id' => $id));
	$NotificationsQuery = $NotificationRepository->createQueryBuilder('p')
                    ->where('p.userid = :id AND p.seen = 0')
                    ->setParameter('id', $user->getId())
                    ->setMaxResults(10)
                    ->orderBy('p.id', 'DESC')
                    ->getQuery();
	$Notifications = $NotificationsQuery->getResult();
        if ($user) {            
           
            $creativeMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Creative Pillar')
                    ->setMaxResults(2)
                    ->getResult();
                   
            $cooperateMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Cooperate Development')
                     ->setMaxResults(2)
                    ->getResult();
            $editorialMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Editorial')
                     ->setMaxResults(2)
                    ->getResult();
            $fundMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Fund Raising')
                     ->setMaxResults(2)
                    ->getResult();
            $HRMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Human Resource')
                     ->setMaxResults(2)
                    ->getResult();
            $marketingMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Marketing Pillar')
                     ->setMaxResults(2)
                    ->getResult();
            $newsMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','News Operation')
                     ->setMaxResults(2)
                    ->getResult();
            $organizationalMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u,Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Organizational Development')
                     ->setMaxResults(2)
                    ->getResult();
            $technicalMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Technical Pillar')
                     ->setMaxResults(2)
                    ->getResult();
            $specialMembers = $em->createQuery('SELECT t.user,u.path, t.overallrating, u.firstname FROM Moraspirit\EntityBundle\Entity\User u, Moraspirit\EntityBundle\Entity\Trackreport t WHERE  t.user = u.id AND u.pillar=:pillar ORDER by t.overallrating DESC')
                    ->setParameter('pillar','Special Projects')
                     ->setMaxResults(2)
                    ->getResult();

            return $this->render('MoraspiritSiteBundle:News:news.html.twig', array(
                        'creative'=> $creativeMembers,
                        'cooperate' =>$cooperateMembers,
                        'editorial' => $editorialMembers,
                        'fund' => $fundMembers,
                        'HR' => $HRMembers,
                        'marketing' => $marketingMembers,
                        'news'  => $newsMembers,
                        'organizational' => $organizationalMembers,
                        'technical' => $technicalMembers,
                        'special' => $specialMembers,
                        'Notifications' => $Notifications
            ));
            
        }

         return $this->redirect($this->generateUrl('moraspirit_site_login'));
        
    }

}
