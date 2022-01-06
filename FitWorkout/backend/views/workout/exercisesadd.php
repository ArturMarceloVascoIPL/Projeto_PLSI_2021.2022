<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use common\models\Exercise;
use common\models\Exercisecategory;
use common\models\Exercisetype;
use common\models\Workout;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Workout */


//get all exercises into a array list from exercise model
$this->title = 'Adicionar Exercicios';
\yii\web\YiiAsset::register($this);
?>
<div class="workout-view">

	<!-- Buttons Funcionalidades -->
	<div class="row mb-4">
		<div class="col">
			<?= Html::a('<i class="fas fa-arrow-left"></i> Voltar', ['/workout'], ['class' => 'btn.block btn btn-info']) ?>
		</div>
	</div>

	<div class="workout-form">
		<div class="container">
			<div class="row gx-2 ">
				<div class="col-lg-4 col-md-12">
					<b>Calorias do Exercício</b>
					<?= Html::input(
						'number',
						'exerciseCalories',
						'',
						$options = [
							'class' => 'form-control',
							'maxlength' => 10,
							'style' => 'width:100px'
						]
					) ?>
				</div>
				<div class="col-lg-4 col-md-6">
					<b>Peso do Equipamento</b>
					<?= Html::input(
						'number',
						'equipmentWeight',
						'',
						$options = [
							'class' => 'form-control',
							'maxlength' => 10,
							'style' => 'width:100px'
						]
					) ?>
 
				</div>
				<div class="col-lg-4 col-md-6">
					<b>Tempo de Descanso</b>
					<?= Html::input(
						'number',
						'restTime',
						'',
						$options = [
							'class' => 'form-control',
							'maxlength' => 10,
							'style' => 'width:100px'
						]
					) ?>
				</div>
			</div>

			<div class="row gx-2 ">
				<div class="col-lg-4 col-md-12">
					<b>Número de Séries</b>
					<?= Html::input(
						'number',
						'seriesNum',
						'',
						$options = [
							'class' => 'form-control',
							'maxlength' => 10,
							'style' => 'width:100px'
						]
					) ?>
				</div>
				<div class="col-lg-4 col-md-6">
				</div>
				<div class="col-lg-4 col-md-6">
					<b>Tamanho da Série</b>
					<?= Html::input(
						'number',
						'seriesSize',
						'',
						$options = [
							'class' => 'form-control',
							'maxlength' => 10,
							'style' => 'width:100px'
						]
					) ?>
				</div>
			</div>
		</div>
	</div>

	<?php foreach ($exerciseList as $exercicio) { ?>
		<hr>

		<div class="row mb-4">
			<div class="col">
				<h4><?= $exercicio->name ?></h4>
			</div>

			<div class="col">
				<div class="float-right">
					<?= Html::a(
						'<i class="fas fa-plus"></i> Adicionar',
						['addexercise'],
						[
							'class' => 'btn.block btn btn-success',
							'data' => [
								'method' => 'post',
								'confirm' => 'Salvar ?! Ok para continuar',
								'params' => [
									'exerciseId' => $exercicio->id,
									'workoutId' => $workoutModel->id,
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