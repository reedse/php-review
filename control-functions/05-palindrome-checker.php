<?php
/**
 * Exercise 5: Palindrome Checker
 * 
 * Task:
 * Implement two different versions of a function to check if a string is a palindrome.
 * 
 * A palindrome is a word, phrase, number, or other sequence that reads the same forward and backward,
 * ignoring spaces, punctuation, and capitalization.
 * 
 * Requirements:
 * 1. First, implement isPalindrome() using PHP's built-in string functions (hint: strrev)
 * 2. Then, implement isPalindromeManual() without using strrev(), instead using a manual algorithm
 * 3. Both functions should:
 *    - Remove all non-alphanumeric characters
 *    - Ignore case (convert to lowercase)
 *    - Return true for palindromes, false otherwise
 */

function isPalindrome($string) {
    // TODO: Implement this function using strrev() to check if $string is a palindrome
}

function isPalindromeManual($string) {
    // TODO: Implement this function WITHOUT using strrev() to check if $string is a palindrome
}

// Example test code:
// $testStrings = [
//     "racecar",
//     "A man, a plan, a canal: Panama",
//     "hello world",
//     "Madam, I'm Adam",
//     "12321"
// ];
// 
// foreach ($testStrings as $str) {
//     echo "\"$str\" is " . (isPalindrome($str) ? "" : "not ") . "a palindrome.\n";
//     echo "Manual check: \"$str\" is " . (isPalindromeManual($str) ? "" : "not ") . "a palindrome.\n\n";
// } 