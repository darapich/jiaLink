<?php

class SiteController extends Controller
{
    public $defaultAction = 'login';
    public $layout='//layouts/login';

	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }

	/**
	 * This is the access rules for each action based on user group.
	 */
	public function accessRules()
	{
	    return array(
			array('allow',  // deny all users anything not specified
	            'users'=>array('*'),
	        ),
	    );
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
    
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect($this->createUrl('/wallPost/index'));
		}
		// display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    
    /**
    * Signup new user
    * 
    */
    public function actionSignup()
    {
        $model = new SignupForm;
        if (isset($_POST['SignupForm'])) {
            $model->attributes = $_POST['SignupForm'];
            if ($model->validate() && $model->saveAndSendConfirm()) {
                return $this->render('success');
            }
        }
        $this->render('signup', array('model' => $model));
    }
    
    public function actionConfirm()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $user = User::model()->findByAttributes(array(
                'token' => $token,
                'status' => 'pending'
            ));
            if ($user) {
                $user->status = 'active';
                $user->token  = '';
                if ($user->save()) {
                    $this->redirect('/site/login');
                }
            }
        }
    }

    /**
    * User Dashbord page
    */
    public function actionDashboard()
    {
    	$id = Yii::app()->user->getId();
    	$model = User::model()->findByPK($id);
        $this->render('dashboard', array('userModel' => $model));
    }
    
    public function actionForgotPassword()
    {
        $model = new SignupForm;
        if (isset($_POST['SignupForm'])) {
            $model->attributes = $_POST['SignupForm'];
            if ($model->resetPassword()) {
                return $this->render('success');
            } else {
                echo 'Something bad happen. Please re-entry your email!';
            }
        }
        $this->render('forgotpassword', array('model' => $model));
    }
}