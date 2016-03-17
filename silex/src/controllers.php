<?php
use Symfony\Component\HttpFoundation\Request;

/**
 * @var $app Silex\Application
 * @var $db_connection Doctrine\DBAL\Connection
 * @var $template Symfony\Component\Form\Extension\Templating\Delegating Engine
 * @var $user Silex\Provider\SessionServiceProvider
 */

$db_connection = $app['db'];
$template = $app['templating'];
$user = $app['session']->get('user');

$app->get('/', function () use ($app, $user) {
    return $app->redirect('/home');
});

$app->get('/home', function () use ($template, $user) {

    return $template->render(
        'home.html.php',
        [
            'active' => 'home',
            'user' => $user['username']
        ]
    );
});

$app->get('/blog', function () use ($template, $db_connection, $user) {
    $content = $db_connection->fetchAll(
        'SELECT * from blog_post ORDER BY id DESC'
    );
    return $template->render(
        'blog.html.php',
        [
            'active' => 'blog',
            'user' => $user['username'],
            'content' => $content
        ]
    );
});

$app->get('/post/{postId}', function ($postId) use ($template, $db_connection, $user, $app) {
    $content = $db_connection->fetchAssoc(
        'SELECT * from blog_post WHERE id=?', array($postId)
    );
    if (!$content) {
        $app->abort(404);
    } else {
        return $template->render(
            'blogpost.html.php',
            [
                'active' => 'blog',
                'user' => $user['username'],
                'content' => $content,
            ]
        );
    }
});

//TODO add server exception, when no user is logged in
$app->match('/new', function (Request $request) use ($template, $db_connection, $user, $app) {
    if ($request->isMethod('GET')) {
        return $template->render(
            'new.html.php',
            [
                'active' => 'new',
                'user' => $user['username'],
                'inputError' => false,
                'gtcError' => false,
                'title' => '',
                'text' => ''
            ]
        );
    }
    if ($request->isMethod('POST')) {
        $title = $request->get('title');
        $text = $request->get('text');
        $gtcAccepted = $request->get('gtc');
        if ($title and $text and $gtcAccepted) {

            $created_at = date("c");

            $db_connection->insert(
                'blog_post',
                [
                    'title' => $title,
                    'text' => $text,
                    'author' => $user['username'],
                    'created_at' => $created_at
                ]
            );
            return $app->redirect('/blog');

        } elseif (!$title or !$text) {
            return $template->render(
                'new.html.php',
                [
                    'active' => 'new',
                    'user' => $user['username'],
                    'inputError' => true,
                    'gtcError' => false,
                    'title' => $title,
                    'text' => $text,
                ]
            );
        } else {
            return $template->render(
                'new.html.php',
                [
                    'active' => 'new',
                    'user' => $user['username'],
                    'inputError' => false,
                    'gtcError' => true,
                    'title' => $title,
                    'text' => $text,
                ]
            );
        }

    }
});

//TODO add login error
$app->match('/login', function (Request $request) use ($app, $db_connection) {
    $username = $request->get('loginUsername');
    $password = $request->get('loginPassword');
    $dbPassword = $db_connection->fetchAssoc(
        "SELECT password FROM users WHERE username = '$username'"
    )['password'];
    if ($username and $password === $dbPassword) {
        $app['session']->set('user', array('username' => $username));
        return $app->redirect('/new');
    } else {
        return $app->redirect('/home');
    }
});

$app->match('/logout', function () use ($app) {
    $app['session']->remove('user');
    return $app->redirect('/home');
});