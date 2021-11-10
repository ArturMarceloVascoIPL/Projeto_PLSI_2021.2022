<?php

/* @var $this yii\web\View */

use rmrevin\yii\fontawesome\FA;
use yii\bootstrap4\Html;

$this->title = 'Fit Workout';
?>


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
                                echo "<h2>Bem Vindo <b>" . Yii::$app->user->identity->username . "</b></h2><br><br>";

                            ?>

                        </div>

                        <div class="jumbotron text-center bg-transparent">
                            <h1 class="display-4">😎</h1>
                            <?php if (Yii::$app->user->isGuest) { ?>

                            <?php } else { ?>
                                <div class="body-content">

                                    <div class="row">
                                        <div class="col">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h2>Encomendas</h2>
                                                </div>

                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Cras justo odio
                                                        <?=
                                                        Html::img('@web/img/truck.svg', $options = ['class' => 'float-right', 'alt' => 'logo']);
                                                        ?>
                                                    </li>

                                                    <li class="list-group-item">Dapibus ac facilisis in
                                                        <?=
                                                        Html::img('@web/img/shop.svg', $options = ['class' => 'float-right', 'alt' => 'logo']);
                                                        ?></li>
                                                    </li>
                                                    <li class="list-group-item">Vestibulum at eros
                                                        <?=
                                                        Html::img('@web/img/shop.svg', $options = ['class' => 'float-right', 'alt' => 'logo']);
                                                        ?></li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h2>Plano de Treino de Hoje</h2>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title">

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h2>Notificações do Personal Trainer</h2>
                                                </div>

                                                <div class="card-body">
                                                    <div class="card-title">Personal Trainer</div>
                                                    <p class="cart-text">'mensagem do personal trainer'
                                                        <?=
                                                        Html::img('@web/img/bell-fill.svg', $options = ['class' => 'float-right', 'alt' => 'logo']);
                                                        ?></li>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>

                        

                    </div>
                </div>

            </div>


        </section>
    </div>
</body>
