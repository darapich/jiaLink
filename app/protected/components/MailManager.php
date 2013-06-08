<?php
class MailManager
{
    public static function sendConfirmNewUser($user)
    {
        $message = new YiiMailMessage;
        $message->view = 'registrationFollowup';

        $message->setBody(array('user'=>$user), 'text/html');
        $message->addTo($user->username);
        $message->from = Yii::app()->params['adminEmail'];
        if (!Yii::app()->mail->send($message)) {
            return false;
        }
        return true;
    }
    
    public static function sendForgotPassword($password, $email)
    {
        $message = new YiiMailMessage;
        $message->view = 'forgotPassword';

        $message->setBody(array('password' => $password), 'text/html');
        $message->addTo($email);
        $message->from = Yii::app()->params['adminEmail'];
        if (!Yii::app()->mail->send($message)) {
            return false;
        }
        return true;
    }
}