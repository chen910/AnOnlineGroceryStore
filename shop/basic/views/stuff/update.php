<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stuffs */

$this->title = 'Update Stuffs: ' . $model->StuffId;
$this->params['breadcrumbs'][] = ['label' => 'Stuffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->StuffId, 'url' => ['view', 'id' => $model->StuffId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stuffs-update">

    <h1>Profile</h1>
    <h3><a href="index.php?r=products/index">Manage Products</a></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
