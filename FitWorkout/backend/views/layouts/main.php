<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

// $assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/hail812/adminlte/dist');
$assetApp = Yii::$app->assetManager->getPublishedUrl('@app');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/img/favicon.ico" type="image/x-icon" />
    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => '@web/favicon.png', 'href' => '/favicon.png']); ?>
</head>

<!-- Adminstradtor -->

<?php if (Yii::$app->user->can('admin')) { ?>

    <body class="hold-transition sidebar-mini">
        <?php $this->beginBody() ?>

        <div class="wrapper">
            <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>

            <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

            <?= $this->render('control-sidebar') ?>
            
            <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>

            <?= $this->render('footer') ?>
        </div>

        <?php $this->endBody() ?>
    </body>

    <!-- Personal Trainer -->
<?php } else { ?>

    <body class="sidebar-collapse">
        <?php $this->beginBody() ?>

        <div class="wrapper">

            <?= $this->render('navbar_pt', ['assetDir' => $assetDir]) ?>

            <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>

            <?= $this->render('footer') ?>
        </div>

        <?php $this->endBody() ?>
    </body>
<?php } ?>

</html>
<?php $this->endPage() ?>