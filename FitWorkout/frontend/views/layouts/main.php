<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\Link;
use yii\web\View;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/img/favicon.ico" type="image/x-icon" />
</head>

<body class="d-flex flex-column h-100">

    <?php $this->beginBody() ?>

    <nav class="container navbar-nav navbar-expand-lg navbar-light">
        <section class="position-fixed">
            <div class="row">
                <div class="col-md-10">
                    <nav class="navbar navbar-expand-lg navigation fixed-top" style="background-color: salmon;">
                        <a class="navbar-brand" href="index">
                            <?=
                            Html::img('@web/img/logo.png', $options = [Url::to('/site/index'), 'class' => 'img-fluid', 'alt' => 'logo'])
                            ?>
                            Fit Workout
                        </a>
                        <?php if (Yii::$app->user->isGuest) { ?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item">
                                    <?php ['label' => 'Home', 'url' => ['/'], 'active' => $this->context->route == 'site/index']
                                        ?>
                                    <?= Html::a('Login', ['/site/login'], ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Registo', ['/site/signup'], ['class' => 'nav-link']) ?>
                                </li>
                            </ul>
                        </div>
                        <?php } else { ?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item">
                                    <?= Html::a('Exercicios', ['/site/exercises'], ['class' => 'nav-link']) ?>
                                </li>

                                <li class="nav-item active">
                                    <?= Html::a('Loja', ['/site/shop'], ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Estatisticas', ['/site/statistics'], ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Personal Trainer', ['/site/personaltrainer'], ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= Html::a('Encomendas', ['/site/orders'], ['class' => 'nav-link']) ?>
                                </li>

                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <?= Yii::$app->user->identity->username ?>
                                        <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="">
                                            Dados Perfil
                                        </a>
                                        <a class="dropdown-item" href="">
                                            Trocar para Personal Trainer
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <i class="fas fa-user-shield"></i>
                                        <?php
                                            echo '<a class="dropdown-item" data-method="post" href="index.php?r=site/logout">Logout</a>';
                                            ?>
                                </li>
                            </ul>
                        </div>
                </div>
                <?php } ?>
    </nav>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="py-5">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?>
                <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
            <!-- <div class="top-to">
                <a id="top" class="bottom" href="#"><i class="fa fa-angle-up"></i></a>
            </div> -->
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>

<script>
$('a[orders]').parent("#navbarSupportedContent > ul.navbar-nav.ml-auto.main-nav > li.nav-item.active")
    .addClass("active");
</script>

</html>
<?php $this->endPage();