it: check style test

test:
	./tools/phpunit --testdox

style:
	./tools/php-cs-fixer fix

check:
	./tools/psalm

autoload:
	./tools/phpab -o src/autoload.php src