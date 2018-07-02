<?php  
header("Content-type: text/html;charset=utf-8"); 
require('includes/config.php');
if(isset($_POST['submittren'])){ // вход со страницы ../trening/trening-2018.shtml

//echo "==".$_POST['func']."==".$_POST['max']; exit;

//$maxmembers=$_POST['max'];//$_POST['maxmembers'];
//$_SESSION['maxmembers_s']=$_POST['max'];
$groupcat=$_POST['func'];//$_POST['group'];
$_SESSION['groupcat_s']=$_POST['func'];

	//echo "+".$groupname."+".$groupcat."+"; exit;
		list ($groupname, $maxgroupmembers) = grname($groupcat);
		$_SESSION['maxmembers_s']=$maxgroupmembers;		
		$_SESSION['groupname_s'] = $groupname; //grname($groupcat); 
		try {
			$stmt = $db->prepare('SELECT COUNT(*) as count FROM memberstren WHERE groupcat = :groupcat GROUP BY groupcat ');
			$stmt->execute(array('groupcat' => $groupcat));

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//echo "COUNT members group".$groupcat." = ". $row['count'] .".";
			$_SESSION['count_s']=$row['count']; 
			if ($row['count']>=$maxgroupmembers) {
				$registrclosed = "Реєстрація вже закрита. Групу слухачів сформовано."; }
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
}

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpagetren.php'); }

//if form has been submitted process it - "Реєстрація"
if(isset($_POST['submit'])){

$maxgroupmembers=$_SESSION['maxmembers_s'];
$groupcat=$_SESSION['groupcat_s'];
/*if(isset($_POST['centrevlada'])) {
	$centrevlada=$_POST['centrevlada'];
	list ($vladaname,$maxvladamembers) = vlada_name_membr($centrevlada);
}*/
	
	//echo "G1".$groupcat."GG";
	//very basic validation
	/*if(strlen($_POST['username']) < 3){
		$error[] = "Ім'я для входу дуже коротке (менше 3 літер)!";
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = "Ім'я для входу не унікальне, вже використовується!";
		}

	}*/

	if(strlen($_POST['password']) < 6){
		$error[] = "Пароль дуже короткий (менше 6 літер)!";
	}

	if(strlen($_POST['passwordConfirm']) < 6){
		$error[] = "Пароль-підтвердження дуже короткий (менше 6 літер)!";;
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Паролі не співпадають!';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Введіть правільний email';
	} else {
		$stmt = $db->prepare('SELECT email FROM memberstren WHERE email = :email');
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
	/*if(strlen($_POST['birthday']) <= 0) {$error[] = 'Заповніть всі поля. '.'Дата народження';}
	if (($_POST['misceroboty'])== 1) {if (strlen($_POST['centrevlada'])<=0) {$error[] = 'Заповніть всі поля. '.'Орган влади центральний';}
								       else {list ($vladaname,$maxvladamembers) = vlada_name_membr($_POST['centrevlada']);}}
	if ((($_POST['misceroboty'])== 2)&& (strlen($_POST['organvlady'])<=0))  {$error[] = 'Заповніть всі поля. '.'Орган влади інший';}	*/
	//if(strlen($_POST['organvlady']) <= 0) {$error[] = 'Заповніть всі поля. '.'Орган влади';}
	/*if(strlen($_POST['adresamisto']) <= 0) {$error[] = 'Заповніть всі поля. '.'Нас. пункт';}*/
	//if(strlen($_POST['adresaraion']) <= 0) {$error[] = 'Заповніть всі поля. '.'Район';}
	//if(strlen($_POST['adresaoblast']) <= 0) {$error[] = 'Заповніть всі поля. '.'Область';}	
	/*if(strlen($_POST['posada']) <= 0) {$error[] = 'Заповніть всі поля. '.'Повна назва посади';}*/
	if(strlen($_POST['slugtelefon']) <= 0) {$error[] = 'Заповніть всі поля. '.'Телефон 0YYXXXXXXX';}
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
	if(strlen($_POST['pidvishenia']) <= 0) {$error[] = 'Заповніть всі поля. '.'Чи підвищували кваліфікацію за останні 3 роки';}*/
	
	
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
				$stmt = $db->prepare('SELECT COUNT(*) as count FROM memberstren WHERE groupcat = :groupcat GROUP BY groupcat ');
				$stmt->execute(array('groupcat' => $groupcat));

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				//echo "COUNT members group".$groupcat." = ". $row['count'] ."."; exit;
				$_SESSION['count_s']=$row['count'];
				if ($row['count']>=$maxgroupmembers) { 
					$registrclosedonline = "реєстрація вже закрита. Групу слухачів сформовано."; 
					$groupcat=0; 
					//echo "+".$registrclosedonline."+".$row['count']."+".$maxgroupmembers."+"; 
					$_SESSION['registrclosedonline_s']=$registrclosedonline;
					//echo "G2_1".$groupcat."GG"; 
					}
				else {
					/*try {
						$stmt = $db->prepare('SELECT COUNT(*) as countvlada FROM members WHERE (groupcat = :groupcat) AND (centrevlada = :centrevlada) GROUP BY groupcat ');
						$stmt->execute(array('groupcat' => $groupcat,
											'centrevlada' => $centrevlada
										));

						$rowvlada = $stmt->fetch(PDO::FETCH_ASSOC);
						//echo "Group ". $groupcat . ". Members for Vlada " . $vladaname . " = ". $rowvlada['countvlada'] ." Max = " . $maxvladamembers . ".;"; exit;
						//$_SESSION['countvlada_s']=$rowvlada['countvlada'];					
						if ($rowvlada['countvlada']>=$maxvladamembers) { 
							$registrclosedonline = "реєстрація для центрального органа влади: '" . $vladaname . "' закрита (вже зареєстрована максімальна кількість слухачів = " . $maxvladamembers . "/" . $rowvlada['countvlada'] . "). "; 
							$groupcat=0; 
							//echo "+".$registrclosedonline."+".$rowvlada['countvlada']."+".$maxvladamembers."+"; 
							$_SESSION['registrclosedonline_s']=$registrclosedonline;
							//echo "G2_1".$groupcat."GG"; 
							}
						else {*/
									try {
									
									//echo "====!".$hashedpassword."!==".$activasion."!==";
									//echo "<script>console.group('".$hashedpassword."');console.log('$hashedpassword=');console.groupEnd();</script>";
									//exit;
									//insert into database with a prepared statement
									//echo "G3".$groupcat."GG=ISRERT="; 
									$stmt = $db->prepare('INSERT INTO memberstren( username, password, prizvishe, name, pobatkovi, adresamisto, 
											posada, email, slugtelefon, company, adresacomp, groupcat, active ) 
											VALUES 							  ( :username, :password, :prizvishe, :name, :pobatkovi, :adresamisto, 
											:posada, :email, :slugtelefon, :company, :adresacomp, :groupcat, :active)');
									$stmt->execute(array(
										':username' => $_POST['email'],
										':password' => $hashedpassword,
										':prizvishe' => $_POST['prizvishe'], 
										':name' => $_POST['name'], 
										':pobatkovi' => $_POST['pobatkovi'], 
										':adresamisto' => $_POST['adresamisto'],
										':posada' => $_POST['posada'], 
										':email' => $_POST['email'],
										':slugtelefon' => $_POST['slugtelefon'],
										':company' => $_POST['company'],
										':adresacomp' => $_POST['adresacomp'],
										':groupcat' => $groupcat,							
										':active' => /*'Yes'*/ $activasion
									));
									$id = $db->lastInsertId('memberID');
									$tren = true;
									//send email
									$to = $_POST['email'];
									$subject = "Підтвердження реєстрації.";
									$body = "<p>Дякуємо за реєстрацію на сайті http://www.centre-kiev.kiev.ua/</p>
									<p><b>".$_SESSION['groupname_s']."<br /></b></p>
									<p>Для активації облікового запису, будь ласка, натисніть на посилання: <a href='".DIR."activate.php?x=$id&y=$activasion&z=true'>".DIR."activate.php?x=$id&y=$activasion&z=true</a></p>
									<p>С найкращими побажанями, Admin!</p>";

									$mail = new Mail();
									$mail->setFrom(SITEEMAIL);
									$mail->addAddress($to);
									$mail->subject($subject);
									$mail->body($body);
									$mail->send();

									//redirect to index page
									header('Location: indextren.php?action=joined');
									exit;

									//else catch the exception and show the error.
									} catch(PDOException $e) {
										$error[] = $e->getMessage()."111";
									}
						/*}
					} catch(PDOException $e) {
						$error[] = $e->getMessage()."112";
					}*/
						
				}					
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage()."113".'</p>';
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
					echo '<h3>'.$_SESSION['count_s']."/".$_SESSION['maxmembers_s']."(".$_SESSION['groupcat_s'].")".":".$_SESSION['groupname_s'].'<h3>';
					echo '<h2 class="bg-success">'.$registrclosed.'</h2>'	;
					echo "<p>Вже зареєстровані? <a href='logintren.php'>Увійти</a></p>";
			  }
			  elseif (isset($registrclosedonline))	{
						echo '<h3>'.$_SESSION['count_s']."/".$_SESSION['maxmembers_s']."(".$_SESSION['groupcat_s'].")".":".$_SESSION['groupname_s'].'<h3>';
						echo '<h2 class="bg-success">'."На жаль, ".$_SESSION['registrclosedonline_s'].'</h2>';
					    echo "<p>Вже зареєстровані? <a href='logintren.php'>Увійти</a></p>";
						}
			  else {   ?>
				<h2>Реєстрація. </h2>
				<h3><?php if (defined('DEBUG') && DEBUG) {echo $_SESSION['count_s']."/".$_SESSION['maxmembers_s']."(".$_SESSION['groupcat_s'].")".":";} echo $_SESSION['groupname_s']; ?></h3>
				<p>Вже зареєстровані? <a href='logintren.php'>Увійти для редагування своїх даних</a></p>


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
					<!--div class="col-xs-6 col-sm-6 col-md-4">
					<label>Ім'я для входу</label><span>*</span>
					<div class="form-group">
							<input type="text" pattern="[A-Za-z0-9]{3,50}" name="username" id="username" class="form-control " placeholder="Ім'я для входу" title="Тільки латінські літери и ціфри" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
						</div>
					</div-->
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
				
				<label>ПІБ<span>*</span>
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
				</div>
				
				<label>Назва компанії</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="company" id="company" class="form-control " placeholder="Назва компанії" value="<?php if(isset($error)){ echo $_POST['company']; } ?>" title="Назва компанії" tabindex="10">
						</div>
					</div>
				</div>					
				<label>Адреса компанії</label>
				<div class="row">					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="adresacomp" id="adresacomp" class="form-control " placeholder="Адреса компанії" value="<?php if(isset($error)){ echo $_POST['adresacomp']; } ?>" title="Адреса компанії" tabindex="11">
						</div>
					</div>
				</div>					
				<label>Назва посади</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="posada" id="posada" class="form-control " placeholder="Назва посади" value="<?php if(isset($error)){ echo $_POST['posada']; } ?>" title="Назва посади" tabindex="13">
						</div>
					</div>
				</div>
				
				
				<label>Населений пункт</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="adresamisto" id="adresamisto" class="form-control " placeholder="Нас. пункт" value="<?php if(isset($error)){ echo $_POST['adresamisto']; } ?>" title="Нас. пункт" tabindex="10">
						</div>
					</div>
				</div>

				<label>Телефон 0YYXXXXXXX</label><span>*</span>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="tel" pattern="0[0-9]{9}" name="slugtelefon" id="slugtelefon" class="form-control " placeholder="телефон 0YYXXXXXXX"
							value="<?php if(isset($error)){ echo $_POST['slugtelefon']; } ?>" title="телефон 0YYXXXXXXX" tabindex="14">
						</div>
					</div>
				</div>				


				<hr style="border: 1px solid #000;">
				<p><span>* </span>Обов'язкові поля</p>	
				<div class="row">
					<input type="hidden" name="group" id="group" class="form-control input-lg" value="<?php echo $groupcat; ?>" >
					<input type="hidden" name="maxmembers" id="maxmembers" class="form-control input-lg" value="<?php echo $maxgroupmembers; ?>" >
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Реєстрація" class="btn btn-primary btn-block btn-lg" tabindex="31"></div>
					<p><a href="../trening/trening-2018.shtml" title="Повернутися до списку тренінгів" >Відміна</a></p>
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



