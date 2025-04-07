<?php
/**
 * Exercise 1: Multiplication Table
 * 
 * Task:
 * 1. Implement the printMultiplicationTable() function to generate an HTML table
 *    showing a multiplication table of the specified size.
 * 2. Implement the printTextMultiplicationTable() function to generate a plain text
 *    version of the multiplication table.
 * 
 * The HTML table should:
 * - Have a border
 * - Include row and column headers showing the multipliers (1 to $size)
 * - Display the product of row and column indices in each cell
 * 
 * The text table should:
 * - Format each number with consistent spacing (hint: use str_pad)
 * - Display each row on a new line
 */

function printMultiplicationTable($size = 10) {
    // TODO: Implement this function to create an HTML multiplication table
    //use echo statements to print html
    
    //border
    echo "<table border='1'>";

    //header rows
    echo "<tr><th>&times;<th>";
    for ($i=1; $i<=$size; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";

    //generate table body
    //need a table row <tr>, then table row header <th>, then table data cell <td>
    for ($i = 1; $i <= $size; $i++) {
        echo "<tr>";

        echo "<th>$i</th>";

        for ($j = 1; $j <= $size; $j++) {
            //multiplication table
            $result = $i * $j;
            echo "<td>$result</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}

function printTextMultiplicationTable($size = 10) {
    // TODO: Implement this function to create a plain text multiplication table
}

// Test your implementation with:
 printMultiplicationTable(10);
// printTextMultiplicationTable(10); 