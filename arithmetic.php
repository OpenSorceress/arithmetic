<?php

class Arithmetic
{

    public array $numbers = [];
    public string $operation = '';

    public function __construct($argv)
    {
        foreach ($argv as $value) {
            if (typeHint($value) === 'string') {
                $this->operation = $value;
            }
            $this->numbers[] = $value;
        }
        var_dump($this->numbers);
        var_dump($this->operation);
    }

    /**
     * @param $num
     * @return void
     */
    public function addition($num = 0)
    {

    }

    public function subtraction($num = 0)
    {

    }

    public function multiplication($num = 0)
    {

    }

    public function division($num = 0)
    {
        if ($num === 0) {
            throw ErrorException("Cannot divide by zero");
        }
    }

}

$result = new Arithmetic($argv);