<?php
namespace tests\unit;

use Yii;
use app\models\User;
use Codeception\TestCase\Test;

class UserTest extends Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        User::deleteAll();
        Yii::$app->db->createCommand()->insert(User::tableName(), [
            'username'  => 'user',
            'email'     =>'user@email.com'
        ])->execute();
    }

    protected function _after()
    {
    }

    public function testValidateExistedValues()
    {
        $user = new User([
            'username'  => 'user',
            'email'     =>'user@email.com'
        ]);
        $this->assertFalse($user->validate(), 'model is not valid');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check username error');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check email error');
    }

    public function testSaveIntoDatabase()
    {
        $user = new User([
            'username'  => 'TestUserName',
            'email'     =>'test@email.com'
        ]);
        $this->assertTrue($user->save(), 'model is saved');
    }

    public function testValidateEmptyValues()
    {
        $user = new User();
        $this->assertFalse($user->validate(), 'model is not valid');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check username error');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check email error');
    }

    public function testValidateWrongValues()
    {
        $user = new User([
            'username' => 'Wrong % Username',
            'email' => 'wrong_email',
        ]);
        $this->assertFalse($user->validate(), 'validate incorrect username and email');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check incorrect username error');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check incorrect email error');
    }

    public function testValidateCorrectValues()
    {
        $user = new User([
            'username' => 'CorrectUsername',
            'email' => 'correct@email.com',
        ]);
        $this->assertTrue($user->validate(), 'correct model is valid');
    }
}