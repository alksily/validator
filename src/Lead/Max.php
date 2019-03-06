<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class Max extends FilterRule
{
    /**
     * @var integer
     */
    public $max;

    /**
     * Sanitizes to maximum value if value is greater than max
     *
     * @param int $max maximum valid value
     */
    public function __construct($max)
    {
        $this->max = $max;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }
        if ($value > $this->max) {
            $value = $this->max;
        }

        return true;
    }
}
