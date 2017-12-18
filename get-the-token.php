<?php
use Schmiddim\FbToken\GetPermanentToken;
require __DIR__ . '/vendor/autoload.php';
require_once  'config.php';

#echo "https://graph.facebook.com/v2.10/oauth/access_token?grant_type=fb_exchange_token&client_id=$app_id&client_secret=$appSecret&fb_exchange_token=$shortLivedToken";


$pageId = FACEBOOK['pageId'];
$appId = FACEBOOK['appId'];
$appSecret = FACEBOOK['appSecret'];
$gpt = new GetPermanentToken($pageId, $appId, $appSecret);


$shortLivedToken=$argv[1];
echo $gpt->getPermanentToken($shortLivedToken) .PHP_EOL;