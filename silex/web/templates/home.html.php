<?php $view->extend('layout.html.php') ?>
<div class="jumbotron">
    <h1>Plumbify</h1>
    <p>Everyone has a Plumbus in their home.
        This blog shows how they are made.</p>
    <p><a href="/blog" class="btn btn-primary btn-lg" role="button">Read Blog &raquo;</a></p>
</div>
<div id="home-carousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home-carousel" data-slide-to="1"></li>
        <li data-target="#home-carousel" data-slide-to="2"></li>
        <li data-target="#home-carousel" data-slide-to="3"></li>
        <li data-target="#home-carousel" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/eMJk4y9NGvE"></iframe>
            </div>
        </div>
        <div class="item">
            <img class="img-responsive" src="/img/Plumbus_1.png" alt="regular Plumbus at home">
        </div>
        <div class="item">
            <img class="img-responsive" src="/img/Plumbus_2.png" alt="the fleeb is rubbed">
        </div>
        <div class="item">
            <img class="img-responsive" src="/img/Plumbus_3.png" alt="blamphs rub against chumbles">
        </div>
        <div class="item">
            <img class="img-responsive" src="/img/Plumbus_4.png" alt="regular old Plumbus">
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
