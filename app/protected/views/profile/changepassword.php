<?php
$this->pageTitle=Yii::app()->name . ' - Change Password';
$this->breadcrumbs=array(
    'Change Password',
);
?>
Change Password
<div class="row">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'change_password',
    'type' => 'horizontal',
    'enableClientValidation' => true,
)); ?>

<?php echo $form->passwordFieldRow($model, 'oldPassword', array('class'=>'input-medium')); ?>
<?php echo $form->passwordFieldRow($model, 'newPassword', array('class'=>'input-medium')); ?>
<?php echo $form->passwordFieldRow($model, 'confirmPassword', array('class'=>'input-medium')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
</div>
 
<?php $this->endWidget(); ?>
</div>