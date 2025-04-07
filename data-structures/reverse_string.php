<?php
/**
 * Task: Create a function that reverses a string without using built-in reverse functions
 * 
 * Your implementation should:
 * 1. Take a string as input
 * 2. Return the reversed string
 * 3. Not use built-in functions like strrev(), array_reverse(), etc.
 * 
 * Example input: "hello world"
 * Expected output: "dlrow olleh"
 */

function reverseString($str) {
    // Your code here

    //1. iterate over string
    //2. swap chars from start/end of string
    //3. concate char to string

    $new = "";
    for ($i=0; $i<strlen($str); $i++) {
        $new = $str[$i] . $new;
    }

    return $new;

}

// Test cases:
$test1 = "hello world";
echo "Original: $test1\n";
echo "Reversed: " . reverseString($test1) . "\n\n";

$test2 = "PHP is awesome";
echo "Original: $test2\n";
echo "Reversed: " . reverseString($test2) . "\n\n";

$test3 = "12345";
echo "Original: $test3\n";
echo "Reversed: " . reverseString($test3) . "\n\n";

// Challenge: Try implementing a second solution using a different approach 