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
        ]);

        $this->insert('exercise', [
            'name' =>  'Bench Press',
            'description' => ' Fazer um bench press com o peso do peito para baixo e ficar forte',
            'typeId' => 1, //Peito
            'categoryId' => 1, //Com Equipamento
        ]);

    }

    public function down()
    {
        return false;
    }
}
