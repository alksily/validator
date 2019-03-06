<?php

namespace AEngine\Validator\Check;

use AEngine\Validator\FilterRule;

class Strlen extends FilterRule
{
    /**
     * @var integer
     */
    public $len;

    /**
     * Validates that the length of the value is within a given range
     *
     * @param int $len valid length
     */
    public function __construct($len)
    {
        $this->len = $len;
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        return mb_strlen($value) == $this->len;
    }
}
