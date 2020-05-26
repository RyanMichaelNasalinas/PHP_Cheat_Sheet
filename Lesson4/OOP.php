<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Object Oriented</title>
</head>

<body>
    <?php
    class Animal implements Singable
    {
        protected $name;
        protected $favorite_food;
        protected $sound;
        protected $id;

        public static $number_of_animals = 0;

        const PI = "3.14";

        public function getName()
        {
            return $this->name;
        }
        // Initialize Values - call this method once the object has been instantiate
        public function __construct()
        {
            $this->id = mt_rand(100, 100000);
            echo $this->id . " has been assigned<br>";
            Animal::$number_of_animals++;
        }
        // Unset Value - references to our object
        function __destruct()
        {
            echo "<hr>";
            echo $this->name . " is being destroyed<br>";
        }
        // Magic methods getters and setters - assign value to a attr
        function __get($name)
        {
            echo "Asked for " . $name . "<br>";
            // $this->$name; - dynamic <variable></variable>
            return $this->$name;
        }
        // Check if the value assign to attr is valid
        function __set($name, $value)
        {
            switch ($name) {
                case "name":
                    $this->name = $value;
                    break;
                case "favorite_food":
                    $this->favorite_food = $value;
                    break;
                case "sound":
                    $this->sound = $value;
                    break;
                default:
                    echo $name . " Not Found<br>";
            }
            echo "Set " . $name . " to " . $value . "<br>";
        }
        public function run()
        {
            echo $this->name . " runs<br>";
        }
        // This function will not be overwritten in the child 
        final function what_is_good()
        {
            echo "Running is Good<br>";
        }
        // Magic method toString
        public function __toString()
        {
            return $this->name . " says " . $this->sound . " give me some " . $this->favorite_food . "  my id is " . $this->id . " total animals = " . Animal::$number_of_animals . "<br>";
        }

        public static function add_these($num1, $num2)
        {
            return ($num1 +  $num2) . "<br>";
        }
        // Interface Function
        public function sing()
        {
            echo $this->name . " sings ManticoreWtzu ManticoreWtzu";
        }
    }

    // Inherit methods and attributes
    class Dog extends Animal implements Singable
    {
        public function run()
        {
            echo $this->name . " runs like a jaguar<br>";
        }
        // Interface Fucntion
        public function sing()
        {
            echo $this->name . " sings Awtzu Awtzu";
        }
    }

    // Inherit multiple classes
    interface Singable
    {
        public function sing();
    }

    $animal_one = new Animal();
    $animal_one->name = "Manticore";
    $animal_one->favorite_food = "Humnas";
    $animal_one->sound = "Grrrrrrggh";

    echo "<br>";

    echo $animal_one->name . " says " . $animal_one->sound . " give me some " . $animal_one->favorite_food . "  my id is " . $animal_one->id . " total animals = " . Animal::$number_of_animals . "<br>";

    echo "<hr>";

    $animal_dog = new Dog();
    $animal_dog->name = "Dogticore";
    $animal_dog->favorite_food = "Meat";
    $animal_dog->sound = "Warf Warfffff";

    echo "<br>";

    echo $animal_dog->name . " says " . $animal_dog->sound . " give me some " . $animal_dog->favorite_food . "  my id is " . $animal_dog->id . " total animals = " . Dog::$number_of_animals . "<br>";

    echo "<hr>";
    $animal_one->run();
    $animal_dog->run();

    echo "<hr>";
    // Will print to string
    echo $animal_one;
    echo $animal_dog;

    echo "<hr>";

    echo $animal_one->sing();
    echo "<br>";
    echo $animal_dog->sing();

    echo "<hr>";
    // Use interface in a function
    function make_them_sing(Singable $singanimal)
    {
        $singanimal->sing();
    }
    echo "<hr>";
    // Polymorphism - different classes share superclass to be able to act as differently
    make_them_sing($animal_one);
    echo "<br>";
    make_them_sing($animal_dog);
    echo "<hr>";
    // Call Static method
    echo "3+5=" . Animal::add_these(3, 5);
    echo "<hr>";
    // Check if object is instanceof a certain type
    $check_animal = ($animal_dog  instanceof Animal) ? 'Yes' : 'No';

    echo $check_animal;
    ?>
</body>

</html>