<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserAccount */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['user/update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['user/delete', 'id' => $model->user_id], [
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
            'id',
            [
                'label' => 'First Name',
                'value' => function($data) {
                    return $data->user->first_name;
                }
            ],
            [
                'label' => 'Last Name',
                'value' => function($data) {
                    return $data->user->last_name;
                }
            ],
            'payable_salary',
            'basic_salary',
            'tax_value',
            [
                'label' => 'Last Month Deduction',
                'value' => function($data) {
                    return $data->user->department->last_month_deduction;
                }
            ],
            [
                'label' => 'User type',
                'value' => function($data) {
                    return $data->user->userType->type;
                }
            ],
            [
                'label' => 'Department',
                'value' => function($data) {
                    return $data->user->department->name;
                }
            ],
        ],
    ]) ?>

</div>
