<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 *
 */

$slots = $view['slots'];
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Plumbify</title>

    <!-- Bootstrap -->
    <link href="/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="/templates/custom.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">Plumbify</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?= $active == 'home' ? 'class="active"' : '' ?>><a href="/home"><span
                            class="glyphicon glyphicon-home"></span> Home</a></li>
                <li <?= $active == 'blog' ? 'class="active"' : '' ?>><a href="/blog"><span
                            class="glyphicon glyphicon-comment"></span> Blog</a></li>
                <?php if ($user) : ?>
                    <li <?= $active == 'new' ? 'class="active"' : '' ?>><a href="/new"><span
                                class="glyphicon glyphicon-pencil"></span> New Blog Post</a></li>
                <?php endif; ?>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <b>
                            <!--TODO debug-->
                            <? if ($user == null) : ?>
                                <?= $user ?>
                            <? endif; ?>
                            <? if ($user != null) : ?>
                                <?= "Login" ?>
                            <? endif; ?>
                        </b>
                        <span
                            class="caret">
                        </span>
                    </a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <!--TODO if else-->
                                    <?php if ($user == null) : ?>
                                    <form class="form" role="form" method="post" action="/login"
                                          accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                            <input type="text" class="form-control" id="loginUsername"
                                                   name="loginUsername"
                                                   placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="loginPassword">Password</label>
                                            <input type="password" class="form-control" id="loginPassword"
                                                   name="loginPassword"
                                                   placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                                <?php endif; ?>
                                <?php if ($user != null) : ?>
                                    <div class="form-group">
                                        <!--TODO edit to post method-->
                                        <a href="/logout">
                                            <button type="button" class="btn btn-primary btn-block"
                                                    formmethod="post" formaction="/logout"><span
                                                    class="glyphicon glyphicon-log-out"></span> Log out
                                            </button>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container theme-showcase" role="main">
    <?php $slots->output('_content'); ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"><span class="glyphicon glyphicon-copyright-mark"></span> <? echo date("Y"); ?> Christof
            Weinreich</p>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/vendor/jquery/dist/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>