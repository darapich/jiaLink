<?php
$this->pageTitle=Yii::app()->name . ' - Forgot Password';
$this->breadcrumbs=array(
    'Signup',
);
?>
Forgot Password
<div class="row">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'forgot_password',
    'type' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
)); ?>
<?php echo $form->textFieldRow($model, 'username', array('class'=>'input-medium')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
</div>
 
<?php $this->endWidget(); ?>
</div>
