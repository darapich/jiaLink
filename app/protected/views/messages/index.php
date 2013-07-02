<?php
/* @var $this MessagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Messages',
);

$this->menu=array(
	array('label'=>'Create Messages', 'url'=>array('create')),
	array('label'=>'Manage Messages', 'url'=>array('admin')),
);
?>

<h1>Messages</h1>
<ul class="tabs">
	<li><a href="#">Inbox</a></li>
	<li><a href="#">Send</a></li>
	<li><a href="#">Draft</a></li>
</ul>
<div class="panes">
	<div class="content">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$inboxData,
			'itemView'=>'list',
		)); ?>
	</div>
	<div class="content">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$sendData,
			'itemView'=>'list',
		)); ?>
	</div>
	<div class="content">Draft content</div>
</div>

