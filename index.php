<?php
declare(strict_types = 1);
namespace Oleg\LearningEnglish;
ini_set('display_errors',1);
error_reporting(E_ALL ^E_NOTICE);

$leW=new EnglishWord(1,"why");
echo $leW->name."<br>";
echo $leW."<br>";
