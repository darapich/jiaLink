<?php
$this->pageTitle=Yii::app()->name . ' - Account Setting';
$this->breadcrumbs=array(
    'Setting',
);
?>
 Account Setting
<div class="row">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'account_setting',
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
    'enableClientValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

<?php echo $form->textFieldRow($model, 'firstName', array('class'=>'input-medium')); ?>
<?php echo $form->textFieldRow($model, 'lastName', array('class'=>'input-medium')); ?>
<?php echo $form->fileFieldRow($model, 'imagePath', array('class'=>'input-medium')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
</div>
 
<?php $this->endWidget(); ?>
</div>
