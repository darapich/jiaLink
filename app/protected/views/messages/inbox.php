<?php
/* @var $this MessagesController */
/* @var $data Messages */
?>

<div class="view <?=($data->isRead == 0 ? 'unread' : ''); ?>">
	<a href="<?php echo $this->createUrl('/messages/view/'.$data->id)?>">
		<p><?php echo CHtml::encode($data->getAttributeLabel('messageTitle')); ?>:
		<?php echo CHtml::encode($data->messageTitle); ?>
		<?php echo CHtml::encode($data->getAttributeLabel('senderId')); ?>:
		<?php echo CHtml::encode($data->sender->firstName. ' ' . $data->sender->lastName); ?></li>
		</p>
	</a>
</div>