<?php
/**
 * Task: Create a function to find a missing number in an array
 * 
 * Your implementation should:
 * 1. Take an array of distinct numbers from 0 to n (with one number missing) as input
 * 2. Return the missing number
 * 3. The array is not necessarily sorted
 * 
 * Example input: [3, 0, 1]
 * Expected output: 2 (the number 2 is missing from the sequence 0,1,2,3)
 */

function findMissingNumber($nums) {
    // Your code here
}

// Test cases:
$test1 = [3, 0, 1];
echo "Array: " . implode(", ", $test1) . "\n";
echo "Missing number: " . findMissingNumber($test1) . "\n\n"; // Should output: 2

$test2 = [9, 6, 4, 2, 3, 5, 7, 0, 1];
echo "Array: " . implode(", ", $test2) . "\n";
echo "Missing number: " . findMissingNumber($test2) . "\n\n"; // Should output: 8

$test3 = [0, 1];
echo "Array: " . implode(", ", $test3) . "\n";
echo "Missing number: " . findMissingNumber($test3) . "\n\n"; // Should output: 2

// Challenge: Can you solve it with O(n) time complexity and O(1) extra space? 