<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m201015_085837_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255)->notNull()->comment('Имя пользователя'),
            'gender' => $this->integer()->notNull()->comment('Пол: 0 - не указан, 1 - мужчина, 2 - женщина.'),
            'birth_date' => $this->integer()->notNull()->comment('Дата рождения в unixtime.'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
