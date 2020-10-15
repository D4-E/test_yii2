<?php

$this->title = 'Реализация задания II (этап 1)';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-default-realization">
    <div class="body-content">
        <div class="row">
            <h2><span style="font-family:arial,helvetica,sans-serif">Реализация (этап 1)</span></h2>

            <p><span style="font-family:arial,helvetica,sans-serif">Для начала необходимо добавить нужные таблицы в БД. Для этого было создано две миграции:</span>
            </p>


            <pre>
yii migrate/create create_user_table --fields=name:string(255):notNull:comment,gender:integer:notNull:comment,birth_date:integer:notNull:comment

yii migrate/create create_phone_numbers_table --fields=user_id:integer:foreignKey(user):notNull:comment,phone:string(255):comment</pre>

            <p><span style="font-family:arial,helvetica,sans-serif">Затем нужно добавить данные в эти таблицы. Для это был написан соответсвующий сервис, рандомно добавляющий данные в таблицы.</span>
            </p>

            <p>
                <span style="font-family:arial,helvetica,sans-serif">Чтобы заполнить данные нажмите, пожалуйста, кнопку:</span>
            </p>

            <p>
                <span style="font-family:arial,helvetica,sans-serif">
                    <a href="#" id="fill_data" class="btn btn-primary">Заполнить</a>
                    <br/>
                    <div class="progress" style="display: none">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    Затем переходите ко второму этапу.
                </span>
            </p>

            <p>
                <span style="font-family:arial,helvetica,sans-serif">
                    <button id="final_result" disabled="disabled" class="btn btn-primary">Перейти ко II этапу</button>
                </span>
            </p>
        </div>
    </div>
</div>
