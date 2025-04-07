<?php
/**
 * Exercise 4: Add Numbers Function
 * 
 * Task:
 * 1. Create a function called addNumbers() that takes two parameters and returns their sum.
 * 2. Create a second function called addNumbersTyped() that does the same but uses type hints
 *    (for PHP 7 and above).
 * 
 * Requirements:
 * - The addNumbers() function should handle numeric strings (e.g., "5") by converting them to numbers
 * - The function should handle invalid inputs gracefully, treating non-numeric values as 0
 * - The addNumbersTyped() function should use appropriate type hints and return type
 */

function addNumbers($a, $b) {
    // TODO: Implement this function to return the sum of two numbers
}

// Type-hinted version (PHP 7+)
function addNumbersTyped(/* TODO: Add appropriate type hints */) {
    // TODO: Implement this function with proper type hints
}

// Example test code:
// echo addNumbers(5, 10) . "\n";         // Output: 15
// echo addNumbers(3.5, 2.5) . "\n";      // Output: 6
// echo addNumbers("7", "3") . "\n";      // Output: 10 (converts strings to numbers)
// echo addNumbers("abc", 5) . "\n";      // Output: 5 (invalid input becomes 0)
// 
// echo addNumbersTyped(5, 10) . "\n";    // Output: 15
// echo addNumbersTyped(3.5, 2.5) . "\n"; // Output: 6 