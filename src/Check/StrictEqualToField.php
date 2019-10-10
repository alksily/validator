<?php

namespace Alksily\Validator\Check;

use Alksily\Validator\FilterRule;

class StrictEqualToField extends FilterRule
{
    /**
     * @var string
     */
    public $otherField;

    /**
     * Validates that this value is loosely equal to some other subject field
     *
     * @param string $otherField Check against the value of this subject field
     */
    public function __construct($otherField)
    {
        $this->otherField = $otherField;
    }

    public function __invoke(&$data, $field)
    {
        // the other field needs to exist and *not* be null
        if (!isset($data[$this->otherField])) {
            return false;
        }

        return $data[$field] === $data[$this->otherField];
    }
}
