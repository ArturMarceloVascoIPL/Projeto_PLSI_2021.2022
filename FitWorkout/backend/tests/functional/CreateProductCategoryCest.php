<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class CreateProductCategoryCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
    }

    public function createCategory(FunctionalTester $I)
    {
        $I->amOnPage('product/index');

        $I->see('Gestão de Produtos');

        $I->see('Ver Categorias', '.btn');
        $I->click('Ver Categorias', '.btn');

        $I->see('Gestão de Categorias de Produtos');

        $I->see('Adicionar Categoria', '.btn');
        $I->click('Adicionar Categoria', '.btn');

        $I->see('Criar Categoria');

        $I->fillField('#productcategory-name', 'Categoria1');
        $I->fillField('#productcategory-description', 'Descricao Categoria1');

        $I->see('Salvar', '.btn');
        $I->click('Salvar', '.btn');

        $I->see('Categoria1');

        $I->see('Voltar', '.btn');
        $I->click('Voltar', '.btn');

        $I->see('Gestão de Categorias de Produtos');

        $I->see('Categoria1', '.table');
    }
}
