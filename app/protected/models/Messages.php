<?php

/**
 * This is the model class for table "Messages".
 *
 * The followings are the available columns in table 'Messages':
 * @property integer $id
 * @property string $messageTitle
 * @property string $messageContent
 * @property string $senderId
 * @property string $receiverId
 *
 * The followings are the available model relations:
 * @property User $receiver
 * @property User $sender
 */
class Messages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Messages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('messageTitle, messageContent', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'receiver' => array(self::BELONGS_TO, 'User', 'receiverId'),
			'sender' => array(self::BELONGS_TO, 'User', 'senderId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'messageTitle' => 'Message Title',
			'messageContent' => 'Message Content',
			'senderId' => 'Sender',
			'receiverId' => 'Receiver',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('messageTitle',$this->messageTitle,true);
		$criteria->compare('messageContent',$this->messageContent,true);
		$criteria->compare('senderId',$this->senderId,true);
		$criteria->compare('receiverId',$this->receiverId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves the number of unread messages.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function unreadCount()
	{
		
		return Yii::app()->db->createCommand()
			    ->select('COUNT(id)')
			    ->from('Messages')
			    ->where('isRead=0')
			    ->andwhere('receiverId=:id', array(':id' => Yii::app()->user->getId()))
			    ->queryScalar();
	}
}