<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/TitleCaseGenerator.php';

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views')
    );


    $app->get('/', function() use ($app) {
        $input_key = 'phrase';
        $title_cased_phrase = "Your title here";
        if (array_key_exists($input_key, $_GET)) {
            $my_TitleCaseGenerator = new TitleCaseGenerator;
            $title_cased_phrase = $my_TitleCaseGenerator->makeTitleCase($_GET['phrase']);
        }
        return $app['twig']->render(
            'title_cased.html.twig',
            array('result' => $title_cased_phrase)
        );
    });


    return $app;
?>
