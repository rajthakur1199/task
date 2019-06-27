<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_view".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $payable_salary
 * @property string $basic_salary
 * @property string $tax_value
 * @property string $last_month_deduction
 * @property string $user_type
 * @property string $department_name
 */
class AccountView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_view';
    }

    public static function primaryKey(){

        return ['id'];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['payable_salary', 'basic_salary', 'tax_value', 'last_month_deduction', 'user_type', 'department_name'], 'required'],
            [['payable_salary', 'basic_salary', 'tax_value', 'last_month_deduction'], 'number'],
            [['first_name', 'last_name', 'user_type', 'department_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'payable_salary' => 'Payable Salary',
            'basic_salary' => 'Basic Salary',
            'tax_value' => 'Tax Value',
            'last_month_deduction' => 'Last Month Deduction',
            'user_type' => 'User Type',
            'department_name' => 'Department Name',
        ];
    }
}
