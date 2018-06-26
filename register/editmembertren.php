<?php 
header("Content-type: text/html;charset=utf-8"); 
require('includes/config.php');
if(!$user->is_logged_in()){ header('Location: logintren.php'); } 
//if logged in redirect to members page
//if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
// ------------------------------------
if(isset($_POST['submit'])){
//	$maxmembers=$_POST['maxmembers'];
//	$groupcat=$_POST['group'];
	
	//very basic validation
	/*if(strlen($_POST['username']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//if(!empty($row['username'])){
		//	$error[] = 'Username provided is already in use.';
		//}

	}*/

/*	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}*/

/*	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}*/

/*	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}*/

	//email validation
	/*if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Введіть правільний email';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email не унікальний, вже використовується!';
		}

	}*/
	
	if(strlen($_POST['prizvishe']) <= 0) {$error[] = 'Заповніть всі поля. '.'Прізвище';}
	if(strlen($_POST['name']) <= 0) {$error[] = 'Заповніть всі поля. '."Ім'я";}
	if(strlen($_POST['pobatkovi']) <= 0) {$error[] = 'Заповніть всі поля. '.'По батькові';}
	/*if(strlen($_POST['birthday']) <= 0) {$error[] = 'Заповніть всі поля. '.'Дата народження';}
	
	if (($_POST['misceroboty'])== 1) {if (strlen($_POST['centrevlada'])<=0) {$error[] = 'Заповніть всі поля. '.'Орган влади центральний';}
								       else {list ($vladaname,$maxvladamembers) = vlada_name_membr($_POST['centrevlada']);}}
	if ((($_POST['misceroboty'])== 2)&& (strlen($_POST['organvlady'])<=0)) {$error[] = 'Заповніть всі поля. '.'Орган влади інший';}*/

	//if(strlen($_POST['organvlady']) <= 0) {$error[] = 'Заповніть всі поля. '.'Орган влади';}	
	/*if(strlen($_POST['adresamisto']) <= 0) {$error[] = 'Заповніть всі поля. '.'Нас. пункт';}*/
	//if(strlen($_POST['adresaraion']) <= 0) {$error[] = 'Заповніть всі поля. '.'Район';}
	//if(strlen($_POST['adresaoblast']) <= 0) {$error[] = 'Заповніть всі поля. '.'Область';}	
	/*if(strlen($_POST['posada']) <= 0) {$error[] = 'Заповніть всі поля. '.'Повна назва посади';}*/
	if(strlen($_POST['slugtelefon']) <= 0) {$error[] = 'Заповніть всі поля. '.'Службовий телефон 0YY XXXXXXX';}
	/*if(strlen($_POST['category']) <= 0) {
		$error[] = 'Заповніть всі поля. '.'Категорія оплати (А Б В)';
		$error[] = 'Заповніть всі поля. '.'Група оплати праці';		
		$error[] = 'Заповніть всі поля. '.'Ранг державної служби'; }
	else {
		if(strlen($_POST['groplata']) <= 0) {$error[] = 'Заповніть всі поля. '.'Група оплати праці';}
		if(strlen($_POST['rang']) <= 0) {$error[] = 'Заповніть всі поля. '.'Ранг державної служби';}	}
	if(strlen($_POST['stagdergyear']) <= 0) {$error[] = 'Заповніть всі поля. '.'Стаж державної служби, років';}
	//if(strlen($_POST['stagdergmonth']) <= 0) {$error[] = 'Заповніть всі поля. '.'Стаж державної служби, місяців';}
	if(strlen($_POST['stagposadayear']) <= 0) {$error[] = 'Заповніть всі поля. '.'Стаж роботи на посаді, що займаєте, років';}
	//if(strlen($_POST['stagposadamonth']) <= 0) {$error[] = 'Заповніть всі поля. '.'Стаж роботи на посаді, що займаєте, місяців';}
	//if(strlen($_POST['osvitavnz']) <= 0) {$error[] = 'Заповніть всі поля. '.'Перша вища освіта. Назва ВНЗ';}
	//if(strlen($_POST['osvitayear']) <= 0) {$error[] = 'Заповніть всі поля. '.'Перша вища освіта. Рік закінчення';}
	//if(strlen($_POST['osvitaspec']) <= 0) {$error[] = 'Заповніть всі поля. '.'Перша вища освіта. Спеціальність';}
	//if(strlen($_POST['pisliaosvitavnz']) <= 0) {$error[] = 'Заповніть всі поля. '.'Післядипломна освіта. Назва ВНЗ';}
	//if(strlen($_POST['pisliaosvitayear']) <= 0) {$error[] = 'Заповніть всі поля. '.'Післядипломна освіта. Рік закінчення';}
	//if(strlen($_POST['pisliaosvitaspec']) <= 0) {$error[] = 'Заповніть всі поля. '.'Післядипломна освіта. Спеціальність';}
	//if(strlen($_POST['naukastup']) <= 0) {$error[] = 'Заповніть всі поля. '.'Науковий ступінь, вчене звання';}
	//if(strlen($_POST['tema']) <= 0) {$error[] = 'Заповніть всі поля. '.'Тема випускної роботи';}	
	if(strlen($_POST['pidvishenia']) <= 0) {$error[] = 'Заповніть всі поля. '.'Чи підвищували кваліфікацію за останні 3 роки';}	*/

	//if no errors have been created carry on
	if(!isset($error)){
		try {
		/*if (($_POST['misceroboty'])== 1){	
			$stmt = $db->prepare('SELECT COUNT(*) as countvlada FROM members WHERE (groupcat = :groupcat) AND (centrevlada = :centrevlada) AND (username <> :username) GROUP BY groupcat ');
			$stmt->execute(array('groupcat' => $_SESSION['groupcat_s'],
								'centrevlada' => $_POST['centrevlada'],
								':username' => $_POST['username']
							));

			$rowvlada = $stmt->fetch(PDO::FETCH_ASSOC);
			//echo "Group ". $_SESSION['groupcat_s'] . ". Members for Vlada " . $vladaname . " = ". $rowvlada['countvlada'] ." Max = " . $maxvladamembers . ".;"; exit;
			if ($rowvlada['countvlada']>=$maxvladamembers) { 
				$error[] = "Реєстрація для Центрального органа влади: '" . $vladaname . "' закрита (вже зареєстрована максімальна кількість слухачів = " . $maxvladamembers . "/" . $rowvlada['countvlada'] . "). "; 
			}
		}*/
		if(!isset($error)) {
				//hash the password
				/* $hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);*/

				//create the activasion code
				/* $activasion = md5(uniqid(rand(),true));*/
				//echo "G2".$groupcat."GG"; 
			try {
			/*		try {
						$stmt = $db->prepare('SELECT COUNT(*) as count FROM members WHERE groupcat = :groupcat AND active="Yes" GROUP BY groupcat ');
						$stmt->execute(array('groupcat' => $groupcat));

						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						//echo "COUNT members group".$groupcat." = ". $row['count'] .".";
						if ($row['count']>=$maxmembers) { 

							$registrclosedonline = "Реєстрацію закінчено. Групу слухачів сформовано."; $groupcat=0; 
							//echo "+".$registrclosedonline."+".$row['count']."+".$maxmembers."+";
							//echo "G2_1".$groupcat."GG"; 
							}
					} catch(PDOException $e) {
						echo '<p class="bg-danger">'.$e->getMessage().'</p>';
					}*/

		//echo "====!".$hashedpassword."!==".$activasion."!==";
		//echo "<script>console.group('".$hashedpassword."');console.log('$hashedpassword=');console.groupEnd();</script>";
		//exit;
					//insert into database with a prepared statement
					//echo "G3".$groupcat."GG=ISRERT="; 
					$stmt = $db->prepare('UPDATE memberstren SET 
							prizvishe= :prizvishe, 
							name= :name, 
							pobatkovi= :pobatkovi,
							adresamisto= :adresamisto, 
							posada= :posada, 
							slugtelefon= :slugtelefon, company = :company, adresacomp = :adresacomp WHERE username = :username'  );
					$stmt->execute(array(
						':prizvishe' => $_POST['prizvishe'], 
						':name' => $_POST['name'], 
						':pobatkovi' => $_POST['pobatkovi'], 				
						':adresamisto' => $_POST['adresamisto'],
						':posada' => $_POST['posada'], 
						':slugtelefon' => $_POST['slugtelefon'],
						':company' => $_POST['company'],
						':adresacomp' => $_POST['adresacomp'],
						':username' => $_POST['username']
					));
					/*$id = $db->lastInsertId('memberID');*/

					//send email
		/*			$to = $_POST['email'];
					$subject = "Registration Confirmation";
					$body = "<p>Thank you for registering at demo site.</p>
					<p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
					<p>Regards Site Admin</p>";

					$mail = new Mail();
					$mail->setFrom(SITEEMAIL);
					$mail->addAddress($to);
					$mail->subject($subject);
					$mail->body($body);
					$mail->send();*/

					//redirect to index page
					 header('Location: memberpagetren.php');  //header('Location: index.php?action=joined');
					exit;

				//else catch the exception and show the error.
				} catch(PDOException $e) {
					$error[] = $e->getMessage();
				}
			}
		} catch(PDOException $e) {
			$error[] = $e->getMessage();
		}		
	}
//if form opened for edit 
//----------------------------------------------
} else {
			try {
			$stmt = $db->prepare('SELECT * FROM memberstren WHERE username= :username');
			$stmt->execute(array('username' => $_SESSION['username_s']));

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$username =$row['username']; 
			$email =$row['email']; 
			$groupcat = $row['groupcat'];
			$_SESSION['groupcat_s'] = $groupcat;
			try {
				$stmt = $db->prepare('SELECT COUNT(*) as count FROM memberstren WHERE groupcat = :groupcat GROUP BY groupcat ');
				$stmt->execute(array('groupcat' => $groupcat));

				$row1 = $stmt->fetch(PDO::FETCH_ASSOC);
				//echo "COUNT members group".$groupcat." = ".$row1['count']."=".$username."="; exit;
				$_SESSION['count_s'] = $row1['count'];
				//else catch the exception and show the error.
				} catch(PDOException $e) {
						echo '<p class="bg-danger">'.$e->getMessage().'</p>';
				}
			//else catch the exception and show the error.
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
			list ($groupname, $maxgroupmembers) = grname($groupcat); 
			$_SESSION['groupname_s'] = $groupname;
			$_SESSION['maxmembers_s'] = $maxgroupmembers;
			//echo "==".$_SESSION['groupcat_s']."==".$_SESSION['username_s']."==".$_SESSION['groupname_s']."==".$groupname."==";exit;
			/*try {
			$stmt = $db->prepare('SELECT * FROM grouptema WHERE groupcat= :groupcat');
			$stmt->execute(array('groupcat' => $groupcat));

			$row1 = $stmt->fetch(PDO::FETCH_ASSOC);
			$groupname =$row1['groupname']; 

			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}	*/		
}
//----------------------------------------------
//define page title
$title = 'Редагування даних';

//include header template
require('layout/header.php');
?>

<div class="container">

	<div class="row needfield">

	    <div class="col-xs-12 col-sm-8 col-md-16 col-sm-offset-2 col-md-offset-1">
			<form name="form_reg" role="form" method="post" action="" autocomplete="off">

				<h2>Редагування данних. </h2>
				<h3><?php if (defined('DEBUG') && DEBUG) {echo $_SESSION['count_s']."/".$_SESSION['maxmembers_s']."(".$_SESSION['groupcat_s'].")".":";}  echo $_SESSION['groupname_s']; ?></h3>
				<!--p>Вже зареєстровані? <a href='login.php'>Увійти</a></p-->

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				
				
				
				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Редагування завершено!<br />";
					echo "Можете <a href='logintren.php'>увійти</a> зі своім логіном+паролем для редагування своіх даних. 
					Або <a href='../nads/nadsnew.shtml'>повернутися</a> на сайт.</h2>";
					//echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}else {
				?>
				<hr style="border: 1px solid #000;">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
					<label>Ім'я для входу/Email</label>					
						<div class="form-group">
							<input readonly type="text" name="username" id="username" class="form-control " placeholder="Ім'я для входу" title="Тільки латінські літери и ціфри" 
							value="<?php if(isset($error)){ echo $_POST['username']; } else echo $username;?>" tabindex="1">
						</div>
					</div>

				</div>
				
				<label>ПІБ</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="prizvishe" id="prizvishe" class="form-control " placeholder="Прізвище" 
							value="<?php if(isset($error)){ echo $_POST['prizvishe']; } else echo $row['prizvishe'];?>" title="Прізвище" tabindex="5">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control " placeholder="Ім'я" 
							value="<?php if(isset($error)){ echo $_POST['name']; } else echo $row['name'];?>" title="Ім'я" tabindex="6">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="pobatkovi" id="pobatkovi" class="form-control " placeholder="По батькові" 
							value="<?php if(isset($error)){ echo $_POST['pobatkovi']; } else echo $row['pobatkovi'];?>" title="По батькові" tabindex="7">
						</div>
					</div>
				</div>
				
				<label>Назва компанії</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="company" id="company" class="form-control " placeholder="Назва компанії" 
							value="<?php if(isset($error)){ echo $_POST['company']; } else echo $row['company'];?>" title="Назва компанії" tabindex="10">
						</div>
					</div>
				</div>					
				<label>Адреса компанії</label>
				<div class="row">					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="adresacomp" id="adresacomp" class="form-control " placeholder="Адреса компанії" 
							value="<?php if(isset($error)){ echo $_POST['adresacomp']; } else echo $row['adresacomp'];?>" title="Адреса компанії" tabindex="11">
						</div>
					</div>
				</div>
				<label>Назва посади</label><span>*</span>	
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="posada" id="posada" class="form-control " placeholder="Назва посади" 
							value="<?php  if(isset($error)){ echo $_POST['posada']; } else echo $row['posada'];?>" title="Назва посади" tabindex="13">
						</div>
					</div>
				</div>
				
				<label>Населений пункт</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="adresamisto" id="adresamisto" class="form-control " placeholder="Нас. пункт" 
							value="<?php if(isset($error)){ echo $_POST['adresamisto']; } else echo $row['adresamisto'];?>" title="Нас. пункт" tabindex="10">
						</div>
					</div>
				</div>

				<label>Телефон 0YYXXXXXXX</label><span>*</span>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="tel" pattern="0[0-9]{9}" name="slugtelefon" id="slugtelefon" class="form-control " placeholder="Телефон 0YYXXXXXXX" 
							value="<?php  if(isset($error)){ echo $_POST['slugtelefon']; } else echo $row['slugtelefon'];?>" title="Телефон 0YYXXXXXXX" tabindex="14">
						</div>
					</div>
				</div>				

				<hr style="border: 1px solid #000;">
				<p><span>* </span>Обов'язкові поля</p>
				<div class="row">
					<!--input type="hidden" name="group" id="group" class="form-control input-lg" value="<php echo $groupcat; ?>" >
					<input type="hidden" name="maxmembers" id="maxmembers" class="form-control input-lg" value="<php echo $maxmembers; ?>" -->
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Зберегти" class="btn btn-primary btn-block btn-lg" tabindex="31"></div>
					<!--p><a href='../nads/nads.shtml'>Відміна</a></p-->
					<p><a href='memberpagetren.php'>Відміна</a></p>					
				</div>
			</form>
		</div>
	</div>

</div>
<?php				}
				?>

<?php
//include header template
require('layout/footer.php');
?>
</div>

<?php
//include header template
require('layout/footer.php');
?>