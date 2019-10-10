<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class Trim extends FilterRule
{
    /**
     * @var string
     */
    public $chars;

    /**
     * Sanitizes a value to a string using trim()
     *
     * @param string $chars characters to trim
     */
    public function __construct($chars = " \t\n\r\0\x0B")
    {
        $this->chars = $chars;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (is_scalar($value) || $value === null) {
            $value = trim($value, $this->chars);
        }

        return true;
    }
}
