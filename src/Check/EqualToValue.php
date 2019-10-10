<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class EqualToValue extends FilterRule
{
    /**
     * @var string
     */
    public $otherValue;

    /**
     * Validates that this value is loosely equal to another value
     *
     * @param string $otherValue other value
     */
    public function __construct($otherValue)
    {
        $this->otherValue = $otherValue;
    }

    public function __invoke(&$data, $field)
    {
        return $data[$field] == $this->otherValue;
    }
}
