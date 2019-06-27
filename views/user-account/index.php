<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-account-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['user/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'First Name',
                'value' => 'user.first_name',
            ],
            [
                'label' => 'Last Name',
                'value' => 'user.last_name'
            ],
            'payable_salary',
            'basic_salary',
            'tax_value',
            [
                'label' => 'Last Month Deduction',
                'value' => 'user.department.last_month_deduction'
            ],
            [
                'label' => 'User type',
                'value' => 'user.userType.type'
            ],
            [
                'label' => 'Department',
                'value' => 'user.department.name'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view} {edit} {delete}',
                'buttons'  => [
                'view' => function ($url, $data) {
                        $url = Url::to(['user-account/view', 'id' => $data->id]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'View']);
                    },
                'edit' => function ($url, $data) {
                        $url = Url::to(['user/update', 'id' => $data->user_id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'Edit']);
                    },
                'delete' => function ($url, $data) {
                        $url = Url::to(['user/delete', 'id' => $data->user_id]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['title' => 'Delete','data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post' ]);
                    },                
                       
                ],
            ],
        ],
    ]); ?>


</div>
