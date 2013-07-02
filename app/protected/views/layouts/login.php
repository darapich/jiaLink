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
                        array('label'=>'Login', 'url'=>$this->createUrl('/site/login')),
                        array('label'=>'Sign up', 'url'=>$this->createUrl('/site/signup')),
                        array('label'=>'Forgot Password', 'url'=>$this->createUrl('/site/forgotPassword')),
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