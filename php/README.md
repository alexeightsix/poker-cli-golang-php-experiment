# Install Composer Packages:

docker run --rm --interactive --tty -v $(pwd):/app composer install       

# Run:

docker run -v $(pwd):/var/app php:8.1.0-fpm php /var/app/GenerateRandomHandsCommand.php

# Tests:

docker run -v $(pwd):/var/app php:8.1.0-fpm php /var/app/vendor/bin/phpunit /var/app/tests/