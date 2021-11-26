<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
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
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
    </ul>
</nav>

<!-- 
<script>
    var nameOfDay = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    var nameOfMonth = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Desember');
    var data = new Date();

    function clock() {
        var hou = data.getHours();
        var min = data.getMinutes();
        var sec = data.getSeconds();
        if (hou < 10) {
            hou = "0" + hou;
        }
        if (min < 10) {
            min = "0" + min;
        }
        if (sec < 10) {
            sec = "0" + sec;
        }

        document.getElementById('clock').innerHTML = hou + ":" + min + ":" + sec;
        data.setTime(data.getTime() + 1000)
        setTimeout("clock();", 1000);

        document.getElementById('date').innerHTML = nameOfDay[data.getDay()] + ", " + nameOfMonth[data.getMonth()] + " " + data.getDate() + ", " + data.getFullYear();
    }
</script>

<h3>
    <div id="date">
</h3> -->