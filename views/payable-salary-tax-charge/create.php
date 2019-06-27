<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PayableSalaryTaxCharge */

$this->title = 'Create Payable Salary Tax Charge';
$this->params['breadcrumbs'][] = ['label' => 'Payable Salary Tax Charges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payable-salary-tax-charge-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
