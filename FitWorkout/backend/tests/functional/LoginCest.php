<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage('site/login');
        $I->see('Admin - Sign in to start your session');
        $I->fillField('#loginform-username', 'admin');
        $I->fillField('#loginform-password', 'adminadmin');
        $I->click('Sign In');
        $I->see('Dashboard Admin');
    }
}
