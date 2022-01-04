<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage('/');

        $I->see('Bem Vindo | Inicie a sessão');

        $I->see('Login', '.nav-link');
        $I->click('Login', '.nav-link');

        $I->see('Please fill out the following fields to login:');

        $I->fillField('#loginform-username', 'admin');
        $I->fillField('#loginform-password', 'adminadmin');

        $I->see('Login', '.btn');
        $I->click('Login', '.btn');

        $I->dontSeeElement('.invalid-feedback');

        $I->see('Bem Vindo admin');
    }
}
