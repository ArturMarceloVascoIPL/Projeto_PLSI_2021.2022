<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class CreateProductCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedInAs(1);
    }

    public function goToProductPage(FunctionalTester $I)
    {
        $I->amOnPage('product/index');

        $I->see('Gestão de Produtos');

        $I->see('Adicionar Produto', '.btn');
        $I->click('Adicionar Produto', '.btn');

        $I->see('Criar Produto');

        $I->fillField('#product-name', 'Produto1');
        $I->fillField('#product-description', 'Descricao Produto1');
        $I->fillField('#product-stock', '5');
        $I->fillField('#product-price', '2');
        $I->attachFile('#file', 'image.png');

        $I->click('Salvar', '.btn');

        $I->see('Produto1');

        $I->see('Voltar', '.btn');
        $I->click('Voltar', '.btn');

        $I->see('Produto1', '.table');
    }
}
