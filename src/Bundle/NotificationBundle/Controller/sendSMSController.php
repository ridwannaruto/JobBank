<?php

namespace Bundle\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Moraspirit\EntityBundle\Entity\Confirmation;

class sendEmailController extends Controller {

    public function sendSMSAction($email, $firstname) {
        $textsms = urlencode("Congratulations! You have been appointed as a Project Manager for a new Project in Bundle. Please check your account");
        $tosms = "94".$projectManager->getPhonenumber();
        $baseurlsms ="http://www.textit.biz/sendmsg";
        $urlsms = "$baseurlsms/?id=$usersms&pw=$passwordsms&to=$tosms&text=$textsms";
        $retsms = file($urlsms);
        $ressms= explode(":",$retsms[0]);
    }

}
