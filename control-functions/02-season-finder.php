<?php
/**
 * Exercise 2: Season Finder
 * 
 * Task:
 * Implement the getSeason() function that determines the season based on a given month.
 * 
 * Requirements:
 * - The function should accept a month parameter which can be either:
 *   - A numeric value (1-12)
 *   - A month name as a string (e.g., "January", "February", etc.)
 * - The function should return one of the following seasons:
 *   - "Spring" (March, April, May)
 *   - "Summer" (June, July, August)
 *   - "Fall" (September, October, November)
 *   - "Winter" (December, January, February)
 * - Handle invalid inputs appropriately
 */

function getSeason($month) {
    // TODO: Implement this function to determine the season based on the month

    $month_map = ["January","February","March","April","May","June","July","August","September","October","November","December"];

    //check if numeric or not
    if (!is_numeric($month)) {
        $valid_str = null;
        //map the string to integer
        for ($i=0; $i<count($month_map); $i++) {
            if ($month_map[$i] == $month) { //check if its valid in our map
                $month = $i; //convert to int
                $valid_str = TRUE;
                break;
            }
        }
        if ($valid_str == FALSE) {
            return "Invalid String";
        }
    }

    //spring
    if ($month >= 2 && $month <= 4) {
        return "Spring";
    }

    //summer
    if ($month >= 5 && $month <= 7) {
        return "Summer";
    }

    //fall
    if ($month >= 8 && $month <= 10) {
        return "Fall";
    }

    //winter
    if ($month >= 11 || $month <= 1) {
        return "Winter";
    }

    return "Invalid Number";
}

getSeason(2);

// Example test code:
$currentMonth = date('n'); // Gets the current month as a number (1-12)
echo "Current month: " . date('F') . "\n";
echo "Season: " . getSeason($currentMonth) . "\n";
// 
// // Test with specific months
echo "January is in " . getSeason(1) . "\n";     
echo "April is in " . getSeason(4) . "\n";       
echo "July is in " . getSeason(7) . "\n";        
echo "October is in " . getSeason(10) . "\n";    
// 
// // Test with month names
echo "May is in " . getSeason("May") . "\n";
echo "December is in " . getSeason("December") . "\n"; 