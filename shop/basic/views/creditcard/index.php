<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Creditcards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditcard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Creditcard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CreditId',
            'FirstName',
            'MiddleName',
            'LastName',
            'CustomerId',
            // 'StateId',
            // 'City',
            // 'Street',
            // 'Zipcode',
            // 'DueTime',
            // 'SecureNumber',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
