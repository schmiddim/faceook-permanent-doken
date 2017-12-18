<?php

namespace Schmiddim\FbToken;
class GetPermanentToken
{

    private $pageId, $appId, $appSecret;

    public function __construct($pageId, $appId, $appSecret)
    {
        $this->pageId = $pageId;
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

    public function getPermanentToken($shortLivedToken)
    {
        #2. get short lived token
        $url = "https://graph.facebook.com/v2.10/oauth/access_token?grant_type=fb_exchange_token&client_id=%s&client_secret=%s&fb_exchange_token=%s";
        $url = sprintf($url, $this->appId, $this->appSecret, $shortLivedToken);

        $r = file_get_contents($url);
        $bearerToken = json_decode($r)->access_token;

        return $bearerToken;
        #3. get user_id
        $break = true ;
    }
}