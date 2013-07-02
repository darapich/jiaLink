<?php
/* @var $this MessagesController */
/* @var $data Messages */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('messageTitle')); ?>:</b>
	<?php echo CHtml::encode($data->messageTitle); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('senderId')); ?>:</b>
	<?php echo CHtml::encode($data->sender->firstName. ' ' . $data->sender->lastName); ?>
	<br />
</div>