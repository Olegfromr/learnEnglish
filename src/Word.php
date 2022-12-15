<?php

namespace Oleg\LearningEnglish;

class Word
{
    public static function getWords($db, $in){
        $q=$db->query("SELECT id, name FROM e_word WHERE id IN $in");
        return $q->fleshAll();
    }
}