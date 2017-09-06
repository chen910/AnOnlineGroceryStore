<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\diliveraddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diliveraddress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'StateId')->dropDownList(Yii::$app->params['state']) ?>

    <?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Zipcode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
