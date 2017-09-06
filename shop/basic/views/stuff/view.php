<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Stuffs */

$this->title = $model->StuffId;
$this->params['breadcrumbs'][] = ['label' => 'Stuffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuffs-view">

    <h1>Staff#<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->StuffId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->StuffId], [
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
            'UserName',
            'Passort',
            'FirstName',
            'MiddleName',
            'LastName',
            'State',
            'City',
            'Street',
            'Zipcode',
            'Salary',
            'JobTitle',
        ],
    ]) ?>

</div>
