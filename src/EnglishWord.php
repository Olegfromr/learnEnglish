<?php

namespace Oleg\LearningEnglish;

class EnglishWord
{
    public string $name;
    public int $id;
    public function __construct(int $id, string $word)
    {
        $this->id = $id;
        $this->name = $word;
    }
    public function __get():string
    {
        return $this->name;
    }
    public function __toString()
    {
        return $this->name;
    }
}