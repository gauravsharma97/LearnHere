<html>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="title_icon" href="download.ico" />
  

<style>
@import url('https://fonts.googleapis.com/css?family=Lato:300,400');

html, body {
  font-family: 'Lato', serif; 
overflow:hidden;  
}

.Container {
    display: flex;
    overflow: hidden;
    height: 100%;
   
    position: relative;
    width: 100%;
    backface-visibility: hidden;
    will-change: overflow;
}



</style>

</head>
<body>
<?php session_start();?>
<script>
function setURL(url){
    document.getElementById('iframe').src = url;
}
</script>
<nav class="navbar navbar-default navbar-fixed-top">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LearnHere</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <ul class="nav navbar-nav navbar-right">
       
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $_SESSION['firstname']?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://www.fgruber.ch/" target="_blank"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Profile</a></li>
            <li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
         </ul>
        </li>
      </ul>
	<div class="col-md-4 col-md-offset-3">
            <form action="" class="search-form">
                <div class="form-group has-feedback">
            		<label for="search" class="sr-only">Search</label>
            		<input type="text" class="form-control" name="search" id="search" placeholder="search">
              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
            	</div>
            </form>
        </div>
       
    <!-- /.navbar-collapse -->

  
  <!-- /.container-fluid -->
</nav>
 
 
        <div class="row" style="background-color:#F5B986">
		
		<div class="col-md-2" style="margin-top:150px" >
		 <center><button type="submit" onclick="setURL('URLHere')" class="btn btn-default"  style="width:170px">Top Feed   </button></center><br> <br>
		 
		 
		 <center><button type="submit" onclick="setURL('URLHere')" class="btn btn-default" style="width:170px">Yours Answers</button></center><br> <br>
		 <center><button type="submit" onclick="setURL('URLHere')" class="btn btn-default" style="width:170px">Your Asked Questions</button></center><br> <br>
		 </div>
		 
		 <div class="col-md-10" style="margin-top:50px" >
		 <iframe id ="if" src="new1.html" height=100% width=100% ></iframe>
		</div>
	</div>

	
	</body>

</body>
</html>