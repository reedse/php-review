# PHP Coding Task Solutions

## Basic Syntax and Data Types

### 1. Function to reverse a given string

```php
function reverseString($str) {
    return strrev($str);
}

// Alternative manual implementation
function reverseStringManual($str) {
    $length = strlen($str);
    $reversed = '';
    
    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    
    return $reversed;
}

// Example usage
$string = "Hello World";
echo reverseString($string); // Output: dlroW olleH
echo reverseStringManual($string); // Output: dlroW olleH
```

### 2. Function to determine if a given integer is even or odd

```php
function isEvenOrOdd($number) {
    if ($number % 2 == 0) {
        return "Even";
    } else {
        return "Odd";
    }
}

// Example usage
echo isEvenOrOdd(4); // Output: Even
echo isEvenOrOdd(7); // Output: Odd
```

### 3. Function to calculate the factorial of a non-negative integer

```php
function factorial($n) {
    if ($n < 0) {
        return "Factorial is not defined for negative numbers";
    }
    
    if ($n == 0 || $n == 1) {
        return 1;
    }
    
    $result = 1;
    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }
    
    return $result;
}

// Recursive implementation
function factorialRecursive($n) {
    if ($n < 0) {
        return "Factorial is not defined for negative numbers";
    }
    
    if ($n == 0 || $n == 1) {
        return 1;
    }
    
    return $n * factorialRecursive($n - 1);
}

// Example usage
echo factorial(5); // Output: 120
echo factorialRecursive(5); // Output: 120
```

### 4. Code to swap the values of two variables without using a temporary variable

```php
function swapVariables(&$a, &$b) {
    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;
}

// Alternative using XOR
function swapVariablesXOR(&$a, &$b) {
    $a = $a ^ $b;
    $b = $a ^ $b;
    $a = $a ^ $b;
}

// Example usage
$x = 5;
$y = 10;
swapVariables($x, $y);
echo "x = $x, y = $y"; // Output: x = 10, y = 5

$x = 5;
$y = 10;
swapVariablesXOR($x, $y);
echo "x = $x, y = $y"; // Output: x = 10, y = 5
```

## Arrays

### 1. Function to find the largest element in an array of numbers

```php
function findLargest($arr) {
    if (empty($arr)) {
        return null;
    }
    
    $max = $arr[0];
    foreach ($arr as $value) {
        if ($value > $max) {
            $max = $value;
        }
    }
    
    return $max;
}

// Using built-in function
function findLargestBuiltIn($arr) {
    if (empty($arr)) {
        return null;
    }
    
    return max($arr);
}

// Example usage
$numbers = [3, 8, 2, 15, 7, 10];
echo findLargest($numbers); // Output: 15
echo findLargestBuiltIn($numbers); // Output: 15
```

### 2. Function to remove duplicate elements from an array

```php
function removeDuplicates($arr) {
    return array_values(array_unique($arr));
}

// Manual implementation
function removeDuplicatesManual($arr) {
    $result = [];
    foreach ($arr as $value) {
        if (!in_array($value, $result)) {
            $result[] = $value;
        }
    }
    
    return $result;
}

// Example usage
$array = [1, 2, 3, 2, 4, 3, 5, 1, 6];
print_r(removeDuplicates($array)); // Output: [1, 2, 3, 4, 5, 6]
print_r(removeDuplicatesManual($array)); // Output: [1, 2, 3, 4, 5, 6]
```

### 3. Function to merge two sorted arrays into a single sorted array

```php
function mergeSortedArrays($arr1, $arr2) {
    $merged = array_merge($arr1, $arr2);
    sort($merged);
    return $merged;
}

// Manual implementation (more efficient for already sorted arrays)
function mergeSortedArraysManual($arr1, $arr2) {
    $result = [];
    $i = 0;
    $j = 0;
    
    while ($i < count($arr1) && $j < count($arr2)) {
        if ($arr1[$i] < $arr2[$j]) {
            $result[] = $arr1[$i];
            $i++;
        } else {
            $result[] = $arr2[$j];
            $j++;
        }
    }
    
    // Add remaining elements
    while ($i < count($arr1)) {
        $result[] = $arr1[$i];
        $i++;
    }
    
    while ($j < count($arr2)) {
        $result[] = $arr2[$j];
        $j++;
    }
    
    return $result;
}

// Example usage
$array1 = [1, 3, 5, 7];
$array2 = [2, 4, 6, 8];
print_r(mergeSortedArrays($array1, $array2)); // Output: [1, 2, 3, 4, 5, 6, 7, 8]
print_r(mergeSortedArraysManual($array1, $array2)); // Output: [1, 2, 3, 4, 5, 6, 7, 8]
```

### 4. Function to check if a specific element exists in an array

```php
function elementExists($arr, $element) {
    return in_array($element, $arr);
}

// Manual implementation
function elementExistsManual($arr, $element) {
    foreach ($arr as $value) {
        if ($value === $element) {
            return true;
        }
    }
    
    return false;
}

// Example usage
$numbers = [5, 10, 15, 20, 25];
var_dump(elementExists($numbers, 15)); // Output: bool(true)
var_dump(elementExists($numbers, 30)); // Output: bool(false)
var_dump(elementExistsManual($numbers, 15)); // Output: bool(true)
var_dump(elementExistsManual($numbers, 30)); // Output: bool(false)
```
