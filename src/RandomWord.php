<?php

namespace Oleg\LearningEnglish;

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

class RandomWord
{
    protected int $nw; //количество слов
    protected int $minID;
    protected int $maxID;
    protected \PDO $bd;
    public Word $word;
    public $words = [];
    public $inId = []; //Id выбранных слов
    public function __construct($pdo)
    {
        $this->nw = NUMBER_OF_WORDS;
        $this->bd = $pdo;
        $q = $pdo->query("SELECT min(id) FROM e_word");
        $this->minID = $q->fetch()[0];
        $q = $pdo->query("SELECT max(id) FROM e_word");
        $this->maxID = $q->fetch()[0];
            //получение массива случайных id
        $this->inId = $this->getSetId();
            //получаю массив английских слов
        $this->words = $this->getWords();
//        $this->words = Word::getWords($this->inId);
//        var_dump($this->inId);
    }

    protected function getSetId():array
    { //получаю набор случайных id английских слов
        $in = [];
//        $q = $this->bd->prepare('SELECT id FROM e_word WHERE id=:id');
        for ($i = 0; $i < $this->nw; $i++) {
            while (true) {
                $id = rand($this->minID, $this->maxID);
                if (!in_array($id, $in)) {
                    $in[] = $id;
/*
                    $q->execute(array(':id' => $id));
echo $id."<br>";
var_dump($q);
                     $id2 = $q->fetch();
var_dump($id2);
                    if (!empty($id)) {
                        $in[$i] = $id;
                        break;
                    }
*/
                    break;
                }
            }
        }
        return $in;
    }

    public function word(){
        $q = $this->bd->prepare("SELECT id, name FROM $this->table WHERE id IN (1, 2, 3, 4, 5)");
//        $q->fetch(\PDO::FETCH_KEY_PAIR);
//        $word = $q->fetch(PDO::FETCH_ASSOC);
//        var_dump($word);
        return new EnglishWord($word['id'], $word['name']);
//        $e=$this->bd->myFetchArray("SELECT id, name from e_word");
    }
//проба
    public function getWords(){
        //отказался от запроса с in  делаю с простым fetch
//var_dump($this->inId);
        $q=$this->bd->prepare("SELECT e.id eid, e.name ename, r.id rid, r.name rname  FROM e_word e LEFT JOIN er_id ON(e.id = english) LEFT JOIN r_word r ON(rushian=r.id) WHERE eid = ?");
        $rez=[];
        for ($i=0; $i<$this->nw; $i++){
            $q->bindValue(1, $this->inId[$i], \PDO::PARAM_INT);
            $q->execute();
            $str = $q->fetch(\PDO::FETCH_ASSOC);
//            var_dump($str);
            $rez[] = $str;
        }
        //получаю массив аасоциативных строк
//var_dump($rez);
        return $rez;
    }

}