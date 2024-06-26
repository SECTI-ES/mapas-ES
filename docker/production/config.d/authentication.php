<?php
// creating base url
$prot_part = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https://' : 'http://';
//added @ for HTTP_HOST undefined in Tests
$host_part = @$_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
if(substr($host_part,-1) !== '/') $host_part .= '/';
$_APP_BASE_URL = $prot_part . $host_part;

return [
    'auth.provider' => '\MultipleLocalAuth\Provider',
    'auth.config' => array(
        
        'urlSupportEmail' => 'mailto:suportemapacultural@secult.es.gov.br',

        'salt' => env('AUTH_SALT', null),
        'timeout' => '24 hours',

        'google-recaptcha-secret' => env('GOOGLE_RECAPTCHA_SECRET', false),
        'google-recaptcha-sitekey' => env('GOOGLE_RECAPTCHA_SITEKEY', false),
        'statusCreateAgent' => env('STATUS_CREATE_AGENT', 0),
        // 'strategies' => [
        //    'Facebook' => array(
        //         'visible' => env('AUTH_FACEBOOK_VISIBLE', false),
        //         'app_id' => env('AUTH_FACEBOOK_APP_ID', null),
        //         'app_secret' => env('AUTH_FACEBOOK_APP_SECRET', null),
        //         'scope' => env('AUTH_FACEBOOK_SCOPE', 'email'),
        //    ),

        //    'LinkedIn' => array(
        //         'visible' => env('AUTH_LINKEDIN_VISIBLE', false),
        //         'api_key' => env('AUTH_LINKEDIN_API_KEY', null),
        //         'secret_key' => env('AUTH_LINKEDIN_SECRET_KEY', null),
        //         'redirect_uri' => $_APP_BASE_URL . 'autenticacao/linkedin/oauth2callback',
        //         'scope' => env('AUTH_LINKEDIN_SCOPE', 'r_emailaddress')
        //     ),
        //     'Google' => array(
        //         'visible' => env('AUTH_GOOGLE_VISIBLE', false),
        //         'client_id' => env('AUTH_GOOGLE_CLIENT_ID', null),
        //         'client_secret' => env('AUTH_GOOGLE_CLIENT_SECRET', null),
        //         'redirect_uri' => $_APP_BASE_URL . 'autenticacao/google/oauth2callback',
        //         'scope' => env('AUTH_GOOGLE_SCOPE', 'email profile'),
        //     ),
        //     'Twitter' => array(
        //         'visible' => env('AUTH_TWITTER_VISIBLE', false),
        //         'app_id' => env('AUTH_TWITTER_APP_ID', null),
        //         'app_secret' => env('AUTH_TWITTER_APP_SECRET', null),
        //     ),

        // ]
    )
];
