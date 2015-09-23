<?php

use Page\Login as LoginPage;


class LoginTestCest
{

    function loginWithValidEMailPassword(\AcceptanceTester $I, \Page\Login $loginPage)
    {   $I->wantTo("Check login with Valid Email and Password");
        $loginPage->loginWithEmailAndPassword('mueller@mdesigns.at', '123asdF');
        $I->waitForElement('div[class="infos"]');
        $I->amOnPage('#/activities');
        $I->see('Hi, Markus');

    }
    function loginWithInvalidEmail(\AcceptanceTester $I, \Page\Login $loginPage)
    {    $I->wantTo("Check login with InValid Email and Valid Password");
        $loginPage->loginWithEmailAndPassword('adasdasd$ads','123asdF');
        $I->seeElement('div[class = "control-group email error"]');
        $I->dontSeeInCurrentUrl('activities');


    }
    function loginWithInvalidPassword(\AcceptanceTester $I, \Page\Login $loginPage)
    {   $I->wantTo("Check login with Valid Email and Wrong Password");
        $loginPage->loginWithEmailAndPassword('mueller@mdesigns.at', 'debby');
        $I->seeElement('div[class = "control-group pass error"]');
        $I->dontSeeInCurrentUrl('activities');

    }
    function loginWithoutPassword(\AcceptanceTester $I, \Page\Login $loginPage)
    {   $I->wantTo("Check login with Valid Email and No Password");
        $loginPage->loginWithEmailOnly('test@gmail.com' );
        $I->seeElement('div[class = "control-group pass error"]');
        $I->dontSeeInCurrentUrl('activities');


    }
    function loginWithoutEmail(\AcceptanceTester $I, \Page\Login $loginPage)
    {   $I->wantTo("Check login with No Email and Valid Password");
        $loginPage->loginWithPasswordOnly( 'debby');
        $I->seeElement('div[class = "control-group email error"]');
        $I->dontSeeInCurrentUrl('activities');



    }
    function loginWithUnregisteredUser(\AcceptanceTester $I, \Page\Login $loginPage)
    {
        $loginPage->loginWithEmailAndPassword('test@gmail.com', 'debby');
        $I->amOnPage('/');
        $I->see('Bill Evans Profile', 'h1');

    }
}