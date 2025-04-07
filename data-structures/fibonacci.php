<?php
/**
 * Task: Create a function to generate the nth Fibonacci number
 * 
 * Your implementation should:
 * 1. Take an integer n as input (assume n >= 0)
 * 2. Return the nth Fibonacci number
 * 
 * The Fibonacci sequence is defined as:
 * F(0) = 0, F(1) = 1
 * F(n) = F(n-1) + F(n-2) for n > 1
 * 
 * Example input: 0
 * Expected output: 0
 * 
 * Example input: 1
 * Expected output: 1
 * this already exists
 * 
 * Example input: 2
 * Expected output: 1
 * 
 * Example input: 10
 * Expected output: 55
 */

function fibonacci($n) {
    // Your code here
    //recursive method

    //base cases:
    if ($n == 0) {
        return 0;
    }

    if ($n === 1) {
        return 1;
    }

    return fibonacci($n-1) + fibonacci($n-2);
}

// Test cases:
for ($i = 0; $i <= 10; $i++) {
    echo "F($i) = " . fibonacci($i) . "\n";
}

// Expected output:
// F(0) = 0
// F(1) = 1
// F(2) = 1
// F(3) = 2
// F(4) = 3
// F(5) = 5
// F(6) = 8
// F(7) = 13
// F(8) = 21
// F(9) = 34
// F(10) = 55

echo "\nLarger values:\n";
echo "F(20) = " . fibonacci(20) . "\n"; // Expected: 6765
echo "F(30) = " . fibonacci(30) . "\n"; // Expected: 832040

// Challenge: Implement both recursive and iterative solutions. Which one is more efficient? 