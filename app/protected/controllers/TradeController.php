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
        $this->render('index');
    }
}