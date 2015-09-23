<?php

namespace Page;

class Login
{
    public static $URL = '/';
    public static $loginLink = 'a[class = "header_hide"]';
    public static $email = 'input[name="email"]';
    public static $password = 'input[name="password"]';
    public static $loginButton = 'a[class="btn login"]';

    /**
     * @var AcceptanceTester
     */
    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function loginWithEmailAndPassword($email, $password)
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->click(self::$loginLink);
        $I->amOnUrl('https://my.number26.de/');
        $I->fillField(self::$email, $email);
        $I->fillField(self::$password, $password);
        $I->click(self::$loginButton);

        return $this;
    }
    public function loginWithEmailOnly($email)
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->click(self::$loginLink);
        $I->amOnUrl('https://my.number26.de/');
        $I->fillField(self::$email, $email);
        $I->click(self::$loginButton);

        return $this;
    }
    public function loginWithPasswordOnly($password)
    {
        $I = $this->tester;
        $I->amOnPage(self::$URL);
        $I->click(self::$loginLink);
        $I->amOnUrl('https://my.number26.de/');
        $I->fillField(self::$password, $password);
        $I->click(self::$loginButton);

        return $this;
    }
}
?>