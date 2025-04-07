<?php
/**
 * Task: Implement a Queue using Stacks
 * 
 * Your implementation should:
 * 1. Implement a first-in-first-out (FIFO) queue using only stacks
 * 2. The implemented queue should support standard operations:
 *    - enqueue: Add an element to the back of the queue
 *    - dequeue: Remove the element from the front of the queue and return it
 *    - peek: Get the front element without removing it
 *    - isEmpty: Return whether the queue is empty
 * 3. Use only stack operations: push to top, peek/pop from top, size, and isEmpty
 * 
 * In PHP, you can use arrays with array_push() and array_pop() to simulate stacks
 */

class MyQueue {
    /**
     * Initialize your data structure here.
     */
    private $stack1;
    private $stack2;

    function __construct() {
        // Your code here
        $this->stack1 = []; //init stacks
        $this->stack2 = [];
    }
    
    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function enqueue($x) {
        // Your code here
        //FIFO so push to front
        array_push($this->stack1,$x);
    }
    
    /**
     * Removes the element from the front of queue and returns it.
     * @return Integer
     */
    function dequeue() {
        //check if stack 2 empty, then push all stack 1 to stack 2
        if (empty($this->stack2)) {
            while (!empty($this->stack1)) {
                array_push($this->stack2,array_pop($this->stack1));
            }
        }

        //if still empty
        if (empty($this->stack2)) {
            return null;
        }

        return array_pop($this->stack2);
    }
    
    /**
     * Get the front element.
     * @return Integer
     */
    function peek() {
        //same as dequeue, except instead of pop we are using end
        if (empty($this->stack2)) {
            while (!empty($this->stack1)) {
                array_push($this->stack2,array_pop($this->stack1));
            }
        }

        if (empty($this->stack2)) {
            return null;
        }

        return end($this->stack2);
    }
    
    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function isEmpty() {
        return empty($this->stack1) && empty($this->stack2);
    }
}

// Test cases:
$queue = new MyQueue();
echo "Enqueuing 1, 2, 3\n";
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);

echo "Peek: " . $queue->peek() . "\n"; // Should be 1
echo "Dequeue: " . $queue->dequeue() . "\n"; // Should be 1
echo "Peek after dequeue: " . $queue->peek() . "\n"; // Should be 2
echo "Is empty: " . ($queue->isEmpty() ? "true" : "false") . "\n"; // Should be false

echo "Dequeue remaining elements\n";
echo "Dequeue: " . $queue->dequeue() . "\n"; // Should be 2
echo "Dequeue: " . $queue->dequeue() . "\n"; // Should be 3
echo "Is empty: " . ($queue->isEmpty() ? "true" : "false") . "\n"; // Should be true

// Hint: You might need two stacks to implement a queue efficiently 