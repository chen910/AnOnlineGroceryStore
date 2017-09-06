<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\warehouses */

$this->title = 'Update Warehouses: ' . $model->WarehouseId;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->WarehouseId, 'url' => ['view', 'id' => $model->WarehouseId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
