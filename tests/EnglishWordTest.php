<?php

use PHPUnit\Framework\TestCase;
use Oleg\LearningEnglish\EnglishWord;

//namespace Test;

class EnglishWordTest extends TestCase
{ //Здеся будет мои тесты
    public function testEnglishWordCreator()
    {
        $w = new EnglishWord("I");
        $this->assertInstanceOf('Oleg\LearningEnglish\EnglishWord',$w);
    }

}