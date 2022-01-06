<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class RegisterCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function tryRegister(FunctionalTester $I)
    {
        $I->amOnPage('/');

        $I->see('Bem Vindo | Inicie a sessão');

        $I->see('Registo', '.nav-link');
        $I->click('Registo', '.nav-link');

        $I->see('Please fill out the following fields to signup:');

        $I->fillField('#signupform-username', 'user');
        $I->fillField('#signupform-email', 'user@user.pt');
        $I->fillField('#signupform-password', 'useruser');

        $I->see('Signup', '.btn');
        $I->click('Signup', '.btn');

        $I->dontSeeElement('.invalid-feedback');

        $I->see('Obrigado pelo registo.', '.alert');
    }
}
