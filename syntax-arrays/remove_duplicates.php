<?php
/**
 * Task: Create a function to remove duplicate elements from an array
 * 
 * Your implementation should:
 * 1. Take an array as input
 * 2. Return a new array with duplicate values removed
 * 3. Preserve the original order of elements (first occurrence)
 * 
 * Example input: [1, 2, 3, 2, 4, 3, 5, 1, 6]
 * Expected output: [1, 2, 3, 4, 5, 6]
 */

function removeDuplicates($arr) {
    // Your code here
    $new_array = [];

    //iterate through array
    foreach($arr as $value) {
        if (!in_array($value, $new_array)) { //O(1) with hash lookup
            $new_array[] = $value; //if not duplicate, then add to new array
        }
    }
    return $new_array;
}

// Test cases:
$array = [1, 2, 3, 2, 4, 3, 5, 1, 6];
echo "Original array: " . implode(", ", $array) . "\n";
echo "After duplicate removal: " . implode(", ", removeDuplicates($array)) . "\n";

// Try with strings
$names = ["John", "Mary", "John", "Bob", "Mary", "Alice"];
echo "Original names: " . implode(", ", $names) . "\n";
echo "Unique names: " . implode(", ", removeDuplicates($names)) . "\n";

// Optional challenge: Can you implement this without using array_unique()? 