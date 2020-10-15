<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone_numbers}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m201015_090443_create_phone_numbers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone_numbers}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('Пользователь'),
            'phone' => $this->string(255)->comment('Номер телефона'),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-phone_numbers-user_id}}',
            '{{%phone_numbers}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-phone_numbers-user_id}}',
            '{{%phone_numbers}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-phone_numbers-user_id}}',
            '{{%phone_numbers}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-phone_numbers-user_id}}',
            '{{%phone_numbers}}'
        );

        $this->dropTable('{{%phone_numbers}}');
    }
}
