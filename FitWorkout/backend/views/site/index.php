<?php
if (Yii::$app->user->can('admin'))
    $this->title = 'Dashboard Admin';
else
    $this->title = 'Dashboard Personal Trainer';

?>

<body class=".dark-mode">
    <?php if (Yii::$app->user->can('admin')) { ?>
        <?= \hail812\adminlte\widgets\Alert::widget([
            'type' => 'success',
            'body' => '<h3>Congratulations!</h3>',
        ]) ?>

        <!-- Main node for this component -->
        <div class="timeline">
            <!-- Timeline time label -->
            <div class="time-label">
                <span class="bg-green">23 Aug. 2019</span>
            </div>
            <div>
                <!-- Before each timeline item corresponds to one icon on the left scale -->
                <i class="fas fa-envelope bg-blue"></i>
                <!-- Timeline item -->
                <div class="timeline-item">
                    <!-- Time -->
                    <span class="time"><i class="fas fa-clock"></i> 12:30</span>
                    <!-- Header. Optional -->
                    <h3 class="timeline-header"><a href="#">Equipda Suporte</a> sent you an email</h3>
                    <!-- Body -->
                    <div class="timeline-body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, ex obcaecati dolor rerum ratione corrupti, debitis dolore maiores iste, consectetur molestiae eos eligendi ipsa necessitatibus? In nobis alias ad ipsam!
                    </div>
                    <!-- Placement of additional controls. Optional -->
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Read more</a>
                        <a class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
            <!-- The last icon means the story is complete -->
            <div>
                <i class="fas fa-clock bg-gray"></i>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Messages',
                        'number' => '1,410',
                        'icon' => 'far fa-envelope',
                    ]) ?>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Bookmarks',
                        'number' => '410',
                        'theme' => 'success',
                        'icon' => 'far fa-flag',
                    ]) ?>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\InfoBox::widget([
                        'text' => 'Uploads',
                        'number' => '13,648',
                        'theme' => 'gradient-warning',
                        'icon' => 'far fa-copy',
                    ]) ?>
                </div>
            </div>

            <div class="row">
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
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\SmallBox::widget([
                        'title' => '150',
                        'text' => 'New Orders',
                        'icon' => 'fas fa-shopping-cart',
                    ]) ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?php $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                        'title' => '150',
                        'text' => 'New Orders',
                        'icon' => 'fas fa-shopping-cart',
                        'theme' => 'success'
                    ]) ?>
                    <?= \hail812\adminlte\widgets\Ribbon::widget([
                        'id' => $smallBox->id . '-ribbon',
                        'text' => 'Ribbon',
                        'theme' => 'warning',
                        'size' => 'lg',
                        'textSize' => 'lg'
                    ]) ?>
                    <?php \hail812\adminlte\widgets\SmallBox::end() ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <?= \hail812\adminlte\widgets\SmallBox::widget([
                        'title' => '44',
                        'text' => 'User Registrations',
                        'icon' => 'fas fa-user-plus',
                        'theme' => 'gradient-success',
                        'loadingStyle' => true
                    ]) ?>
                </div>
            </div>
        </div>

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