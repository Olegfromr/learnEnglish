<?php

use PHPUnit\Framework\TestCase;
use Oleg\LearningEnglish\EnglishWord;

//namespace Test;

class EnglishWordTest extends TestCase
{ //Здеся будет мои тесты
    public function testEnglishWordCreator()
    {
        $w = new EnglishWord(1,"I");
        $this->assertInstanceOf('Oleg\LearningEnglish\EnglishWord',$w); //сообщает о ошибке определения
    }
    public function testEnglishWordTyperRetGetId()
    {
        $w = new EnglishWord(1,"I");
        $this->assertIsInt($w->id,"id не int"); //сообщает о ошибке определения
    }
    public function testEnglishWordTypeRetGetName()
    {
        $w = new EnglishWord(1,"I");
        $this->assertIsString($w->name,"name не string"); //сообщает о ошибке определения
    }

}