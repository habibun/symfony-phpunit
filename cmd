# run local server
./bin/console server:run


# run phpunit
./vendor/bin/phpunit

# run specific method only
./vendor/bin/phpunit --filter testItDoesNotAllowToAddDinosToUnsecureEnclosures

# phpunit help
symfony php ./vendor/bin/phpunit -h

# run specific class only
./vendor/bin/phpunit tests/AppBundle/Factory/DinosaurFactoryTest.php

# run with debug
./vendor/bin/phpunit tests/AppBundle/Factory/DinosaurFactoryTest.php --debug

# run specific method with debug
./vendor/bin/phpunit --filter testItGrowsADinosaurFromASpecification --debug

# run specific test case with debug
./vendor/bin/phpunit --filter 'testItGrowsADinosaurFromASpecification #1' --debug

# run specific test case name with debug
./vendor/bin/phpunit --filter 'testItGrowsADinosaurFromASpecification @default response' --debug

# stop test on error or failure
./vendor/bin/phpunit --stop-on-failure --stop-on-error

# run specific test suite
./vendor/bin/phpunit --testsuite entities --debug


