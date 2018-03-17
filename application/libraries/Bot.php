<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class bot
{   
    function __construct()
	{
		$this->ci =& get_instance();
        date_default_timezone_set('Africa/Lagos');
        // session_start();
        require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
	}

    function longdate(){
        return strtotime(date("Y-m-d H:i:s"));
    }

    function generate($max = 32) {
        $max = $max - 1;
        $baseStr = time() . rand(0, 1000000) . rand(0, 1000000);
        $md5Hash = md5($baseStr);
        if($max < 32){
            $md5Hash = substr($md5Hash, 0, $max);
        }
        return rand(1,9).$md5Hash;
    }
 
    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
        $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
        return $connection;
    }
}