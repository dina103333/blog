
/*
    Data structure
    Write a pseudo code implementing Queue DS using Arrays.
*/

// 1-Give time complexity for Enqueue and Dequeue operations.
class Queue:
    constructor:
        Initialize an empty array `queue`
    
    enqueue(item):
        Append `item` to the end of the `queue` 
        // time complexity is O(1) 
    
    dequeue():
        If `queue` is empty, return an error indicating underflow
        Otherwise, remove and return the first element of `queue` 
        // time complexity is O(n) 

    isEmpty():
        Return true if `queue` is empty, false otherwise


// 2- Given that each element has a priority and we need to implement a Max Priority queue, outline the changes you’ll make to the above implementation and give expected time complexity.

class MaxPriorityQueue:
    constructor:
        Initialize an empty array `queue`
    
    enqueue(item, priority):
        Append a tuple (item, priority) to the `queue`
        // time complexity is O(n) 
    dequeue():
        If `queue` is empty, return an error indicating underflow
        Find the element with the highest priority in `queue`
        Remove and return the element with the highest priority
        // time complexity is O(n) 
    isEmpty():
        Return true if `queue` is empty, false otherwise


/*
    Database
    Given table 
    Employee -> {id, salary}; id is the primary key
    Write an SQL query to report the second highest salary from the Employee table.
    If there is no second highest salary, the query should report NULL.
*/

SELECT MAX(salary) AS second_highest_salary
FROM Employee
WHERE salary < (SELECT MAX(salary) FROM Employee);



/*
    Algorithms
    Give a pseudo code, time complexity, space complexity for each


    Given the head of a singly linked list, return the middle node of the linked list. If there are two middle nodes, return the second middle node.
    The number of nodes in the list is in the range [1, 100].

    Examples:


    Input: head = [1,2,3,4,5]
    Output: [3,4,5]
    Explanation: The middle node of the list is node 3.

    Input: head = [1,2,3,4,5,6]
    Output: [4,5,6]
    Explanation: Since the list has two middle nodes with values 3 and 4, we return the second one.
*/

function findSecondMiddle(head):
    // Initialize two pointers, first and mid, both pointing to the head of the list
    first = head
    mid = head
    
    // Traverse the list with the fast pointer moving twice as fast as the slow pointer
    while first is not null and first.next is not null:
        // Move mid pointer one step forward
        mid = mid.next
        // Move first pointer two steps forward
        first = first.next.next
    
    // When first pointer reaches the end of the list, mid pointer will be at the middle node
    // If the length of the list is odd, mid pointer will be at the first middle node
    // If the length of the list is even, mid pointer will be at the second middle node

    return mid

    