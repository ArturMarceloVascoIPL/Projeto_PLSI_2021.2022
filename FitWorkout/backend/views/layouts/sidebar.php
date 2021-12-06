<?php

use yii\helpers\Html;
use app\assets\AppAsset;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
        <?= Html::img('@web/img/logo.png', ['alt' => 'FitWorkout', 'class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8']) ?>
        <span class="brand-text font-weight-light">Fit Workout</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => Yii::$app->user->identity->username,  'icon' => 'user-shield',]
                ]
            ]);
            ?>

        </div>

        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    // Dashboard Area
                    ['label' => 'DASHBOARD', 'header' => true],
                    ['label' => 'Utilizadores',  'icon' => 'users', 'url' => ['/user/index/']],
                    ['label' => 'Exercicios',  'icon' => 'dumbbell', 'url' => ['/exercise/index/']],
                    ['label' => 'Produtos',  'icon' => 'store', 'url' => ['']],
                    ['label' => 'Encomendas',  'icon' => 'cubes', 'url' => ['']],

                    //Dev Section
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
    </div>
</aside>