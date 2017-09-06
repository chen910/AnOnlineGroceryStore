<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\warehouses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'WarehouseId')->textInput() ?>

    <?= $form->field($model, 'WarehouseName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WarehouseState')->dropDownList(Yii::$app->params['WarehouseState']) ?>

    <?= $form->field($model, 'WarehouseCity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WarehouseAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Capacity')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
