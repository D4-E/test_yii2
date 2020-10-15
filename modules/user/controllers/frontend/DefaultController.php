<?php

namespace app\modules\user\controllers\frontend;

use app\modules\user\components\services\UserService;
use app\modules\user\models\PhoneNumbers;
use app\modules\user\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    /**
     * @return string
     */
    public function actionTestTwo() {
        return $this->render('test-two');
    }

    public function actionFillData() {
        $res = [
            'result' => false
        ];

        if (UserService::fillData()) {
            $res['result'] = true;
        }

        return json_encode($res);
    }

    public function actionTestTwoFinal() {
        $user = User::find();
        $dataProviderUser = new ActiveDataProvider([
            'query' => $user,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $phone = PhoneNumbers::find();
        $dataProviderPhone = new ActiveDataProvider([
            'query' => $phone,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $query = User::find()
            ->select("tbl_user.first_name, COUNT(P.phone) as count_phone")
            ->innerJoin('tbl_phone_numbers as P', 'P.user_id = tbl_user.id')
            ->where("(from_unixtime(UNIX_TIMESTAMP(),'%Y') - from_unixtime(tbl_user.birth_date, '%Y')) >= 18 AND (from_unixtime(UNIX_TIMESTAMP(),'%Y') - from_unixtime(tbl_user.birth_date, '%Y')) <= 22 AND tbl_user.gender = 2")
            ->groupBy('tbl_user.first_name');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);


        return $this->render('test-two-final', [
            'dataProviderUser' => $dataProviderUser,
            'dataProviderPhone' => $dataProviderPhone,
            'dataProvider' => $dataProvider,
        ]);
    }
}
