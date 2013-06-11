<div class="span10">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
)); ?>
<?php
    echo $form->textAreaRow($model, 'post',
        array('class'=>'span5', 'rows' => 3, 'placeholder' => 'Post something on your mind!'));
?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Post', 'type' => 'success')); ?>
 
<?php $this->endWidget(); ?>
<table class="table">
    <tbody>
    <?php 
        foreach ($posts as $post) { 
        $profileImage = empty($post['imagePath']) ? 'images/default_icon.jpg' : $post['imagePath'];
    ?>
        <tr>
            <td width="100"><?php echo CHtml::image(Yii::app()->getBaseUrl(true) . '/' . $profileImage, 'image', array('width' => 50, 'class' => 'img-rounded')); ?></td>
            <td width="400"><?php echo $post['post']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>