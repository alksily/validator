<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class Max extends FilterRule
{
    /**
     * @var integer
     */
    public $max;

    /**
     * Validates that the value is less than than or equal to a maximum
     *
     * @param int $max maximum valid value
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

        return $value <= $this->max;
    }
}
