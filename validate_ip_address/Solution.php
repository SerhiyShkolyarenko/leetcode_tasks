<?php

class Solution
{
    /**
     * @param String $IP
     * @return String
     */
    public function validIPAddress($IP) {
        if ($this->isValidV4($IP)) {
            return 'IPv4';
        } elseif ($this->isValidV6($IP)) {
            return 'IPv6';
        }
        return 'Neither';
    }
    
    private function isValidV6($IP)
    {
        $parts = explode(':', $IP);
        if (count($parts) !== 8) {
            return false;
        }
        foreach ($parts as $number) {
            $number = strtolower($number);
            if (!preg_match('/^[0-9a-f]{1,4}$/', $number)) {
                return false;
            }
        }
        return true;
    }
    
    private function isValidV4($IP)
    {
        $parts = explode('.', $IP);
        if (count($parts) !== 4) {
            return false;
        }
        foreach ($parts as $number) {
            if (!$this->validateV4Item($number)) {
                return false;
            }
        }
        return true;
    }
    
    private function validateV4Item($value)
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