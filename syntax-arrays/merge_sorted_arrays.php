<?php
/**
 * Task: Create a function to merge two sorted arrays into a single sorted array
 * 
 * Your implementation should:
 * 1. Take two arrays as input, both already sorted in ascending order
 * 2. Return a new array containing all elements from both arrays, sorted in ascending order
 * 3. Work efficiently considering the inputs are already sorted
 * 
 * Example inputs: 
 *   $array1 = [1, 3, 5, 7]
 *   $array2 = [2, 4, 6, 8]
 * Expected output: [1, 2, 3, 4, 5, 6, 7, 8]
 */

function mergeSortedArrays($arr1, $arr2) {
    // Your code here
    $merged = [];
    $i = 0;
    $j = 0;


    //loop through both arrays, 
    //if arr1 ele < arr2 then add arr1 to merge, increment i
    //otherwise add arr2 ele to merge, increment j
    while ( $i < count($arr1) && $j < count($arr2) ) {
        if ( $arr1[$i] < $arr2[$j]) {
            $merged[] = $arr1[$i];
            $i++;
        } else {
            $merged[] = $arr2[$j];
            $j++;
        }
    }

    //add remaining elements for both
    while ($i < count($arr1)) {
        $merged[] = $arr1[$i];
        $i++;
    }

    while ($j < count($arr2)) {
        $merged[] = $arr2[$j];
        $j++;
    }

    return $merged;
}

// Test cases:
$array1 = [1, 3, 5, 7];
$array2 = [2, 4, 6, 8];
echo "Array 1: " . implode(", ", $array1) . "\n";
echo "Array 2: " . implode(", ", $array2) . "\n";
echo "Merged: " . implode(", ", mergeSortedArrays($array1, $array2)) . "\n";

// Test with different length arrays
$array3 = [10, 20, 30];
$array4 = [5, 15, 25, 35, 45];
echo "\nArray 3: " . implode(", ", $array3) . "\n";
echo "Array 4: " . implode(", ", $array4) . "\n";
echo "Merged: " . implode(", ", mergeSortedArrays($array3, $array4)) . "\n";

// Optional challenge: Try to implement this without using array_merge() and sort() 