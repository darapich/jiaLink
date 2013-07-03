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
class Trade extends CActiveRecord
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
        return 'Trade';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(

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
            'owner' => array(self::BELONGS_TO, 'User', 'ownerId'),
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
        $criteria->compare('message',$this->message,true);
        $criteria->compare('createTime',$this->createTime,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
