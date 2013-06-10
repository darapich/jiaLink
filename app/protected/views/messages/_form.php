<?php
/* @var $this MessagesController */
/* @var $model Messages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'messages-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'messageTitle'); ?>
		<?php echo $form->textField($model,'messageTitle',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'messageTitle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'messageContent'); ?>
		<?php echo $form->textArea($model,'messageContent',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'messageContent'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'receiverEmail'); ?>
		<?php echo $form->textField($model,'receiverEmail',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'receiverEmail'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Send'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->