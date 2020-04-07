#!/bin/sh

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RESULT=$?
php -r "unlink('composer-setup.php');"
exit $RESULT
