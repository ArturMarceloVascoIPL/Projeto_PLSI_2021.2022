<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class CreateExerciseTypeCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
    }

    public function tryCreateExerciseType(FunctionalTester $I)
    {
        $I->amOnPage('exercisetype');

        $I->see('Gestão de Tipos de Exercícios');

        $I->see('Adicionar Tipo', '.btn');
        $I->click('Adicionar Tipo', '.btn');

        $I->see('Criar Tipo de Exercicio');

        $I->fillField('#exercisetype-name', 'ExerciseTipo1');
        $I->fillField('#exercisetype-description', 'Descricao ExerciseTipo1');

        $I->see('Salvar', '.btn');
        $I->click('Salvar', '.btn');

        $I->see('ExerciseTipo1');

        $I->see('Voltar', '.btn');
        $I->click('Voltar', '.btn');

        $I->see('Gestão de Tipos de Exercícios');

        $I->see('ExerciseTipo1', '.table');
    }
}
