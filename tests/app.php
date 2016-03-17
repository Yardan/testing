<?php
namespace tests;

use app\models\User;

require(__DIR__.'/_bootstrap.php');

$user = new User();

$user->username = 'Test';
$user->email = 'test@mail.ru';

print_r($user->getAttributes());