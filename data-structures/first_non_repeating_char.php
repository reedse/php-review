<?php
/**
 * Task: Create a function to find the first non-repeating character in a string
 * 
 * Your implementation should:
 * 1. Take a string as input
 * 2. Return the index of the first character that appears only once in the string
 * 3. Return -1 if there is no non-repeating character
 * 
 * Example input: "leetcode"
 * Expected output: 0 (because 'l' is the first non-repeating character)
 * 
 * Example input: "loveleetcode"
 * Expected output: 2 (because 'v' is the first non-repeating character)
 * 
 * Example input: "aabb"
 * Expected output: -1 (because there are no non-repeating characters)
 */

function firstNonRepeatingChar($s) {
    // Your code here
}

// Test cases:
$test1 = "leetcode";
echo "String: $test1\n";
echo "First non-repeating character index: " . firstNonRepeatingChar($test1) . "\n";
echo "Character: " . ($test1[firstNonRepeatingChar($test1)] ?? "none") . "\n\n";

$test2 = "loveleetcode";
echo "String: $test2\n";
echo "First non-repeating character index: " . firstNonRepeatingChar($test2) . "\n";
echo "Character: " . ($test2[firstNonRepeatingChar($test2)] ?? "none") . "\n\n";

$test3 = "aabb";
echo "String: $test3\n";
echo "First non-repeating character index: " . firstNonRepeatingChar($test3) . "\n";
echo "Character: " . ($test3[firstNonRepeatingChar($test3)] ?? "none") . "\n\n";

// Hint: Consider using a hash table to count character occurrences 