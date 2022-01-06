<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Workout */


//get all exercises into a array list from exercise model

$this->title = 'Adicionar Treinos';
\yii\web\YiiAsset::register($this);
?>
<div class="workout-view">

	<!-- Buttons Funcionalidades -->
	<div class="row mb-4">
		<div class="col">
			<?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['/workout'], ['class' => 'btn.block btn btn-info']) ?>
		</div>

		<div class="col">
			<div class="float-right">
				<?= Html::submitButton('<i class="fas fa-save"></i> Salvar', ['class' => 'btn btn-success']) ?>
			</div>
		</div>
	</div>

	<?php foreach ($workoutsPt as $workout) { ?>
		<hr>
		<div class="row mb-4">
			<div class="col">
				<h4><?= $workout->name ?></h4>
			</div>

			<div class="col">
				<div class="float-right">
					<?= Html::a(
						'<i class="fas fa-plus"></i> Adicionar',
						['addtreino'],
						[
							'class' => 'btn.block btn btn-success',
							'data' => [
								'method' => 'post',
								'confirm' => 'Salvar ?! Ok para continuar',
								'params' => [
									'workoutId' => $workout->id,
									'planId' => $planPt->id,
								],
							]
						]
					) ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6"> </div>
			<div class="col-md-6"></div>
		</div>
		<div class="row">
			<div class="col-md-6"></div>
		</div>

	<?php } ?>

</div>

</div>