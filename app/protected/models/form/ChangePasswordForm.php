<?php

class ChangePasswordForm extends CFormModel
{
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    public function rules()
    {
        return array(
            array('oldPassword, newPassword, confirmPassword', 'required'),
            array('oldPassword', 'validatePassword'),
            array('newPassword, confirmPassword', 'length', 'min' => 8),
            array('newPassword, confirmPassword', 'length', 'max' => 32),
            array('confirmPassword', 'compare', 'compareAttribute' => 'newPassword'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'oldPassword' => 'Old Password',
            'newPassword' => 'New Password',
            'confirmPassword' => 'Confirm Password',
        );
    }
    
    public function validatePassword($attribute, $params)
    {
        $user = User::model()->findByPk(Yii::app()->user->getId());
        if (!$user->decryptPassword($this->$attribute)) {
            $this->addError($attribute, 'Password do not match our record!');
        }
    }
    
    public function savePassword()
    {
        $user = User::model()->findByPk(Yii::app()->user->getId());
        $user->password = $user->encryptPassword($this->newPassword);
        if (!$user->save()){
            return false;
        }
        return true;
    }
}
