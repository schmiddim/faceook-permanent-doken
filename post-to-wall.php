<?php
/**
 * User: ms
 * Date: 02.06.15
 * Time: 17:11
 */

require_once(__DIR__ . '/vendor/autoload.php');
require_once 'config.php';

use Facebook\FacebookSession, Facebook\FacebookRequest;

$pageId = FACEBOOK['pageId'];
$appId = FACEBOOK['appId'];
$appSecret = FACEBOOK['appSecret'];
$session = FACEBOOK['sessionToken'];


$message = 'This is Just a Test';
$url = 'www.google.de';
$image = 'http://www.lebensmittelwarnung.de/bvl-lmw-de/app/attachment/397d099a-cb4b-441b-8c11-4ebb960cd121/Foto.jpg';

if ($message == "" OR $url == "" OR $image == "") {
    echo "incomplete";
    return;
}

FacebookSession::setDefaultApplication($appId, $appSecret);
$session = new FacebookSession($session);

if ($session) {
    try {
        $response = (new FacebookRequest(
            $session, 'POST', '/' . $pageId . '/feed', array(
                'message' => $message,
                'link' => $url,
                'picture' => $image
            )
        ))->execute()->getGraphObject();
        echo "Posted with id: " . $response->getProperty('id');
    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    }
} else {
    echo "No Session available!";
}
