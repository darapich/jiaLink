<?php
/* @var $this MessagesController */
/* @var $data Messages */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('messageTitle')); ?>:</b>
	<?php echo CHtml::encode($data->messageTitle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('messageContent')); ?>:</b>
	<?php echo CHtml::encode($data->messageContent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('senderId')); ?>:</b>
	<?php echo CHtml::encode($data->senderId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiverId')); ?>:</b>
	<?php echo CHtml::encode($data->receiverId); ?>
	<br />


</div>