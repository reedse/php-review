<?php
/**
 * Task: Create a function to find two numbers in an array that add up to a target value
 * 
 * Your implementation should:
 * 1. Take an array of integers and a target sum as input
 * 2. Return the indices of the two numbers that add up to the target
 * 3. Assume each input has exactly one solution
 * 4. You may not use the same element twice
 * 
 * Example input: 
 *   $nums = [2, 7, 11, 15]
 *   $target = 9
 * Expected output: [0, 1] (because nums[0] + nums[1] = 2 + 7 = 9)
 */

function twoSum($nums, $target) {
    // Your code here

    $map = [];

    for ($i=0; $i<count($nums); $i++) { //O(n)

        $complement = $target - $nums[$i];

        if (array_key_exists($complement, $map)) {
            return [$map[$complement], $i]; //2 sum
        }

        $map[$nums[$i]] = $i;
    }

    return null;
}

function testTwoSum() {
    $nums1 = [2, 7, 11, 15];
    $target1 = 9;
    assert(twoSum($nums1, $target1) == [0, 1]);

    $nums2 = [3, 2, 4];
    $target2 = 6;
    assert(twoSum($nums2, $target2) == [1, 2]);

    $nums3 = [3, 3];
    $target3 = 6;
    assert(twoSum($nums3, $target3) == [0, 1]);
}

testTwoSum();

// Challenge: Can you solve it in one pass through the array? 