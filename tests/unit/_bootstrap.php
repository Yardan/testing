<?php
// Here you can initialize variables that will be available to your tests
$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../config/web.php'),
    require(__DIR__ . '/config/config.php')
);
$application = new yii\web\Application(requ);