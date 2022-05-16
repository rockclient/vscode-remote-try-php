<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RockClient Anmeldung</title>
	<link rel="icon" href="titlebild.png" type="image/x-icon">
  </head>
  <body>
    <?php
    if(isset($_POST["submit"])){
      require("mysql.php");
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 1){
        $row = $stmt->fetch();
        if(password_verify($_POST["pw"], $row["PASSWORD"])){
          session_start();
          $_SESSION["username"] = $row["USERNAME"];
          header('Location: index2.php');
        } else {
          print "Falsches Passwort!";
        }
      } else {
        print "Falscher Username";
      }
    }
     ?>
<div class="wrapper">
    <form action="" method="post" class="form">
      <img src="avatar.png" alt="">
      <h2>Anmelden</h2>
            <a>Benutzername</a>
      <input type="text" name="username" required><br>
            <a>Passwort</a>
      <input type="password" name="pw" required><br>
      <input type="submit" name="submit" value="LOGIN">
</body>
<div class="bottom-text">
<a href="register.php">Noch keinen Account?</a>
 </div>
    <br>
<div class="socials">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
</div>
        <div id="overlay-area">

        </div>
</form> 
 </body>
</html>

<style>

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body{
background: bg.jpg;
background-size: cover;
font-family: sans-serif;
}

.wrapper {
height: 100vh;
width: 100vw;
display: flex;
justify-content: center;
align-items: center;
}

.form {
position: relative;
width: 100%;
max-width: 380px;
padding: 80px 40px 40px;
background: rgba(0,0,0,0.7);
border-radius: 10px;
color: #fff;
box-shadow: 0 15px 25px rgba(0,0,0,0.5);
}

.form::before {
content:'';
position: absolute;
top: 0;
left: 0;
width: 50%;
height: 100%;
background: rgba(255,255,255, 0.08);
transform: skewX(-26deg);
transform-origin: bottom left;
border-radius: 10px;
pointer-events: none;
}

.form img {
position: absolute;
top: -50px;
left: calc(50% - 50px);
width: 100px;
background: rgba(255,255,255, 0.8);
border-radius: 50px;
}

.form h2 {
text-align: center;
letter-spacing: 1px;
margin-bottom: 2rem;
color: #ff652f;
}

.form .input-group input {
width: 100%;
padding: 10px 0;
font-size: 1rem;
letter-spacing: 1px;
margin-bottom: 30px;
border: none;
border-bottom: 1px solid #fff;
outline: none;
background-color: transparent;
color: inhernit;
}

.from .input-group label {
position: absolute;
top: 0;
left: 0;
padding: 10px 0;
font-size: 1rem;
pointer-events: none;
transition: .3s ease-out;
}

.form .input-group input:focus + label,
.form .input-group input:valid + label {
transform: translateY(-18px);
color: #ff652f;
font-size: .8rem;
}

.submit-btn {
display: block;
margin-left: auto;
border: none;
outline: none;
background: #ff652f;
font-size: 1rem;
text-transform: uppercase;
letter-spacing: 1px;
padding: 10px 20px;
border-radius: 5px;
cursor: pointer;
}

#forgot-pw {
position: absolute;
display: flex;
justify-content: center;
align-items: center;
top: 0;
left: 0;
right: 0;
height: 0;
z-index: 1;
background: #fff;
opacity: 0;
transition: 0.6s;
}

#forgot-pw:target {
height: 100%;
opacity: 1;
}

.close {
position: absolute;
right: 1.5rem;
top: 0.5rem;
font-size: 2rem;
font-weight: 900;
text-decoration: none;
color: inherit;
}

.wrapper input{
    width: 100%;
    margin-bottom: 20px;
}

.wrapper input[type=text], .wrapper input[type=password] {
    border: none;
    border-bottom: 1px solid #ddd;
    background: transparent;
    outline: none;
    height: 30px;
    font-size: 16px;
    opacity: 1;
    color: #ccc;
}

.wrapper input[type=submit] {
    border: none;
    outline: none;
    height: 40px;
    background: #f6648b;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
}

.bottom-text{
    text-decoration: underline;
    text-align: center;
}

#overlay-area {
    position: absolute;
    background-image: url("bg.jpg");
    z-index: -5;
    height: 100%;
    width: 100%;
    top: 0;
    bottom: 0;
    background-size: cover;
}


</style>
