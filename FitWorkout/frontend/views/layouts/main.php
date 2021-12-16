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

<!-- Guest Session -->
<?php $this->beginBody() ?>

<nav class="container navbar-nav navbar-expand-lg navbar-light">
    <section class="position-fixed">
        <div class="row">
            <div class="col-md-10">
                <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #5672f9">
                    <a class="navbar-brand" href="index">
                        <?=
                        Html::img('@web/img/logo.png', $options = [Url::to('/site/index'), 'class' => 'img-fluid', 'alt' => 'logo'])
                        ?>
                        Fit Workout
                    </a>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#w0-collapse" aria-controls="w0-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="w0-collapse" class="navbar-collapse collapse" id="navbarSupportedContent">
                            <ul id="w1" class="navbar-nav ml-auto main-nav ">
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
                        <!-- User Session -->

                    <?php } else {
                        $id = Yii::$app->user->id;
                    ?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">

                                <li class="nav-item">
                                    <?= Html::a('Exercicios', ['/site/exercises'], ['class' => 'nav-link']) ?>
                                </li>

                                <li class="nav-item active">
                                    <?= Html::a('Loja', ['/shop'], ['class' => 'nav-link']) ?>
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
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= Yii::$app->user->identity->username ?>
                                        <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <?= Html::a('Dados de Perfil', ['/dadosperfil', 'id' => $id], ['class' => 'dropdown-item']) ?>

                                        <?= Html::a('Aplicar para Personal Trainer', ['/application'], ['class' => 'dropdown-item']) ?>

                                        <a class="dropdown-item d-none" href="">
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
                    <?php } ?>
                </nav>
            </div>
        </div>
    </section>
</nav>

<main role="main" class="flex-shrink-0" style="z-index: -5;">
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
