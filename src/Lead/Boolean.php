<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class Boolean extends FilterRule
{
    /**
     * @var boolean true
     */
    public $true;

    /**
     * @var boolean false
     */
    public $false;

    /**
     * Sanitize the value to a boolean, or a pseudo-boolean
     *
     * @param mixed $true  Use this value for `true`
     * @param mixed $false Use this value for `false`
     */
    public function __construct($true, $false)
    {
        $this->true = $true;
        $this->false = $false;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (static::isTrue($value)) {
            $value = $this->true;

            return true;
        }

        if (static::isFalse($value)) {
            $value = $this->false;

            return true;
        }

        $value = $value ? $this->true : $this->false;

        return true;
    }
}
