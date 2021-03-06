<?php

class WallPostForm extends CFormModel
{
    public $post;

    public function rules()
    {
        return array(

        );
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
        );
    }
    
    public function savePost()
    {
        $post = new WallPost;
        $post->ownerId    = Yii::app()->user->getId();
        $post->post       = $this->post;
        $post->createTime = date('c');
        if (!$post->save()) {
            print_r($post->getErrors());
        }
        return true;
    }
    
    public function getPost()
    {
        return Yii::app()->db->createCommand()
            -> select('ownerId, post')
            ->from('WallPost')
            ->order('createTime DESC')
            ->queryAll();
    }
}
