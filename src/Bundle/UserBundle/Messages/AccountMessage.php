<?php

namespace Bundle\UserBundle\Messages;



 class AccountMessage {

     private static $KEY_MESSAGE_TYPE = 'type';
     private static $KEY_MESSAGE_CONTENT = 'message';
     private static $KEY_MESSAGE_DETAILS = 'details';

     //quick messages
     public static $ARRAY_MESSAGE_RESET_LINK_SENT = array(
         'type'  => 'S',
         'message'   => 'Password reset link has been sent to your mail'
     );

     public static $ARRAY_MESSAGE_INCORRECT_EMAIL = array(
         'type'  => 'E',
         'message'   => 'please enter your correct email address'
     );

     public static $ARRAY_MESSAGE_PASSWORD_RESET_SUCCESS = array(
         'type' => 'S',
         'message' => 'successfully changed your password. Login with your new password'
     );

     public static $MESSAGE_PASSWORD_NOT_MATCH = 'password do not mach';
     public static $MESSAGE_PASSWORD_CHANGE_SUCCESS =  'successfully changed your password';
     public static $MESSAGE_INCORRECT_PASSWORD = 'please enter your current password';




     //notification messages

}