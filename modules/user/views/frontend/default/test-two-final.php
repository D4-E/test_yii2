<?php
use app\modules\user\models\User;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var $dataProviderUser ActiveDataProvider
 * @var $dataProviderPhone ActiveDataProvider
 * @var $dataProvider ActiveDataProvider
 */

$this->title = 'Реализация задания II (финал)';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-default-test-two-final">
    <div class="body-content">
        <div class="row">
            <h2><span style="font-family:arial,helvetica,sans-serif">Реализация (финал)</span></h2>
            <br/>
            <p><span style="font-family:arial,helvetica,sans-serif">Выведем данные, полученные на предыдущем этапе:</span>

            <?php Pjax::begin(['timeout' => 30000, 'id' => 'user_pjax']); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProviderUser,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'first_name',
                        'birth_date',
                        [
                            'attribute' => 'birth_date',
                            'label' => 'Кол-во лет',
                            'value' => function (User $data) {
                                return date("Y") - date("Y", $data->birth_date);
                            }
                        ],
                        [
                            'attribute' => 'gender',
                            'value' => function (User $data) {
                                return $data->gender == 1 ? 'М' : 'Ж';
                            }
                        ],
                    ],
                ]); ?>
            <?php Pjax::end(); ?>

            <?php Pjax::begin(['timeout' => 30000, 'id' => 'phone_pjax']); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProviderPhone,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'user.first_name',
                        'phone',
                    ],
                ]); ?>
            <?php Pjax::end(); ?>

            <br/>

            <p><span style="font-family:arial,helvetica,sans-serif">Для выполнения задания, необходимо написать запрос, который будет отбирать необходимые данные.</span></p>

            <p><span style="font-family:arial,helvetica,sans-serif">Запрос:</span></p>

            <pre>
SELECT U.first_name, COUNT(P.phone) as count_phone FROM `tbl_user` U
INNER JOIN `tbl_phone_numbers` as P ON P.user_id = U.id
WHERE (FROM_UNIXTIME(UNIX_TIMESTAMP(),&#39;%Y&#39;) - from_unixtime(U.birth_date, &#39;%Y&#39;)) &gt;= 18 AND (FROM_UNIXTIME(UNIX_TIMESTAMP(),&#39;%Y&#39;) - from_unixtime(U.birth_date, &#39;%Y&#39;)) &lt;= 22 AND U.gender = 2
GROUP BY U.first_name</pre>

            <p><span style="font-family:arial,helvetica,sans-serif">Результат представлен в таблице:</span></p>

            <?php Pjax::begin(['timeout' => 30000, 'id' => '_pjax']); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'first_name',
                        [
                            'attribute' => 'count_phone',
                            'label' => 'Кол-во телефонов',
                        ],
                    ],
                ]); ?>
            <?php Pjax::end(); ?>

            <br/>

            <p><strong><span style="font-family:arial,helvetica,sans-serif">В ходе выполнения задачи было сделано:</span></strong></p>

            <ol>
                <li><span style="font-family:arial,helvetica,sans-serif">Добавлен модуль</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Создан контроллер, представления и несколько моделей</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Чтения данных из файла</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Добавление данных в БД (несколько способов)</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Удаление данных из БД (несколько способов)</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Вывод&nbsp;GridView</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Реализация&nbsp;Pjax</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Реализация запроса</span></li>
                <li><span style="font-family:arial,helvetica,sans-serif">Отправка запроса с использованием jQuery</span></li>
            </ol>
        </div>
    </div>
</div>
