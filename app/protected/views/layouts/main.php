<!DOCTYPE html>
<html>
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
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
                        array('label'=>'Library', 'url'=>'#'),
                        array('label'=>'Applications', 'url'=>'#'),
                        array('label'=>'Another list header', 'itemOptions'=>array('class'=>'nav-header')),
                        array('label'=>'Profile', 'url'=>'#'),
                        array('label'=>'Login', 'url'=>$this->createUrl('/site/login')),
                        '',
                        array('label'=>'Signup', 'url'=>$this->createUrl('/site/signup')),
                    )
                ));
            ?>
        </div>
        <div class="span10">
            <?php echo $content; ?>
        </div>
    </div>    
</div>
</body>
</html>