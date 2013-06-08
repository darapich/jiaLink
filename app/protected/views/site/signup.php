<?php
$this->pageTitle=Yii::app()->name . ' - Signup';
$this->breadcrumbs=array(
    'Signup',
);
?>
Sign Up
<div class="row">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'searchForm',
    'type' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
)); ?>
<?php echo $form->textFieldRow($model, 'username', array('class'=>'input-medium')); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'input-medium')); ?>
<?php echo $form->passwordFieldRow($model, 'confirmPassword', array('class'=>'input-medium')); ?>
<?php echo $form->textFieldRow($model, 'firstName', array('class'=>'input-medium')); ?>
<?php echo $form->textFieldRow($model, 'lastName', array('class'=>'input-medium')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
</div>
 
<?php $this->endWidget(); ?>
</div>
