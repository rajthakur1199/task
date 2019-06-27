<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UserType;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\AccountView */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-view-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payable_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'basic_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_month_deduction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_type')->dropDownList(ArrayHelper::map(UserType::find()->asArray()->all(), 'type', 'type')) ?>

    <?= $form->field($model, 'department_name')->dropDownList(ArrayHelper::map(Department::find()->asArray()->all(), 'name', 'name')) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
