<?php
class TradeController extends Controller
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
        $trade = new Trade;
        if (isset($_GET['Trade'])) {
            $trade->attributes = $_GET['Trade'];
        }
        $this->render('index', array('trade' => $trade));
    }
    
    public function actionCreate()
    {
        $trade = new Trade;
        if (isset($_POST['Trade'])) {
            $trade->attributes = $_POST['Trade'];
        }
        $this->render('create', array('model' => $trade));
    }
    
    public function actionView($id)
    {
        
    }
}