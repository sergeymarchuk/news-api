<div class="jumbotron">
    <div class="container">
        <h1 class="display-5">My preferences</h1>
        <h4>Name 1</h4>
        <div>Country: Country1, Country2</div>
        <div>Sources: Source1, Source2</div>
    </div>
</div>

<form action="">
    <div class="form-group">
        <label>Enter name</label>
        <input type="text" class="form-control" placeholder="Preference name">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Choose country</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <?php foreach (application\config\Config::get('country_list') as $key => $value) {?>
                    <option name="country" value="<?= $value ?>"><?= $key ?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label >Choose sources</label>
            <select multiple class="form-control">
                <<?php foreach (application\config\Config::get('sources_list') as $key => $value) {?>
                    <option name="country" value="<?= $value ?>"><?= $key ?></option>
                <?php }?>
            </select>
        </div>
    </div>
</form>
