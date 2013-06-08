<?php
class ProfileController extends Controller
{
    public function accessRules()
    {
        return array(
            array('allow', 'roles' => array('@')),
        );
    }
    
    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionSetting()
    {
        $id = Yii::app()->user->getId();
        $model = User::model()->findByPk($id);
        
        if (isset($_POST['User'])) {
            $uploadedFile = CUploadedFile::getInstance($model, 'imagePath');
            $fileName = 'images/' . mt_rand() . "-{$uploadedFile}"; 
            
            $model->firstName = $_POST['User']['firstName'];
            $model->lastName = $_POST['User']['lastName'];
            $model->imagePath = $fileName;
            
            if ($model->save()) {
                if (!empty($uploadedFile)) {
                    if ($uploadedFile->saveAs($fileName)) {
                        echo 'success';
                    } else {
                        echo 'failed';
                    }
                }
            }
        }

        $this->render('setting', array(
            'model' => $model
        ));
    }
    
    public function actionChangePassword()
    {
        $id = Yii::app()->user->getId();
        $model = new ChangePasswordForm;
        if (isset($_POST['ChangePasswordForm'])) {
            $model->attributes = $_POST['ChangePasswordForm'];
            if ($model->validate() && $model->savePassword()) {
                echo 'Successfully change password!';
            }
        }
        $this->render('changepassword', array('model' => $model));
    }
} 