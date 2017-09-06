<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\orders */

$this->title = 'Update Orders: ' . $model->OrderId;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->OrderId, 'url' => ['view', 'id' => $model->OrderId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
