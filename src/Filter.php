<?php

namespace Alksily\Validator;

use Closure;
use RuntimeException;

abstract class Filter
{
    protected $data = [];
    protected $field = null;
    protected $rule = [];
    protected $globalRule = [];
    protected $globalList = [];
    protected $error = [];

    /**
     * Validator constructor
     *
     * @param array $data
     */
    public function __construct(array &$data)
    {
        $this->data = &$data;
    }

    /**
     * Select required field validation
     *
     * @param string        $field
     * @param null|callable $callback
     *
     * @return self
     */
    public function attr($field, callable $callback = null)
    {
        $this->globalList[] = $this->field = $field;

        if (($callback === null) === false) {
            $callback();
        }

        return $this;
    }

    /**
     * Select not required (optional) field validation
     *
     * @param string        $field
     * @param null|callable $callback
     *
     * @return self
     */
    public function option($field, callable $callback = null)
    {
        $this->field = null;

        if (!empty($this->data[$field])) {
            $this->globalList[] = $this->field = $field;

            if (($callback === null) === false) {
                $callback();
            }
        }

        return $this;
    }

    /**
     * Adds to selected field rule
     *
     * @param FilterRule|Closure $rule
     * @param string             $message when error return this text
     *
     * @throws RuntimeException
     *
     * @return self
     */
    public function addRule($rule, $message = '')
    {
        if ($this->field) {
            $this->rule[$this->field][] = [
                'rule' => $rule,
                'message' => $message,
            ];
        }

        return $this;
    }

    /**
     * Adds global rule
     *
     * @param FilterRule|Closure $rule
     * @param string             $message
     *
     * @return $this
     */
    public function addGlobalRule($rule, $message = '')
    {
        $this->globalRule[] = [
            'rule' => $rule,
            'message' => $message,
        ];

        return $this;
    }

    /**
     * Performs rules
     *
     * @return array|bool
     */
    public function run()
    {
        $this->error = [];

        // check rule by fields
        foreach ($this->rule as $field => $rules) {
            foreach ($rules as $rule) {
                if ($rule['rule']($this->data, $field) !== true) {
                    $this->error[$field] = $rule['message'] ? $rule['message'] : false;
                    break;
                }
            }
        }

        // check global by selected fields in globalList
        if ($this->globalRule) {
            foreach (array_unique($this->globalList) as $field) {
                foreach ($this->globalRule as $rule) {
                    if (in_array($field, $this->data) && $rule['rule']($this->data, $field) !== true) {
                        $this->error[$field] = $rule['message'] ? $rule['message'] : false;
                        break;
                    }
                }
            }
        }

        return $this->error ? $this->error : true;
    }
}
