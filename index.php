<?php
declare(strict_types = 1);
namespace Oleg\LearningEnglish;

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require ("vendor/autoload.php");

echo "Hello, I'm an English lesson!<br>\n";
define('NUMBER_OF_WORDS', 5); //количество слов в тесте
define('PDO_F', "db/learning_english");
define('FULL_PDO', 'sqlite:' . __DIR__ . '/' . PDO_F);
//проверка наличия файла и подключения к БД
file_exists(PDO_F) ?: exit("ERROR: файл " . PDO_F . " для открытия базы Sqlite не существует.");
try {
    $db = new \PDO(FULL_PDO);
} catch (\PDOException $e){
    print 'ERROR:'.$e->getMessage()."<br>";
    exit("Не удалось подключиться к базе данных");
}

//получаю слова для теста
$testWordArr = new RandomWord($db);
//Какой тест будем делать
?>
<form action="english-word.php" method="post">
    <?php
    for ($i=0; $i<NUMBER_OF_WORDS; $i++){
        $p_id = 'p_id' . $i;
        $p_id_value = '' . $i;
        ?><input type="hidden" name="<?= $p_id; ?> " value="<?= $p_id_value; ?>">
        <?php //id
        $p_eid_n = 'p_eid' . $i;
        $p_eid_v = $testWordArr->words[$i]['eid'];
        ?><input type="hidden" name="<?= $p_eid_n ?> " value="<?= $p_eid_v ?>">
        <?php // английское слово
        $p_ewordn = 'p_ewordn' . $i;
        $p_ewordv = $testWordArr->words[$i]['ename'];
        ?><input type="hidden" name="<?= $p_ewordn; ?> " value="<?= $p_ewordv; ?>">
        <?php // русское слово
        $p_rwordn = 'p_rwordn' . $i;
        $p_rwordv = $testWordArr->words[$i]['rname'];
        ?><input type="hidden" name="<?= $p_rwordn; ?> " value="<?= $p_rwordv; ?>">
        <?php
    }
//    $p_id='p_id';
     ?>
    <input type="submit" value="English">
</form>
<form action="rushian-word.php" method="post">
    <input type="submit" value="Русский">
</form>
<?php
$db = null;
