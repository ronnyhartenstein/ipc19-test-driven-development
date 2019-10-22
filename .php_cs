<?php declare(strict_types=1);
// https://github.com/thePHPcc/richtig-guten-code-schreiben/blob/master/.php_cs.dist
return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setFinder(
            PhpCsFixer\Finder::create()
            ->files()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
            ->notName('src/autoload.php')
        );
