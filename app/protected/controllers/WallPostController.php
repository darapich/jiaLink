<?php
class WallPostController extends Controller
{
    public function accessRules()
    {
        return array(
            array('allow',
                'roles' => array('@'),
            ),
        );
    }
    
    public function actionIndex()
    {
        $model = new WallPostForm;
        if (isset($_POST['WallPostForm'])) {
            $model->post = $_POST['WallPostForm']['post'];
            if (!($model->validate() && $model->savePost())) {
                echo 'Error';
            }
        }
        $posts = $model->getPost();
        $this->render('index', array('model' => $model, 'posts' => $posts));
    }
}