<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">
    <a href="index.php?r=creditcard/index">My Cards</a>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CustomerId')->textInput() ?>

    <?= $form->field($model, 'UserName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MiddleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BirthYear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BirthMonth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BirthDay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Balance')->textInput() ?>

    <?= $form->field($model, 'defaultDiliverId')->dropDownList($dilivers)->label('Diliver') ?>

    <a href="index.php?r=diliveraddress/create">add Diliver</a>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
