<?php

namespace tests\unit;

use Codeception\TestCase\Test;
use yii\validators\EmailValidator;

class EmailValidatorTest extends Test
{
    /**
     * @var \UnitTeste
     */
    protected $tester;

    /**
     * @param $email
     * @param $result
     * @dataProvider getEmailVariants
     */
    public function testEmail($email, $result)
    {
        $validator = new EmailValidator();
        $this->assertEquals($validator->validate($email), $result);
    }

    public function getEmailVariants()
    {
        return [
            'first' => ['mail@site.com', true],
            'second' => ['mail.dot@site.com', true],
            'third' => ['mail_site.com', false],
            'forth' => ['mail@site', false],
            'fifth' => ['mail@123', false],
        ];
    }

}