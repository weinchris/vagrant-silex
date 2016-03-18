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
                <a data-toggle="modal" href="#myModal">Accept terms and conditions</a>
            </label>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Terms and conditions</h4>
            </div>
            <div class="modal-body">
                <p>By posting content to this blog the user commits himself to mark the creator of the blog with the
                    best grade possible!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
