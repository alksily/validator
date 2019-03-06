<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Regex extends FilterRule
{
    /**
     * @var string
     */
    public $expr;

    /**
     * @var string
     */
    public $replace;

    /**
     * Applies `preg_replace()` to the value
     *
     * @param string $expr    regular expression pattern to apply
     * @param string $replace Replace the found pattern with this string
     */
    public function __construct($expr, $replace)
    {
        $this->expr = $expr;
        $this->replace = $replace;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        $value = preg_replace($this->expr, $this->replace, $value);

        return true;
    }
}
