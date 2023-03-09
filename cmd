# run local server
./bin/console server:run


# run phpunit
./vendor/bin/phpunit

# run specific method only
./vendor/bin/phpunit --filter testItDoesNotAllowToAddDinosToUnsecureEnclosures

