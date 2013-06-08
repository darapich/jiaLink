<!DOCTYPE html>
<html>
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'list',
                    'items' => array(
                        array('label'=>'List header', 'itemOptions'=>array('class'=>'nav-header')),
                        array('label'=>'Home', 'url'=>'#', 'itemOptions'=>array('class'=>'active')),
                        array('label'=>'Message', 'url'=>$this->createUrl('/message/index')),
                        array('label'=>'Applications', 'url'=>'#'),
                        array('label'=>'Another list header', 'itemOptions'=>array('class'=>'nav-header')),
                        array('label'=>'Profile Setting', 'url'=>$this->createUrl('/profile/setting')),
                        array('label'=>'Change Password', 'url'=> $this->createUrl('/profile/changePassword')),
                        array('label'=>'Logout', 'url'=> $this->createUrl('/site/logout')),
                    )
                ));
            ?>
        </div>
        <div class="span10">
        <?php
            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
            }
        ?>
        </div>
        <div class="span10">
            <?php echo $content; ?>
        </div>
    </div>    
</div>
</body>
</html>