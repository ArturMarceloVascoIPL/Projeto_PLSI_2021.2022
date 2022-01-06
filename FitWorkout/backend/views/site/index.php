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



        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h2>Notificacoes de Clientes</h2>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>0</b> Notificacoes</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>Treinos Criados Recentemente</h2>
                        </div>
                        <div class="card-body">
                            <div class="card-title"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2>Top Calorias Gastas</h2>
                        </div>
                        <div class="card-body">
                            <div class="card-title">Personal Trainer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</body>