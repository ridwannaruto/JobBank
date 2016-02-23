<?php

namespace Bundle\CoreBundle\Values;



 class TwigTemplate {

    /* Twig template file names */

     //CoreBundle Twig Templates
     public static $TWIG_LOGIN ='CoreBundle:Authentication:login.html.twig';
     public static $TWIG_ERROR = 'CoreBundle:Error:error.html.twig';
     public static $TWIG_PERMISSION = 'CoreBundle:Error:permission.html.twig';

     public static $TWIG_SUCCESS = 'CoreBundle:Success:success.html.twig';
     public static $TWIG_REGISTER =  'CoreBundle:Authentication:register.html.twig';

     public static $TWIG_HOME_VOLUNTEER = 'CoreBundle:Home:volunteer.html.twig';
     public static $TWIG_HOME_ADMIN = 'CoreBundle:Home:admin.html.twig';
     public static $TWIG_HOME_HEAD = 'CoreBundle:Home:head.html.twig';

     //ProjectBundle Twig Templates
     public static $TWIG_PROJECT_LIST = 'ProjectBundle:Project:list.html.twig';
     public static $TWIG_PROJECT_DETAIL = 'ProjectBundle:Project:details.html.twig';
     public static $TWIG_PROJECT_NEW = 'ProjectBundle:Project:new.html.twig';
     public static $TWIG_PROJECT_EDIT = 'ProjectBundle:Project:edit.html.twig';

     //TaskBundle Twig Templates
     public static $TWIG_TASK_NEW = 'TaskBundle:Task:new.html.twig';
     public static $TWIG_TASK_DETAIL = 'TaskBundle:Task:detail.html.twig';
     public static $TWIG_TASK_LIST = 'TaskBundle:Task:list.html.twig';
     public static $TWIG_TASK_EDIT ='TaskBundle:Task:edit.html.twig';
     public static $TWIG_TASK_FEEDBACK = 'TaskBundle:Task:feedback.html.twig';

     //UserBundle Twig Templates
     public static $TWIG_USER_LIST = 'UserBundle:Members:list.html.twig';
     public static $TWIG_USER_PROFILE = 'UserBundle:Profile:profile.html.twig';
     public static $TWIG_USER_PROFILE_EDIT =  'UserBundle:Profile:edit.html.twig';
     public static $TWIG_USER_PHOTO_UPDATE = 'UserBundle:Profile:photo.html.twig';
     public static $TWIG_USER_CHANGE_PASSWORD = 'UserBundle:Account:changePassword.html.twig';
     public static $TWIG_USER_RESET_PASSWORD = 'UserBundle:Account:resetPassword.html.twig';
     public static $TWIG_USER_FORGOT_PASSWORD = 'UserBundle:Account:forgotPassword.html.twig';



     //Email TWig Templates
     public static $EMAIL_RESET_PASSWORD = 'NotificationBundle:Email:resetPassword.html.twig';

     //Notification Bundle Twig Templates
     public static $TWIG_NOTIFICATION_ALL = 'NotificationBundle:Notification:showAll.html.twig';

}