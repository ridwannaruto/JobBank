<?php

namespace Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Bundle\CoreBundle\Controller\BaseController;

class BaseUserController extends BaseController {


    public function pictureAction(Request $request) {
        $authenticatedUser = $this->authenticateAction();
        if ($authenticatedUser) {
            $photo = new Photo();
            
            $em = $this->getDoctrine()->getManager();
            $NotificationRepository = $em->getRepository('MoraspiritEntityBundle:Notification');
            $NotificationsQuery = $NotificationRepository->createQueryBuilder('p')
                    ->where('p.userid = :id AND p.seen = 0')
                    ->setParameter('id', $authenticatedUser->getId())
                    ->setMaxResults(10)
                    ->orderBy('p.id', 'DESC')
                    ->getQuery();
	    $Notifications = $NotificationsQuery->getResult();
            $form = $this->createFormBuilder($photo)
                    ->add('file', 'file')
                    ->getForm()
            ;

           
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $photo->setId($authenticatedUser->getId());
                    try{
                    $photo->upload();
                    }  catch (\Exception $e){
                         echo $e;
                    }
                    $authenticatedUser->setPath($photo->getWebPath());
                    $em->persist($authenticatedUser);
                    $em->flush();
                    $request->getSession()->set('photo', $photo->getWebPath());
                    return $this->redirect($this->generateUrl('moraspirit_profile', array('userID'=>$authenticatedUser->getId(),'type' => 'S', 'message' => "Succesfully updated your profile picture")));
                }
            
            return $this->render('MoraspiritUserBundle:Profile:photo.html.twig', array('user' => $authenticatedUser, 'form' => $form->createView(),'Notifications' => $Notifications));
        }
        return $this->redirect($this->generateUrl('moraspirit_site_login'));
    }

    public function indexAction($userID, Request $request) {
        $authenticatedUser = $this->authenticateAction();
        $em = $this->getDoctrine()->getManager();
        $NotificationRepository = $em->getRepository('MoraspiritEntityBundle:Notification');
            $NotificationsQuery = $NotificationRepository->createQueryBuilder('p')
                    ->where('p.userid = :id AND p.seen = 0')
                    ->setParameter('id', $authenticatedUser->getId())
                    ->setMaxResults(10)
                    ->orderBy('p.id', 'DESC')
                    ->getQuery();
	    $Notifications = $NotificationsQuery->getResult();
        if ($authenticatedUser) {
            $user = $this->getUserProfile($userID);
            if ($user == null){
            	return $this->render('MoraspiritStyleBundle:Error:error.html.twig', array('message'=>" user doesn't exists",'Notifications' => $Notifications));
            }
	
	    $type = $user->getAccesslevel();
 	    if ($type == 'Head' || $type == 'Admin'){
		
		    return $this->render('MoraspiritUserBundle:Profile:profile.html.twig', array(
		                'user' => $user,		                
		                'message' => $request->get('message'),
		                'type' => $request->get('type'),
		                'Notifications' => $Notifications
		    ));
	    }
            $projects = $this->getProjects($userID);
            $tasks = $this->getTasks($userID);
            $rating = $this->getRating($userID);
            $feedbacks = $this->getFeedbacks($userID);
            return $this->render('MoraspiritUserBundle:Profile:profile.html.twig', array(
                        'user' => $user,
                        'projects' => $projects,
                        'feedbacks' => $feedbacks,
                        'rating' => $rating,
                        'tasks' => $tasks,
                        'message' => $request->get('message'),
                        'type' => $request->get('type'),
                        'Notifications' => $Notifications
            ));
        }
        return $this->redirect($this->generateUrl('moraspirit_site_login'));
    }

    private function getUserProfile($userID) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MoraspiritEntityBundle:User');
        $user = $repository->findOneBy(array('id' => $userID));
        return $user;
    }

    public function editAction(Request $request) {
        $authenticatedUser = $this->authenticateAction();
        if ($authenticatedUser) {
            $em = $this->getDoctrine()->getManager();	
            $NotificationRepository = $em->getRepository('MoraspiritEntityBundle:Notification');
            $NotificationsQuery = $NotificationRepository->createQueryBuilder('p')
                    ->where('p.userid = :id AND p.seen = 0')
                    ->setParameter('id', $authenticatedUser->getId())
                    ->setMaxResults(10)
                    ->orderBy('p.id', 'DESC')
                    ->getQuery();
	    $Notifications = $NotificationsQuery->getResult();	

            $profile = $this->getProfile();
            $form = $this->createForm(new ProfileType(), $profile, array(
                'action' => $this->generateUrl('moraspirit_profile_edit'),
                'method' => 'PUT',
                'attr' => array(
                    'class' => 'form-horizontal center'
                )
            ));
            $form->handleRequest($request);
            if ($form->isValid()) {

                $user = $this->setProfile($profile);
                
                try {
                    $em->persist($user);
                    $em->flush();
                } catch (\Exception $e) {
                    // echo $e;
                    return $this->render('MoraspiritUserBundle:Profile:edit.html.twig', array(
                                'message' => ' Opz! something went wrong!',
                                'type' => 'E',
                                'form' => $form->createView(),
                                'Notifications' => $Notifications
                    ));
                }
                return $this->redirect($this->generateUrl('moraspirit_profile', array(
                                    'message' => ' Successfully updated your profile',
                                    'type' => 'S',
                                    'userID' => $user->getId()
                )));
            }
            return $this->render('MoraspiritUserBundle:Profile:edit.html.twig', array(
                        'form' => $form->createView(),
                        'message' => $request->get('message'),
                        'type' => $request->get('type'),
                        'Notifications' => $Notifications
            ));
        }
        return $this->redirect($this->generateUrl('moraspirit_site_login'));
    }

    private function getProfile() {
        $profile = new Profile();
        $user = $this->authenticateAction();
        $profile->setAddress($user->getAddress());
        $profile->setBatch($user->getBatch());
        $profile->setCity($user->getCity());
        $profile->setCountry($user->getCountry());
        $profile->setDateofbirth($user->getDateofbirth());
        $profile->setDepartment($user->getDepartment());
        $profile->setFirstname($user->getFirstname());
        $profile->setLastname($user->getLastname());
        $profile->setMobilenumber($user->getMobilenumber());
        $profile->setNamewithinitials($user->getNamewithinitials());
        $profile->setNic($user->getNic());
        $profile->setPhonenumber($user->getPhonenumber());
        $profile->setSkills($user->getSkills());
        $profile->setUsername($user->getUsername());
        return $profile;
    }

    private function setProfile($profile) {
        $user = $this->authenticateAction();
        $user->setAddress($profile->getAddress());
        $user->setBatch($profile->getBatch());
        $user->setCity($profile->getCity());
        $user->setCountry($profile->getCountry());
        $user->setDateofbirth($profile->getDateofbirth());
        $user->setDepartment($profile->getDepartment());
        $user->setFirstname($profile->getFirstname());
        $user->setLastname($profile->getLastname());
        $user->setMobilenumber($profile->getMobilenumber());
        $user->setNamewithinitials($profile->getNamewithinitials());
        $user->setNic($profile->getNic());
        $user->setPhonenumber($profile->getPhonenumber());
        $user->setSkills($profile->getSkills());
        $user->setUsername($profile->getUsername());
        return $user;
    }

    private function getTasks($userID) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MoraspiritEntityBundle:Task');        
        $taskDetails = $repository->findBy(array("user"=>$userID));       
        return $taskDetails;
    }
    
    private function getRating($userID) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MoraspiritEntityBundle:Trackreport');
        $career = $repository->findOneBy(array('user' => $userID));        
        return $career->getOverallRating();
    }

    private function getFeedbacks($userID) {
        $em = $this->getDoctrine()->getManager();
        $careerRepository = $em->getRepository('MoraspiritEntityBundle:Trackreport');
        $userRepository = $em->getRepository('MoraspiritEntityBundle:User');
        $career = $careerRepository->findOneBy(array('user' => $userID));
        $feedbacks = $career->getComments();
        $Feedbacks = array();
        if ($feedbacks != null){
        foreach ($feedbacks as $feedback){
            $provider = $userRepository->findOneBy(array('id'=>$feedback[0]));
            $firstname = $provider->getFirstname();
            $fullname = $firstname. " " .$provider->getLastname();
            $path = $provider->getPath();
            $Feedbacks[] = array($feedback[0],$fullname,$path ,$feedback[1]);
        }
        
        
        return $Feedbacks;
        }
        return null;
    }
    
   

    private function getProjects($userID) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MoraspiritEntityBundle:Trackreport');
        $career = $repository->findOneBy(array('user' => $userID));
        $projectDetails = null;
        if ($career != null) {
            $ProjectRepository = $em->getRepository('MoraspiritEntityBundle:Project');
            $projects = $career->getProjects();

            if ($projects != null) {
                $projectDetails = array();
                foreach ($projects as $project) {
                    $project = $ProjectRepository->find($project);
                    if ($project != null)
                    $projectDetails[] = $project;
                }
            }
        }
        return $projectDetails;
    }

}