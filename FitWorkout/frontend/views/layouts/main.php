<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

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

    <header>

        <section>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light navigation">
                            <a href="index3.html" class="brand-link">
                                <?= Html::img('@web/img/logo.png', ['alt' => 'FitWorkout', 'class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8']) ?>
                                <span class="brand-text font-weight-light">Fit Workout</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <?php
        NavBar::begin([

            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems = [
                ['label' => 'Exercicios', 'url' => ['/site/exercises']],
                ['label' => 'Loja', 'url' => ['/site/shop']],
                ['label' => 'Estatisticas', 'url' => ['/site/statistics']],
                ['label' => 'Personal Trainer', 'url' => ['/site/personaltrainer']],
                ['label' => 'Encomendas', 'url' => ['/site/orders']],
                [
                    'label' => Yii::$app->user->identity->username,
                    'image' => '.jpg',
                    'items' => [
                        ['label' => 'Dados Perfil', 'url' => '#'],
                        ['label' => 'Trocar para Personal Trainer', 'url' => '#'],
                        '<a>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</a>'
                    ],
                ],
            ];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-expand-lg navbar-light'],
            'items' => $menuItems
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
            <!-- <div class="top-to">
                <a id="top" class="bottom" href="#"><i class="fa fa-angle-up"></i></a>
            </div> -->
        </div>

    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();