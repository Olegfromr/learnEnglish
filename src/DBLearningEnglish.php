<?php

namespace Oleg\LearningEnglish;

define('DB_FILE', 'db/learning_english');
class DBLearningEnglish
{
/*$db = new PDO('sqlite:db/learning_english');
var_dump($db);
//подключение через sqlite
$db2 = new SQLite3("db/learning_english");
*/
    public function __construct()
    {
        $f = __DIR__ . '/../db/learning_english'; //
        echo $f ."<br>";
        return new PDO('sqlite:'. $f);
//        return PDO('sqlite:' . 'db/learning_english');
    }
}