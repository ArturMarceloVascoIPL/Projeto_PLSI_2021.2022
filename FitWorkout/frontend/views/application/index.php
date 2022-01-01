<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Ptapplication;

$this->title = 'Aplicar para ser Personal Trainer';
$model = new \common\models\Ptapplication();
?>

<div class="site-login container-fluid">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $model_temp = Ptapplication::findOne(['userId' => \Yii::$app->user->id]);

    if (!$model_temp) {  ?>
        <?= $this->render('application', [
            'model' => $model,
        ]) ?>

    <?php } else { ?>

        <h2><?= $model_temp->approved  == 1 ? 'Aprovado' : 'Não aprovado';  ?></h2>
        
    <?php } ?>

</div>