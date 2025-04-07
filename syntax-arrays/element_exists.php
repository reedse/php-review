<?php
/**
 * Task: Create a function to check if a specific element exists in an array
 * 
 * Your implementation should:
 * 1. Take an array and an element to search for as input
 * 2. Return true if the element exists in the array, false otherwise
 * 3. Perform an exact comparison (===) for element matching
 * 
 * Example input: 
 *   $numbers = [5, 10, 15, 20, 25]
 *   Element to find: 15
 * Expected output: true
 */

function elementExists($arr, $element) {
    // Your code here
    foreach ($arr as $item) {
        if ($item === $element) { //identical comparsion (same type, same value)
            return true;
        }
    }
    return false;
}

// Test cases:
$numbers = [5, 10, 15, 20, 25];
echo "Array: " . implode(", ", $numbers) . "\n";

echo "Is 15 in the array? ";
var_dump(elementExists($numbers, 15)); // Should output: bool(true)

echo "Is 30 in the array? ";
var_dump(elementExists($numbers, 30)); // Should output: bool(false)

// Test with mixed array
$mixed = [1, "apple", true, 3.14, null];
echo "\nMixed array contains 'apple'? ";
var_dump(elementExists($mixed, "apple")); // Should output: bool(true)

echo "Mixed array contains false? ";
var_dump(elementExists($mixed, false)); // Should output: bool(false)

// Optional challenge: Implement this without using the in_array() function 