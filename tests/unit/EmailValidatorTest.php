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

    public function testEmail()
    {
        $validator = new EmailValidator();

        $variants = [
            ['mail@site.com', true],
            ['mail.dot@site.com', true],
            ['mail_site.com', false],
            ['mail@site', false],
            ['mail@123', false],
        ];

        foreach ($variants as $item) {
            $this->assertEquals($validator->validate($item[0]), $item[1]);
        }
    }

}