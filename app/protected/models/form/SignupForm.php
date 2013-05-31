<?php

class SignupForm extends CFormModel
{
    public $username;
    public $password;

    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('username', 'email'),
            array('username', 'exist'),
            array('username', 'length', 'max' => 100),
            array('password', 'length', 'max' => 250),
            array('id, username, password', 'safe', 'on'=>'search'),
        );
    }

    public function validateUser($attribute, $params)
    {
        $user = User::model()->exist('username = :username', array(':username' => $this->attribute));
        if ($user) {
            $this->addError($attribute, 'username has been taken');
        }
    }
    
    public function saveAndSendConfirm()
    {
        $user = new User;
        $user->username = $this->username;
        $user->password = $user->encryptPassword($this->password);
        if (!$user->save()) {
            return false;
        }
        return true;
    }
}
