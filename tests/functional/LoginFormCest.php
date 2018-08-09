<?php
class LoginFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('user/login');
    }

    public function openLoginPage(\FunctionalTester $I)
    {
        $I->see('Login');

    }

    // demonstrates `amLoggedInAs` method
    // public function internalLoginById(\FunctionalTester $I)
    // {
    //     $I->amLoggedInAs(100);
    //     $I->amOnPage('/');
    //     $I->see('Logout (admin)');
    // }

    // demonstrates `amLoggedInAs` method
    // public function internalLoginByInstance(\FunctionalTester $I)
    // {
    //     $I->amLoggedInAs(\app\models\User::findByUsername('fideljundyc'));
    //     $I->amOnPage('/');
    //     $I->see('fideljundyc');
    // }

    public function loginWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', []);
        $I->expectTo('see validations errors');
        $I->see('Login cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    public function loginWithWrongCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'login-form[login]' => 'fideljundyc',
            'login-form[password]' => 'wrong',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Invalid login or password');
    }

    public function loginSuccessfully(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'login-form[login]' => 'fideljundyc',
            'login-form[password]' => '123456',
        ]);
        $I->see('fideljundyc');
        $I->dontSeeElement('form#login-form');              
    }
}