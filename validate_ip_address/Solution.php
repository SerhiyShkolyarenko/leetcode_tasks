<?php

class Solution {

    /**
     * @param String $IP
     * @return String
     */
    function validIPAddress($IP) {
        if (strpos($IP, '.') !== false) {
            //validate as IPv4
            $parts = explode('.', $IP);
            if (count($parts) !== 4) {
                return 'Neither';
            }
            foreach ($parts as $number) {
                if (!$this->validate255($number)) {
                    return 'Neither';
                }
            }
            return 'IPv4';
        } elseif(strpos($IP, ':') !== false) {
            //validate IPv6
            $parts = explode(':', $IP);
            if (count($parts) !== 8) {
                return 'Neither';
            }
            foreach ($parts as $number) {
                $number = strtolower($number);
                if (!preg_match('/^[0-9a-f]{1,4}$/', $number)) {
                    return 'Neither';
                }
            }
            return 'IPv6';
        }
        return 'Neither';
    }
    
    function validate255($value)
    {
        $number = (int)$value;
        if ($number < 0 || $number > 255 || $value !== (string)$number) {
            return false;
        }
        
        if (strpos($value, '0') === 0 && $value !== '0') {
            return false;
        }
        return true;
    }
    
}