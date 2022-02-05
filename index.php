<?php 

if ( ! empty($_POST)) {

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$postcode = $_POST['postcode'];
$lunch = isset($_POST['lunch']) && $_POST['lunch'] == 'yes' ? 1 : 0;
$tickets = $_POST['tickets'];
$campus = $_POST['campus'];

$cost = 0;

if($tickets > 0){ // if tickets were selected
  $cost = 100*$tickets;
}
if($lunch == 1){ //if taking lunch
  $cost += 60; //add 60 to the total cost
}

/*
$sql = "insert into order_data ( name, email,  password, phone, post_code, lunch, tickets, campus) VALUES ('".$name."', '".$email."', '".$password."', '".$phone."', '".$postcode."', '".$lunch."', '".$tickets."', '".$campus."')";
*/


$sql = "INSERT INTO order_data ( name, email,  password, phone, post_code, lunch, tickets, campus) VALUES ('$name', '$email', '$password', '$phone', '$postcode', '$lunch', '$tickets', '$campus')";

include('connection.php');

$dbConnection = ConnectToDatabase();

$preparedSQL = $dbConnection->prepare($sql);

$preparedSQL->execute();



}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- This is how you link your external JS file to your HTML -->
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>



  <?php if(isset($status) && $status == 'create_success'): ?>
    <p>Order created successfully.</p>
  <?php endif; ?>

  <form name="myform" method="Post" onsubmit="return formSubmit();"  action="" >
    <label>Name</label>
    <input id="name" placeholder="First Last" type="text" name="name"><br/>

    <label>Email</label>
    <input id="email" placeholder="email@domain.com" type="email" name="email"><br/>

    <label>Password</label>
    <input id="password" placeholder="Password" type="password" name="password"><br/>

    <label>Phone</label>
    <input id="phone" placeholder="123-123-1234" type="phone" name="phone"><br/>

    <label>Post Code</label>
    <input id="postcode" placeholder="X9X 9X9" type="postcode" name="postcode"><br/>
    
    <label>Will you have lunch?</label>
    <input type="radio" value="yes" id="radio1" name="lunch">Yes
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" value="no" id="radio2" name="lunch">No
    <br/>

    <label>Number of Tickets</label>
    <select name="tickets" id="tickets">
        <option value="">----- Select -----</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select><br/>

    <label>Which Campus?</label>
    <select name="campus" id="campus">
        <option value="">----- Select -----</option>
        <option value="Doon">Doon</option>
        <option value="Waterloo">Waterloo</option>
        <option value="Cambridge">Cambridge</option>
    </select>

    <br/><br/>

    <input type="submit" value="Submit">
    <p id="errors"></p>
  </form>  
  
  <div class="formData">

  <?php if ( ! empty($_POST)): ?>
                Name: <?php echo $name; ?> <br>
                Lunch: <?php echo $lunch == 1 ? 'Yes' : 'No'; ?><br>
                Campus: <?php echo $campus; ?><br>
                Total Amount: $<?php echo $cost; ?><br>

  <?php else: ?>
    <p id="formResult">This is where the form data will show up.</p>
  <?php endif; ?>



  </div>
</body>
</html>




