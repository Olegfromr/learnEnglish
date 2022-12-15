<?php

namespace Oleg\LearningEnglish;

class MyPDO extends \PDO
{
    public function __construct(string $dsn, ?string $username = null, ?string $password = null, ?array $options = null)
    {
        parent::__construct($dsn, $username, $password, $options);
    }

//возвращает ОДНО значение из строки запроса
    public function myFetchOne(string $sql){
        $q=$this->query($sql);
        return $q->fetchColumn();
    }
//возвращает массив из одной строки запроса
/*
     public function myFetchArray(string $sql){
        $q=$this->query($sql);
        $r1 = $q->fetch();
        echo "Размер массива = ". count($r1) . "<br>";
        echo "r1 из myFetch=";
        var_dump($r1);
        return $r1;
    }
*/
}