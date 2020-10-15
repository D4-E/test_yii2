<?php

namespace app\modules\user\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $first_name Имя пользователя
 * @property int $gender Пол: 0 - не указан, 1 - мужчина, 2 - женщина.
 * @property int $birth_date Дата рождения в unixtime.
 *
 * @property PhoneNumbers[] $phoneNumbers
 */
class User extends ActiveRecord
{
    public $count_phone;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'gender', 'birth_date'], 'required'],
            [['gender', 'birth_date'], 'integer'],
            [['first_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя пользователя',
            'gender' => 'Пол',
            'birth_date' => 'Дата рождения',
        ];
    }

    /**
     * Gets query for [[PhoneNumbers]].
     *
     * @return ActiveQuery|PhoneNumbersQuery
     */
    public function getPhoneNumbers()
    {
        return $this->hasMany(PhoneNumbers::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
