# https://localheinz.com/blog/2018/01/24/makefile-for-lazy-developers/

it: check style test

test:
	./tools/phpunit --testdox

style:
	./tools/php-cs-fixer fix

check:
	./tools/psalm

autoload:
	./tools/phpab -o src/autoload.php src
