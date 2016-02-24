<?php
class Instagram {
    public static $result;
    public static $display_size = 'standard_resolution'; // you can choose between "low_resolution", "thumbnail" and "standard_resolution"
    public static $access_token;
    public static $count = 30;
    public static function fetch($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function __construct($Token=null){
        if(!empty($Token)){
            self::$access_token = $Token;

            // Remove from memory -- not sure if really needed.
            $Token = null;
            unset($Token);
        }
        self::$result = json_decode(self::fetch("https://api.instagram.com/v1/users/self/media/recent?" . "&count=" . self::$count . "&access_token=" . self::$access_token), true);
    }
}
?>