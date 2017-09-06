<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\creditcard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="creditcard-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CreditId')->textInput() ?>

    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MiddleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StateId')->dropDownList(Yii::$app->params['state'])  ?>

    <?= $form->field($model, 'City')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DueTime')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'SecureNumber')->textInput(['maxlength' => 3, 'style' => 'color:red']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
