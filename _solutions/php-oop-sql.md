# PHP Code Solutions

## Object-Oriented Programming

### Simple Car Class

```php
<?php
class Car {
    // Properties
    private $color;
    private $model;
    
    // Constructor
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
    
    // Getter methods
    public function getColor() {
        return $this->color;
    }
    
    public function getModel() {
        return $this->model;
    }
    
    // Setter methods
    public function setColor($color) {
        $this->color = $color;
    }
    
    public function setModel($model) {
        $this->model = $model;
    }
    
    // Method to start the engine
    public function startEngine() {
        echo "The " . $this->color . " " . $this->model . " engine is starting...";
    }
}

// Example usage
$myCar = new Car("red", "Toyota");
$myCar->startEngine(); // Outputs: The red Toyota engine is starting...
?>
```

### Vehicle and Bicycle Class Inheritance

```php
<?php
// Parent class
class Vehicle {
    protected $speed;
    
    public function __construct($speed = 0) {
        $this->speed = $speed;
    }
    
    public function getSpeed() {
        return $this->speed;
    }
    
    public function setSpeed($speed) {
        $this->speed = $speed;
    }
    
    public function accelerate($increment) {
        $this->speed += $increment;
        echo "Vehicle speed increased to " . $this->speed . " km/h";
    }
}

// Child class
class Bicycle extends Vehicle {
    private $hasBasket;
    
    public function __construct($speed = 0, $hasBasket = false) {
        parent::__construct($speed);
        $this->hasBasket = $hasBasket;
    }
    
    public function getHasBasket() {
        return $this->hasBasket;
    }
    
    public function setHasBasket($hasBasket) {
        $this->hasBasket = $hasBasket;
    }
    
    public function addBasket() {
        $this->hasBasket = true;
        echo "Basket added to the bicycle";
    }
    
    // Override the parent's accelerate method
    public function accelerate($increment) {
        // Bicycles accelerate slower, so we'll use half the increment
        $this->speed += ($increment / 2);
        echo "Bicycle speed increased to " . $this->speed . " km/h";
    }
}

// Example usage
$myBike = new Bicycle(5, true);
echo "Bicycle speed: " . $myBike->getSpeed() . " km/h<br>";
echo "Has basket: " . ($myBike->getHasBasket() ? "Yes" : "No") . "<br>";
$myBike->accelerate(10); // Outputs: Bicycle speed increased to 10 km/h
?>
```

## Database Interaction (Conceptual)

### SQL Query to Retrieve Users

```sql
SELECT name, email FROM users;
```

### Preventing SQL Injection

To prevent SQL injection vulnerabilities when interacting with a database in PHP:

1. **Use Prepared Statements**:
   ```php
   <?php
   // Create a connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Prepare a statement
   $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
   
   // Bind the parameter
   $stmt->bind_param("s", $email); // "s" indicates that $email is a string
   
   // Set the value
   $email = "user@example.com";
   
   // Execute the query
   $stmt->execute();
   
   // Get the result
   $result = $stmt->get_result();
   
   // Process the result
   while ($row = $result->fetch_assoc()) {
       echo $row['name'] . "<br>";
   }
   
   // Close the statement and connection
   $stmt->close();
   $conn->close();
   ?>
   ```

2. **Use PDO with Prepared Statements**:
   ```php
   <?php
   try {
       $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
       $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
       $stmt->bindParam(':email', $email);
       
       $email = "user@example.com";
       $stmt->execute();
       
       $result = $stmt->fetchAll();
       
       foreach ($result as $row) {
           echo $row['name'] . "<br>";
       }
   } catch(PDOException $e) {
       echo "Error: " . $e->getMessage();
   }
   $pdo = null;
   ?>
   ```

3. **Input Validation**:
   * Always validate and sanitize user inputs.
   * Use type casting when appropriate.
   * Implement whitelisting for inputs.

4. **Least Privilege Principle**:
   * Connect to the database with a user that has only the necessary permissions.
   * Don't use root or admin accounts for application connections.

5. **Error Handling**:
   * Use custom error handlers to prevent exposing sensitive information.
   * Log errors securely without revealing them to users.

## Example from Snippets

### Users with Total Purchases Exceeding $200.64

```php
<?php
function findBigSpenders($users) {
    $bigSpenders = [];
    
    foreach ($users as $user) {
        $totalSpent = 0;
        
        // Calculate total purchases for this user
        if (isset($user['purchases']) && is_array($user['purchases'])) {
            foreach ($user['purchases'] as $purchase) {
                $totalSpent += $purchase['amount'];
            }
        }
        
        // If total is greater than $200.64, add to big spenders
        if ($totalSpent > 200.64) {
            // Add user to big spenders array with their total
            $user['total_spent'] = $totalSpent;
            $bigSpenders[] = $user;
        }
    }
    
    return $bigSpenders;
}

// Example usage
$users = [
    [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'purchases' => [
            ['item' => 'Book', 'amount' => 15.99],
            ['item' => 'Laptop', 'amount' => 599.99],
            ['item' => 'Coffee', 'amount' => 4.50]
        ]
    ],
    [
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'purchases' => [
            ['item' => 'Notebook', 'amount' => 5.99],
            ['item' => 'Pen', 'amount' => 1.99]
        ]
    ],
    [
        'name' => 'Bob Johnson',
        'email' => 'bob@example.com',
        'purchases' => [
            ['item' => 'TV', 'amount' => 299.99],
            ['item' => 'Headphones', 'amount' => 89.99]
        ]
    ]
];

$bigSpenders = findBigSpenders($users);

// Display big spenders
echo "<h2>Users with purchases exceeding $200.64:</h2>";
echo "<ul>";
foreach ($bigSpenders as $spender) {
    echo "<li>" . $spender['name'] . " - $" . number_format($spender['total_spent'], 2) . "</li>";
}
echo "</ul>";
?>
```

### Temperature Closest to Zero

```php
<?php
function findClosestToZero($temperatures) {
    if (empty($temperatures)) {
        return 0; // Return 0 if the array is empty
    }
    
    $closestTemp = null;
    $smallestDiff = PHP_FLOAT_MAX;
    
    foreach ($temperatures as $temp) {
        $diff = abs($temp);
        
        if ($diff < $smallestDiff) {
            // If this temperature is closer to zero than our current closest
            $smallestDiff = $diff;
            $closestTemp = $temp;
        } elseif ($diff == $smallestDiff && $temp > 0 && $closestTemp < 0) {
            // If both temperatures are equally close to zero, choose the positive one
            $closestTemp = $temp;
        }
    }
    
    return $closestTemp;
}

// Example usage
$temps1 = [7, -10, 13, 8, 4, -7.2, -12, -3.5, 3.5, -2, 2];
echo "Closest to zero: " . findClosestToZero($temps1) . "<br>"; // Should return 2

$temps2 = [7, -10, 13, 8, 4, -7.2, -12, -3.5, 3.5];
echo "Closest to zero: " . findClosestToZero($temps2) . "<br>"; // Should return 3.5

$temps3 = [-5, 5];
echo "Closest to zero: " . findClosestToZero($temps3) . "<br>"; // Should return 5
?>
```

### Parking Lot Function

```php
<?php
function calculateRegularSpotsForVans($motorcycles, $cars, $vans) {
    // Vans take up 3 regular spots each
    $regularSpotsForVans = $vans * 3;
    
    return $regularSpotsForVans;
}

// Example usage
$motorcycles = 5;
$cars = 10;
$vans = 3;

$regularSpotsUsedByVans = calculateRegularSpotsForVans($motorcycles, $cars, $vans);
echo "Number of regular spots occupied by vans: " . $regularSpotsUsedByVans;
// Output: Number of regular spots occupied by vans: 9
?>
```

For a more comprehensive parking lot solution:

```php
<?php
class ParkingLot {
    private $compactSpots;
    private $regularSpots;
    private $motorcycleSpots;
    
    private $usedCompactSpots = 0;
    private $usedRegularSpots = 0;
    private $usedMotorcycleSpots = 0;
    
    public function __construct($compactSpots, $regularSpots, $motorcycleSpots) {
        $this->compactSpots = $compactSpots;
        $this->regularSpots = $regularSpots;
        $this->motorcycleSpots = $motorcycleSpots;
    }
    
    public function parkVehicles($motorcycles, $cars, $vans) {
        // First park motorcycles in motorcycle spots
        $remainingMotorcycles = $motorcycles;
        if ($remainingMotorcycles > 0) {
            $motorcyclesInMotorcycleSpots = min($remainingMotorcycles, $this->motorcycleSpots);
            $this->usedMotorcycleSpots += $motorcyclesInMotorcycleSpots;
            $remainingMotorcycles -= $motorcyclesInMotorcycleSpots;
        }
        
        // If there are remaining motorcycles, park them in compact spots
        if ($remainingMotorcycles > 0) {
            $motorcyclesInCompactSpots = min($remainingMotorcycles, $this->compactSpots - $this->usedCompactSpots);
            $this->usedCompactSpots += $motorcyclesInCompactSpots;
            $remainingMotorcycles -= $motorcyclesInCompactSpots;
        }
        
        // If there are still remaining motorcycles, park them in regular spots
        if ($remainingMotorcycles > 0) {
            $motorcyclesInRegularSpots = min($remainingMotorcycles, $this->regularSpots - $this->usedRegularSpots);
            $this->usedRegularSpots += $motorcyclesInRegularSpots;
        }
        
        // Park cars - they can use either compact or regular spots
        $remainingCars = $cars;
        if ($remainingCars > 0) {
            $carsInCompactSpots = min($remainingCars, $this->compactSpots - $this->usedCompactSpots);
            $this->usedCompactSpots += $carsInCompactSpots;
            $remainingCars -= $carsInCompactSpots;
        }
        
        // If there are remaining cars, park them in regular spots
        if ($remainingCars > 0) {
            $carsInRegularSpots = min($remainingCars, $this->regularSpots - $this->usedRegularSpots);
            $this->usedRegularSpots += $carsInRegularSpots;
        }
        
        // Park vans - they take up 3 regular spots each
        $remainingVans = $vans;
        $vansSpotsNeeded = $remainingVans * 3;
        $availableRegularSpots = $this->regularSpots - $this->usedRegularSpots;
        
        if ($vansSpotsNeeded <= $availableRegularSpots) {
            $this->usedRegularSpots += $vansSpotsNeeded;
            $regularSpotsForVans = $vansSpotsNeeded;
        } else {
            $regularSpotsForVans = $availableRegularSpots;
            $this->usedRegularSpots = $this->regularSpots; // All regular spots are full
        }
        
        return [
            'regularSpotsForVans' => $regularSpotsForVans,
            'totalRegularSpotsUsed' => $this->usedRegularSpots,
            'totalCompactSpotsUsed' => $this->usedCompactSpots,
            'totalMotorcycleSpotsUsed' => $this->usedMotorcycleSpots
        ];
    }
    
    public function getRegularSpotsForVans($vans) {
        // Calculate how many regular spots are needed for vans
        return $vans * 3;
    }
}

// Example usage
$parkingLot = new ParkingLot(20, 50, 10);
$result = $parkingLot->parkVehicles(5, 10, 3);

echo "Regular spots occupied by vans: " . $result['regularSpotsForVans'] . "<br>";
echo "Total regular spots used: " . $result['totalRegularSpotsUsed'] . "<br>";
echo "Total compact spots used: " . $result['totalCompactSpotsUsed'] . "<br>";
echo "Total motorcycle spots used: " . $result['totalMotorcycleSpotsUsed'] . "<br>";
?>
```
