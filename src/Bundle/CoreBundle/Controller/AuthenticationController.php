<?php

namespace Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Bundle\UserBundle\Entity\User;
use Bundle\UserBundle\Entity\TrackReport;
use Bundle\UserBundle\Form\UserType;
use Bundle\CoreBundle\Entity\Authentication\Confirmation;
use Symfony\Component\HttpFoundation\Session\Session;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\CoreBundle\Messages\AuthenticationMessage;
use Bundle\CoreBundle\Messages\GenericMessage;

class AuthenticationController extends BaseController
{

    private $HASH_ALGORITHM = 'md5';

    public function loginUserAction(Request $request)
    {

        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            return $this->redirect($this->generateUrl(RouteName::$ROUTE_HOME));
        }
        if ($request->getMethod() == 'POST') {

            $username = $request->get($this->KEY_USERNAME);
            $password = hash($this->HASH_ALGORITHM, $request->get($this->KEY_PASSWORD));
            $searchParams = array($this->KEY_USERNAME => $username, $this->KEY_PASSWORD => $password);
            $authenticatedUser = $this->findOneEntity(RepositoryName::$REPOSITORY_USER, $searchParams);

            if ($authenticatedUser) {
                $status = $authenticatedUser->getStatus();
                if ($status == 2) {
                    $this->startSession($authenticatedUser);
                    $authenticatedUser->setlastlogin(new \DateTime());
                    $this->saveEntityInstantly($authenticatedUser);
                    return $this->redirect($this->generateUrl(RouteName::$ROUTE_HOME));
                }

                if ($status == 1 || $status == 0) {
                    return $this->render(
                        TwigTemplate::$TWIG_LOGIN, AuthenticationMessage::$ARRAY_MESSAGE_ACCOUNT_NOT_ACTIVE
                    );
                }
            }
            return $this->render(
                TwigTemplate::$TWIG_LOGIN, AuthenticationMessage::$ARRAY_MESSAGE_INVALID_CREDENTIALS
            );
        }

        return $this->render(TwigTemplate::$TWIG_LOGIN);
    }

    public function logoutUserAction()
    {
        $session = $this->getRequest()->getSession();
        $session->clear();
        return $this->render(TwigTemplate::$TWIG_LOGIN);
    }

    public function activateUserAction($userId)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $userRole = $authenticatedUser->getAccesslevel();
            if ($userRole == $this->USER_ROLE_ADMIN || $userRole == $this->USER_ROLE_HEAD) {
                $inactiveUser = $this->findEntityById(RepositoryName::$REPOSITORY_USER, $userId);
                $inactiveUser->setStatus($this->STATUS_USER_ACTIVE);
                try {
                    $this->saveEntityInstantly($inactiveUser);
                } catch (\Exception $e) {
                    return $this->render(
                        TwigTemplate::$TWIG_ERROR, AuthenticationMessage::$ARRAY_MESSAGE_USER_ACTIVATION_FAIL
                    );
                }

                return $this->render(
                    TwigTemplate::$TWIG_SUCCESS, AuthenticationMessage::$ARRAY_MESSAGE_USER_ACTIVATION_SUCCESS
                );
            } else {
                return $this->render(TwigTemplate::$TWIG_PERMISSION);
            }
        }
        return $this->redirect($this->generateUrl(RouteNames::$ROUTE_LOGIN));
    }

    public function deleteConfirmationAction($verificationToken, $userEmail)
    {
        $searchParams = array($this->KEY_EMAIL => $userEmail);
        $user = $this->findOneEntity(RepositoryName::$REPOSITORY_USER, $searchParams);
        $confirmation = $this->findOneEntity(RepositoryName::$REPOSITORY_CONFIRMATION, $searchParams);
        if ($confirmation != null) {
            if ($confirmation->getVerification() == $verificationToken) {
                $this->removeEntity($user);
                $this->removeEntity($confirmation);
                return $this->render(TwigTemplate::$TWIG_SUCCESS,AuthenticationMessage::$ARRAY_MESSAGE_USER_DELETION_SUCCESS);
            } else {
                return $this->render(TwigTemplate::$TWIG_PERMISSION);
            }
        } else {
            return $this->render(TwigTemplate::$TWIG_PERMISSION, AuthenticationMessage::$ARRAY_MESSAGE_TOKEN_EXPIRED );
        }
    }

    public function rejectUserAction($userId)
    {
        $user = $this->findEntityById(RepositoryName::$REPOSITORY_USER,$userId);
        $this->removeEntity($user);
        return $this->render(TwigTemplate::$TWIG_SUCCESS, AuthenticationMessage::$ARRAY_MESSAGE_ACCOUNT_REJECTED);

    }


    public function verifyEmailAction($verificationToken, $userEmail)
    {
        $searchParams = array($this->KEY_EMAIL => $userEmail);
        $registeredUser = $this->findOneEntity(RepositoryName::$REPOSITORY_USER,$searchParams);
        if ($registeredUser != null) {
            $registeredUser->setStatus($this->STATUS_USER_VERIFIED);
            $confirmation = $this->findOneEntity(RepositoryName::$REPOSITORY_CONFIRMATION,$searchParams);
            if ($confirmation != null) {
                if ($confirmation->getVerification() == $verificationToken) {
                    $this->removeEntity($confirmation);
                    return $this->render(TwigTemplate::$TWIG_SUCCESS, AuthenticationMessage::$ARRAY_MESSAGE_ACCOUNT_VERIFIED );
                } else {
                    return $this->render(TwigTemplate::$TWIG_PERMISSION);
                }
            }
        }
        return $this->render(TwigTemplate::$TWIG_ERROR);

    }

    public function registerUserAction(Request $request)
    {
        $newUser = new User();
        $registrationForm = $this->createForm(
            new UserType(), $newUser, array(
            'attr' => array(
                'class' => 'form-horizontal center'
            )
        )
        );
        $registrationForm->handleRequest($request);

        if ($registrationForm->isValid()) {
            $newUser = $registrationForm->getData();
            $newUser->setAccesslevel($this->USER_ROLE_VOLUNTEER);
            $newUser->setStatus($this->STATUS_USER_REGISTERED);
            $careerReport = new TrackReport();
            $careerReport->setOverallrating(0);
            $careerReport->setTotalweight(0);

            $password = $newUser->getPassword();
            $hashPassword = hash($this->HASH_ALGORITHM, $password);
            $newUser->setPassword($hashPassword);

            try {
                $this->saveEntityInstantly($newUser);
                $searchParam = array($this->KEY_USERNAME => $newUser->getUsername());
                $registeredUser = $this->findOneEntity(RepositoryName::$REPOSITORY_USER,$searchParam);
                $careerReport->setUser($registeredUser->getId());
                $this->saveEntityInstantly($careerReport);
                $this->sendConfirmationAction($registeredUser->getEmail(), $registeredUser->getFirstname());
            } catch (\Exception $e) {

                return $this->render(TwigTemplate::$TWIG_REGISTER, array(
                    'type' => 'E',
                    'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                    'details' => 'Duplicate Values',
                    'form_registration' => $registrationForm->createView()
                )
                );
            }
            return $this->render(TwigTemplate::$TWIG_LOGIN,AuthenticationMessage::$ARRAY_MESSAGE_ACCOUNT_REGISTRATION_SUCCESS );
        }

        return $this->render(TwigTemplate::$TWIG_REGISTER, array('form_registration' => $registrationForm->createView()));
    }

    private function sendConfirmationAction($userEmail, $userFirstName)
    {
        $confirmation = new Confirmation();
        $confirmation->setEmail($userEmail);
        $confirmation->setVerification(dechex(rand(10000000, 99999999)));
        try {
            $this->saveEntityInstantly($confirmation);
        } catch (\Exception $e) {
            echo "ERROR IN CREATING CONFIRMATION";
        }
        $activateLink = $this->generateUrl(RouteNames::$ROUTE_EMAIL_VERIFICATION,array($confirmation->getVerification(),$userEmail));
        $deleteLink = $this->generateUrl(RouteNames::$ROUTE_EMAIL_VERIFICATION_DELETE,array($confirmation->getVerification(),$userEmail));

        $message = \Swift_Message::newInstance()
            ->setSubject('Volma Registration')
            ->setFrom('admin@moraspirit.com')
            ->setTo($userEmail)
            ->setBcc('gayan@moraspirit.com', 'rshariffdeen@gmail.com')
            ->setBody(
                $this->renderView(
                    'MoraspiritNotificationBundle:Register:confirm.html.twig',
                    array('name' => $userFirstName, 'delete' => $deleteLink, 'activate' => $activateLink)
                ), 'text/html'
            );
        $this->get('mailer')->send($message);
    }

    private function startSession($authenticatedUser)
    {
        $session = $this->getRequest()->getSession();
        $session->start();
        $session->set($this->SESSION_KEY_FIRST_NAME, $authenticatedUser->getFirstname());
        $session->set(
            $this->SESSION_KEY_FULL_NAME, $authenticatedUser->getFirstname() . " " . $authenticatedUser->getLastname()
        );
        $session->set($this->SESSION_KEY_USER_ID, $authenticatedUser->getId());
        $session->set($this->SESSION_KEY_ACCESS_LEVEL, $authenticatedUser->getAccesslevel());
        $session->set($this->SESSION_KEY_DEPARTMENT, $authenticatedUser->getPillar());
        $path = $this->DEFAULT_PHOTO_PATH;
        if ($authenticatedUser->getPath() != null) {
            $path = $authenticatedUser->getPath();
        }
        $session->set($this->SESSION_KEY_PHOTO, $path);
    }


}