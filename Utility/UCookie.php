<?php
/**
 * Class to access to $_COOKIE superglobal array, You must use this class and not directly the _COOKIE array
 */
class UCookie
{
    /**
     * Check if specific id in the COOKIE is set
     * @param string $id
     * @return bool
     */
    public static function isSet($id){
        if (isset($_COOKIE[$id])){
            return true;
        } else{
            return false;
        }
    }
}