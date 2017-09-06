<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\creditcard */

$this->title = $model->CreditId;
$this->params['breadcrumbs'][] = ['label' => 'Creditcards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditcard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CreditId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CreditId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CreditId',
            'FirstName',
            'MiddleName',
            'LastName',
            'CustomerId',
            'StateId',
            'City',
            'Street',
            'Zipcode',
            'DueTime',
            'SecureNumber',
        ],
    ]) ?>

</div>
