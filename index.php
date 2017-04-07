<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>LearnHere</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body background="new.png">
<?php include 'check.php';?>
<div>
<h1><br>LearnHere</h1>

</div>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">* <?php echo $firstnameErr?></span>
              </label>
              <input type="text" name="firstname"required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">* <?php echo $lastnameErr?></span>
              </label>
              <input type="text"name ="lastname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">* <?php echo $emailErr?></span>
            </label>
            <input type="email"name ="email"  required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
			  <span class=msg><br><?php echo $passwordErr?></span>
            </label>
            <input type="password" name ="password" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name ="lemail" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name ="lpassword" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
