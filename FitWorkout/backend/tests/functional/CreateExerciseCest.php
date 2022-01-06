<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class CreateExerciseCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
    }

    public function tryCreateExercise(FunctionalTester $I)
    {
        $I->amOnPage('exercise/index');

        $I->see('Gestão de Exercicios');

        $I->see('Adicionar Exercicio', '.btn');
        $I->click('Adicionar Exercicio', '.btn');

        $I->see('Criar Exercicio');

        $I->fillField('#exercise-name', 'Exercise1');

        $I->fillField('#exercise-description', 'Descricao Exercise1');

        $I->selectOption('#exercise-approved', 'Aprovado');
        $I->seeOptionIsSelected('#exercise-approved', 'Aprovado');

        $I->selectOption('#exercise-typeid', 'Pernas');
        $I->seeOptionIsSelected('#exercise-typeid', 'Pernas');

        $I->selectOption('#exercise-categoryid', 'Sem Equipamento');
        $I->seeOptionIsSelected('#exercise-categoryid', 'Sem Equipamento');

        $I->see('Salvar', '.btn');
        $I->click('Salvar', '.btn');

        $I->see('Exercise1');

        $I->see('Voltar', '.btn');
        $I->click('Voltar', '.btn');

        $I->see('Gestão de Exercicios');

        $I->see('Exercise1', '.table');
    }
}
