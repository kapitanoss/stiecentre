<?php  
header("Content-type: text/html;charset=utf-8"); 
require('includes/config.php');
if(isset($_POST['submitnads'])){ // вход со страницы ../nads/nads.shtml

// echo "==".$_POST['func']."==".$_POST['max']; exit;

$maxmembers=$_POST['max'];//$_POST['maxmembers'];
$_SESSION['maxmembers']=$_POST['max'];
$groupcat=$_POST['func'];//$_POST['group'];
$_SESSION['groupcat']=$_POST['func'];

	//echo "+".$groupname."+".$groupcat."+"; exit;

		$_SESSION['groupname'] = grname($groupcat); //$groupname;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) as count FROM members WHERE groupcat = :groupcat AND active="Yes" GROUP BY groupcat ');
			$stmt->execute(array('groupcat' => $groupcat));

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//echo "COUNT members group".$groupcat." = ". $row['count'] .".";
			$_SESSION['count']=$row['count']; 
			if ($row['count']>=$maxmembers) {
				$registrclosed = "Реєстрація вже закрита. Групу слухачів сформовано."; }
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
}

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it - "Реєстрація"
if(isset($_POST['submit'])){

$maxmembers=$_SESSION['maxmembers'];
$groupcat=$_SESSION['groupcat'];
	
	//echo "G1".$groupcat."GG";
	//very basic validation
	if(strlen($_POST['username']) < 3){
		$error[] = "Ім'я для входу дуже коротке (менше 3 літер)!";
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = "Ім'я для входу не унікальне, вже використовується!";
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = "Пароль дуже короткий (менше 3 літер)!";
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = "Пароль-підтвердження дуже короткий (менше 3 літер)!";;
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Паролі не співпадають!';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Введіть правільний email';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] =  "Email не унікальний, вже використовується!";
		}

	}
	
/*	if ((strlen($_POST['prizvishe']) <= 0)||(strlen($_POST['name']) <= 0)||(strlen($_POST['pobatkovi']) <= 0)||
		(strlen($_POST['birthday']) <= 0)||(strlen($_POST['organvlady']) <= 0)||(strlen($_POST['adresamisto']) <= 0)||
		(strlen($_POST['adresaraion']) <= 0)||(strlen($_POST['adresaoblast']) <= 0)||(strlen($_POST['posada']) <= 0)||
		(strlen($_POST['slugtelefon']) <= 0)||(strlen($_POST['category']) <= 0)||(strlen($_POST['groplata']) <= 0)||
		(strlen($_POST['stagdergyear']) <= 0)||(strlen($_POST['stagdergmonth']) <= 0)||(strlen($_POST['stagposadayear']) <= 0)||
		(strlen($_POST['stagposadamonth']) <= 0)||(strlen($_POST['osvitavnz']) <= 0)||(strlen($_POST['osvitayear']) <= 0)||
		(strlen($_POST['pisliaosvitaspec']) <= 0)||(strlen($_POST['naukastup']) <= 0)||(strlen($_POST['pidvishenia']) <= 0)||
		(strlen($_POST['tema']) <= 0)
		){
		$error[] = 'Заповніть всі поля';}	*/
		
/*	if(strlen($_POST['prizvishe']) <= 0) {$error[] = 'Заповніть всі поля. '.'prizvishe';}
	if(strlen($_POST['name']) <= 0) {$error[] = 'Заповніть всі поля. '.'name';}
	if(strlen($_POST['pobatkovi']) <= 0) {$error[] = 'Заповніть всі поля. '.'pobatkovi';}
	if(strlen($_POST['birthday']) <= 0) {$error[] = 'Заповніть всі поля. '.'birthday';}
	if(strlen($_POST['organvlady']) <= 0) {$error[] = 'Заповніть всі поля. '.'organvlady';}
	if(strlen($_POST['adresamisto']) <= 0) {$error[] = 'Заповніть всі поля. '.'adresamisto';}
	if(strlen($_POST['adresaraion']) <= 0) {$error[] = 'Заповніть всі поля. '.'adresaraion';}
	if(strlen($_POST['adresaoblast']) <= 0) {$error[] = 'Заповніть всі поля. '.'adresaoblast';}	
	if(strlen($_POST['posada']) <= 0) {$error[] = 'Заповніть всі поля. '.'posada';}
	if(strlen($_POST['slugtelefon']) <= 0) {$error[] = 'Заповніть всі поля. '.'slugtelefon';}
	if(strlen($_POST['category']) <= 0) {$error[] = 'Заповніть всі поля. '.'category';}
	if(strlen($_POST['groplata']) <= 0) {$error[] = 'Заповніть всі поля. '.'groplata';}
	if(strlen($_POST['stagdergyear']) <= 0) {$error[] = 'Заповніть всі поля. '.'stagdergyear';}
	if(strlen($_POST['stagdergmonth']) <= 0) {$error[] = 'Заповніть всі поля. '.'stagdergmonth';}
	if(strlen($_POST['stagposadayear']) <= 0) {$error[] = 'Заповніть всі поля. '.'stagposadayear';}
	if(strlen($_POST['osvitavnz']) <= 0) {$error[] = 'Заповніть всі поля. '.'osvitavnz';}
	if(strlen($_POST['osvitayear']) <= 0) {$error[] = 'Заповніть всі поля. '.'osvitayear';}
	if(strlen($_POST['pisliaosvitaspec']) <= 0) {$error[] = 'Заповніть всі поля. '.'pisliaosvitaspec';}
	if(strlen($_POST['naukastup']) <= 0) {$error[] = 'Заповніть всі поля. '.'naukastup';}
	if(strlen($_POST['pidvishenia']) <= 0) {$error[] = 'Заповніть всі поля. '.'pidvishenia';}
	if(strlen($_POST['tema']) <= 0) {$error[] = 'Заповніть всі поля. '.'tema';}	*/

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
	if(strlen($_POST['slugtelefon']) <= 0) {$error[] = 'Заповніть всі поля. '.'Службовий телефон 0YYXXXXXXX';}
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
	
	
	/*if(!isset($_POST['prizvishe'])) {$error[] = 'Заповніть всі поля. '.'Прізвище';}
	if(!isset($_POST['name'])) {$error[] = 'Заповніть всі поля'."Ім'я";}
	if(!isset($_POST['pobatkovi'])) {$error[] = 'Заповніть всі поля. '.'По батькові';}
	if(!isset($_POST['birthday'])) {$error[] = 'Заповніть всі поля. '.'Дата народження';}
	if(!isset($_POST['organvlady'])) {$error[] = 'Заповніть всі поля. '.'Орган влади';}
	if(!isset($_POST['adresamisto'])) {$error[] = 'Заповніть всі поля. '.'Нас. пункт';}
	if(!isset($_POST['adresaraion'])) {$error[] = 'Заповніть всі поля. '.'Район';}
	if(!isset($_POST['adresaoblast'])) {$error[] = 'Заповніть всі поля. '.'Область';}	
	if(!isset($_POST['posada'])) {$error[] = 'Заповніть всі поля. '.'Повна назва посади';}
	if(!isset($_POST['slugtelefon'])) {$error[] = 'Заповніть всі поля. '.'Службовий телефон 0YY XXXXXXX';}
	if(!isset($_POST['category'])) {$error[] = 'Заповніть всі поля. '.'Категорія оплати (А Б В)';}
	if(!isset($_POST['groplata'])) {$error[] = 'Заповніть всі поля. '.'Група оплати праці';}
	if(!isset($_POST['stagdergyear'])) {$error[] = 'Заповніть всі поля. '.'Стаж державної служби, років';}
	if(!isset($_POST['stagdergmonth'])) {$error[] = 'Заповніть всі поля. '.'Стаж державної служби, місяців';}
	if(!isset($_POST['stagposadayear'])) {$error[] = 'Заповніть всі поля. '.'Стаж роботи на посаді, що займаєте, років';}
	if(!isset($_POST['stagposadamonth'])) {$error[] = 'Заповніть всі поля. '.'Стаж роботи на посаді, що займаєте, місяців';}
	if(!isset($_POST['osvitavnz'])) {$error[] = 'Заповніть всі поля. '.'Перша вища освіта. Назва ВНЗ';}
	if(!isset($_POST['osvitayear'])) {$error[] = 'Заповніть всі поля. '.'Перша вища освіта. Рік закінчення';}
	if(!isset($_POST['osvitaspec'])) {$error[] = 'Заповніть всі поля. '.'Перша вища освіта. Спеціальність';}
	if(!isset($_POST['pisliaosvitavnz'])) {$error[] = 'Заповніть всі поля. '.'Післядипломна освіта. Назва ВНЗ';}
	if(!isset($_POST['pisliaosvitayear'])) {$error[] = 'Заповніть всі поля. '.'Післядипломна освіта. Спеціальність';}
	if(!isset($_POST['pisliaosvitaspec'])) {$error[] = 'Заповніть всі поля. '.'Післядипломна освіта. Рік закінчення';}
	if(!isset($_POST['naukastup'])) {$error[] = 'Заповніть всі поля. '.'Науковий ступінь, вчене звання';}
	if(!isset($_POST['tema'])) {$error[] = 'Заповніть всі поля. '.'Тема випускної роботи';}	
	if(!isset($_POST['pidvishenia'])) {$error[] = 'Заповніть всі поля. '.'Чи підвищували кваліфікацію за останні 3 роки';}*/
	

	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));
		//echo "G2".$groupcat."GG"; 
			try {
				$stmt = $db->prepare('SELECT COUNT(*) as count FROM members WHERE groupcat = :groupcat AND active="Yes" GROUP BY groupcat ');
				$stmt->execute(array('groupcat' => $groupcat));

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				//echo "COUNT members group".$groupcat." = ". $row['count'] ."."; exit;
				$_SESSION['count']=$row['count'];
				if ($row['count']>=$maxmembers) { 
					$registrclosedonline = "реєстрація вже закрита. Групу слухачів сформовано."; 
					$groupcat=0; 
					//echo "+".$registrclosedonline."+".$row['count']."+".$maxmembers."+"; 
					$_SESSION['registrclosedonline']=$registrclosedonline;
					//echo "G2_1".$groupcat."GG"; 
					}
				else {
					try {
					
					//echo "====!".$hashedpassword."!==".$activasion."!==";
					//echo "<script>console.group('".$hashedpassword."');console.log('$hashedpassword=');console.groupEnd();</script>";
					//exit;
					//insert into database with a prepared statement
					//echo "G3".$groupcat."GG=ISRERT="; 
					$stmt = $db->prepare('INSERT INTO members( username, password, prizvishe, name, pobatkovi, birthday, 
							organvlady, misceroboty, centrevlada, adresamisto, adresaraion, adresaoblast, posada, email, slugtelefon, category, groplata,rang, 
							stagdergyear, stagdergmonth, stagposadayear, stagposadamonth, osvitavnz, osvitayear, osvitaspec, 
							pisliaosvitavnz, pisliaosvitayear, pisliaosvitaspec, naukastup, pidvishenia, tema, groupcat,  
							active) 
							VALUES 							( :username, :password, :prizvishe, :name, :pobatkovi, :birthday, 
							:organvlady, :misceroboty, :centrevlada, :adresamisto, :adresaraion, :adresaoblast, :posada, :email, :slugtelefon, :category, :groplata, :rang, 
							:stagdergyear, :stagdergmonth, :stagposadayear, :stagposadamonth, :osvitavnz, :osvitayear, :osvitaspec, 
							:pisliaosvitavnz, :pisliaosvitayear, :pisliaosvitaspec, :naukastup, :pidvishenia, :tema, :groupcat, 
							:active)');
					$stmt->execute(array(
						':username' => $_POST['username'],
						':password' => $hashedpassword,
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
						':groupcat' => $groupcat,							
						':active' => /*'Yes'*/ $activasion
					));
					$id = $db->lastInsertId('memberID');

					//send email
					$to = $_POST['email'];
					$subject = "Підтвердження реєстрації.";
					$body = "<p>Дякуємо за реєстрацію на сайті http://www.centre-kiev.kiev.ua/</p>
					<p><b>".$_SESSION['groupname']."<br /></b></p>
					<p>Для активації облікового запису, будь ласка, натисніть на посилання: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
					<p>С найкращими побажанями, Admin!</p>";

					$mail = new Mail();
					$mail->setFrom(SITEEMAIL);
					$mail->addAddress($to);
					$mail->subject($subject);
					$mail->body($body);
					$mail->send();

					//redirect to index page
					header('Location: index1.php?action=joined');
					exit;

					//else catch the exception and show the error.
					} catch(PDOException $e) {
						$error[] = $e->getMessage()."111";
					}
				}					
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
	}
}

//define page title
$title = 'Реєстрація слухача';

//include header template
require('layout/header.php');
?>


<div class="container">

	<div class="row needfield">

	    <div class="col-xs-12 col-sm-8 col-md-16 col-sm-offset-2 col-md-offset-1">
			<form name="form_reg" role="form" method="post" action="" autocomplete="off">
		<?php if(isset($registrclosed)) { 
					echo '<h3>'.$_SESSION['count']."/".$_SESSION['maxmembers']."(".$_SESSION['groupcat'].")".":".$_SESSION['groupname'].'<h3>';
					echo '<h2 class="bg-success">'.$registrclosed.'</h2>'	;
					echo "<p>Вже зареєстровані? <a href='login.php'>Увійти</a></p>";
			  }
			  elseif (isset($registrclosedonline))	{
						echo '<h3>'.$_SESSION['count']."/".$_SESSION['maxmembers']."(".$_SESSION['groupcat'].")".":".$_SESSION['groupname'].'<h3>';
						echo '<h2 class="bg-success">'."На жаль, ".$_SESSION['registrclosedonline'].'</h2>';
					    echo "<p>Вже зареєстровані? <a href='login.php'>Увійти</a></p>";
						}
			  else {   ?>
				<h2>Реєстрація. </h2>
				<h3><?php if (defined('DEBUG') && DEBUG) {echo $_SESSION['count']."/".$_SESSION['maxmembers']."(".$_SESSION['groupcat'].")".":";} echo $_SESSION['groupname']; ?></h3>
				<p>Вже зареєстровані? <a href='login.php'>Увійти для редагування своїх даних</a></p>


				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				//if action is joined show sucess
				
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){ 
					echo "<h2 class='bg-success'>Для закінчення реєстрації: Перевірте електронну пошту, т.к. 
					на введений раніше Email надіслано листа з посиланням для активації. Перейдіть за цим посиланням, 
					активувавши таким чином свій обліковий запис.</h2>";
				}else {
				?>
				<p>На вказаний у формі Email прийде запит на підтвердження реєстрації. Якщо листа немає достатньо довгий час, будь ласка, перевірте чи не потрапляє лист до спаму.</p>	
				<hr style="border: 1px solid #000;">

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
					<label>Ім'я для входу</label><span>*</span>
					<div class="form-group">
							<input type="text" pattern="[A-Za-z0-9]{3,50}" name="username" id="username" class="form-control " placeholder="Ім'я для входу" title="Тільки латінські літери и ціфри" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-5">
					<label>Email</label><span>*</span>					
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control " placeholder="Електронна пошта" title="Електронна пошта" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
						</div>						
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
						<label>Пароль</label><span>*</span>	
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control " placeholder="Пароль" value="<?php if(isset($error)){ echo $_POST['password']; } ?>" title="Пароль" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
					<label>Підтвердження пароля</label><span>*</span>	
					<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control " placeholder="Підтвердити пароль" value="<?php if(isset($error)){ echo $_POST['passwordConfirm']; } ?>" title="Підтвердити пароль" tabindex="4">
						</div>
					</div>
				</div>
				
				<label>ПІБ, дата народження</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="prizvishe" id="prizvishe" class="form-control " placeholder="Прізвище" value="<?php if(isset($error)){ echo $_POST['prizvishe']; } ?>" title="Прізвище" tabindex="5">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control " placeholder="Ім'я" value="<?php if(isset($error)){ echo $_POST['name']; } ?>" title="Ім'я" tabindex="6">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="pobatkovi" id="pobatkovi" class="form-control " placeholder="По батькові" value="<?php if(isset($error)){ echo $_POST['pobatkovi']; } ?>" title="По батькові" tabindex="7">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="birthday" id="birthday" class="form-control " value="<?php if(isset($error)){ echo $_POST['birthday']; } ?>" title="Дата народження" tabindex="8">
						</div>
					</div>		
				</div>
				
				<label>Місце роботи центральний орган влади?</label><span>*</span>
				<div class="row container	">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="radio" style="min-height: 30px;">
						  <label>
							<input type="radio" name="misceroboty"  value="1" <?php if(isset($error) && ($_POST['misceroboty']=="1")){ echo "checked"; } else {echo "checked";}?> onclick="document.form_reg.centrevlada.disabled=false; document.form_reg.organvlady.disabled=true;  document.form_reg.organvlady.value='';" >
							центральний
						  </label>
						</div>
						  <div class="radio">
						  <label>
							<input type="radio" name="misceroboty"  value="2" <?php if(isset($error) && ($_POST['misceroboty']=="2")){ echo "checked"; } ?> onclick="document.form_reg.centrevlada.disabled=true;  document.form_reg.organvlady.disabled=false; document.form_reg.centrevlada.value='';" >
							інший
						  </label>						  
							<!--label class="radio-inline" ><input type="radio" name="misceroboty" class="form-control "  value="1" 		 onclick="document.form_reg.centrevlada.disabled=false; document.form_reg.organvlady.disabled=true;  document.form_reg.organvlady.value='';" tabindex="29">Ций</label>
							<label class="radio-inline" ><input type="radio" name="misceroboty" class="form-control "  value="2" checked onclick="document.form_reg.centrevlada.disabled=true;  document.form_reg.organvlady.disabled=false; document.form_reg.centrevlada.value='';" tabindex="30">&ensp;Інш&ensp;</label-->
						</div>
					</div>						
					<div class="col-xs-6 col-sm-6 col-md-5">						
						<div class="form-group">
							<input type="hidden"  name="hidecentrevlada" id="hidecentrevlada" class="form-control "  value="<?php if(isset($error)){ echo $_POST['centrevlada']; } ?>" title="Select centrevlada" >

							<select name="centrevlada" id="centrevlada" <?php if(isset($error)) { if($_POST['misceroboty']=="2") echo "disabled"; } ?> class="form-control ">
								<option  value="">Виберіть центральний орган влади</option>
								<?php
									//if (!empty($_POST['centrevlada'])) {echo $_POST['centrevlada']; exit;}
									for ($vc=1; $vc<=75; $vc++){
										echo '<option  ';
										if ((!empty($_POST['centrevlada']))&&($_POST['centrevlada']==$vc)) { echo ' selected '; }
										echo '	value="'.$vc.'">'.vladaname($vc).'</option>';
									}
								?>
							</select>
							
							<input type="text" <?php if(isset($error)) { if($_POST['misceroboty']=="1") echo "disabled"; } else {echo "disabled"; }?> name="organvlady" id="organvlady" class="form-control " placeholder="Інший орган влади" value="<?php if(isset($error)){ echo $_POST['organvlady']; } ?>" title="Орган влади" tabindex="9">						
							
						</div>						
					</div>
				</div>
				
				<label>Адреса місця роботи (нас. пункт, район, область)</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="adresamisto" id="adresamisto" class="form-control " placeholder="Нас. пункт" value="<?php if(isset($error)){ echo $_POST['adresamisto']; } ?>" title="Адреса місця роботи, нас. пункт" tabindex="10">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="adresaraion" id="adresaraion" class="form-control " placeholder="Район" value="<?php if(isset($error)){ echo $_POST['adresaraion']; } ?>" title="Адреса місця роботи, район" tabindex="11">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="adresaoblast" id="adresaoblast" class="form-control " placeholder="Область" value="<?php if(isset($error)){ echo $_POST['adresaoblast']; } ?>" title="Адреса місця роботи, область" tabindex="12">
						</div>
					</div>
				</div>
				<label>Назва посади (повна)</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="posada" id="posada" class="form-control " placeholder="Повна назва посади" value="<?php if(isset($error)){ echo $_POST['posada']; } ?>" title="Повна назва посади" tabindex="13">
						</div>
					</div>
				</div>
				<label>Службовий телефон 0YYXXXXXXX</label><span>*</span>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="tel" pattern="0[0-9]{9}" name="slugtelefon" id="slugtelefon" class="form-control " placeholder="Службовий телефон 0YYXXXXXXX"
							value="<?php if(isset($error)){ echo $_POST['slugtelefon']; } ?>" title="Службовий телефон 0YYXXXXXXX" tabindex="14">
						</div>
					</div>
				</div>				

				<!--label>Категорія посади (А Б В)</label><span>*</span>
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2">
						<div class="form-group">
							<input type="text" pattern="[А,Б,В]" name="category1" id="category1" class="form-control "    title="Категорія посади (А Б В)" tabindex="15">
						</div>
					</div>
				</div-->
				<label>Категорія посади (А Б В)</label><span>*</span>				
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
						<select size="1" name="category" id="category" onchange="document.form_reg.hidegroplata.value=''; document.form_reg.hiderang.value=''; selectGroupRang(); "  class="form-control">
							<option value="">Виберіть категорію</option>
							<option value="1" <?php if(isset($error)&& ($_POST['category']=='1')){ echo "selected"; } ?>  >А</option>
							<option value="2" <?php if(isset($error)&& ($_POST['category']=='2')){ echo "selected"; } ?>  >Б</option>
							<option value="3" <?php if(isset($error)&& ($_POST['category']=='3')){ echo "selected"; } ?>  >В</option>
						</select>
						</div>
					</div>				
				</div>				
				
				<input type="hidden" name="hidegroplata" id="hidegroplata" class="form-control "  value="<?php if(isset($error)){ echo $_POST['groplata']; } ?>" title="Вибрана група оплати" >
				<input type="hidden" name="hiderang" id="hiderang" class="form-control "  value="<?php if(isset($error)){ echo $_POST['rang']; } ?>" title="Вибран ранг" >
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

				

				

				<!--div class="row">
					<label>Ранг державної служби</label><span>*</span>
					<div class="col-xs-2 col-sm-2 col-md-2">
						<div class="form-group">
							<input type="text"  name="rang1" id="rang1" class="form-control "  value="<?php if(isset($error)){ echo $_POST['rang']; } ?>" title="Ранг державної служби" tabindex="15">
						</div>
					</div>
				</div>
			
				<label>Група оплати праці</label><span>*</span>			
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="groplata1" id="groplata1" class="form-control " placeholder="Група оплати праці" value="<?php if(isset($error)){ echo $_POST['groplata']; } ?>" title="Група оплати праці" tabindex="16">
						</div>
					</div>
				</div-->

				<label>Стаж державної служби (років, місяців)</label><span>*</span>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="integer" pattern="[0-9]{1,2}" name="stagdergyear" id="stagdergyear" class="form-control " placeholder=" років" value="<?php if(isset($error)){ echo $_POST['stagdergyear']; } ?>" title="Стаж державної служби, років" tabindex="17">
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="number" min="0" max="12" name="stagdergmonth" id="stagdergmonth" class="form-control " placeholder="місяців" value="<?php if(isset($error)){ echo $_POST['stagdergmonth']; } ?>" title="Стаж державної служби, місяців" tabindex="18">
						</div>
					</div>					
				</div>				

				<label>Стаж роботи на посаді, що займаєте (років, місяців)</label><span>*</span>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="integer" pattern="[0-9]{1,2}" name="stagposadayear" id="stagposadayear" class="form-control " placeholder="років" value="<?php if(isset($error)){ echo $_POST['stagposadayear']; } ?>" title="Стаж роботи на посаді, років" tabindex="19">
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="number" min="0" max="12" name="stagposadamonth" id="stagposadamonth" class="form-control " placeholder="місяців" value="<?php if(isset($error)){ echo $_POST['stagposadamonth']; } ?>" title="Стаж роботи на посаді, місяців" tabindex="20">
						</div>
					</div>					
				</div>	

				<!--label>Перша вища освіта (ВНЗ, спеціальність, рік закінчення)</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="osvitavnz" id="osvitavnz" class="form-control " placeholder="Назва ВНЗ" value="<?php if(isset($error)){ echo $_POST['osvitavnz']; } ?>" title="Назва ВНЗ" tabindex="21">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="text" name="osvitaspec" id="osvitaspec" class="form-control " placeholder="Спеціальність" value="<?php if(isset($error)){ echo $_POST['osvitaspec']; } ?>" title="Спеціальність" tabindex="22">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="osvitayear" id="osvitayear" class="form-control "  value="<?php if(isset($error)){ echo $_POST['osvitayear']; } ?>" title="Рік закінчення" tabindex="23">
						</div>	
					</div>						
				</div>

				<label>Післядипломна освіта (ВНЗ, спеціальність, рік закінчення)</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="pisliaosvitavnz" id="pisliaosvitavnz" class="form-control " placeholder="Назва ВНЗ" value="<?php if(isset($error)){ echo $_POST['pisliaosvitavnz']; } ?>" title="Назва ВНЗ" tabindex="24">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="text" name="pisliaosvitaspec" id="pisliaosvitaspec" class="form-control " placeholder="Спеціальність" value="<?php if(isset($error)){ echo $_POST['pisliaosvitaspec']; } ?>" title="Спеціальність" tabindex="25">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="pisliaosvitayear" id="pisliaosvitayear" class="form-control "  value="<?php if(isset($error)){ echo $_POST['pisliaosvitayear']; } ?>" title="Рік закінчення" tabindex="26">
						</div>	
					</div>						
				</div>
				
				<label>Науковий ступінь, вчене звання</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="naukastup" id="naukastup" class="form-control " placeholder="Науковий ступінь, вчене звання" value="<?php if(isset($error)){ echo $_POST['naukastup']; } ?>" title="Науковий ступінь, вчене звання" tabindex="27">
						</div>
					</div>
				</div-->	

				<label>Для слухачів, які навчаються за професійною програмою</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="tema" id="tema" class="form-control " placeholder="Тема випускної роботи" value="<?php if(isset($error)){ echo $_POST['tema']; } ?>" title="Тема випускної роботи" tabindex="28">
						</div>
					</div>
				</div>
				<label >Ви підвищували кваліфікацію за останні 3 роки?</label >				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-5">
						<div class="form-group" >
							<label class="radio-inline" ><input type="radio" name="pidvishenia" class="form-control " style="height: 14px;" value="1" <?php if ((isset($error))&&( $_POST['pidvishenia']=='1')) echo "checked"; ?> tabindex="29">Так</label>
							<label class="radio-inline" ><input type="radio" name="pidvishenia" class="form-control " style="height: 14px;" value="2" <?php if (isset($error)) {if( $_POST['pidvishenia']=='2') echo "checked"; } else {echo "checked";}?> tabindex="30">&ensp;Ні&ensp;</label>
							<!--input type="radio" name="pidvishenia" id="pidvishenia" class="form-control " placeholder="Тема випускної роботи" value="<php if(isset($error)){ echo $_POST['pidvishenia']; } ?>" title="Чи підвищували кваліфікацію за останні 3 роки?" tabindex="28"-->
						</div>
					</div>
				</div>
				<hr style="border: 1px solid #000;">
				<p><span>* </span>Обов'язкові поля</p>	
				<div class="row">
					<input type="hidden" name="group" id="group" class="form-control input-lg" value="<?php echo $groupcat; ?>" >
					<input type="hidden" name="maxmembers" id="maxmembers" class="form-control input-lg" value="<?php echo $maxmembers; ?>" >
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Реєстрація" class="btn btn-primary btn-block btn-lg" tabindex="31"></div>
					<p><a href='../nads/nadsnew.shtml'>Відміна</a></p>
				</div>
			</form>
		</div>
	</div>

</div>
<?php			}?>
<?php		  }?>
<?php
//include header template
require('layout/footer.php');
?>



