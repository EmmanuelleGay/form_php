<?php

/**
 * FormatUtil
 * Format-related convenience methods.
 */
class FormatUtil{    
    /**
     * recursively sanitize every member of an array or a non-array variable that is passed by reference. 

     * @param  mixed $dirty reference array or variable to sanitize
     * @param  int $filter filter to use with filter_var
     * @return void 
     */
    public static function sanitize(&$dirty, int $filter=FILTER_SANITIZE_STRING){
        if (!is_array($dirty)){ 
            // If dirty argument isn't an array, change it directly
            $dirty = filter_var(trim($dirty), $filter); 
        } else {
            // Walk through each member of the array, inheriting $filter for use inside anonymous function
            array_walk_recursive($dirty, function (&$value) use ($filter)  { 
                $value = filter_var(trim($value), $filter); // changes original array ($value passed by reference)
            });
        }
    }

    
    /**
     * dump
     * generates an html representation of a variable
     * 
     * @param  mixed $var to display in html
     * @return void
     */
    public static function dump($var){
        echo "<pre>".htmlentities(print_r($var, true))."</pre>";
    }
}

?>