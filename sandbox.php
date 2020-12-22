<?php

    // sessions
    if(isset($_POST['submit'])){

        // cookie for gender
        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();
        $_SESSION['name'] = $_POST['name'];
        echo $_SESSION['name'];
        // success -> redirect
        header('Location: index.php');
    }

    // classes
    class User {

        public $email;
        public $name;

        public function __construct($name, $email){
            $this->email = $email;
            $this->name = $name;
        }

        public function login(){
            echo $this->name . ' logged in <br />';
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            if(is_string($name) && strlen($name) > 1){
                $this->name = $name;
                return "name has been updated to $name <br />";
            } else {
                return 'not a valid name <br />';
            }
        }
    }

    $userOne = new User('cjdc','cjdc@coffeemonster.com');
    echo $userOne->setName('cjdc');
    echo $userOne->getName();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sessions</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="name"> 
        <select name="gender">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>