<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  


<?php 
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <b>Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
</b>
  <br><br>
  <input class = "g-btn" type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

  $servername = "192.168.150.213";
  $username = "webprogss211";
  $password = "fancyR!ce36";
  $dbname = "webprogss211";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO jamauricio_myguest (name, email, website, comment, gender)
  VALUES ('$name','$email','$website','$comment','$gender')";
	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>
</div>
    <title>Website deisgn using HTML And CSS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <nav>
            <div class="logo">
                <img src="images2/dmauricio.png">
            </div>
            <div class="nav-links">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Spike</a></li>
                  <li><a href="#">About me</a></li>
                  <li><a href="#">Contact info</a></li>
                </ul>
            </div>
        </nav>

        <div class="information">
            <div class="overlay"></div>
            <img src="images2/spike.png" class="mobile">
            <div id="circle">
                <div class="feature one">
                    <div>
                      <h1>Introduction</h1>
                      <p>Hello there, it's a pleasure to meet you! My name is Juan Daniel A. Mauricio and</p>
                      <p>I'm a computer science student who is currently studying at Asia Pacific College. At </p>
                      <p>the moment, I am in my second year of studies. Apart from being interested in the</p>
                      <p>field of technology, I also have a passion for gaming and love to catch up on my </p>
                      <p>sleep whenever I can.</p>
                    </div>
                </div>
                <div class="feature two">
                    <div>
                      <h1>Contact Info</h1>
                      <p>Email: jamauricio@student.apc.edu.ph </p>
                      <p>Mobile Number: 0945 329 3989</p>
                      <p>Discord: danielllll#6676</p>  
                    </div>
                </div>
                <div class="feature three">
                    <div>
                      <h1>Values and Philosophy</h1>
                      <p>an individual has a strong work ethic and enjoys the process of achieving their </p>
                      <p>goals. They value hard work, dedication, and efficiency in their work, but also </p>
                      <p>prioritize taking breaks to rest and recharge. They believe in finding a balance</p>
                      <p>between school and rest for a healthy lifestyle.</p>
                    </div>
                </div>
                <div class="feature four">
                    <div>
                      <h1>Hobbies</h1>
                      <p>I love spending my free time doing things I enjoy, One of my favorite hobbies is playing fetch with my Golden Retriever,
                      I'm also an avid gamer and love playing popular titles like Valorant, CSGO, and Overwatch.
                      Lastly, I prioritize working out whenever I can to stay healthy. Taking care of my body is important to me
                      and I love feeling good after a good workout session. </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="controls">
            <img src="images2/arrow.png" id="upBtn">
            <h3>Features</h3>
            <img src="images2/arrow.png" id="downBtn">
        </div>

    </div>


    <script>
        var circle = document.getElementById("circle");
        var upBtn = document.getElementById("upBtn");
        var downBtn = document.getElementById("downBtn");

        var rotateValue = circle.style.transform;
        var rotateSum;


        upBtn.onclick = function()
        {
            rotateSum = rotateValue + "rotate(-90deg)"
            circle.style.transform = rotateSum;
            rotateValue = rotateSum;
        }
        downBtn.onclick = function()
        {
            rotateSum = rotateValue + "rotate(+90deg)"
            circle.style.transform = rotateSum;
            rotateValue = rotateSum;
        }
    </script>


</body>
</html>
