<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class StrlenMax extends FilterRule
{
    /**
     * @var integer
     */
    public $max;

    /**
     * Validates that a value is no longer than a certain length
     *
     * @param int $max value must have no more than this many
     */
    public function __construct($max)
    {
        $this->max = $max;
    }

    public function __invoke(&$data, $field)
    {
        $value = $data[$field];

        if (!is_scalar($value)) {
            return false;
        }

        return mb_strlen($value) <= $this->max;
    }
}
