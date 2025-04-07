<?php
/**
 * Task: Create a function to determine if a string of parentheses is valid
 * 
 * Your implementation should:
 * 1. Take a string containing just the characters '(', ')', '{', '}', '[' and ']' as input
 * 2. Return true if the parentheses are valid, false otherwise
 * 3. Valid parentheses must be properly closed by the same type of bracket
 * 4. Valid parentheses must be closed in the correct order
 * 
 * Example input: "()[]{}"
 * Expected output: true
 * 
 * Example input: "([)]"
 * Expected output: false
 * 
 * Example input: "{[]}"
 * Expected output: true
 */

function isValidParentheses($s) {
    // Your code here
}

// Test cases:
$test1 = "()[]{}";
echo "Input: $test1\n";
echo "Is valid: " . (isValidParentheses($test1) ? "true" : "false") . "\n\n";

$test2 = "([)]";
echo "Input: $test2\n";
echo "Is valid: " . (isValidParentheses($test2) ? "true" : "false") . "\n\n";

$test3 = "{[]}";
echo "Input: $test3\n";
echo "Is valid: " . (isValidParentheses($test3) ? "true" : "false") . "\n\n";

$test4 = "";
echo "Input: empty string\n";
echo "Is valid: " . (isValidParentheses($test4) ? "true" : "false") . "\n\n";

$test5 = ")";
echo "Input: $test5\n";
echo "Is valid: " . (isValidParentheses($test5) ? "true" : "false") . "\n\n";

// Hint: Consider using a stack data structure for this problem 