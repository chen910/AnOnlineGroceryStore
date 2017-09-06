<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\creditcard */

$this->title = 'Create Creditcard';
$this->params['breadcrumbs'][] = ['label' => 'Creditcards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="creditcard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
