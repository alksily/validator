<?php

namespace AEngine\Validator\Lead;

use AEngine\Validator\FilterRule;

class StrPregReplace extends FilterRule
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
     * Forces the value to a string, optionally applying `preg_replace()`
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
            $value = preg_replace($this->find, $this->replace, $value);
        }

        return true;
    }
}
