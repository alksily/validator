AEngine Validator
====
A convenient way to check the correctness of the data from the client.

#### Requirements
* PHP >= 7.0

#### Installation
Run the following command in the root directory of your web project:
  
> `composer require aengine/validator`

#### Usage
```php
use AEngine\Validator\Filter;
use AEngine\Validator\Traits\FilterRules;

class UserFilter extends Filter
{
    use FilterRules;

    // check data for create new user
    public static function add(array &$data = [])
    {
        $filter = new self($data);

        $filter
            ->addGlobalRule($filter->leadEscape()) // global rule for all fields in $data
            ->addGlobalRule($filter->leadTrim())
            ->attr('username')
                ->addRule($filter->checkStrlenMax(20)) // parameter passing for checking
                ->addRule($filter->checkStrlenMin(3))
            ->attr('password')
                ->addRule($filter->checkStrlenBetween(3, 20))
            ->attr('password_again')
                ->addRule($filter->checkEqualToField('password'), 'Passwords do not match') // second arg is reason error
            ->attr('email')
                ->addRule($filter->checkEmail())
            ->attr('ip')
                ->addRule($filter->checkIp());

        return $filter->run();
    }
}

// data example
$data = [
    'username'       => 'Aleksey',
    'password'       => 'MyPassword',
    'password_again' => 'MyPassword',
    'email'          => 'aleksey@example.com',
    'ip'             => '127.0.0.1',
];

$result = UserFilter::add($data);

if ($result === true) {
    // check ok
    var_dump($data); // sanitized data
} else {
    // found an error
    var_dump($result);
}
```

Example error when password do not match
```text
array(1) {
  ["password_again"]=>
  string(22) "Passwords do not match"
}
```

#### Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

#### License
The AEngine Validator is licensed under the MIT license. See [License File](LICENSE.md) for more information.
