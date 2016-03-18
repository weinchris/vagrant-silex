<?php $view->extend('layout.html.php') ?>

<!-- Blog Post -->
<!-- Title -->
<h1><?= $content['title'] ?></h1>
<!-- Author -->
<p class="lead">
    by <?= $content['author'] ?>
</p>
<hr>
<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on <?= $content['created_at'] ?></p>
<hr>
<!-- Post Content -->
<?= $content['text'] ?>
<hr>
<!-- Pager -->
<ul class="pager">
    <li class="previous">
        <a href="/blog">back</a>
    </li>
</ul>
