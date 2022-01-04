<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<style>
    .brand-link:hover {
        color: #33fdfe !important;
        transition: 0.3s !important;
    }
</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
        <?= Html::img('@web/img/logo.png', ['alt' => 'FitWorkout', 'class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8']) ?>
        <span class="brand-text font-weight-light">Fit Workout</span>
        | Personal Trainer
    </a>
    
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo Url::toRoute('workout/index') ?>" class="nav-link">Planos de Treino</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo Url::toRoute('clientchat/index') ?>" class="nav-link">Clientes</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo Url::toRoute('/exercise/index') ?>" class="nav-link">Exercicios</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo Url::toRoute('index') ?>" class="nav-link">Treinos</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto dropdown-slide">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= Yii::$app->user->identity->username ?>
            <span><i class="fas fa-user-ninja"></i></span>
        </a>
        <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="<?php echo Url::toRoute('settings/index') ?>" class="dropdown-item">
                    <i class="fas fa-cog"></i> Definições
                </a>
                <a href="http://localhost:7070/" class="dropdown-item">
                    <i class="far fa-user"></i> Trocar para User
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-method="post" href="/site/logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>