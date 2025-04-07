# Data Structures - Solutions to Junior Developer Interview Problems

## Arrays and Strings

### 1. Reverse a String

```php
function reverseString($str) {
    $length = strlen($str);
    $reversed = '';
    
    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    
    return $reversed;
}

// Alternative solution using array functions
function reverseStringAlternative($str) {
    $charArray = str_split($str);
    $charArray = array_reverse($charArray);
    return implode('', $charArray);
}

// Test
$original = "hello world";
echo reverseString($original); // Outputs: dlrow olleh
```

### 2. Find the Missing Number

```php
function findMissingNumber($nums) {
    $n = count($nums);
    $expectedSum = ($n * ($n + 1)) / 2;
    $actualSum = array_sum($nums);
    
    return $expectedSum - $actualSum;
}

// Test
$nums = [3, 0, 1];
echo findMissingNumber($nums); // Outputs: 2
```

### 3. Two Sum

```php
function twoSum($nums, $target) {
    $seen = [];
    
    foreach ($nums as $index => $num) {
        $complement = $target - $num;
        
        if (isset($seen[$complement])) {
            return [$seen[$complement], $index];
        }
        
        $seen[$num] = $index;
    }
    
    return null; // No solution found
}

// Test
$nums = [2, 7, 11, 15];
$target = 9;
print_r(twoSum($nums, $target)); // Outputs: [0, 1]
```

## Linked Lists

### 4. Detect a Cycle in a Linked List

```php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function hasCycle($head) {
    if ($head === null || $head->next === null) {
        return false;
    }
    
    $slow = $head;
    $fast = $head;
    
    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
        
        if ($slow === $fast) {
            return true; // Cycle detected
        }
    }
    
    return false; // No cycle
}
```

### 5. Find the Middle Element

```php
function findMiddle($head) {
    if ($head === null) {
        return null;
    }
    
    $slow = $head;
    $fast = $head;
    
    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }
    
    return $slow;
}
```

## Stacks and Queues

### 6. Valid Parentheses

```php
function isValidParentheses($s) {
    $stack = [];
    $pairs = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        
        if (in_array($char, ['(', '{', '['])) {
            array_push($stack, $char);
        } else if (isset($pairs[$char])) {
            if (empty($stack) || array_pop($stack) !== $pairs[$char]) {
                return false;
            }
        }
    }
    
    return empty($stack);
}

// Test
echo isValidParentheses("()[]{}"); // Outputs: 1 (true)
echo isValidParentheses("([)]");   // Outputs: (nothing, false)
```

### 7. Implement a Queue Using Stacks

```php
class MyQueue {
    private $stack1; // For enqueue
    private $stack2; // For dequeue
    
    function __construct() {
        $this->stack1 = [];
        $this->stack2 = [];
    }
    
    function enqueue($x) {
        array_push($this->stack1, $x);
    }
    
    function dequeue() {
        if (empty($this->stack2)) {
            // Transfer all elements from stack1 to stack2
            while (!empty($this->stack1)) {
                array_push($this->stack2, array_pop($this->stack1));
            }
        }
        
        if (empty($this->stack2)) {
            return null; // Queue is empty
        }
        
        return array_pop($this->stack2);
    }
    
    function peek() {
        if (empty($this->stack2)) {
            // Transfer all elements from stack1 to stack2
            while (!empty($this->stack1)) {
                array_push($this->stack2, array_pop($this->stack1));
            }
        }
        
        if (empty($this->stack2)) {
            return null; // Queue is empty
        }
        
        return end($this->stack2);
    }
    
    function isEmpty() {
        return empty($this->stack1) && empty($this->stack2);
    }
}

// Test
$queue = new MyQueue();
$queue->enqueue(1);
$queue->enqueue(2);
echo $queue->peek();    // Outputs: 1
echo $queue->dequeue(); // Outputs: 1
echo $queue->isEmpty(); // Outputs: (nothing, false)
```

## Trees and Graphs

### 8. Check if a Binary Tree is Balanced

```php
class TreeNode {
    public $val;
    public $left;
    public $right;
    
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function isBalanced($root) {
    return checkHeight($root) !== -1;
}

function checkHeight($node) {
    if ($node === null) {
        return 0;
    }
    
    $leftHeight = checkHeight($node->left);
    if ($leftHeight === -1) {
        return -1; // Left subtree is unbalanced
    }
    
    $rightHeight = checkHeight($node->right);
    if ($rightHeight === -1) {
        return -1; // Right subtree is unbalanced
    }
    
    if (abs($leftHeight - $rightHeight) > 1) {
        return -1; // Current node is unbalanced
    }
    
    return max($leftHeight, $rightHeight) + 1;
}
```

### 9. Find the Lowest Common Ancestor

```php
function lowestCommonAncestor($root, $p, $q) {
    if ($root === null || $root === $p || $root === $q) {
        return $root;
    }
    
    $left = lowestCommonAncestor($root->left, $p, $q);
    $right = lowestCommonAncestor($root->right, $p, $q);
    
    if ($left !== null && $right !== null) {
        return $root;
    }
    
    return $left !== null ? $left : $right;
}
```

## Hash Tables

### 10. First Non-Repeating Character

```php
function firstNonRepeatingChar($s) {
    $charCount = [];
    
    // Count occurrences of each character
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        $charCount[$char] = isset($charCount[$char]) ? $charCount[$char] + 1 : 1;
    }
    
    // Find the first non-repeating character
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if ($charCount[$char] === 1) {
            return $i;
        }
    }
    
    return -1; // No non-repeating character found
}

// Test
echo firstNonRepeatingChar("leetcode"); // Outputs: 0 (for 'l')
echo firstNonRepeatingChar("loveleetcode"); // Outputs: 2 (for 'v')
```

## Additional Problems

### 11. Fibonacci Sequence

```php
// Recursive solution (not efficient for large n)
function fibonacciRecursive($n) {
    if ($n <= 1) {
        return $n;
    }
    
    return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
}

// Iterative solution (more efficient)
function fibonacci($n) {
    if ($n <= 1) {
        return $n;
    }
    
    $a = 0;
    $b = 1;
    
    for ($i = 2; $i <= $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    
    return $b;
}

// Test
echo fibonacci(10); // Outputs: 55
```

### 12. Palindrome Check

```php
function isPalindrome($s) {
    // Remove non-alphanumeric characters and convert to lowercase
    $s = preg_replace('/[^a-zA-Z0-9]/', '', $s);
    $s = strtolower($s);
    
    $left = 0;
    $right = strlen($s) - 1;
    
    while ($left < $right) {
        if ($s[$left] !== $s[$right]) {
            return false;
        }
        
        $left++;
        $right--;
    }
    
    return true;
}

// Alternative solution
function isPalindromeAlternative($s) {
    // Remove non-alphanumeric characters and convert to lowercase
    $s = preg_replace('/[^a-zA-Z0-9]/', '', $s);
    $s = strtolower($s);
    
    return $s === strrev($s);
}

// Test
echo isPalindrome("A man, a plan, a canal: Panama"); // Outputs: 1 (true)
echo isPalindrome("race a car"); // Outputs: (nothing, false)
``` 