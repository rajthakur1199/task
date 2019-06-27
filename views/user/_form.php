<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Department;
use app\models\User;
use app\models\UserType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput() ?>

    <?= $form->field($model, 'last_name')->textInput() ?>
    
    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'email') ?>

    <?php if ($model->scenario === 'create'): ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?php endif ?>

    <?= $form->field($model, 'status')->dropDownList(User::statusArr()) ?>

    <?= $form->field($model, 'user_type_id')->dropDownList(ArrayHelper::map(UserType::find()->asArray()->all(), 'id', 'type')) ?>

    <?= $form->field($model, 'department_id')->dropDownList(ArrayHelper::map(Department::find()->asArray()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
