<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\creditcard */

$this->title = 'Update Creditcard: ' . $model->CreditId;
$this->params['breadcrumbs'][] = ['label' => 'Creditcards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CreditId, 'url' => ['view', 'id' => $model->CreditId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="creditcard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
