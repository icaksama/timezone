<?php
// Start url validator instanly when included.
URLValidator::start();

class URLValidator {

    public static $fullUrl = "";
    public static $scheme = "";
    public static $user = "";
    public static $pass = "";
    public static $host = "";
    public static $port = "";
    public static $path = "";
    public static $query = "";
    public static $canonical = "";


    public static function start() {
        URLValidator::$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        URLValidator::$scheme = 'https://';
        URLValidator::$user = parse_url(URLValidator::$fullUrl, PHP_URL_USER);
        URLValidator::$pass = parse_url(URLValidator::$fullUrl, PHP_URL_PASS);
        URLValidator::$host = parse_url(URLValidator::$fullUrl, PHP_URL_HOST);
        URLValidator::$port = parse_url(URLValidator::$fullUrl, PHP_URL_PORT);
        URLValidator::$path = empty(parse_url(URLValidator::$fullUrl, PHP_URL_PATH)) || parse_url(URLValidator::$fullUrl, PHP_URL_PATH) == '/' ? '' : parse_url(URLValidator::$fullUrl, PHP_URL_PATH);
        URLValidator::$query = empty(parse_url(URLValidator::$fullUrl, PHP_URL_QUERY)) ? '' : '?'.parse_url(URLValidator::$fullUrl, PHP_URL_QUERY);
        URLValidator::$canonical = URLValidator::$scheme.URLValidator::$host.URLValidator::$path;
    }

    public static function get_url_paths() {
        $path = preg_replace('/(\/+)/','/', URLValidator::$path);
        if (!empty($path)) {
            return explode("/", trim($path, "/"));
        }
        return array();
    }
}
?>