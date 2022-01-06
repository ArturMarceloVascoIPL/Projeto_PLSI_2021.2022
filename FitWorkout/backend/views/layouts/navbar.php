<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Middle navbar | Clock -->
    <ul class="navbar-nav ml-auto">
        <div id="date" class="font-weight-bold">
            <?= date('d/m/Y | H:i:s') ?>
        </div>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <div class="container dropdown-item">
            <li class="fas fa-sign-out-alt"></li>
            <div class="">
                <?= Html::a('Logout', ['site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?>
            </div>
        </div>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>

<?php
$script = <<< JS
    $(document).ready(function() {
        setInterval(function() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var month = currentTime.getMonth() + 1;
        var day = currentTime.getDate();
        var year = currentTime.getFullYear();
        
        day = day < 10 ? '0' + day : day;
        month = month < 10 ? '0' + month : month;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var strTime = day + '/' + month + '/' + year + ' | ' + hours + ':' + minutes + ':' + seconds;
        $('#date').html(strTime);
        }, 1000);
    });
 JS;
$this->registerJs($script, View::POS_END);

?>