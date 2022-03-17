<style>
body#LoginForm{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}</style>
<body id="LoginForm">
<div class="container">
<!--<h1 class="form-heading">login Form</h1>-->
<div class="login-form" >
<div class="main-div">
    <div class="panel">
   <h2>Login</h2>
   <p>Please enter your email and password</p>
   </div>
  <?php if(isset($errors) && count($errors) > 0) {  $message1 = json_decode($errors,true);
				?>
				<!--div class="ajax_report alert-message alert alert-danger updatecartDetail" role="alert"-->
				<?php
				foreach($message1['message'] as $val){
					echo '<span class="ajax_message updateclientmessage">'.$val.'</span></br>';
				}
				?>
				 <!--/div-->
				<?php
			  }

			  ?>
  
    <form class="form-signin" role="form" action="<?php echo URL('/login-form-save');?>" method="post" id="Login" _lpchecked="1">
  <h5 class="form-signin-heading" style="color:red"></h5>
        <div class="form-group">

<input type="text" class="form-control" name="email" placeholder="email" required="" autofocus="" id="inputEmail">
            
        </div>

        <div class="form-group">
<input type="password" class="form-control" name="password" placeholder="password" required="" id="inputPassword">
           
        </div>
<!--        <div class="forgot">-->
<!--        <a href="reset.html">Forgot password?</a>-->
<!--</div>-->
      
 <button class="btn btn-lg btn-primary btn-block" type="submit" >Login</button>
    </form>
    </div>
<!--<p class="botto-text"> Designed by Yo</p>-->
</div></div>




</body>