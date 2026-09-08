<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor', 'build', 'docs']);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'declare_strict_types' => true,
        'array_syntax' => ['syntax' => 'short'],
        'date_time_immutable' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'psr_autoloading' => true,
        'heredoc_to_nowdoc' => true,
        'logical_operators' => true,
        'random_api_migration' => true,
        'simplified_null_return' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'ternary_to_null_coalescing' => true,
        'visibility_required' => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['author']],
        'native_function_invocation' => true,
        'no_useless_return' => true,
        'concat_space' => false,
    ])
    ->setFinder($finder);
