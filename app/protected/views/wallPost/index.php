<div class="row">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'searchForm',
    'type' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
)); ?>
<?php echo $form->textFieldRow($model, 'post', array('class'=>'input-medium')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
</div>
 
<?php $this->endWidget(); ?>
</div>


<div class="row">
<?php
    print_r($posts);
?>
</div>