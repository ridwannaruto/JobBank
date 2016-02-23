<?php

namespace Bundle\CoreBundle\Values;



class RouteName  {


    /* Routing Values */
    public static $ROUTE_HOME = "user_home";
    public static $ROUTE_LOGIN = 'auth_login';
    public static $ROUTE_REGISTER = 'user_register';
    public static $ROUTE_EMAIL_VERIFICATION = 'auth_email_verification';
    public static $ROUTE_EMAIL_VERIFICATION_DELETE = 'auth_delete_confirmation';

    public static $ROUTE_COMMENT_NEW = 'comment_new';


    public static $ROUTE_PROJECT_LIST = 'project_index';
    public static $ROUTE_PROJECT_DETAIL = 'project_detail';

    public static $ROUTE_TASK_DETAIL = 'task_detail';
    public static $ROUTE_TASK_LIST = 'task_index';

    public static $ROUTE_USER_PROFILE = 'user_profile';
    public static $ROUTE_USER_RESET_PASSWORD = 'reset_password';




}