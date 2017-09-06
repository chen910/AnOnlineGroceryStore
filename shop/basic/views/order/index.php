<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'OrderId',
            'TotalPrice',
            'IssueTime',
            ['attribute'=>'Status',
                'label'=>'Status',
                'format'=>'raw',
                'value' => function($model) {
                    return Yii::$app->params['OrderState'][$model->Status];
                }],

        ],
    ]); ?>
</div>
