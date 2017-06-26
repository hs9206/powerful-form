<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Pform */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pform-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <!--    
        <//?= $form->field($model, 'uid')->textInput(['maxlength' => true]) ?>
    -->

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => '表单名称，如 活动报名']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => '简短语句描述表单作用']) ?>

    <?= $form->field($model, 'file')->fileInput()->hint('1张表单页面头部图片，图片建议尺寸：900像素 * 300像素')  ?>

<!--     
    <//?= $form->field($model, 'created_at')->textInput() ?>

    <//?= $form->field($model, 'updated_at')->textInput() ?> 
-->

<!--
    <//?= $form->field($model, 'user_id')->textInput() ?>
-->



    <?= $form->field($model, 'detail')->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'minHeight'=>200,
            'maxHeight'=>400,
            'imageManagerJson' => ['/redactor/upload/image-json'],
            'imageUpload' => ['/redactor/upload/image'],
            'fileUpload' => ['/redactor/upload/file'],
            'lang' => 'zh_cn',
            'plugins' => ['clips', 'fontcolor','imagemanager']
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>