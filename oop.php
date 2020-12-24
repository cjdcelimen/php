<?php

    class User {

        public $username;
        protected $email;
        public $role = 'member';

        public function __construct($username, $email){
            $this->username = $username;
            $this->email = $email;
        }

        public function __destruct(){
            echo "the user $this->username was removed <br>";
        }

        public function __clone(){
            $this->username = $this->username . '(cloned)<br>';
        }

        public function getName(){
            return "$this->username <br />";
        } 

        public function getEmail(){
            return "$this->email <br />";
        } 

        public function setEmail($email){
            if(strpos($email, '@') > -1){
                $this->email = $email;
            } else {
                return "invalid email format <br />";
            }
        }

        public function message(){
            return "$this->email sent a new message <br />";
        }

    }

    // inheritance
    class AdminUser extends User {

        private $level;
        public $role = 'admin';

        public function __construct($username, $email, $level){
            $this->level = $level;
            // use this to inherit parent constructor
            parent::__construct($username, $email);
        }

        public function getLevel(){
            return "$this->level <br />";
        }

        public function message(){
            return "$this->email, an admin, sent a new message <br />";
        }
    }

    $userOne = new User('cj','cj@guest.com');
    $userThree = new AdminUser('coffeeadmin','coffeeadmin@coffeemonster.com', 5);
    echo $userOne->role . '<br />';
    echo $userThree->role . '<br />';
    echo $userOne->message();
    echo $userThree->message();
    $userFour = clone $userOne;
    echo $userFour->username;

    // static properties
    class Weather {

        public static $tempConditions = ['cold','mild','warm'];

        public static function celsiusToFarenheit($c){
            return 'the value is ' . $c * 9 / 5 + 32;
        }

        public static function determineTempConditions($f){
            if($f < 40){
                return self::$tempConditions[0]; // cold
            } else if ($f < 70){
                return self::$tempConditions[1]; // mind
            } else {
                return self::$tempConditions[2]; // warm
            }
        }
    }

    echo Weather::determineTempConditions(60);

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP OOP</title>
</head>
<body>

</body>

</html>