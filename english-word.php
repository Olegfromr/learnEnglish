English-word
<h1>Что бы это значило?</h1>
<?php $error = $words = 0; ?>
<form action="english-word.php" method="post">
<?php
$prov=isset($_POST['prov']);
?>
<input type="hidden" name="prov" value="1">
<?php
for ($i=0; $i<5; $i++){
    $words++;
    $p_ewordn='p_ewordn'.$i . '_';
    $$p_ewordn= $_POST[$p_ewordn];
    $p_rwordn='p_rwordn'.$i . '_';
    $$p_rwordn= $_POST[$p_rwordn];
    $p_otvet='p_otvet'.$i.'_';
    ?>
    <p><?= $$p_ewordn ?>
    <input type="hidden" name="<?= $p_ewordn ?>" value="<?= $$p_ewordn ?>">
    <input type="hidden" name="<?= $p_rwordn ?>" value="<?= $$p_rwordn ?>">
    <?php
    if (empty($prov)){
        ?><input type="text" name="<?= $p_otvet ?>"><?php
    }else{
        $$p_otvet=$_POST[$p_otvet];
        if ($$p_otvet == $$p_rwordn){
            ?><input type="hidden" name="<?= $p_otvet ?>" value="<?= $$p_otvet ?>"><?php
            echo $$p_otvet . ' Верно!';
        }else{
            $error++;
            ?><input type="text" name="<?= $p_otvet ?>" value="<?= $$p_otvet ?>"> Не правильно!<?php
        }
    }
        ?>

    </p>
<?php
} //for
?>
<input type="submit" value="проверить">
</form>
<?php
if (!empty($prov) && $error==0) {
    ?><h2>Тест пройден без ошибок! Молодец!</h2> <?php
}
//var_dump($_POST);
