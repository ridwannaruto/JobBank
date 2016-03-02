<?php

namespace Bundle\UserBundle\Controller;

use Bundle\CoreBundle\Values\RouteName;
use Bundle\CoreBundle\Values\TwigTemplate;
use Bundle\UserBundle\Entity\CV;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class UserCVController extends BaseUserController
{
    public function updateCVAction(Request $request)
    {
        $authenticatedUser = $this->authenticateUser();
        if ($authenticatedUser) {
            $cv = new CV();
            $notificationList = $this->getNotificationList($authenticatedUser->getId());
            $cvUploadForm = $this->createFormBuilder($cv)
                ->add('file', 'file')
                ->getForm();

            $cvUploadForm->handleRequest($request);
            if ($cvUploadForm->isValid()) {
                $cv->setId($authenticatedUser->getId());
                try {
                    $cv->upload();
                } catch (\Exception $e) {
                    echo $e;
                }
                $authenticatedUser->setCVPath($cv->getWebPath());
                $this->saveEntityInstantly($authenticatedUser);

                return $this->redirect(
                    $this->generateUrl(RouteName::$ROUTE_USER_PROFILE, array(
                            'userId' => $authenticatedUser->getId(),
                            'type' => 'S',
                            'message' => "Successfully updated your CV"
                        )
                    )
                );
            }

            return $this->render(TwigTemplate::$TWIG_USER_CV_UPDATE, array(
                    'user' => $authenticatedUser,
                    'form' => $cvUploadForm->createView(),
                    $this->KEY_NOTIFICATION_LIST => $notificationList
                )
            );
        }
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }
}
