<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\controllers\ProductsController;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
if (!$_COOKIE['type']){
    $protects= new ProductsController();
    unset($_COOKIE);
    $protects->redirect('index.php');
}
?>
<div class="products-index">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ProductId',
            ['attribute'=>'ProductName',
                'label'=>'ProductName',
                'format'=>'raw',
                'value' => function($model) {
                    return Html::a($model->ProductName, Yii::$app->params['domain'].'//index.php?r=products/stock&id=' . $model->ProductId);
                }],
            'ProductType',
            'AdditionalInformation',
            'ProductSize',
            [
                'attribute' => 'ProductImage',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img($data->ProductImagePath,
                        ['width' => '70px']);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
