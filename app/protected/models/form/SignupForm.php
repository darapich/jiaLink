<?php

class SignupForm extends CFormModel
{
    public $username;
    public $password;
    public $confirmPassword;
    public $firstName;
    public $lastName;

    public function rules()
    {
        return array(
            array('username, password, confirmPassword, firstName, lastName', 'required'),
            array('username', 'email'),
            array('username', 'validateUsername'),
            array('username', 'length', 'max' => 100),
            array('password', 'length', 'min' => 8),
            array('password', 'length', 'max' => 32),
            array('confirmPassword', 'compare', 'compareAttribute' => 'password'),
            array('id, username, password', 'safe', 'on'=>'search'),
        );
    }
    
    public function validateUsername($attribute, $params)
    {        
        $user = User::model()->exists('username = :username', array(':username' => $this->$attribute));
        if ($user) {
             $this->addError($attribute, 'This username already taken. Please chose another one.');
        }
    }
    
    private static function createKey()
    {
        $duplicateKey = true;
        while($duplicateKey) {
            $token = md5(time() . mt_rand()) . sha1(mt_rand());
            $user  = User::model()->exists('token = :token', array(':token' => $token));
            if (!$user) {
                $duplicateKey = false;
            }
        }
        return $token;
    }
    
    public function saveAndSendConfirm()
    {
        $token = self::createKey();
        $user = new User;
        $user->username  = $this->username;
        $user->firstName = $this->firstName;
        $user->lastName  = $this->lastName;
        $user->password  = $user->encryptPassword($this->password);
        $user->token     = $token;
        $user->status    = 'pending';
        if ($user->save() && MailManager::sendConfirmNewUser($user)) {
            return true;
        }
        return false;
    }
}
