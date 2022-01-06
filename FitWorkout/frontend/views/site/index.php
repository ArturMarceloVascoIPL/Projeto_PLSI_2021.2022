<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;

$this->title = 'Fit Workout';
?>


<body class="body-wrapper">
<!-- //Html::a('Editar', ['editarperfil', 'id' => $model->id], ['class' => 'dropdown-item'])   -->

<div class="site-index">
    <div class="container">
        <div class="row">
            <div class="page-header">
                <?php

                if (Yii::$app->user->isGuest)
                    echo "<h2>Bem Vindo | Inicie a sessão</h2>";
                else
                    echo "<h2>Bem Vindo <b>" . Yii::$app->user->identity->username . "</b></h2><br><br>";

                ?>
            </div>

            <div class="jumbotron text-center bg-transparent">

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
                                        <li class="list-group-item">Encomenda 1
                                            <?=
                                            Html::img('@web/img/truck.svg', $options = ['class' => 'float-right', 'alt' => 'logo']);
                                            ?>
                                        </li>

                                        <li class="list-group-item">Encomenda 2
                                            <?=
                                            Html::img('@web/img/shop.svg', $options = ['class' => 'float-right', 'alt' => 'logo']);
                                            ?></li>
                                        </li>
                                        <li class="list-group-item">Encomenda 3
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
                                        <li class="list-group-item">Treino 1
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
                                            ?>
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
</body>
