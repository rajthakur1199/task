<?php

use yii\db\Migration;

/**
 * Class m190627_041723_payable_salary_tax_charge_table
 */
class m190627_041723_payable_salary_tax_charge_table extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('payable_salary_tax_charge', [
            'id' => $this->primaryKey(),
            'payable_salary_upto' => $this->integer()->notNull()->unique(),
            'tax_percentage_value' => $this->decimal(3,1)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('payable_salary_tax_charge');
    }
   
}
