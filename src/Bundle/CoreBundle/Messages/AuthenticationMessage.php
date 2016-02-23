<?php

namespace Bundle\CoreBundle\Messages;



 class AuthenticationMessage {

     private static $KEY_MESSAGE_TYPE = 'type';
     private static $KEY_MESSAGE_CONTENT = 'message';
     private static $KEY_MESSAGE_DETAILS = 'details';


     public static $ARRAY_MESSAGE_ACCOUNT_NOT_ACTIVE = array(
        'type' => 'E',
        'message' => 'Account Not Activated',
        'details' => 'please contact support service',

    );

     public static $ARRAY_MESSAGE_INVALID_CREDENTIALS =  array(
         'type' => 'E',
         'message' => 'Invalid Credentials'
     );

     public static $ARRAY_MESSAGE_USER_ACTIVATION_FAIL = array(
         'message' => ' either this account is already activated or this account does not exists'
     );

     public static $ARRAY_MESSAGE_USER_ACTIVATION_SUCCESS = array(
         'message' => ' successfully activated the account'
     );

     public static $ARRAY_MESSAGE_USER_DELETION_SUCCESS =array(
         'message' => 'account was deleted'
     );

     public static $ARRAY_MESSAGE_TOKEN_EXPIRED = array(
         'message' => 'Expired Token'
     );

     public static $ARRAY_MESSAGE_ACCOUNT_REJECTED = array(
         'message' => ' successfully rejected the account'
     );

     public static $ARRAY_MESSAGE_ACCOUNT_VERIFIED = array(
         'message' => 'Email confirmation is done. Please contact wait till we activate your Account'
     );

     public static $ARRAY_MESSAGE_ACCOUNT_REGISTRATION_SUCCESS = array(
         'type' => 'S',
         'message' => ' Congratulations! You are now registered',
         'details' => ' We will send a confirmation email after activate your account. Keep in Touch!',
     );



}