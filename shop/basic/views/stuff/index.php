<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stuffs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuffs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stuffs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'StuffId',
            'UserName',
            'Passort',
            //'FirstName',
            //'MiddleName',
            // 'LastName',
            // 'State',
            // 'City',
            // 'Street',
            // 'Zipcode',
            // 'Salary',
            // 'JobTitle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
