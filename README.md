# testing

1. clone project
2. edit config/db.php (correct db path)
3. run "./yii migrate"  in root and in test/bin directory
4. run "phpunit"


Unit test practice

For your convenience it woild be better to install phpunit globally:
composer global require phpunit/phpunit:"~4.8"

And add it to PATH.

Or download phar file version 4.8 and execute this:

$ chmod +x phpunit.phar

$ sudo mv phpunit.phar /usr/local/bin/phpunit
