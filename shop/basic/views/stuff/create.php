<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Stuffs */

$this->title = 'Create Stuffs';
$this->params['breadcrumbs'][] = ['label' => 'Stuffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuffs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
