<?php 
header("Content-type: text/html;charset=utf-8"); 
require('includes/config.php');
if(!$user->is_logged_in()){ header('Location: login.php'); } 
//if logged in redirect to members page
//if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
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
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Введіть правільний email';
	}/* else {
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
	if(strlen($_POST['birthday']) <= 0) {$error[] = 'Заповніть всі поля. '.'Дата народження';}
	
	if ((($_POST['misceroboty'])== 1)&& (strlen($_POST['centrevlada'])<=0)) {$error[] = 'Заповніть всі поля. '.'Орган влади ц';}
	if ((($_POST['misceroboty'])== 2)&& (strlen($_POST['organvlady'])<=0)) {$error[] = 'Заповніть всі поля. '.'Орган влади і';}

	//if(strlen($_POST['organvlady']) <= 0) {$error[] = 'Заповніть всі поля. '.'Орган влади';}	
	if(strlen($_POST['adresamisto']) <= 0) {$error[] = 'Заповніть всі поля. '.'Нас. пункт';}
	//if(strlen($_POST['adresaraion']) <= 0) {$error[] = 'Заповніть всі поля. '.'Район';}
	//if(strlen($_POST['adresaoblast']) <= 0) {$error[] = 'Заповніть всі поля. '.'Область';}	
	if(strlen($_POST['posada']) <= 0) {$error[] = 'Заповніть всі поля. '.'Повна назва посади';}
	if(strlen($_POST['slugtelefon']) <= 0) {$error[] = 'Заповніть всі поля. '.'Службовий телефон 0YY XXXXXXX';}
	if(strlen($_POST['category']) <= 0) {$error[] = 'Заповніть всі поля. '.'Категорія оплати (А Б В)';}
	if(strlen($_POST['groplata']) <= 0) {$error[] = 'Заповніть всі поля. '.'Група оплати праці';}
	if(strlen($_POST['rang']) <= 0) {$error[] = 'Заповніть всі поля. '.'Ранг державної служби';}	
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
	if(strlen($_POST['pidvishenia']) <= 0) {$error[] = 'Заповніть всі поля. '.'Чи підвищували кваліфікацію за останні 3 роки';}	

	//if no errors have been created carry on
	if(!isset($error)){

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
			$stmt = $db->prepare('UPDATE members SET 
					prizvishe= :prizvishe, 
					name= :name, 
					pobatkovi= :pobatkovi,
					birthday= :birthday, 
					organvlady= :organvlady, 
					misceroboty= :misceroboty, 
					centrevlada= :centrevlada, 
					adresamisto= :adresamisto, 
					adresaraion= :adresaraion, 
					adresaoblast= :adresaoblast, 
					posada= :posada, 
					email= :email, 
					
					slugtelefon= :slugtelefon, 
					category= :category,
					rang= :rang,
					groplata= :groplata, 
					stagdergyear= :stagdergyear, 
					stagdergmonth= :stagdergmonth, 
					stagposadayear= :stagposadayear,
					stagposadamonth= :stagposadamonth, 
					osvitavnz= :osvitavnz, 
					osvitayear= :osvitayear, 
					osvitaspec= :osvitaspec, 
					
					pisliaosvitavnz= :pisliaosvitavnz, 
					pisliaosvitayear= :pisliaosvitayear, 
					pisliaosvitaspec= :pisliaosvitaspec,
					naukastup= :naukastup, 
					pidvishenia= :pidvishenia, 
					tema= :tema WHERE username = :username'  );
			$stmt->execute(array(
				':prizvishe' => $_POST['prizvishe'], 
				':name' => $_POST['name'], 
				':pobatkovi' => $_POST['pobatkovi'], 
				':birthday' => $_POST['birthday'], 
				':organvlady' => $_POST['organvlady'],
				':misceroboty' => $_POST['misceroboty'],
				':centrevlada' => $_POST['centrevlada'],				
				':adresamisto' => $_POST['adresamisto'],
				':adresaraion' => $_POST['adresaraion'],
				':adresaoblast' => $_POST['adresaoblast'],
				':posada' => $_POST['posada'], 
				':email' => $_POST['email'],
				
				':slugtelefon' => $_POST['slugtelefon'],
				':category' => $_POST['category'],
				':groplata' => $_POST['groplata'], 
				':rang' => $_POST['rang'], 				
				':stagdergyear' => $_POST['stagdergyear'],
				':stagdergmonth' => $_POST['stagdergmonth'],
				':stagposadayear' => $_POST['stagposadayear'],
				':stagposadamonth' => $_POST['stagposadamonth'],
				':osvitavnz' => $_POST['osvitavnz'],
				':osvitayear' => $_POST['osvitayear'],
				':osvitaspec' => $_POST['osvitaspec'],			
				
				':pisliaosvitavnz' => $_POST['pisliaosvitavnz'],
				':pisliaosvitayear' => $_POST['pisliaosvitayear'],
				':pisliaosvitaspec' => $_POST['pisliaosvitaspec'],
				':naukastup' => $_POST['naukastup'],
				':pidvishenia' => $_POST['pidvishenia'],
				':tema' => $_POST['tema'],
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
			 header('Location: memberpage.php');  //header('Location: index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

} else {
			try {
			$stmt = $db->prepare('SELECT * FROM members WHERE username= :username');
			$stmt->execute(array('username' => $_SESSION['username']));

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$username =$row['username']; 
			$email =$row['email']; 
			$groupcat = $row['groupcat'];
			try {
				$stmt = $db->prepare('SELECT COUNT(*) as count FROM members WHERE groupcat = :groupcat AND active="Yes" GROUP BY groupcat ');
				$stmt->execute(array('groupcat' => $groupcat));

				$row1 = $stmt->fetch(PDO::FETCH_ASSOC);
				//echo "COUNT members group".$groupcat." = ".$row1['count']."=".$username."="; exit;
				$count=$row1['count'];
				//else catch the exception and show the error.
				} catch(PDOException $e) {
						echo '<p class="bg-danger">'.$e->getMessage().'</p>';
				}
			//else catch the exception and show the error.
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}

	$_SESSION['groupname'] = grname($groupcat); //$groupname;
//echo "==".$groupcat."==".$_SESSION['username']."==".$_SESSION['groupname']."==".$groupname."==";exit;
			/*try {
			$stmt = $db->prepare('SELECT * FROM grouptema WHERE groupcat= :groupcat');
			$stmt->execute(array('groupcat' => $groupcat));

			$row1 = $stmt->fetch(PDO::FETCH_ASSOC);
			$groupname =$row1['groupname']; 

			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}	*/		
}

//define page title
$title = 'Редагування даних';

//include header template
require('layout/header.php');
?>

<style>
input[pattern]:invalid{
  color:red;
}
</style>

<div class="container">

	<div class="row needfield">

	    <div class="col-xs-12 col-sm-8 col-md-16 col-sm-offset-2 col-md-offset-1">
			<form name="form_reg" role="form" method="post" action="" autocomplete="off">

				<h2>Редагування данних. </h2>
				<h3><?php if (defined('DEBUG') && DEBUG) {echo $count."/"."(".$groupcat.")".":";}  echo $_SESSION['groupname']; ?></h3>
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
					echo "Можете <a href='login.php'>увійти</a> зі своім логіном+паролем для редагування своіх даних. 
					Або <a href='../nads/nadsnew.shtml'>повернутися</a> на сайт.</h2>";
					//echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}else {
				?>
				<hr style="border: 1px solid #000;">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
					<label>Ім'я для входу</label>					
						<div class="form-group">
							<input readonly type="text" name="username" id="username" class="form-control " placeholder="Ім'я для входу" title="Тільки латінські літери и ціфри" 
							value="<?php echo $username; if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-5">
					<label>Email</label>						
						<div class="form-group">
							<input readonly type="email" name="email" id="email" class="form-control " placeholder="Електронна пошта" title="Електронна пошта" 
							value="<?php echo $email; if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
						</div>						
					</div>
				</div>
				
				<!--div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control " placeholder="Пароль" value="<?php if(isset($error)){ echo $_POST['password']; } ?>" title="Пароль" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control " placeholder="Підтвердити пароль" value="< php if(isset($error)){ echo $_POST['passwordConfirm']; } ?>" title="Підтвердити пароль" tabindex="4">
						</div>
					</div>
				</div-->
				
				<label>ПІБ, дата народження</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="prizvishe" id="prizvishe" class="form-control " placeholder="Прізвище" 
							value="<?php echo $row['prizvishe']; if(isset($error)){ echo $_POST['prizvishe']; } ?>" title="Прізвище" tabindex="5">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control " placeholder="Ім'я" 
							value="<?php echo $row['name']; if(isset($error)){ echo $_POST['name']; } ?>" title="Ім'я" tabindex="6">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="pobatkovi" id="pobatkovi" class="form-control " placeholder="По батькові" 
							value="<?php echo $row['pobatkovi']; if(isset($error)){ echo $_POST['pobatkovi']; } ?>" title="По батькові" tabindex="7">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="birthday" id="birthday" class="form-control " placeholder="Дата народження" 
							value="<?php echo $row['birthday']; if(isset($error)){ echo $_POST['birthday']; } ?>" title="Дата народження" tabindex="8">
						</div>
					</div>		
				</div>
				
				<label>Місце роботи центральний орган влади?</label><span>*</span>
				<div class="row container	">
					<div class="col-xs-3 col-sm-3 col-md-3" style="min-height: 30px;">
						<div class="radio" >
						  <label>
							<input type="radio" name="misceroboty"  value="1" <?php if(isset($error) && ($_POST['misceroboty']=="1")){ echo "checked"; } elseif ($row['misceroboty']=="1") {echo "checked";} ?> onclick="document.form_reg.centrevlada.disabled=false; document.form_reg.organvlady.disabled=true;  document.form_reg.organvlady.value='';" >
							центральний
						  </label>
						</div>
						<div class="radio">
						  <label>
							<input type="radio" name="misceroboty"  value="2" <?php if(isset($error) && ($_POST['misceroboty']=="2")){ echo "checked"; } elseif ($row['misceroboty']=="2") {echo "checked";} ?> onclick="document.form_reg.centrevlada.disabled=true;  document.form_reg.organvlady.disabled=false; document.form_reg.centrevlada.value='';" >
							інший
						  </label>						  
							<!--label class="radio-inline" ><input type="radio" name="misceroboty" class="form-control "  value="1" 		 onclick="document.form_reg.centrevlada.disabled=false; document.form_reg.organvlady.disabled=true;  document.form_reg.organvlady.value='';" tabindex="29">Ций</label>
							<label class="radio-inline" ><input type="radio" name="misceroboty" class="form-control "  value="2" checked onclick="document.form_reg.centrevlada.disabled=true;  document.form_reg.organvlady.disabled=false; document.form_reg.centrevlada.value='';" tabindex="30">&ensp;Інш&ensp;</label-->
						</div>
					</div>						
					<div class="col-xs-6 col-sm-6 col-md-5">						
						<div class="form-group">
							<input type="hidden"  name="hidecentrevlada" id="hidecentrevlada" class="form-control "  value="<?php if(isset($error)){ echo $_POST['centrevlada']; } else {echo $row['centrevlada'];} ?>" title="Select centrevlada" >

							<select name="centrevlada" id="centrevlada" <?php if(isset($error) && ($_POST['misceroboty']=="2")){ echo "disabled"; } elseif ($row['misceroboty']=="2") {echo "disabled";} ?> class="form-control ">
								<option  value="">Виберіть центральний орган влади</option>
								<?php
									//if (!empty($_POST['centrevlada'])) {echo $_POST['centrevlada']; exit;}
									for ($vc=1; $vc<=75; $vc++){
										echo '<option  ';
									if (!empty($_POST['centrevlada'])) { if ($_POST['centrevlada']==$vc)  echo ' selected '; }  elseif ($row['centrevlada']==$vc) {echo ' selected ';}
										echo '	value="'.$vc.'">'.vladaname($vc).'</option>';
									}
								?>
							</select>
							
							<input type="text" <?php if(isset($error) && ($_POST['misceroboty']=="1")){ echo "disabled"; } elseif ($row['misceroboty']=="1") {echo "disabled";} ?> name="organvlady" id="organvlady" class="form-control " placeholder="Інший орган влади" value="<?php echo $row['organvlady']; if(isset($error)){ echo $_POST['organvlady']; } ?>" title="Орган влади" tabindex="9">						
							
						</div>						
					</div>
				</div>
				
				<label>Адреса місця роботи (нас пункт<span>*</span>, район, область)</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="adresamisto" id="adresamisto" class="form-control " placeholder="Нас. пункт" 
							value="<?php echo $row['adresamisto']; if(isset($error)){ echo $_POST['adresamisto']; } ?>" title="Адреса місця роботи, нас. пункт" tabindex="10">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="adresaraion" id="adresaraion" class="form-control " placeholder="Район" 
							value="<?php echo $row['adresaraion']; if(isset($error)){ echo $_POST['adresaraion']; } ?>" title="Адреса місця роботи, район" tabindex="11">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="adresaoblast" id="adresaoblast" class="form-control " placeholder="Область" 
							value="<?php echo $row['adresaoblast']; if(isset($error)){ echo $_POST['adresaoblast']; } ?>" title="Адреса місця роботи, область" tabindex="12">
						</div>
					</div>
				</div>
				<label>Назва посади (повна)</label><span>*</span>	
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="posada" id="posada" class="form-control " placeholder="Повна назва посади" 
							value="<?php echo $row['posada']; if(isset($error)){ echo $_POST['posada']; } ?>" title="Повна назва посади" tabindex="13">
						</div>
					</div>
				</div>
				<label>Службовий телефон 0YYXXXXXXX</label><span>*</span>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="tel" pattern="0[0-9]{9}" name="slugtelefon" id="slugtelefon" class="form-control " placeholder="Службовий телефон 0YYXXXXXXX" 
							value="<?php echo $row['slugtelefon']; if(isset($error)){ echo $_POST['slugtelefon']; } ?>" title="Службовий телефон 0YYXXXXXXX" tabindex="14">
						</div>
					</div>
				</div>				

				<label>Категорія посади (А Б В)</label><span>*</span>				
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
						<select size="1" name="category" id="category" onchange="document.form_reg.hidegroplata.value=''; document.form_reg.hiderang.value=''; selectGroupRang(); "  class="form-control">
							<option value="">Виберіть категорію</option>
							<option value="1" <?php if(isset($error)&& ($_POST['category']=='1')||($row['category']=='1')){ echo "selected"; } ?>  >А</option>
							<option value="2" <?php if(isset($error)&& ($_POST['category']=='2')||($row['category']=='2')){ echo "selected"; } ?>  >Б</option>
							<option value="3" <?php if(isset($error)&& ($_POST['category']=='3')||($row['category']=='3')){ echo "selected"; } ?>  >В</option>
						</select>
						</div>
					</div>				
				</div>				
				
				<input type="hidden" name="hidegroplata" id="hidegroplata" class="form-control "  value="<?php echo $row['groplata']; if(isset($error)){ echo $_POST['groplata']; } ?>" title="Вибрана група оплати" >
				<input type="hidden" name="hiderang" id="hiderang" class="form-control "  value="<?php echo $row['rang']; if(isset($error)){ echo $_POST['rang']; } ?>" title="Вибран ранг" >
				<div name="selectDataGroupRang" class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<label>Група оплати праці</label><span>*</span>
						<div class="form-group">
							<select disabled size="1" name="groplata"  id="groplata" class="form-control ">
								<option name="empty1" value="">Виберіть групу</option>
							</select>
							<script type="text/javascript">
								//console.log("=2");							
								selectGroupRang();					
							</script>						
						</div>
					</div>					
					<div class="col-xs-4 col-sm-4 col-md-4">
						<label>Ранг державної служби</label><span>*</span>
						<div class="form-group">						
							<select disabled size="1" name="rang" id="rang" class="form-control ">
								<option name="empty2" value="">Виберіть ранг</option>
							</select>
							<script type="text/javascript">
								//console.log("=2-2");							
								selectGroupRang();					
							</script>												
						</div>						
					</div>								
				</div>
				
				<!--label>Категорія посади (А Б В)</label><span>*</span>
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2">
						<div class="form-group">
							<input type="text" pattern="[А,Б,В,а,б,в]" name="category" id="category" class="form-control "  
							value="<?php echo $row['category']; if(isset($error)){ echo $_POST['category']; } ?>" title="Категорія посади (А Б В)" tabindex="15">
						</div>
					</div>
				</div>
				
				<label>Група оплати праці</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="groplata" id="groplata" class="form-control " placeholder="Група оплати праці" 
							value="<?php echo $row['groplata']; if(isset($error)){ echo $_POST['groplata']; } ?>" title="Група оплати праці" tabindex="16">
						</div>
					</div>
				</div-->

				<label>Стаж державної служби (років, місяців)</label><span>*</span>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="integer" pattern="[0-9]{1,2}" name="stagdergyear" id="stagdergyear" class="form-control " placeholder=" років" 
							value="<?php echo $row['stagdergyear']; if(isset($error)){ echo $_POST['stagdergyear']; } ?>" title="Стаж державної служби, років" tabindex="17">
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="number" min="0" max="12" name="stagdergmonth" id="stagdergmonth" class="form-control " placeholder="місяців" 
							value="<?php echo $row['stagdergmonth']; if(isset($error)){ echo $_POST['stagdergmonth']; } ?>" title="Стаж державної служби, місяців" tabindex="18">
						</div>
					</div>					
				</div>				

				<label>Стаж роботи на посаді, що займаєте (років, місяців)</label><span>*</span>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="integer" pattern="[0-9]{1,2}" name="stagposadayear" id="stagposadayear" class="form-control " placeholder="років" 
							value="<?php echo $row['stagposadayear']; if(isset($error)){ echo $_POST['stagposadayear']; } ?>" title="Стаж роботи на посаді, років" tabindex="19">
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="number" min="0" max="12" name="stagposadamonth" id="stagposadamonth" class="form-control " placeholder="місяців" 
							value="<?php echo $row['stagposadamonth']; if(isset($error)){ echo $_POST['stagposadamonth']; } ?>" title="Стаж роботи на посаді, місяців" tabindex="20">
						</div>
					</div>					
				</div>	

				<!--label>Перша вища освіта (ВНЗ, спеціальність, рік закінчення)</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="osvitavnz" id="osvitavnz" class="form-control " placeholder="Назва ВНЗ" 
							value="<?php echo $row['osvitavnz']; if(isset($error)){ echo $_POST['osvitavnz']; } ?>" title="Назва ВНЗ" tabindex="21">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="text" name="osvitaspec" id="osvitaspec" class="form-control " placeholder="Спеціальність" 
							value="<?php echo $row['osvitaspec']; if(isset($error)){ echo $_POST['osvitaspec']; } ?>" title="Спеціальність" tabindex="22">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="osvitayear" id="osvitayear" class="form-control " placeholder="Рік закінчення" 
							value="<?php echo $row['osvitayear']; if(isset($error)){ echo $_POST['osvitayear']; } ?>" title="Рік закінчення" tabindex="23">
						</div>	
					</div>						
				</div-->

				<!--label>Післядипломна освіта (ВНЗ, спеціальність, рік закінчення)</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="pisliaosvitavnz" id="pisliaosvitavnz" class="form-control " placeholder="Назва ВНЗ" 
							value="<?php echo $row['pisliaosvitavnz']; if(isset($error)){ echo $_POST['pisliaosvitavnz']; } ?>" title="Назва ВНЗ" tabindex="24">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="text" name="pisliaosvitaspec" id="pisliaosvitaspec" class="form-control " placeholder="Спеціальність" 
							value="<?php echo $row['pisliaosvitaspec']; if(isset($error)){ echo $_POST['pisliaosvitaspec']; } ?>" title="Спеціальність" tabindex="25">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="pisliaosvitayear" id="pisliaosvitayear" class="form-control " placeholder="Рік закінчення" 
							value="<?php echo $row['pisliaosvitayear']; if(isset($error)){ echo $_POST['pisliaosvitayear']; } ?>" title="Рік закінчення" tabindex="26">
						</div>	
					</div>						
				</div>

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="naukastup" id="naukastup" class="form-control " placeholder="Науковий ступінь, вчене звання" 
							value="<?php echo $row['naukastup']; if(isset($error)){ echo $_POST['naukastup']; } ?>" title="Науковий ступінь, вчене звання" tabindex="27">
						</div>
					</div>
				</div-->	

				<label>Для слухачів, які навчаються за професійною програмою</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="tema" id="tema" class="form-control " placeholder="Тема випускної роботи" 
							value="<?php echo $row['tema']; if(isset($error)){ echo $_POST['tema']; } ?>" title="Тема випускної роботи" tabindex="28">
						</div>
					</div>
				</div>
				<label >Ви підвищували кваліфікацію за останні 3 роки?</label >				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-5" >
						<div class="form-group"  >
							<label class="radio-inline" ><input type="radio" name="pidvishenia" class="form-control " style="height: 14px;" value="1" <?php if ($row['pidvishenia']=='1') echo "checked"; if ((isset($error))&&( $_POST['pidvishenia']=='1')) echo "checked"; ?> tabindex="29">Так</label>
							<label class="radio-inline" ><input type="radio" name="pidvishenia" class="form-control " style="height: 14px;" value="2" <?php if ($row['pidvishenia']=='2') echo "checked"; if ((isset($error))&&( $_POST['pidvishenia']=='2')) echo "checked"; ?>  tabindex="30">&ensp;Ні&ensp;</label>
							<!--input type="radio" name="pidvishenia" id="pidvishenia" class="form-control " placeholder="Тема випускної роботи" value="<php if(isset($error)){ echo $_POST['pidvishenia']; } ?>" title="Чи підвищували кваліфікацію за останні 3 роки?" tabindex="28"-->
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
					<p><a href='memberpage.php'>Відміна</a></p>					
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