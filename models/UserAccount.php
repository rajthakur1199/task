<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_account".
 *
 * @property int $id
 * @property int $user_id
 * @property string $payable_salary
 * @property string $basic_salary
 * @property string $tax_value
 *
 * @property User $user
 */
class UserAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['payable_salary', 'basic_salary', 'tax_value'], 'required'],
            [['payable_salary', 'basic_salary', 'tax_value'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'payable_salary' => 'Payable Salary',
            'basic_salary' => 'Basic Salary',
            'tax_value' => 'Tax Value',
        ];
    }

    public function account($model) {
        if($this->scenario == 'create') {
            $this->user_id = $model->id;
        }
        $basic_salary = $model->userType->basic_salary;
        $commission_percentage = $model->department->commission_percentage;
        $allowance_payable = $model->department->allowance_payable;
        $last_month_deduction = $model->department->last_month_deduction;
        $this->basic_salary = $basic_salary;
        $payable_salary = $basic_salary + ($commission_percentage * $basic_salary * .01 ) + $allowance_payable - $last_month_deduction;
        $this->payable_salary = $payable_salary;
        $payable_salary_tax = PayableSalaryTaxCharge::find()->where(['>', 'payable_salary_upto', $payable_salary])->one();
        $percentageTax = $payable_salary_tax->tax_percentage_value * 0.01;
        $this->tax_value = $this->payable_salary * $percentageTax;
        return $this->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
