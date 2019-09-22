<?php

class Model
{
    protected $type_s;

    public function __construct()
    {
        $this->setType($this->type_s);
    }

    //b: bool
    //i: int
    //d: double
    protected function setType(string $types)
    {
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties();

        $count = count($props);
        if ($count !== strlen($types)) {
            return;
        }

        for ($i = 0; $i < count($props); $i++) {
            $value = $props[$i]->getValue($this);
            switch ($types[$i]) {
                case "b":
                    $props[$i]->setValue($this, (bool) $value);
                    break;
                case "i":
                    $props[$i]->setValue($this, (int) $value);
                    break;
                case "d":
                    $props[$i]->setValue($this, (float) $value);
                    break;
            }
        }
    }
}
