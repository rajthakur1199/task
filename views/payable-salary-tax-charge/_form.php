<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PayableSalaryTaxCharge */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payable-salary-tax-charge-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payable_salary_upto')->textInput() ?>

    <?= $form->field($model, 'tax_percentage_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
