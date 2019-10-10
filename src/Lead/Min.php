<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class Min extends FilterRule
{
    /**
     * @var integer
     */
    public $min;

    /**
     * Sanitizes to minimum value if value is less than min
     *
     * @param int $min minimum valid value
     */
    public function __construct($min)
    {
        $this->min = $min;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }
        if ($value < $this->min) {
            $value = $this->min;
        }

        return true;
    }
}
