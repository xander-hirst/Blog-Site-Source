<!DOCTYPE html>
  <html lang="en">
   
    <head>
      <title>The Dota Quiz</title>
      <link href="localstyle.css" type="text/css" rel="stylesheet" />
      <meta charset="utf-8" />
      <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
   
    <body>
    <div class="navbar">
   <ul>
    <li><a href="home.html"><img src="images/Dota-2-Logo.png" width="17" height="17" alt="dota logo"></a></li>
    <li><a href="favhero1.html">Xander's Favorite Hero</a></li>
    <li><a href="favhero2.html">Jake's Favorite Hero</a></li>
    <li><a href="tourneysched.html">Tournament Schedule</a></li>
    <li><a href="tierlist.php">Neutral Item Tierlist</a></li>
    <li><a href="dotaquiz.php" class="active">DotA Quiz</a></li>
    <li><a href="interactivequiz.html">Hero Guessing Game</a></li>
  </ul>
  </div>
  
  <div class="content">
  <div class="quiz">
     <h1>Dota 101 Quiz</h1>
    <img src="images/shopkeeper.jpg" alt="Image of the shopkeeper">
    <?php
     
      function print_form(){
        echo <<<END
        <form action="$_SERVER[PHP_SELF]" method="post">
     
          
         
          <p>1) In order to win the game, you must destroy the ______</p>
          <input type="radio" id="Nexus" name="ancient" value="Nexus">
          <label for="Nexus">Nexus</label><br />
          <input type="radio" id="Ancient" name="ancient" value="Ancient">
          <label for="Ancient">Ancient</label><br />
          <input type="radio" id="Titan" name="ancient" value="Titan">
          <label for="Titan">Titan</label><br />
          <input type="radio" id="Core" name="ancient" value="Core">
          <label for="Core">Core</label><br />
     
          <p>2) What type of game is Dota considered to be?</p>
          <input type="radio" id="FPS" name="game" value="FPS">
          <label for="FPS">FPS</label><br />
          <input type="radio" id="RTS" name="game" value="RTS">
          <label for="RTS">RTS</label><br />
          <input type="radio" id="MOBA" name="game" value="MOBA">
          <label for="MOBA">MOBA</label><br />
          <input type="radio" id="Card" name="game" value="Card">
          <label for="Card">Card</label><br />
         
          <p>3) What are the three types of heroes?</p>
          <input type="radio" id="EWF" name="type" value="EWF">
          <label for="EWF">Earth, Wind, and Fire</label><br />
          <input type="radio" id="LDN" name="type" value="LDN">
          <label for="LDN">Light, Dark, and Neutral</label><br />
          <input type="radio" id="MWR" name="type" value="MWR">
          <label for="MWR">Magician, Warrior, and Rogue</label><br />
          <input type="radio" id="SAI" name="type" value="SAI">
          <label for="SAI">Strength, Agility, and Intelligence</label><br />
         
          <p>4) Which game was modded and ended up becoming Dota?</p>
          <input type="radio" id="HON" name="mod" value="HON">
          <label for="HON">Heroes of Newerth</label><br />
          <input type="radio" id="Strife" name="mod" value="Strife">
          <label for="Strife">Strife</label><br />
          <input type="radio" id="Vainglory" name="mod" value="Vainglory">
          <label for="Vainglory">Vainglory</label><br />
          <input type="radio" id="WC3" name="mod" value="WC3">
          <label for="WC3">Warcraft 3</label><br />
         
          <p>5) What is DOTA an acroynm for?</p>
          <input type="text" name="DOTA" size="12">
         
          <p>6) The largest professional Dota 2 eSports event is the ____________</p>
          <input type="text" name="international" size="12">
         
          <input type="hidden" name="stage" value="process">
          <br />
          <input type="submit" value="Submit">
       
        </form>
END;

    }  
     
      function process_form()
      {
        $answer1=$_POST['ancient'];
        $answer2=$_POST['game'];
        $answer3=$_POST['type'];
        $answer4=$_POST['mod'];
        $answer5=$_POST['DOTA'];
        $answer6=$_POST['international'];
       
        $correct_count = 0;
       
        if ($answer1 == "Ancient")
        {
          $correct_count++;
          print "<p>Question 1 was correct.\n</p>";
        }else{
          print "<p>Question 1 was incorrect.\n</p>";
        }
       
        if ($answer2 == "MOBA")
        {
          $correct_count++;
          print "<p>Question 2 was correct.\n</p>";
        }else{
          print "<p>Question 2 was incorrect.\n</p>";
        }
       
        if ($answer3 == "SAI")
        {
          $correct_count++;
          print "<p>Question 3 was correct.\n</p>";
        }else{
          print "<p>Question 3 was incorrect.\n</p>";
        }
       
        if ($answer4 == "WC3")
        {
          $correct_count++;
          print "<p>Question 4 was correct.\n</p>";
        }else{
          print "<p>Question 4 was incorrect.\n</p>";
        }
       
        if (preg_match("/Defense of the Ancients/i", $answer5))
        {
          $correct_count++;
          print "<p>Question 5 was correct.\n</p>";
        }else{
          print "<p>Question 5 was incorrect.\n</p>";
        }
       
        if (preg_match("/internal/i", $answer6) || preg_match("/TI/i", $answer6))
        {
          $correct_count++;
          print "<p>Question 6 was correct. \n</p>";
        }else{
          print "<p>Question 6 was incorrect.\n</p>";
        }
       
        print "<p>You got a total of $correct_count out of 6 correct answers!</p>";
       
END;
      }
     
      if (isset($_POST['stage']) && ('process' == $_POST['stage']))
      {
        process_form();
      }else{
      print_form();
      }
    ?>
    </div>
    </div>
    </body>
  </html>
