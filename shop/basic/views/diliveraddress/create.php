<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\diliveraddress */

$this->title = 'Create Diliveraddress';
$this->params['breadcrumbs'][] = ['label' => 'Diliveraddresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diliveraddress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
