<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Regex extends FilterRule
{
    /**
     * @var integer
     */
    public $expr;

    /**
     * Validates the value against a regular expression
     *
     * @param string $expr regular expression pattern to apply
     */
    public function __construct($expr)
    {
        $this->expr = $expr;
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        return (bool)preg_match($this->expr, $value);
    }
}
