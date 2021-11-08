<?php

/* @var $this yii\web\View */

use rmrevin\yii\fontawesome\FA;

$this->title = 'Fit Workout';
?>

<html lang="en">

<head>

    <!-- FAVICON -->
    <link href="img/favicon.png" rel="shortcut icon">

    <!-- Owl Carousel -->
    <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">
    <div class="site-index">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-header">
                            <?php

                            if (Yii::$app->user->isGuest)
                                echo "<h2>Bem Vindo | Inicie a sessão</h2>";
                            else
                                echo "<h2>Bem Vindo <b>" . Yii::$app->user->identity->username . "</b></h2>";
                            ?>
                        </div>

                        <div class="jumbotron text-center bg-transparent">
                            <h1 class="display-4">😎</h1>
                        </div>

                    </div>
                </div>
            </div>

            <div class="body-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2>Encomendas</h2>

                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque similique commodi
                                quisquam consequuntur voluptate iusto totam laborum architecto? Sequi corrupti nulla
                                harum atque blanditiis accusamus molestiae iste quaerat libero ullam.</p>

                            <a class="btn btn-outline-secondary"> AA</a>
                        </div>
                        <div class="col-lg-4">

                            <h2>Plano de Treinos</h2>

                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque similique commodi
                                quisquam consequuntur voluptate iusto totam laborum architecto? Sequi corrupti nulla
                                harum atque blanditiis accusamus molestiae iste quaerat libero ullam.</p>
                            <a class="btn btn-outline-secondary"> AA</a>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <h2>Notificacoes de Chat com PT</h2>

                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque similique commodi
                            quisquam consequuntur voluptate iusto totam laborum architecto? Sequi corrupti nulla
                            harum atque blanditiis accusamus molestiae iste quaerat libero ullam.</p>
                        <a class="btn btn-outline-secondary"> AA</a>
                        </a>
                    </div>
                </div>
            </div>
    </div>
    </section>

</body>

</html>