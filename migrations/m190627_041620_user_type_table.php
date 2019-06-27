<?php

use yii\db\Migration;

/**
 * Class m190627_041620_user_type_table
 */
class m190627_041620_user_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user_type', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()->unique(),
            'basic_salary' => $this->decimal(10,2)->notNull(),
        ], $tableOptions);
        $this->addColumn('{{%user}}', 'user_type_id', $this->integer()->defaultValue(null));
        $this->createIndex(
            'idx-user-user_type_id',
            '{{%user}}',
            'user_type_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user-user_type_id',
            '{{%user}}',
            'user_type_id',
            'user_type',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropColumn('{{%user}}', 'user_type_id');
        $this->dropTable('user_type');
    }
}
