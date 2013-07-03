<legend>
trade
</legend>

<?php
$this->widget('bootstrap.widgets.TbButton',array(
    'label' => 'Post Trade',
    'type' => 'success',
    'size' => 'large',
    'url' => $this->createUrl('/trade/create'),
    'icon' => 'icon-heart',
));

    $this->widget('bootstrap.widgets.TbExtendedGridView', array(
        //'filter' => $trade,
        'type'=>'striped bordered',
        'dataProvider' => $trade->search(),
        'columns' => array(
            array(
                'name' => 'imagePath',
                'header' => 'Image',
                'value' => function ($data) {
                    return CHtml::image(Yii::app()->getBaseUrl(true) . '/' . $data->imagePath, 'image', array('width' => 50, 'height' => '50', 'class' => 'img-rounded'));
                },
            ),
            array(
                'name' => 'category',
                'value' => function ($data) {
                    return $data->category;
                },
            ),
            array(
                'name' => 'subject',
                'value' => function ($data) {
                    return $data->subject;
                },
            ),
            array(
                'name' => 'message',
                'value' => function ($data) {
                    return $data->message;
                },
            ),
            array(
                'name' => 'createTime',
                'value' => function ($data) {
                    return $data->createTime;
                },
            ),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
?>