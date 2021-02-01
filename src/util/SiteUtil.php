<?php 


/**
 * SiteUtil
 * Site-related convenience methods
 */
class SiteUtil{    
    /**
     * require
     * includes a file
     * @param  String $relativePath relative path of file
     * @param  bool $once require once?
     * @return void
     */
    public static function require(String $relativePath="", bool $once=true){
        $absolutePath =  self::toAbsolute("src/$relativePath");
        $once?require_once($absolutePath):require($absolutePath);
    }

     
    /**
     * toAbsolute
     * Turns a relative file path parameter into an absolute path (from project root);
     * @param  mixed $relativePath
     * @return String absolute path
     */
    public static function toAbsolute(String $relativePath): String{
        return dirname( __FILE__ ) . "/../../$relativePath";
    }

    /**
     * url
     * Transforms a relative (to original calling script) URL into an absolute one
     * @param  String $relative URL
     * @return String absolute url
     */
    public static function url(String $relativeUrl=""): String{
        return dirname($_SERVER["SCRIPT_NAME"]) . "/" . $relativeUrl;
    }
    
    /**
     * getUrlParameters
     * extracts an URL of the form /my/pretty/url from $_SERVER, and returns an array of slugs
     * 
     * @return Array of slugs, ie. ['my', 'pretty', 'url']
     */
    public static function getUrlParameters(): Array{
        $parameterString =  isset($_SERVER['PATH_INFO']) ?
            // If not using an apache server (ie. VSCode PHP Server), need to use PATH_INFO and remove leading slash
            ltrim($_SERVER['PATH_INFO'],'/') :
            // Otherwise, use a QUERY_STRING passed on by an .htaccess rewrite rule
            $_SERVER['QUERY_STRING'];

        return explode('/',FormatUtil::sanitize($parameterString));
    }
}