<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\diliveraddress */

$this->title = $model->DiliverAddressId;
$this->params['breadcrumbs'][] = ['label' => 'Diliveraddresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diliveraddress-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->DiliverAddressId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->DiliverAddressId], [
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
            'DiliverAddressId',
            'CustomerId',
            'StateId',
            'City',
            'Street',
            'Zipcode',
        ],
    ]) ?>

</div>
