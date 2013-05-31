<!DOCTYPE html>
<html>
<head>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/gumby.css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/gumby.js"></script>
</head>
<div class="row navbar pretty" id="nav1">
    <!-- Toggle for mobile navigation, targeting the <ul> -->
    <a class="toggle" gumby-trigger="#nav1 > .row > ul" href="#"><i class="icon-menu"></i></a>
    <h1 class="four columns logo">
    <a href="#">
    <img src="/img/gumby_mainlogo.png" gumby-retina />
    </a>
    </h1>
    <ul class="eight columns">
        <li>
            <a href="<?php echo $this->createUrl('/site/login'); ?>">Login</a>
        </li>
        <li>
            <a href="<?php echo $this->createUrl('/site/signup'); ?>">Sign up</a>
        </li>
    </ul>
</div>
<body>
    <?php echo $content; ?>
</body>
</html>