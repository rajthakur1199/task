<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payable_salary_tax_charge".
 *
 * @property int $id
 * @property int $payable_salary_upto
 * @property string $tax_percentage_value
 */
class PayableSalaryTaxCharge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payable_salary_tax_charge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payable_salary_upto', 'tax_percentage_value'], 'required'],
            [['payable_salary_upto'], 'integer'],
            [['tax_percentage_value'], 'number'],
            [['payable_salary_upto'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payable_salary_upto' => 'Payable Salary Upto',
            'tax_percentage_value' => 'Tax Percentage Value',
        ];
    }
}
