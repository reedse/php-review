# PHP Control Structures and Functions Solutions

## Control Structures

### 1. Multiplication Table using nested for loops

```php
function printMultiplicationTable($size = 10) {
    echo "<table border='1'>";
    
    // Header row
    echo "<tr><th>&times;</th>";
    for ($i = 1; $i <= $size; $i++) {
        echo "<th>$i</th>";
    }
    echo "</tr>";
    
    // Table body
    for ($i = 1; $i <= $size; $i++) {
        echo "<tr>";
        echo "<th>$i</th>"; // Row header
        
        for ($j = 1; $j <= $size; $j++) {
            $result = $i * $j;
            echo "<td>$result</td>";
        }
        
        echo "</tr>";
    }
    
    echo "</table>";
}

// Plain text version
function printTextMultiplicationTable($size = 10) {
    for ($i = 1; $i <= $size; $i++) {
        for ($j = 1; $j <= $size; $j++) {
            $result = $i * $j;
            echo str_pad($result, 4, ' ', STR_PAD_LEFT);
        }
        echo "\n";
    }
}

// Example usage
printMultiplicationTable(10); // Outputs HTML table
printTextMultiplicationTable(10); // Outputs plain text table
```

### 2. Script to determine season based on current month

```php
function getSeason($month) {
    // Convert month name to number if a string is provided
    if (!is_numeric($month)) {
        $month = date('n', strtotime($month));
    }
    
    // Ensure month is in valid range (1-12)
    $month = max(1, min(12, (int)$month));
    
    if ($month >= 3 && $month <= 5) {
        return "Spring";
    } elseif ($month >= 6 && $month <= 8) {
        return "Summer";
    } elseif ($month >= 9 && $month <= 11) {
        return "Fall";
    } else {
        return "Winter";
    }
}

// Example usage
$currentMonth = date('n'); // Gets the current month as a number (1-12)
echo "Current month: " . date('F') . "\n";
echo "Season: " . getSeason($currentMonth) . "\n";

// Test with specific months
echo "January is in " . getSeason(1) . "\n";     // Winter
echo "April is in " . getSeason(4) . "\n";       // Spring
echo "July is in " . getSeason(7) . "\n";        // Summer
echo "October is in " . getSeason(10) . "\n";    // Fall

// Works with month names too
echo "May is in " . getSeason("May") . "\n";     // Spring
echo "December is in " . getSeason("December") . "\n"; // Winter
```

### 3. FizzBuzz implementation

```php
function fizzBuzz($start = 1, $end = 100) {
    $result = [];
    
    for ($i = $start; $i <= $end; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $result[] = "FizzBuzz";
        } elseif ($i % 3 == 0) {
            $result[] = "Fizz";
        } elseif ($i % 5 == 0) {
            $result[] = "Buzz";
        } else {
            $result[] = $i;
        }
    }
    
    return $result;
}

// Print the results directly
function printFizzBuzz($start = 1, $end = 100) {
    for ($i = $start; $i <= $end; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz\n";
        } elseif ($i % 3 == 0) {
            echo "Fizz\n";
        } elseif ($i % 5 == 0) {
            echo "Buzz\n";
        } else {
            echo $i . "\n";
        }
    }
}

// Example usage
$fizzBuzzResults = fizzBuzz(1, 20); // Get results as array
print_r($fizzBuzzResults);

printFizzBuzz(1, 20); // Print results directly
```

## Functions

### 1. Function to return the sum of two numbers

```php
function addNumbers($a, $b) {
    // Convert inputs to numeric values to handle string numbers
    $a = is_numeric($a) ? $a + 0 : 0;
    $b = is_numeric($b) ? $b + 0 : 0;
    
    return $a + $b;
}

// Type-hinted version (PHP 7+)
function addNumbersTyped(float $a, float $b): float {
    return $a + $b;
}

// Example usage
echo addNumbers(5, 10) . "\n";         // Output: 15
echo addNumbers(3.5, 2.5) . "\n";      // Output: 6
echo addNumbers("7", "3") . "\n";      // Output: 10 (converts strings to numbers)
echo addNumbers("abc", 5) . "\n";      // Output: 5 (invalid input becomes 0)

echo addNumbersTyped(5, 10) . "\n";    // Output: 15
echo addNumbersTyped(3.5, 2.5) . "\n"; // Output: 6
```

### 2. Function to check if a string is a palindrome

```php
function isPalindrome($string) {
    // Remove non-alphanumeric characters and convert to lowercase
    $string = preg_replace('/[^a-zA-Z0-9]/', '', $string);
    $string = strtolower($string);
    
    // Compare string with its reverse
    return $string === strrev($string);
}

// Alternative implementation without using strrev()
function isPalindromeManual($string) {
    // Remove non-alphanumeric characters and convert to lowercase
    $string = preg_replace('/[^a-zA-Z0-9]/', '', $string);
    $string = strtolower($string);
    
    $length = strlen($string);
    $half = floor($length / 2);
    
    for ($i = 0; $i < $half; $i++) {
        if ($string[$i] !== $string[$length - $i - 1]) {
            return false;
        }
    }
    
    return true;
}

// Example usage
$testStrings = [
    "racecar",
    "A man, a plan, a canal: Panama",
    "hello world",
    "Madam, I'm Adam",
    "12321"
];

foreach ($testStrings as $str) {
    echo "\"$str\" is " . (isPalindrome($str) ? "" : "not ") . "a palindrome.\n";
    echo "Manual check: \"$str\" is " . (isPalindromeManual($str) ? "" : "not ") . "a palindrome.\n\n";
}

/*
Output:
"racecar" is a palindrome.
Manual check: "racecar" is a palindrome.

"A man, a plan, a canal: Panama" is a palindrome.
Manual check: "A man, a plan, a canal: Panama" is a palindrome.

"hello world" is not a palindrome.
Manual check: "hello world" is not a palindrome.

"Madam, I'm Adam" is a palindrome.
Manual check: "Madam, I'm Adam" is a palindrome.

"12321" is a palindrome.
Manual check: "12321" is a palindrome.
*/
```
