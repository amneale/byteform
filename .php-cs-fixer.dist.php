<?php

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->in(__DIR__ . '/src')
    ->name('*.php');

$config = new PhpCsFixer\Config();

return $config->setRiskyAllowed(true)
    ->setRules([
        // rulesets
        '@Symfony' => true,
        '@PHP74Migration:risky' => true,
        '@DoctrineAnnotation' => true,

        // rules
        'multiline_whitespace_before_semicolons' => true,
        'no_useless_else' => true,
        'no_superfluous_elseif' => true,
        'method_chaining_indentation' => true,
        'combine_consecutive_unsets' => true,
        'multiline_comment_opening_closing' => true,
        'align_multiline_comment' => true,

        // risky
        'strict_comparison' => true, // @risky
        'no_unreachable_default_argument_value' => true, // @risky

        // overrides
        'concat_space' => ['spacing' => 'one'], // @Symfony
        'ordered_class_elements' => true, // @Symfony
    ])
    ->setFinder($finder);
