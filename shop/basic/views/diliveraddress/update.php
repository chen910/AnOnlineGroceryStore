<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\diliveraddress */

$this->title = 'Update Diliveraddress: ' . $model->DiliverAddressId;
$this->params['breadcrumbs'][] = ['label' => 'Diliveraddresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DiliverAddressId, 'url' => ['view', 'id' => $model->DiliverAddressId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diliveraddress-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
