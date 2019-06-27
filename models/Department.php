<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $name
 * @property int $commission_percentage
 * @property string $allowance_payable
 * @property string $last_month_deduction
 *
 * @property User[] $users
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'commission_percentage', 'allowance_payable', 'last_month_deduction'], 'required'],
            [['commission_percentage'], 'integer'],
            [['allowance_payable', 'last_month_deduction'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'commission_percentage' => 'Commission Percentage',
            'allowance_payable' => 'Allowance Payable',
            'last_month_deduction' => 'Last Month Deduction',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['department_id' => 'id']);
    }
}
