<?php
/**
 * @var array
 * @var $view Symfony\Component\Form\ChoiceList\View\ChoiceView
 */
$view->extend('layout.html.php') ?>
<?php foreach ($content as $dbEntry) : ?>
    <div class="post-preview">
        <a href="/post/<?= $dbEntry['id'] ?>">
            <h2 class="post-title">
                <?= $dbEntry['title'] ?>
            </h2>
            <h3 class="post-subtitle">
                <?= substr($dbEntry['text'], 0, 60) ?>
            </h3>
        </a>
        <p class="post-meta">Posted by <?= $dbEntry['author'] ?> on <?= $dbEntry['created_at'] ?></p>
    </div>
    <hr>
<?php endforeach; ?>

