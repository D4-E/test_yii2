<?php
namespace app\modules\user\components\services;

use app\modules\user\models\PhoneNumbers;
use app\modules\user\models\User;
use Yii;
use yii\db\Exception;

class UserService
{
    public static function fillData() {
        $data_json = file_get_contents(Yii::$app->basePath.'/web/russian_names.json');

        if (!empty($data_json)) {
            User::deleteAll();
            Yii::$app->db->createCommand()->delete('{{%phone_numbers}}')->execute();

            $data = json_decode($data_json, true);

            foreach ($data as $item) {
                $model = new User();
                $model->first_name = $item['Name'];
                $model->gender = $item["Sex"] == 'Ж' ? 2 : 1;
                $model->birth_date = date("U", strtotime('-' . rand(17, 35) .' years'));

                if ($model->save()) {
                    $insert = [];
                    for ($i = 1; $i <= rand(1,5); $i++) {
                        $insert[] = [
                            $model->id,
                            '+7(495)' . rand(1000000,9999999)
                        ];
                    }

                    try {
                        Yii::$app->db->createCommand()->batchInsert('{{%phone_numbers}}', ['user_id', 'phone'], $insert)->execute();
                    } catch (Exception $e) {
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }
}