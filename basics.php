<?php 
    // be 'framework-agnostic'
    // not dependent on the framework
    // reusable code that can be used anywhere

    // OOP PHP

    // 41, 42 - classes & objects
        // public function __construct(){}
        // getter and setter

    // 39, 40 - file system
        // readfile($file);
        // file_exists($file);
        // copy($file, 'copy.txt'');
        // realpath($file);
        // filesize($file);
        // rename($file, 'renamed.txt'');
        // mkdir();
        // open file
            // $handle = fopen($file, 'r');
        // read file
            // fread($handle, filesize($file));
        // read a single line
            // fgets($handle);
        // read a single character
            // fgets($handle);
        // writing to a file
            // $handle = fopen($file, 'r+');
            // fwrite($handle, "\nThis is the output of writing.")
            // $handle = fopen($file, 'a+'); - this starts the pointer at the very end therefore adding the new line at the last 
            // https://www.w3schools.com/php/func_filesystem_fopen.asp
        // fclose($handle);
        // delete a file
            // unlink($file);

    // 38 - cookies
        // stored on the user's computer not on the server
        // setcookie(cookiename,value that we apply to that cookie,expiry);

    // 37 - null coalescing 
        // $name = $_SESSION['name'] ?? 'Guest';
        // it's like using a default/backup value

    // 36 - sessions
        // stored on the user's server not on the computer
        // keeps track of data as a user navigates around a website on different pages until they close the webpage
        // one practical usage of this is in login functionality, a successful login will redirect them to the homepage 
        // session_start();
        // $_SESSION['name'];
        // unsetting a single session variable - unset($_SESSION['name']);
        // unset them all - session_unset();

    // 35 - superglobals
        // special array variables
        // $_GET['name'], $_POST['name']
        // $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_METHOD'], $_SERVER['SCRIPT_FILENAME'], $_SERVER['PHP_SELF']
        // $_SESSION, $_COOKIE

    // 34 - ternary operators
        // $score = 50;
        // $rating = $score > 45 ? 'high score!' : 'low score :(';
        // echo $rating; 
        // or
        // echo $score > 45 ? 'high score!' : 'low score :(';

    // 29 - control flow alt syntax
        // replace { }
        // example 1:
        // foreach(){
        // }
        // foreach():
        // endforeach;

        // example 2:
        // if(){
        // } else {
        // }
        // if():
        // else:
        // endif;

    // 28 - explode function
        // explode(separator, string)
        // we take in a string and explode it into an array and we cycle through that array

    // 23 to 27 - communicating with database

    // 22 - checking for errors & redirecting
        // if no errors, form is valid and redirect to home
        // array_filter() - cycles through an array and performs a callback function on each iteration

    // 19 to 21 - basic form validation, filter & more validation, showing errors, retaining values
        // empty()
        // filter_var(variable we want checked, type of filter we want to apply)
        // we can use regular expressions if there is no available builtin filter/check applicable
        // preg_match(regular expression, variable we want checked)

    // 18 - XSS attacks (cross site scripting attacks)
        // third party injects malicious code into your website and it can occur
        // anywhere an end user inputs data
        // for example they input a code to redirect you to a malicious website
        // this is prevented through htmlspecialchars()
        //  it looks at the input data and turns any special html characters (e.g. <,")
        //  into html entities -> safe string version codes for special characters

    // 17 - forms in PHP & isset function
        // checks whether a certain variable has been set
        // $_GET - is a global array
        // when we make a GET/POST request, all data will be stored in our server in this variable
        // these are called globals (they start with $_)
        // POST method is more secure since data won't be shown in the address/URL bar

    // 15 - include and require
        // if require fails (ex. wrong filename/path), it does not go on with the rest of the code
        // include carries on with the code
    include('reference.php');
    require('reference.php');
    echo 'That\'s include and require <br />';

    $firstName = 'Yoda';
    $lastName = 'Ackermann';
    $age = 26.1;
    $emailName = 'yodaman';
    $emailExtension = '@starwars.com';

    // indexed arrays - we use the index of the element to access them
    $firstArray = ['A','B','C'];
    $secondArray = array('D','E');
    $secondArray[] = 'F';
    array_push($secondArray, 'G');
    $thirdArray = array_merge($firstArray, $secondArray);

    // associative arrays (key & value pairs)
    $fourthArray = ['backend' => 'php', 'frontend' => 'react', 'database' => 'mysql', 'field' => 'ece'];
    $fifthArray = array('sap' => 'abap');
    $fifthArray['dashboard'] = 'splunk';
    $sixthArray = array_merge($fourthArray, $fifthArray);

    //multidimensional arrays
    $seventhArray = [
        ['singapore','korea','japan'],
        ['germany','france','switzerland'],
        ['first' => 'australia','second' => 'canada']
    ];
    $seventhArray[] = ['color' => 'red', 'size' => 'regular'];

    function sentence(){
        $firstName = 'Yoda';
        $lastName = 'Ackermann';
        $age = 26;
        $emailName = 'yodaman';
        $emailExtension = '@starwars.com';
        echo "I am $firstName $lastName who is floor $age years old. Reach me at $emailName$emailExtension";
    }

    $players = [
        ['name' => 'kobe', 'number' => 8],
        ['name' => 'kevin', 'number' => 35],
        ['name' => 'jordan', 'number' => 23],
        ['name' => 'russ', 'number' => 0]
    ];

    // loops
    // for($i = 0; $i < count($sixthArray); $i++){
    //     echo 'Waaa!';
    // }
    // foreach($sixthArray as $array){
    //     echo 'Nice';
    // }
    // $ninjas = ['tobi','wan','aladin','yoda'];
    // for($i = 0; $i < count($ninjas); $i++){
    //     echo $ninjas[$i] . '<br />';
    // }
    // foreach($ninjas as $ninja){
    //     echo $ninja . '<br />';
    // }
    // $players = [
    //     ['name' => 'kobe', 'number' => 8],
    //     ['name' => 'kevin', 'number' => 35],
    //     ['name' => 'jordan', 'number' => 23],
    //     ['name' => 'russ', 'number' => 0]
    // ];
    // foreach($players as $player){
    //     echo $player['name'] . ' is wearing jersey number ' . $player['number'] . '<br />';
    // }

    // while loops
    // $i = 0;
    // while($i < count($players)){
    //     echo $players[$i]['name'];
    //     echo '<br />';
    //     $i++;
    // }

    // conditional statements
    // foreach($players as $player){
    //     if($player['number'] < 20 && $player['number'] > 5){
    //         echo $player['name'] . '<br />';
    //     };
    // }

    // break and continue
    //  break; - exits completely and does not continue to the next iteration
    //  continue; - skips the rest of the code but continues to the rest of the iteration
    
    // functions
    function info($product){
        return "{$product['name']} costs {$product['price']} to buy <br />";
    }

    $holder = info(['name' => 'House', 'price' => 999]);
    
    // variable scope
    // local scope - variables declared inside a function cannot be called outside that function
    // global scope - variables declared outside the function then declared as global inside the function so that it can be used
    $test = 'hard';
    // function difficulty(){
    //     global $test;
    //     $test = 'easy';
    //     echo "hello $test";
    // }
    // difficulty();
    function difficulty(&$test){
        $test = 'easy';
        echo "hello $test";
    }
    difficulty($test);
    echo $test; // $test didn't change to easy since $test was used as a parameter thus making it local
    // but if we add & to the parameter making it &test, the changes to the variable becomes global

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP God</title>
</head>
<body>
    <h3>Username: <?php echo $firstName; ?></h3>
    <h3>Lastname: <?php echo $lastName; ?></h3>
    <h3>Age: <?php echo floor($age); ?></h3>
    <h3>Email: <?php echo $emailName.$emailExtension; ?></h3>
    <h3><?php echo 'using single quotes: 1. $emailExtension'; ?></h3>
    <h3><?php echo "using double quotes: 2. $emailExtension - this is called variable interpolation"; ?></h3>
    <h3><?php sentence(); ?></h3>
    <h3><?php print_r($thirdArray); ?></h3>
    <h3><?php echo $thirdArray[4]; ?></h3>
    <h3><?php echo $fourthArray['backend']; ?></h3>
    <h3><?php print_r($fifthArray); ?></h3>
    <h3><?php echo count($sixthArray); ?></h3>
    <h3><?php print_r($seventhArray[3]['color']); ?></h3>
    <h2>Players</h2>
    <ul>
        <?php foreach($players as $player){ ?>
            <?php if($player['number'] < 20){ ?>
                <li><?php echo strtoupper($player['name']); ?></li>
                <li><?php echo $player['number']; ?></li>
            <?php } ?>
        <?php } ?>
    </ul>
    <h3><?php echo $holder; ?></h3>

</body>
</html>