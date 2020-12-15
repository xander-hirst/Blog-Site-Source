<!DOCTYPE html>
<html lang="en">
<head>
  <title>Homework 5 Form</title>
  <meta charset ="utf-8"/>
</head>

<body>

  <?php

    ini_set('display_errors', '1');
    error_reporting(E_ALL);
  function print_form() {
  echo <<<END

    <form action="$_SERVER[PHP_SELF]" method="post">
    
    <p>
    First Name: 
    <input type = "text" name = "first" size = "15" /> <br /> <br />

    Last Name: 
    <input type = "text" name = "last" size = "15" /> <br /> <br />

    Email Address: 
    <input type = "text" name = "email" size = "30" /> <br /> <br />
    
    <input type="hidden" name="stage" value="process">
    <input type = "submit" name = "submit" value = "Submit" />
    </p>
    <hr />
  </form>
  
END;
  }

  function process_form() {

     try {
        $db = new PDO("mysql:host=mysql.truman.edu;dbname=ah6336CS315", "ah6336", "ughohwoo");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $error_present = false;
        $error = "";
  
        if (!preg_match("/^[a-zA-Z]{2,15}$/", $first)) {
           $error_present = true;
           $error .= "First name is invalid (Cannot have any non-alphabetic characters, must be 2-15 characters long), ";
        }
        if (!preg_match("/^[a-zA-Z]{2,15}$/", $last)) {
           $error_present = true;
           $error .= "Last name is invalid (Cannot have any non-alphabetic characters, must be 2-15 characters long), ";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $error_present = true;
           $error .= "Email address is invalid";
        }
	  
        if ($error_present == true) {
          print "<p>Error: $error </p>";
	  print "<p> Data not submitted to database </p>";
        } else {
           $stmt = $db->prepare("INSERT INTO hw5 (fname, lname, email)
           VALUES (:fname, :lname, :email)");
           $stmt->bindParam(':fname', $first);
           $stmt->bindParam(':lname', $last);
           $stmt->bindParam(':email', $email);

           $stmt->execute();
        }
     }
     catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
     }
     $db = null;
  print "<h3> Success, program finished executing </h3>";
  print "<br /> Thank you for entering your information.";
  print "<br /> To view all information, <a href=\"display_data.php?sortby=id\">click here</a>.";
  }

  if (isset($_POST['stage']) && ('process' == $_POST['stage'])) {
    process_form();
  } else {
    print_form();
  }
  ?>
  
</body>
</html>
