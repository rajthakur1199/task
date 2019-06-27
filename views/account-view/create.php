<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountView */

$this->title = 'Create Account View';
$this->params['breadcrumbs'][] = ['label' => 'Account Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
