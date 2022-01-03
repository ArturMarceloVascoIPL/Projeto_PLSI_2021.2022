<?php
if (Yii::$app->user->can('admin'))
    $this->title = 'Dashboard Admin';
else
    $this->title = 'Dashboard Personal Trainer';

use common\models\User;
use common\models\Ptapplication;
use common\models\AuthAssignment;
use common\models\Product;
use common\models\Order;
use common\models\Orderitem;

$number_of_users = User::find()->count();
$number_of_trainers = AuthAssignment::find()->where(['item_name' => 'personaltrainer'])->count();
$number_of_applications = Ptapplication::find()->count();
$number_of_products = Product::find()->count();
$number_of_orders = Order::find()->count();

?>

<body class=".dark-mode">

    <!-- Admin -->
    <?php if (Yii::$app->user->can('admin')) { ?>

        <!-- Main node for this component -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Utilizadores',
                        'number' => $number_of_users,
                        'icon' => 'fas fa-users'
                    ]) ?>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Personal Trainers',
                        'number' => $number_of_trainers,
                        'icon' => 'fas fa-user-ninja'
                    ]) ?>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'PT Aplications',
                        'number' => $number_of_applications,
                        'theme' => 'gradient-warning',
                        'icon' => 'far fa-copy',
                    ]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\SmallBox::widget([
                        'title' => $number_of_products,
                        'text' => 'Stock Produtos',
                        'icon' => 'fas fa-store',
                    ]) ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- <?= \hail812\adminlte\widgets\SmallBox::widget([
                                'title' => $number_of_orders,
                                'text' => 'Encomendas Novas',
                                'icon' => 'fas fa-shopping-cart',
                            ]) ?> -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\SmallBox::widget([
                        'title' => $number_of_orders,
                        'text' => 'Encomendas Novas',
                        'icon' => 'fas fa-shopping-cart',
                    ]) ?>
                </div>
            </div>
        </div>

        <!-- Personal Trainer -->
    <?php } else { ?>

        <div class="row">

            <div class="card">
                <div class="card-header">
                    <h2>Encomendas</h2>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in </li>
                    <li class="list-group-item">Vestibulum at eros </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Plano de Treino de Hoje</h2>
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Notificações do Personal Trainer</h2>
                </div>
                <div class="card-body">
                    <div class="card-title">Personal Trainer</div>
                    <p class="cart-text">'mensagem do personal trainer'</p>
                </div>
            </div>
        </div>
    <?php } ?>
</body>