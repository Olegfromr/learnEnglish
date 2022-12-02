<?php

namespace Oleg\LearningEnglish;

class EnglishWord
{
    protected string $name;
    protected int $id;
    public function __construct(int $id, string $word)
    {
        $this->id = $id;
        $this->name = $word;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function __toString()
    {
        return $this->name;
    }
}