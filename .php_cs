<?php declare(strict_types=1);
return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setFinder(
            PhpCsFixer\Finder::create()
            ->files()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
            ->notName('src/autoload.php')
        );