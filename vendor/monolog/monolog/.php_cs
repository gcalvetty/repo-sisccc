<?php

$header = <<<EOF
This file is part of the Monolog package.

(c) Jordi Boggiano <j.boggiano@seld.be>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Fixtures')
    // The next 4 files are here for forward compatibility, and are not used by
    // Monolog itself
    ->exclude(__DIR__.'src/Monolog/Handler/FormattableHandlerInterface.php')
    ->exclude(__DIR__.'src/Monolog/Handler/FormattableHandlerTrait.php')
    ->exclude(__DIR__.'src/Monolog/Handler/ProcessableHandlerInterface.php')
    ->exclude(__DIR__.'src/Monolog/Handler/ProcessableHandlerTrait.php')
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
;

return PhpCsFixer\Config::create()
    ->setUsingCache(true)
    ->setRiskyAllowed(true)
    ->setRules(array(
        '@PSR2' => true,
        // some rules disabled as long as 1.x branch is maintained
        'binary_operator_spaces' => array(
            'default' => null,
        ),
        'blank_line_before_statement' => ['statements' => ['continue', 'declare', 'return', 'throw', 'try']],
        'cast_spaces' => ['space' => 'single'],
        'header_comment' => ['header' => $header],
        'include' => true,
        'class_attributes_separation' => ['elements' => ['method']],
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_statement' => true,
        'no_extra_consecutive_blank_lines' => true,
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_unused_imports' => true,
        'no_whitespace_in_blank_line' => true,
        'object_operator_without_whitespace' => true,
        'phpdoc_align' => true,
        'phpdoc_indent' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_package' => true,
        'phpdoc_order' => true,
        //'phpdoc_scalar' => true,
        'phpdoc_trim' => true,
        //'phpdoc_types' => true,
        'psr0' => true,
        //'array_syntax' => array('syntax' => 'short'),
        'declare_strict_types' => true,
        'single_blank_line_before_namespace' => true,
        'standardize_not_equals' => true,
        'ternary_operator_spaces' => true,
        'trailing_comma_in_multiline_array' => true,
    ))
    ->setFinder($finder)
;
