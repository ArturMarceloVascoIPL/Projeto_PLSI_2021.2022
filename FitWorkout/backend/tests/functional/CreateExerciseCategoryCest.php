<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class CreateExerciseCategoryCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
    }

    public function tryCreateExerciseCategory(FunctionalTester $I)
    {
        $I->amOnPage('exercisecategory');

        $I->see('Gestão de Categorias de Exercícios');

        $I->see('Adicionar Categoria', '.btn');
        $I->click('Adicionar Categoria', '.btn');

        $I->see('Criar Categoria de Exercicio');

        $I->fillField('#exercisecategory-name', 'ExerciseCategoria1');
        $I->fillField('#exercisecategory-description', 'Descricao ExerciseCategoria1');

        $I->see('Salvar', '.btn');
        $I->click('Salvar', '.btn');

        $I->see('ExerciseCategoria1');

        $I->see('Voltar', '.btn');
        $I->click('Voltar', '.btn');

        $I->see('Gestão de Categorias de Exercícios');

        $I->see('ExerciseCategoria1', '.table');
    }
}
