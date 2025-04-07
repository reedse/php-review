<?php
/**
 * Task: Create a function to find the largest element in an array of numbers
 * 
 * Your implementation here should:
 * 1. Handle empty arrays (return null)
 * 2. Find the maximum value in a given array
 * 
 * Example input: [3, 8, 2, 15, 7, 10]
 * Expected output: 15
 */

function findLargest($arr) {
    // Your code here
    $max = null;
    foreach($arr as $item) { //iterate through array and compare
        if ($item > $max) { //update max if item is bigger
            $max = $item;
        }
    }
    return $max;
}

// Test cases:
$numbers = [3, 8, 2, 15, 7, 10];
echo "Largest in [3, 8, 2, 15, 7, 10]: " . findLargest($numbers) . "\n";

// Try with empty array:
$empty = [];
var_dump(findLargest($empty));

// Try with single element array:
$single = [42];
echo "Largest in [42]: " . findLargest($single) . "\n";

// Optional challenge: Can you implement this without using the built-in max() function? 