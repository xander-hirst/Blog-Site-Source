<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Homework 5 Form</title>
</head>

<body>
  <?php

function doGetAll() {
  $sortby = $_GET['sortby'];

  if ($sortby == "") {$sortby = "id";}

  if (($sortby != "id") && ($sortby != "fname") && ($sortby != "lname") && ($sortby != "email")){exit;}

  $db = new PDO("mysql:host=mysql.truman.edu;dbname=ah6336CS315", "ah6336", "ughohwoo");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $db->prepare("SELECT id, fname, lname, email FROM hw5 ORDER BY $sortby");

  $stmt->execute();

  echo <<<END

	   <p>Here is all of the information sorted by $sortby:</p>

	   <table border =\"1\">
	     <th><a href="display_data.php?sortby=id">ID</a></th>
	     <th><a href="display_data.php?sortby=fname">First Name</a></th>
	     <th><a href="display_data.php?sortby=lname">Last Name</a></th>
	     <th><a href="display_data.php?sortby=email">Email</a></th>
END;

  while ($row = $stmt->Fetch(PDO::FETCH_ASSOC)){
    print "<tr><td>{$row['id']}</td><td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['email']}</td></tr>";
  }
  print "</table>";
}

doGetAll();
$db = null;
?>
</body>
</html>
