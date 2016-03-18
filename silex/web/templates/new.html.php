<?php $view->extend('layout.html.php') ?>

<h2>New Blogpost</h2>
<div class="well">
<form method="post" action="/new">
    <div class="form-group">
        <label>Titel</label>
        <input type="text" class="form-control" id="blogtitle" name="title" value="<?= $title ?>">
    </div>
    <div class="form-group">
        <label>Text</label>
        <textarea class="form-control" rows="10" name="text"><?= $text ?></textarea>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"
                   name="gtc"
                <?php if ($gtcAccepted) {
                    echo 'checked';
                } ?>>
            Accept terms and conditions
        </label>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
