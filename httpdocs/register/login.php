<?php   
header("Content-type: text/html;charset=utf-8");
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: index.php'); } 

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
		$_SESSION['username'] = $username;
		if (($_SESSION['username']=='centrekiev')) {$_SESSION['admin']=true; } else {$_SESSION['admin']=false;} 
		header('Location: memberpage.php');
		exit;
		
	} else {
		$error[] = "Невірне ім'я користувача чи пароль або ваш обліковий запис не активовано.";
	}

}//end if submit

//define page title
$title = 'Login';

//include header template
require('layout/header.php'); 
?>

	
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Вхід</h2>
				<!--p>Ще не зареєстровані? <a href='./'>Реєстрація!</a></p-->
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Вітаємо! Ваш обліковий запис активован. Можете здійснити вхід для редагування своїх даних.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Перевірте свою електронну пошту, Вам надіслано листа з посиланням для скидання пароля.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Пароль змінено, можете здійснити вхід для редагування своїх даних.</h2>";
							break;
					}

				}

				
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Ім'я для входу" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Пароль" tabindex="3">
				</div>
				
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <a href='reset.php'>Забули пароль?</a>
					</div>
				</div>
				
				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Зайти" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
					<p><a href='../nads/nadsnew.shtml'>Відміна</a></p>
				</div>
			</form>
		</div>
	</div>



</div>


<?php 
//include header template
require('layout/footer.php'); 
?>
