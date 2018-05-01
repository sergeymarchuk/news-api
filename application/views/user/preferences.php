<form action="">
    <?php foreach (application\config\Config::get('country_list') as $key => $value) {?>
    <input type="radio" name="country" value="<?= $value ?>"> <?= $key ?> <br>
    <?php }?>
</form>
