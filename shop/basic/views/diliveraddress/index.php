<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diliveraddresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diliveraddress-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diliveraddress', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'State',
                'label'=>'State',
                'format'=>'raw',
                'value' => function($model) {
                    return Yii::$app->params['state'][$model->StateId];
                }],
            'City',
            'Street',
            'Zipcode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
