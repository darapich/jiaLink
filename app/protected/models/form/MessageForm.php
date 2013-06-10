<?php 


class MessageForm extends CFormModel
{
	public $messageTitle;
	public $messageContent;
	public $receiverEmail;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('messageTitle, messageContent, receiverEmail', 'required'),
			array('messageTitle', 'length', 'max' => 100),
			array('messageContent', 'length', 'max' => 255),
			array('receiverEmail', 'email'),
			array('receiverEmail', 'validateReceiverEmail'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'messageTitle' => 'Message Title',
			'messageContent' => 'Message Content',
			'receiverEmail' => 'Receiver Email',
		);
	}

	/**
	 * Check if receiver email exists in the database
	 * @return boolean whether email exists
	 */
	public function validateReceiverEmail($attribute, $params)
	{
		$email = User::model()->exists('username = :receiverEmail', array(':receiverEmail' => $this->$attribute ));
        if ($user) {
             $this->addError('This user does not exist.');
        }
	}

	public function saveAndSend()
    {
        $message = new Messages;
        $message->messageTitle  = $this->messageTitle;
        $message->messageContent = $this->messageContent;
        $message->senderId  = Yii::app()->user->getId();
        $message->receiverId  = User::model()->findByAttributes(array('username' => $this->receiverEmail))->id;
        if ($message->save()) {
            return true;
        }
        return false;
    }
}
