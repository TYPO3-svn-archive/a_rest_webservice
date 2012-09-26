<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, and `Slim::delete`
 * is an anonymous function.
 */

// GET route
$app->get('/login/:name/:password', function ($name, $password) {

    if ($_SERVER['HTTPS'] != "on") { 
       $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
       header("Location: $url"); 
       exit; 
    }  

    if($name == "jugend" && $password="jugend"){

       $domain = '127.0.0.1';

       $url = 'http://'.$domain.'/?type=99&tx_arestwebservice_pi1[action]=rest&tx_arestwebservice_pi1[username]='.$name.'&tx_arestwebservice_pi1[password]='.$password;
       $ch = curl_init();
       curl_setopt ($ch, CURLOPT_URL,$url);
       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
       $contents = curl_exec($ch);
       curl_close($ch);

       // display file
       echo $contents;
    } else {
      throw new Exception("Error on login!"); 
    }
});

// POST route
$app->post('/post', function () {
    echo 'This is a POST route';
});

// PUT route
$app->put('/put', function () {
    echo 'This is a PUT route';
});

// DELETE route
$app->delete('/delete', function () {
    echo 'This is a DELETE route';
});

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
