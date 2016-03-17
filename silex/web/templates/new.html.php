<?php $view->extend('layout.html.php') ?>

<h2>New Blogpost</h2>
<div class="well"/>
<?php if ($inputError) : ?>
    <div class="alert alert-danger" role="alert">
        Please fill out all fields!
    </div>
<?php endif; ?>
<?php if ($gtcError) : ?>
    <div class="alert alert-danger" role="alert">
        Please accept our terms and conditions!
    </div>
<?php endif; ?>
<form method="post" action="/new">
    <div class="form-group">
        <label for="blogtitle">Titel</label>
        <input type="text" class="form-control" id="blogtitle" name="title">
    </div>
    <div class="form-group">
        <label for="blogtext">Text</label>
        <textarea class="form-control" rows="10" name="text"></textarea>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="gtc"> Accept terms and conditions</label>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
