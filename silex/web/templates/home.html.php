<?php $view->extend('layout.html.php') ?>
<div class="jumbotron">
    <h1>Plumbify</h1>
    <p>Everyone has a Plumbus in their home.
        This blog shows how they are made.</p>
    <p><a href="/blog" class="btn btn-primary btn-lg" role="button">Read Blog &raquo;</a></p>
</div>
<div id="home-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home-carousel" data-slide-to="1"></li>
        <li data-target="#home-carousel" data-slide-to="2"></li>
    </ol>
    <!--TODO add images-->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="img-responsive" src="img/img1.jpg" alt="edit">
        </div>
        <div class="item">
            <img class="img-responsive" src="img/img2.jpg" alt="edit">
        </div>
        <div class="item">
            <img class="img-responsive" src="img/img3.jpg" alt="edit">
        </div>
    </div>

    <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

