<?php
declare(strict_types = 1);
use Oleg\LearningEnglish\EnglishWord;

ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

require ("vendor/autoload.php");

$leW = new EnglishWord(1,"why");
echo $leW->name."<br>";
echo $leW."<br>";
print_r("id=".$leW->id."  name=".$leW->name."\n");
echo "Hello, world!<br>\n";