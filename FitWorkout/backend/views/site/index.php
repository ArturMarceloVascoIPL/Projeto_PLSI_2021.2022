<?php
if (Yii::$app->user->can('admin'))
    $this->title = 'Dashboard Admin';
else
    $this->title = 'Dashboard Personal Trainer';

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
                        'number' => '1031',
                        'icon' => 'fas fa-users'
                    ]) ?>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Personal Trainers',
                        'number' => '120',
                        'icon' => 'fas fa-user-ninja'
                    ]) ?>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'PT Aplications',
                        'number' => '13,648',
                        'theme' => 'gradient-warning',
                        'icon' => 'far fa-copy',
                    ]) ?>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Bookmarks',
                        'number' => '41,410',
                        'icon' => 'far fa-bookmark',
                        'progress' => [
                            'width' => '70%',
                            'description' => '70% Increase in 30 Days'
                        ]
                    ]) ?>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                        'text' => 'Likes',
                        'number' => '41,410',
                        'theme' => 'success',
                        'icon' => 'far fa-thumbs-up',
                        'progress' => [
                            'width' => '70%',
                            'description' => '70% Increase in 30 Days'
                        ]
                    ]) ?>
                    <?= \hail812\adminlte\widgets\Ribbon::widget([
                        'id' => $infoBox->id . '-ribbon',
                        'text' => 'Ribbon',
                    ]) ?>
                    <?php \hail812\adminlte\widgets\InfoBox::end() ?>
                </div> 
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Events',
                        'number' => '41,410',
                        'theme' => 'gradient-warning',
                        'icon' => 'far fa-calendar-alt',
                        'progress' => [
                            'width' => '70%',
                            'description' => '70% Increase in 30 Days'
                        ],
                        'loadingStyle' => true
                    ]) ?>
                </div>
            </div>-->
         
            
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\SmallBox::widget([
                        'title' => '150',
                        'text' => 'Stock Produtos',
                        'icon' => 'fas fa-store',
                    ]) ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- <?= \hail812\adminlte\widgets\SmallBox::widget([
                                'title' => '40',
                                'text' => 'Encomendas Novas',
                                'icon' => 'fas fa-shopping-cart',
                            ]) ?> -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\SmallBox::widget([
                        'title' => '40',
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
                    <div class="card-title">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Notificações do Personal Trainer</h2>
                </div>
                <div class="card-body">
                    <div class="card-title">Personal Trainer</div>
                    <p class="cart-text">'mensagem do personal trainer'

                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</body>