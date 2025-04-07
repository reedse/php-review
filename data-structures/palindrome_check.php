<?php
/**
 * Task: Create a function to check if a string is a palindrome
 * 
 * Your implementation should:
 * 1. Take a string as input
 * 2. Return true if the string is a palindrome, false otherwise
 * 3. Ignore case sensitivity
 * 4. Consider only alphanumeric characters (ignore spaces, punctuation, etc.)
 * 
 * A palindrome reads the same forward and backward.
 * 
 * Example input: "A man, a plan, a canal: Panama"
 * Expected output: true (because "amanaplanacanalpanama" is a palindrome)
 * 
 * Example input: "race a car"
 * Expected output: false (because "raceacar" is not a palindrome)
 */

function isPalindrome($s) {
    // Your code here
}

// Test cases:
$test1 = "A man, a plan, a canal: Panama";
echo "String: \"$test1\"\n";
echo "Is palindrome: " . (isPalindrome($test1) ? "true" : "false") . "\n\n";

$test2 = "race a car";
echo "String: \"$test2\"\n";
echo "Is palindrome: " . (isPalindrome($test2) ? "true" : "false") . "\n\n";

$test3 = "Was it a car or a cat I saw?";
echo "String: \"$test3\"\n";
echo "Is palindrome: " . (isPalindrome($test3) ? "true" : "false") . "\n\n";

$test4 = "No 'x' in Nixon";
echo "String: \"$test4\"\n";
echo "Is palindrome: " . (isPalindrome($test4) ? "true" : "false") . "\n\n";

// Challenge: Try to solve it without converting the entire string to a new string 