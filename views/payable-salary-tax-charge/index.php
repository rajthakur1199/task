<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PayableSalaryTaxChargeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payable Salary Tax Charges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payable-salary-tax-charge-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Payable Salary Tax Charge', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'payable_salary_upto',
            'tax_percentage_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
