<?php

use yii\helpers\Html;

$this->title = 'Реализация задания I';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="body-content">

    <div class="row">
        <h2>Реализация</h2>

        <p>Для выполнения этого задания было добавлено расширение <?= Html::a('yii2-telegram-log', 'https://github.com/sergeymakinen/yii2-telegram-log', ['target' => '_blank'])?>.</p>

        <p>Добавление расширение было произведено с помощью composer.</p>

        <p>За логирование ошибок в YII2 отвечает компонент 'log'. В настройки этого компонента добавляем параметры, с учетом которых будут отправляться сообщения. <br>
        </p>
        <dl>
            <dt>Параметры:</dt>
            <dd><i>token</i> - это токен бота, который необходимо <?=Html::a('создать', 'https://core.telegram.org/bots#6-botfather', ['target' => '_blank'])?>;</dd>
            <dd><i>chatId</i> - идентификатор чата для отправки журналов. Для получения используем бота <?=Html::a('@get_id_bot', 'https://telegram.me/get_id_bot', ['target' => '_blank'])?>.</dd>
        </dl>

        <pre><span class="pl-s">'components'</span> =&gt; [
            <span class="pl-s">'log'</span> =&gt; [
                <span class="pl-s">'targets'</span> =&gt; [
                    [
                        <span class="pl-s">'class'</span> =&gt; <span class="pl-s">'sergeymakinen\yii\telegramlog\Target'</span>,
                        <span class="pl-s">'token'</span> =&gt; <span class="pl-s">'123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11'</span>,
                        <span class="pl-s">'chatId'</span> =&gt; <span class="pl-c1">123456789</span>,
                    ],
                ],
            ],
        ],
        </pre>
        <br>

        <br>
        <h4>Тестирование</h4>
        <p>Для тестирования реализации была допущена умышленно ошибка, а именно в контроллере <i>modules/page/controllers/frontend/DefaultController.php</i> добавлена строчка кода:</p>
        <pre><span class="pl-s">$a = 10/0;</span></pre>
        <p>Результат представлен на картинке:</p>
        <?=Html::img('/img/realization_telegram_error.png', ['style' => 'width: 100%;'])?>
    </div>

</div>
