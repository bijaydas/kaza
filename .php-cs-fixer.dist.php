<?php declare(strict_types=1);

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = (new Finder())->in(__DIR__)->exclude(['vendor', 'tests', 'storage', 'bootstrap']);

return (new Config())
    ->setRules([
        '@PSR12' => true,
    ])
    ->setFinder($finder);
