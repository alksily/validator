<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Trim extends FilterRule
{
    /**
     * @var string
     */
    public $chars;

    /**
     * Validates that a value is already trimmed
     *
     * @param string $chars characters to strip
     */
    public function __construct($chars = " \t\n\r\0\x0B")
    {
        $this->chars = $chars;

    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        return trim($value, $this->chars) == $value;
    }
}
