<?php

namespace Bundle\UserBundle\Controller;

use Bundle\CoreBundle\Values\Messages\GenericMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bundle\UserBundle\Entity\Photo;
use Bundle\UserBundle\Entity\Profile;
use Bundle\UserBundle\Form\ProfileType;
use Symfony\Component\HttpFoundation\Session\Session;

class UserProfileController extends BaseUserController
{


    public function updatePictureAction(Request $request)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $photo = new Photo();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $photoUploadForm = $this->createFormBuilder($photo)
                ->add('file', 'file')
                ->getForm();


            $photoUploadForm->handleRequest($request);
            if ($photoUploadForm->isValid()) {
                $photo->setId($authenticatedUser->getId());
                try {
                    $photo->upload();
                } catch (\Exception $e) {
                    echo $e;
                }
                $authenticatedUser->setPath($photo->getWebPath());
                $this->saveEntityInstantly($authenticatedUser);

                $request->getSession()->set('photo', $photo->getWebPath());
                return $this->redirect(
                    $this->generateUrl(RouteName::$ROUTE_USER_PROFILE, array(
                        'userId' => $authenticatedUser->getId(), 'type' => 'S',
                        'message' => "Succesfully updated your profile picture"
                    )
                    )
                );
            }

            return $this->render(TwigTemplate::$TWIG_USER_PHOTO_UPDATE, array(
                'user' => $authenticatedUser, 'form' => $photoUploadForm->createView(),
                $this->KEY_NOTIFICATION_LIST => $notificationList
            )
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    public function viewProfileAction($userId, Request $request)
    {
        $authenticatedUser = $this->authenticateUser();

        if ($authenticatedUser) {
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $profileUser = $this->findEntityById(RepositoryName::$REPOSITORY_USER, $userId);
            if ($profileUser == null) {
                return $this->render(
                    TwigTemplate::$TWIG_ERROR,
                    array('message' => " user doesn't exists", $this->KEY_NOTIFICATION_LIST => $notificationList)
                );
            }

            $userRole = $profileUser->getAccesslevel();
            if ($userRole == $this->USER_ROLE_HEAD || $userRole == $this->USER_ROLE_ADMIN) {

                return $this->render(
                    TwigTemplate::$TWIG_USER_PROFILE, array(
                    'user' => $profileUser,
                    'message' => $request->get('message'),
                    'type' => $request->get('type'),
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
                );
            }
            $projectList = $this->getProjectList($userId);
            $taskList = $this->getTaskList($userId);
            $rating = $this->getCareer($userId)->getOverallRating();
            $feedbackList = $this->getFeedbackList($userId);
            return $this->render(
                TwigTemplate::$TWIG_USER_PROFILE, array(
                'user' => $profileUser,
                'projects' => $projectList,
                'feedbacks' => $feedbackList,
                'rating' => $rating,
                'tasks' => $taskList,
                'message' => $request->get('message'),
                'type' => $request->get('type'),
                $this->KEY_NOTIFICATION_LIST => $notificationList
            )
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }


    public function editProfileAction(Request $request)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $profile = $this->getProfile();
            $form = $this->createForm(
                new ProfileType(), $profile, array(
                'action' => $this->generateUrl('profile_edit'),
                'method' => 'PUT',
                'attr' => array(
                    'class' => 'form-horizontal center'
                )
            )
            );
            $form->handleRequest($request);
            if ($form->isValid()) {

                $user = $this->setProfile($profile);

                try {
                    $this->saveEntityInstantly($user);
                } catch (\Exception $e) {
                    // echo $e;
                    return $this->render(
                       TwigTemplate::$TWIG_USER_PROFILE_EDIT, array(
                        'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                        'type' => 'E',
                        'form' => $form->createView(),
                        $this->KEY_NOTIFICATION_LIST => $notificationList
                    )
                    );
                }
                return $this->redirect(
                    $this->generateUrl(
                        RouteName::$ROUTE_USER_PROFILE, array(
                        'message' => ' Successfully updated your profile',
                        'type' => 'S',
                        'userId' => $user->getId()
                    )
                    )
                );
            }
            return $this->render(
                TwigTemplate::$TWIG_USER_PROFILE_EDIT, array(
                'form' => $form->createView(),
                'message' => $request->get('message'),
                'type' => $request->get('type'),
                $this->KEY_NOTIFICATION_LIST => $notificationList
            )
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    private function getProfile()
    {
        $profile = new Profile();
        $user = $this->authenticateUser();
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

    private function setProfile($profile)
    {
        $user = $this->authenticateUser();
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

    private function getTaskList($userId)
    {
        $searchParams = array("user" => $userId);
        $taskList = $this->findUniqueEntities(RepositoryName::$REPOSITORY_TASK, $searchParams);
        return $taskList;
    }

    private function getCareer($userId)
    {
        $searchParams = array("user" => $userId);
        $career = $this->findOneEntity(RepositoryName::$REPOSITORY_TRACK_REPORT, $searchParams);
        return $career;
    }

    private function getFeedbackList($userId)
    {


        $career = $this->getCareer($userId);
        $feedbackList = $career->getComments();
        $feedbackDetailedList = array();
        if ($feedbackList != null) {
            foreach ($feedbackList as $feedback) {
                $author = $this->findEntityById(RepositoryName::$REPOSITORY_USER,$feedback[0]);
                $authorFullName = $author->getFirstname() . " " . $author->getLastname();
                $authorPhotoURL = $author->getPath();
                $feedbackDetailedList[] = array($feedback[0], $authorFullName, $authorPhotoURL, $feedback[1]);
            }
            return $feedbackDetailedList;
        }
        return null;
    }


    private function getProjectList($userId)
    {
        $career = $this->getCareer($userId);
        $projectDetailedList = null;
        if ($career != null) {
            $projectIdList = $career->getProjects();
            if ($projectIdList != null) {
                $projectDetailedList = array();
                foreach ($projectIdList as $projectId) {
                    $project = $this->findEntityById(RepositoryName::$REPOSITORY_PROJECT,$projectId);
                    if ($project != null) {
                        $projectDetailedList[] = $project;
                    }
                }
            }
        }
        return $projectDetailedList;
    }

}