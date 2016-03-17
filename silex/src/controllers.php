<?php
use Symfony\Component\HttpFoundation\Request;

/**
 * @var $app Silex\Application
 * @var $db_connection Doctrine\DBAL\Connection
 * @var $template Symfony\Component\Form\Extension\Templating\Delegating Engine
 * @var $user Silex\Provider\SessionServiceProvider
 * @var $user Silex\Provider\SessionServiceProvider
 */

$db_connection = $app['db'];
$template = $app['templating'];
$session = $app['session'];
$user = $session->get('user');

$app->get('/', function () use ($app, $user) {
    return $app->redirect('/home');
});

$app->get('/home', function () use ($template, $user, $session) {

    return $template->render(
        'home.html.php',
        [
            'active' => 'home',
            'user' => $user['username'],
            'session' => $session
        ]
    );
});

$app->get('/blog', function () use ($template, $db_connection, $user, $session) {
    $content = $db_connection->fetchAll(
        'SELECT * from blog_post ORDER BY id DESC'
    );
    return $template->render(
        'blog.html.php',
        [
            'active' => 'blog',
            'user' => $user['username'],
            'session' => $session,
            'content' => $content
        ]
    );
});

$app->get('/post/{postId}', function ($postId) use ($template, $db_connection, $user, $app, $session) {
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
                'session' => $session,
                'content' => $content
            ]
        );
    }
});

//TODO add server exception, when no user is logged in
$app->match('/new', function (Request $request) use ($template, $db_connection, $user, $app, $session) {
    if ($user) {
        if ($request->isMethod('GET')) {
            return $template->render(
                'new.html.php',
                [
                    'active' => 'new',
                    'user' => $user['username'],
                    'session' => $session,
                    'title' => '',
                    'text' => '',
                    'gtcAccepted' => false
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
                $app['session']->getFlashBag()->add('alert-danger', 'Please fill out all fields!');
            } else {
                $app['session']->getFlashBag()->add('alert-danger', 'Please accept our terms and conditions!');
            }
            return $template->render(
                'new.html.php',
                [
                    'active' => 'new',
                    'user' => $user['username'],
                    'session' => $session,
                    'title' => $title,
                    'text' => $text,
                    'gtcAccepted' => $gtcAccepted
                ]
            );
        }
    } else {
        $app->abort(401);
    }
});

//TODO add login error
$app->match('/login', function (Request $request) use ($app, $db_connection, $session) {
    $referer = $request->headers->get('referer');
    $username = $request->get('loginUsername');
    $password = $request->get('loginPassword');
    $dbPassword = $db_connection->fetchAssoc(
        "SELECT password FROM users WHERE username = '$username'"
    )['password'];
    if ($username and $password === $dbPassword) {
        $session->set('user', array('username' => $username));
        $app['session']->getFlashBag()->add('alert-success', 'You are successfully logged in');
        return $app->redirect($referer);
    } else {
        $app['session']->getFlashBag()->add('alert-danger', 'The user name or password is incorrect');
        return $app->redirect($referer);
    }
});

$app->match('/logout', function () use ($app, $session) {
    $session->remove('user');
    return $app->redirect('/home');
});