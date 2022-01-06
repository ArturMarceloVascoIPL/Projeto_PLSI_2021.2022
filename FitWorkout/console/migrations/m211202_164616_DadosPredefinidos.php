<?php

use yii\db\Migration;

/**
 * Class m211202_164616_DadosPredefinidos
 */
class m211202_164616_DadosPredefinidos extends Migration
{

    public function up()
    {
        /**
         * Exercicios
         */

        // Tipos de Exercicios
        $this->insert('exercisetype', [
            'name' => 'Peito',
        ]);
        $this->insert('exercisetype', [
            'name' => 'Pernas',
        ]);
        $this->insert('exercisetype', [
            'name' => 'Braços',
        ]);

        //Categorias de Exercicios
        $this->insert('exercisecategory', [
            'name' => 'Com Equipamento',
        ]);
        $this->insert('exercisecategory', [
            'name' => 'Sem Equipamento',
        ]);

        //Exercicios
        $this->insert('exercise', [
            'name' =>  'Agachamentos',
            'description' => 'Ficar forte e agachar',
            'typeId' => 2, //Pernas
            'categoryId' => 2, //Sem Equipamento
            'approved' => 1,
        ]);

        $this->insert('exercise', [
            'name' =>  'Bench Press',
            'description' => ' Fazer um bench press com o peso do peito para baixo e ficar forte',
            'typeId' => 1, //Peito
            'categoryId' => 1, //Com Equipamento
            'approved' => 1,
        ]);

        //Criação do UserProfile do Admin
        $this->insert('userprofile', [
            'userId' => 1,
            'address' =>  'Rua do Admin',
            'nif' => 123456789,
            'postalCode' =>  '4444-444',
            'city' =>  'Porto',
        ]);


        /**
         * Treinos
         */
        //Workouts
        $this->insert('workout', [
            'id' => 1,
            'name' => 'Treino de Peito',
            'date' => '2020-01-01',
            'ptId' => 1,
        ]);

        //WorkoutExercise   
        $this->insert('workoutexercise', [
            'exerciseId' => 1,
            'workoutId' => 1,
            'exerciseCalories' => 100,
            'equipmentWeight' =>  0,
            'seriesSize' =>  1,
            'seriesNum' =>  1,
            'restTime' =>  1,
        ]);

        // $this->insert('workoutexercise', [
        //     'exerciseId' => 2,
        //     'workoutId' => 1,
        //     'exerciseCalories' => 100,
        //     'equipmentWeight' =>  0,
        //     'seriesSize' =>  1,
        //     'seriesNum' =>  1,
        //     'restTime' =>  1,
        // ]);
    }

    public function down()
    {
        return false;
    }
}
