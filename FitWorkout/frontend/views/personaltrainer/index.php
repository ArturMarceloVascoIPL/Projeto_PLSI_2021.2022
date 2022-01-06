<?php

/* @var $this yii\web\View */

use common\models\AuthAssignment;
use common\models\User;
use yii\helpers\Html;

$this->title = 'Personal Trainer';

$users = User::find('id')->all();;

$personaltrainers = array();

foreach ($users as $user) {
    $userID = $user->id;

    if ($user->getRoleName() == "personalTrainer"){
        array_push($personaltrainers,$user);
    }   
}


?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <br><br>


    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:30%">Nome</th>
                <th style="width:60%">Preço</th>
                <th style="width:10%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personaltrainers as $personaltrainer) { ?>
                <tr>
                    <th scope="row"><?= $personaltrainer->username ?></th>
                    <td>5€</td>
                    <td><button type="button" class="btn btn-primary btn-sm m-0 p-2" style="background-color: #5672F9;">Contratar</button></td>
                </tr>
            <?php } ?>       
        </tbody>
    </table>
</div>