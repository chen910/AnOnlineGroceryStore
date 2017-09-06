<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = 'Update Customers: ' . $model->CustomerId;
$this->params['breadcrumbs'][] = 'Profile';
?>
<div class="customers-update">

    <h1>Profile</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dilivers' => $dilivers
    ]) ?>

</div>
