<?php

namespace Bundle\UserBundle\Controller;



use Bundle\CoreBundle\Values\Messages\GenericMessage;
use Bundle\CoreBundle\Values\RepositoryName;
use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\Exception;
use Bundle\UserBundle\Entity\Account;
use Bundle\UserBundle\Form\AccountType;
use Bundle\UserBundle\Messages\AccountMessage;
use Bundle\UserBundle\Form\PasswordType;

class UserAccountController extends BaseUserController
{

    public function changePasswordAction(Request $request)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $userAccount = new Account();
            $passwordChangeForm = $this->createForm(
                new AccountType(), $userAccount, array(
                'attr' => array(
                    'class' => 'form-horizontal center'
                )
            )
            );
            $passwordChangeForm->handleRequest($request);

            if ($passwordChangeForm->isValid()) {
                $currentPassword = hash('md5', $userAccount->getCurrentpassword());
                $userAccount = $passwordChangeForm->getData();
                if ($currentPassword == $authenticatedUser->getPassword()) {
                    if ($userAccount->getNewpassword() == $userAccount->getConfirmpassword()) {
                        $authenticatedUser->setPassword(hash('md5', $userAccount->getNewpassword()));
                        try {
                            $this->saveEntityInstantly($authenticatedUser);
                        } catch (Exception $ex) {
                            return $this->render(
                                TwigTemplate::$TWIG_USER_CHANGE_PASSWORD, array(
                                'form' => $passwordChangeForm->createView(),
                                'type' => 'E',
                                'message' => GenericMessage::$MESSAGE_ERROR_GENERAL,
                                $this->KEY_NOTIFICATION_LIST => $notificationList
                            )
                            );
                        }

                        return $this->render(
                            TwigTemplate::$TWIG_USER_CHANGE_PASSWORD, array(
                            'form' => $passwordChangeForm->createView(),
                            'type' => 'S',
                            'message' => AccountMessage::$MESSAGE_PASSWORD_CHANGE_SUCCESS,
                            $this->KEY_NOTIFICATION_LIST => $notificationList
                        )
                        );
                    }
                    return $this->render(
                        TwigTemplate::$TWIG_USER_CHANGE_PASSWORD, array(
                        'form' => $passwordChangeForm->createView(),
                        'type' => 'E',
                        'message' => AccountMessage::$MESSAGE_PASSWORD_NOT_MATCH,
                        $this->KEY_NOTIFICATION_LIST => $notificationList
                    )
                    );
                }
                return $this->render(
                    TwigTemplate::$TWIG_USER_CHANGE_PASSWORD, array(
                    'form' => $passwordChangeForm->createView(),
                    'type' => 'E',
                    'message' => AccountMessage::$MESSAGE_INCORRECT_PASSWORD,
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
                );
            }
            return $this->render(
                TwigTemplate::$TWIG_USER_CHANGE_PASSWORD, array(
                'form' => $passwordChangeForm->createView(),
                $this->KEY_NOTIFICATION_LIST => $notificationList
            )
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }

    public function forgotPasswordAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $userEmail = $request->get('email');
            $searchParams = array('email' => $userEmail);
            $user = $this->findOneEntity(RepositoryName::$REPOSITORY_USER, $searchParams);
            if ($user) {
                $rootURL = $this->container->getParameter('app_root');
                $link = $rootURL . $this->generateUrl(
                        RouteName::$ROUTE_USER_RESET_PASSWORD, array('userId' => $user->getId())
                    );
                $message = \Swift_Message::newInstance()
                    ->setSubject('Volma Password Resetting')
                    ->setFrom($this->container->getParameter('email_send'))
                    ->setTo($userEmail)
                    ->setBcc($this->container->getParameter('email_bcc'))
                    ->setBody(
                        $this->renderView(
                            TwigTemplate::$EMAIL_RESET_PASSWORD, array('name' => $user->getFirstname(), 'link' => $link)
                        ), 'text/html'
                    );
                return $this->render(
                    TwigTemplate::$TWIG_USER_FORGOT_PASSWORD, AccountMessage::$ARRAY_MESSAGE_RESET_LINK_SENT
                );
                $this->get('mailer')->send($message);
            }
            return $this->render(
                TwigTemplate::$TWIG_USER_FORGOT_PASSWORD, AccountMessage::$ARRAY_MESSAGE_INCORRECT_EMAIL
            );

        }
        return $this->render(TwigTemplate::$TWIG_USER_FORGOT_PASSWORD);
    }

    public function resetPasswordAction(Request $request, $userId)
    {
        $user = $this->findEntityById(RepositoryName::$REPOSITORY_USER,$userId);
        $userAccount = new Account();
        $passwordResetForm = $this->createForm(
            new PasswordType(), $userAccount, array(
            'action' => $this->generateUrl(RouteName::$ROUTE_USER_RESET_PASSWORD, array('userId' => $userId)),
            'attr' => array(
                'class' => 'form-horizontal center'
            )));

        $passwordResetForm->handleRequest($request);
        if ($passwordResetForm->isValid()) {
            $userAccount = $passwordResetForm->getData();
            if ($userAccount->getNewpassword() == $userAccount->getConfirmpassword()) {
                $user->setPassword(hash('md5', $userAccount->getNewpassword()));
                try {
                    $this->saveEntityInstantly($user);

                } catch (Exception $ex) {
                    return $this->render(TwigTemplate::$TWIG_USER_RESET_PASSWORD, array(
                        'form' => $passwordResetForm->createView(),
                        'type' => 'E',
                        'message' => GenericMessage::$MESSAGE_ERROR_GENERAL
                    ));
                }

                return $this->render(TwigTemplate::$TWIG_LOGIN, AccountMessage::$ARRAY_MESSAGE_PASSWORD_RESET_SUCCESS );
            }
            return $this->render(TwigTemplate::$TWIG_USER_RESET_PASSWORD, array(
                'form' => $passwordResetForm->createView(),
                'type' => 'E',
                'message' => AccountMessage::$MESSAGE_PASSWORD_NOT_MATCH
            ));
        }
        return $this->render(TwigTemplate::$TWIG_USER_RESET_PASSWORD, array(
            'userId' => $userId,
            'form' => $passwordResetForm->createView()
        ));
    }

}