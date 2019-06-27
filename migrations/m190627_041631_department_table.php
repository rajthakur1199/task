<?php

use yii\db\Migration;

/**
 * Class m190627_041631_department_table
 */
class m190627_041631_department_table extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('department', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'commission_percentage' => $this->integer()->notNull(),
            'allowance_payable' => $this->decimal(10,2)->notNull(),
            'last_month_deduction' => $this->decimal(10,2)->notNull(),
        ], $tableOptions);

        $this->addColumn('{{%user}}', 'department_id', $this->integer()->defaultValue(null));
        $this->createIndex(
            'idx-user-department_id',
            '{{%user}}',
            'department_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user-department_id',
            'user',
            'department_id',
            'department',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'user_type_id');
        $this->dropTable('department');
    }
   
}
