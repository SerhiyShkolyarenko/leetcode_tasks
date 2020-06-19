<?php

$testData = [
 ['input' => "172.16.254.1", 'output' => 'IPv4'],
 ['input' => "256.256.256.256", 'output' => 'Neither'], // 256 is out of range
 ['input' => "0172.16.254.1", 'output' => 'Neither'], // leading zero not allowed
 ['input' => "172.0.254.1", 'output' => 'IPv4'],
 ['input' => "172.16.254.0", 'output' => 'IPv4'],
 ['input' => "172.16.254.0.", 'output' => 'Neither'], //extra dot
 ['input' => "172.16.254:0", 'output' => 'Neither'], // : is forbidden
 ['input' => "1e2.16.254.0", 'output' => 'Neither'], // letter in address
 ['input' => "2001:0db8:85a3:0:0:8A2E:0370:7334", 'output' => 'IPv6'],
 ['input' => "2001:0db8:85a3:0000:00:8A2E:0370:7334", 'output' => 'IPv6'],
 ['input' => "2001:0db8:85a3:0000:00:8A2E:0370:7334", 'output' => 'IPv6'],
 ['input' => "22001:0db8:85a3:0000:00:8A2E:0370:7334", 'output' => 'Neither'], // extra digit
 ['input' => "2200:0hb8:85a3:0000:00:8A2E:0370:7334", 'output' => 'Neither'], // 'h' is forbidden
 ['input' => "2200:0hb8:85a3:0:0.8A2E:0370:7334", 'output' => 'Neither'], // . is forbidden
];

require_once('Solution.php');
$solution = new Solution();

$counter = 0;
foreach($testData as $test) {
    if ($test['output'] === $solution->validIPAddress($test['input'])) {
        $counter++;
    } else {
        die(sprintf('Test failed for "%s". Expected result is "%s"', $test['input'], $test['output']));
    }
}

echo 'Success! ' . $counter . ' tests passed.' . PHP_EOL;