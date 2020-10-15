<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Тестовое задание I</h2>

                <p>Реализовать отправку ошибок разработчику в Telegram</p>

                <p>Ведение журнала - очень важная функция приложения. Это позволяет вам знать, что происходит в каждый момент.
                    По умолчанию в базовом и расширенном приложении Yii2 настроена только цель \ yii \ log \ FileTarget.
                    Чтобы получать сообщениями из приложения, настройте компонент журнала.</p>

                <p><a class="btn btn-default" href="/telegram-error">Реализация &raquo;</a></p>
            </div>
            <div class="col-lg-8">
                <h2>Тестовое задание II</h2>

                <p><span>Имеется база со следующими таблицами:</span></p>

                <div style="background:#eee;border:1px solid #ccc;padding:5px 10px;"><code>CREATE TABLE `users` (<br />
                        &nbsp;&nbsp;&nbsp; `id`&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INT(11) NOT NULL AUTO_INCREMENT,<br />
                        &nbsp;&nbsp;&nbsp; `name`&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VARCHAR(255) DEFAULT NULL,<br />
                        &nbsp;&nbsp;&nbsp; `gender`&nbsp;&nbsp;&nbsp;&nbsp; INT(11) NOT NULL COMMENT &#39;0 - не указан, 1 - мужчина, 2 - женщина.&#39;,<br />
                        &nbsp;&nbsp;&nbsp; `birth_date` INT(11) NOT NULL COMMENT &#39;Дата в unixtime.&#39;,<br />
                        &nbsp;&nbsp;&nbsp; PRIMARY KEY (`id`)<br />
                        );<br />
                        CREATE TABLE `phone_numbers` (<br />
                        &nbsp;&nbsp;&nbsp; `id`&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INT(11) NOT NULL AUTO_INCREMENT,<br />
                        &nbsp;&nbsp;&nbsp; `user_id` INT(11) NOT NULL,<br />
                        &nbsp;&nbsp;&nbsp; `phone`&nbsp;&nbsp; VARCHAR(255) DEFAULT NULL,<br />
                        &nbsp;&nbsp;&nbsp; PRIMARY KEY (`id`)<br />
                        );</code></div>

                <p><span>Напишите запрос, возвращающий имя и число указанных телефонных номеров девушек в возрасте от 18 до 22 лет.<br />
Оптимизируйте таблицы и запрос при необходимости.</span></p>

                <p><a class="btn btn-default" href="/test-two">Реализация &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
