<?php

use yii\db\Migration;

/**
 * Class m190627_044632_user_account_table
 */
class m190627_044632_user_account_table extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user_account', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'payable_salary' => $this->decimal(10,2)->notNull(),
            'basic_salary' => $this->decimal(10,2)->notNull(),
            'tax_value' => $this->decimal(10,2)->notNull(),
        ], $tableOptions);
        $this->createIndex(
            'idx-user_account-user_id',
            'user_account',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_account-user_id',
            'user_account',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('user_account');
    }
}
