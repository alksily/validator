<?php

namespace Alksily\Validator\Lead;

use Alksily\Validator\FilterRule;

class StrReplace extends FilterRule
{
    /**
     * @var string|array
     */
    public $find;

    /**
     * @var string|array
     */
    public $replace;

    /**
     * Forces the value to a string, optionally applying `str_replace()`
     *
     * @param string|array $find    Find this/these in the value.
     * @param string|array $replace Replace with this/these in the value.
     */
    public function __construct($find, $replace)
    {
        $this->find = $find;
        $this->replace = $replace;
    }

    public function __invoke(&$data, $field)
    {
        $value = &$data[$field];

        if (!is_scalar($value)) {
            return false;
        }
        if ($this->find || $this->replace) {
            $value = str_replace($this->find, $this->replace, $value);
        }

        return true;
    }
}
