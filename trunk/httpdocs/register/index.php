<?php require('includes/config.php');
if(isset($_POST['submitnads'])){ // ���� �� �������� ../nads/nads.shtml

// echo "==".$_POST['func']."==".$_POST['max']; exit;

$maxmembers=$_POST['max'];//$_POST['maxmembers'];
$_SESSION['maxmembers']=$_POST['max'];
$groupcat=$_POST['func'];//$_POST['group'];
$_SESSION['groupcat']=$_POST['func'];
    switch ($groupcat) {
        case '20':	$groupname='������ 1. "˳������� �� ��������� ���������" 4 ������� 2017 ����.'; break;
        case '21':	$groupname='������ 2. "˳������� �� ��������� �����������" 4 ������� 2017 ����.'; break;
		case '22':	$groupname='������ 3. "˳������� �� ��������� ����������" 4 ������� 2017 ����.'; break;
		case '23':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 4 ������� 2017 ����.'; break;
		case '24':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 4 ������� 2017 ����.'; break;

        case '25':	$groupname='������ 1. "˳������� �� ��������� ���������" 5 ������� 2017 ����.'; break;
        case '26':	$groupname='������ 2. "˳������� �� ��������� �����������" 5 ������� 2017 ����.'; break;
		case '27':	$groupname='������ 3. "˳������� �� ��������� ����������" 5 ������� 2017 ����.'; break;
		case '28':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 5 ������� 2017 ����.'; break;
		case '29':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 5 ������� 2017 ����.'; break;

        case '30':	$groupname='������ 1. "˳������� �� ��������� ���������" 6 ������� 2017 ����.'; break;
        case '31':	$groupname='������ 2. "˳������� �� ��������� �����������" 6 ������� 2017 ����.'; break;
		case '32':	$groupname='������ 3. "˳������� �� ��������� ����������" 6 ������� 2017 ����.'; break;
		case '33':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 6 ������� 2017 ����.'; break;
		case '34':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 6 ������� 2017 ����.'; break;

        case '35':	$groupname='������ 1. "˳������� �� ��������� ���������" 7 ������� 2017 ����.'; break;
        case '36':	$groupname='������ 2. "˳������� �� ��������� �����������" 7 ������� 2017 ����.'; break;
		case '37':	$groupname='������ 3. "˳������� �� ��������� ����������" 7 ������� 2017 ����.'; break;
		case '38':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 7 ������� 2017 ����.'; break;
		case '39':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 7 ������� 2017 ����.'; break;
	
        case '40':	$groupname='������ 1. "˳������� �� ��������� ���������" 8 ������� 2017 ����.'; break;
        case '41':	$groupname='������ 2. "˳������� �� ��������� �����������" 8 ������� 2017 ����.'; break;
		case '42':	$groupname='������ 3. "˳������� �� ��������� ����������" 8 ������� 2017 ����.'; break;
		case '43':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 8 ������� 2017 ����.'; break;
		case '44':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 8 ������� 2017 ����.'; break;

        case '50':	$groupname='������ 1. "˳������� �� ��������� ���������" 18 ������� 2017 ����.'; break;
        case '51':	$groupname='������ 2. "˳������� �� ��������� �����������" 18 ������� 2017 ����.'; break;
		case '52':	$groupname='������ 3. "˳������� �� ��������� ����������" 18 ������� 2017 ����.'; break;
		case '53':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 18 ������� 2017 ����.'; break;
		case '54':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 18 ������� 2017 ����.'; break;

        case '55':	$groupname='������ 1. "˳������� �� ��������� ���������" 19 ������� 2017 ����.'; break;
        case '56':	$groupname='������ 2. "˳������� �� ��������� �����������" 19 ������� 2017 ����.'; break;
		case '57':	$groupname='������ 3. "˳������� �� ��������� ����������" 19 ������� 2017 ����.'; break;
		case '58':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 19 ������� 2017 ����.'; break;
		case '59':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 19 ������� 2017 ����.'; break;

		case '60':	$groupname='������ 1. "˳������� �� ��������� ���������" 20 ������� 2017 ����.'; break;
        case '61':	$groupname='������ 2. "˳������� �� ��������� �����������" 20 ������� 2017 ����.'; break;
		case '62':	$groupname='������ 3. "˳������� �� ��������� ����������" 20 ������� 2017 ����.'; break;
		case '63':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 20 ������� 2017 ����.'; break;
		case '64':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 20 ������� 2017 ����.'; break;

        case '65':	$groupname='������ 1. "˳������� �� ��������� ���������" 21 ������� 2017 ����.'; break;
        case '66':	$groupname='������ 2. "˳������� �� ��������� �����������" 21 ������� 2017 ����.'; break;
		case '67':	$groupname='������ 3. "˳������� �� ��������� ����������" 21 ������� 2017 ����.'; break;
		case '68':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 21 ������� 2017 ����.'; break;
		case '69':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 21 ������� 2017 ����.'; break;

        case '70':	$groupname='������ 1. "˳������� �� ��������� ���������" 22 ������� 2017 ����.'; break;
        case '71':	$groupname='������ 2. "˳������� �� ��������� �����������" 22 ������� 2017 ����.'; break;
		case '72':	$groupname='������ 3. "˳������� �� ��������� ����������" 22 ������� 2017 ����.'; break;
		case '73':	$groupname='������ 4. "˳������� �� ���������� ��������� ��������� �������" 22 ������� 2017 ����.'; break;
		case '74':	$groupname='������ 5. "����������� �� ��������������� ����������. ����������� ������� � ���� ������� � �������" 22 ������� 2017 ����.'; break;

        case '90':	$groupname='��������� �������� ��������� ����������� ��������� ���������� (6 ����� ������ �����). ����� ��������: 04-15 ������� 2017 ����.'; break;
        case '91':	$groupname='���������� ���������������� ������ ����������� ��������� �������������� �����������. ����� ��������: 07-08 ������� 2017 ����.'; break;
		case '92':	$groupname='���������� ���������������� ������ �������-����: ������� ������������� �� �����������. ����� ��������: 07-08 ������� 2017 ����.'; break;
		case '93':	$groupname='���������� ���������������� ������ ������������ �������㳿 � ��������� ����������. ����� ��������: 11-12 ������� 2017 ����.'; break;
		case '94':	$groupname='���������� ���������������� ������ ������-�������㳿�. ����� ��������: 14-15 ������� 2017 ����.'; break;

        case '95':	$groupname='���������� ���������������� ������ ����������� ��������� �� �����������. ����� ��������: 18-19 ������� 2017 ����.'; break;
        case '96':	$groupname='���������� ���������������� ������ ���������� ������. ����� ��������: 21-22 ������� 2017 ����.'; break;
		case '97':	$groupname='��������� �������� ��������� ����������� ��������� ���������� (7-9 ������ ������ �����). ����� ��������: 02-13 ������ 2017 ����.'; break;
		
		case '150':	$groupname='��������� �������� ������������ �������㳿 ��������� ����������. ����� ��������: 04-08 ������� 2017 ����.'; break;
		case '151':	$groupname='��������� �������� ������������ �������㳿 ��������� ����������. ����� ��������: 11-15 ������� 2017 ����.'; break;
		case '152':	$groupname='��������� �������� ������������ �������㳿 ��������� ����������. ����� ��������: 18-22 ������� 2017 ����.'; break;
		case '153':	$groupname='��������� �������� ������������ �������㳿 ��������� ����������. ����� ��������: 25-29 ������� 2017 ����.'; break;

		
        default:    $groupname=""; break;
	}
	//echo "+".$groupname."+".$groupcat."+"; exit;
		$_SESSION['groupname'] = $groupname;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) as count FROM members WHERE groupcat = :groupcat AND active="Yes" GROUP BY groupcat ');
			$stmt->execute(array('groupcat' => $groupcat));

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//echo "COUNT members group".$groupcat." = ". $row['count'] .".";
			$_SESSION['count']=$row['count']; 
			if ($row['count']>=$maxmembers) {
				$registrclosed = "��������� ��� �������. ����� �������� ����������."; }
		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
}

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

$maxmembers=$_SESSION['maxmembers'];
$groupcat=$_SESSION['groupcat'];
	
	//echo "G1".$groupcat."GG";
	//very basic validation
	if(strlen($_POST['username']) < 3){
		$error[] = "��'� ��� ����� ���� ������� (����� 3 ����)!";
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = "��'� ��� ����� �� ���������, ��� ���������������!";
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = "������ ���� �������� (����� 3 ����)!";
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = "������-������������ ���� �������� (����� 3 ����)!";;
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = '����� �� ����������!';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = '������ ��������� email';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] =  "Email �� ����������, ��� ���������������!";
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
		$error[] = '��������� �� ����';}	*/
		
/*	if(strlen($_POST['prizvishe']) <= 0) {$error[] = '��������� �� ����. '.'prizvishe';}
	if(strlen($_POST['name']) <= 0) {$error[] = '��������� �� ����. '.'name';}
	if(strlen($_POST['pobatkovi']) <= 0) {$error[] = '��������� �� ����. '.'pobatkovi';}
	if(strlen($_POST['birthday']) <= 0) {$error[] = '��������� �� ����. '.'birthday';}
	if(strlen($_POST['organvlady']) <= 0) {$error[] = '��������� �� ����. '.'organvlady';}
	if(strlen($_POST['adresamisto']) <= 0) {$error[] = '��������� �� ����. '.'adresamisto';}
	if(strlen($_POST['adresaraion']) <= 0) {$error[] = '��������� �� ����. '.'adresaraion';}
	if(strlen($_POST['adresaoblast']) <= 0) {$error[] = '��������� �� ����. '.'adresaoblast';}	
	if(strlen($_POST['posada']) <= 0) {$error[] = '��������� �� ����. '.'posada';}
	if(strlen($_POST['slugtelefon']) <= 0) {$error[] = '��������� �� ����. '.'slugtelefon';}
	if(strlen($_POST['category']) <= 0) {$error[] = '��������� �� ����. '.'category';}
	if(strlen($_POST['groplata']) <= 0) {$error[] = '��������� �� ����. '.'groplata';}
	if(strlen($_POST['stagdergyear']) <= 0) {$error[] = '��������� �� ����. '.'stagdergyear';}
	if(strlen($_POST['stagdergmonth']) <= 0) {$error[] = '��������� �� ����. '.'stagdergmonth';}
	if(strlen($_POST['stagposadayear']) <= 0) {$error[] = '��������� �� ����. '.'stagposadayear';}
	if(strlen($_POST['osvitavnz']) <= 0) {$error[] = '��������� �� ����. '.'osvitavnz';}
	if(strlen($_POST['osvitayear']) <= 0) {$error[] = '��������� �� ����. '.'osvitayear';}
	if(strlen($_POST['pisliaosvitaspec']) <= 0) {$error[] = '��������� �� ����. '.'pisliaosvitaspec';}
	if(strlen($_POST['naukastup']) <= 0) {$error[] = '��������� �� ����. '.'naukastup';}
	if(strlen($_POST['pidvishenia']) <= 0) {$error[] = '��������� �� ����. '.'pidvishenia';}
	if(strlen($_POST['tema']) <= 0) {$error[] = '��������� �� ����. '.'tema';}	*/

	if(strlen($_POST['prizvishe']) <= 0) {$error[] = '��������� �� ����. '.'�������';}
	if(strlen($_POST['name']) <= 0) {$error[] = '��������� �� ����. '."��'�";}
	if(strlen($_POST['pobatkovi']) <= 0) {$error[] = '��������� �� ����. '.'�� �������';}
	if(strlen($_POST['birthday']) <= 0) {$error[] = '��������� �� ����. '.'���� ����������';}
	if(strlen($_POST['organvlady']) <= 0) {$error[] = '��������� �� ����. '.'����� �����';}
	if(strlen($_POST['adresamisto']) <= 0) {$error[] = '��������� �� ����. '.'���. �����';}
	if(strlen($_POST['adresaraion']) <= 0) {$error[] = '��������� �� ����. '.'�����';}
	if(strlen($_POST['adresaoblast']) <= 0) {$error[] = '��������� �� ����. '.'�������';}	
	if(strlen($_POST['posada']) <= 0) {$error[] = '��������� �� ����. '.'����� ����� ������';}
	if(strlen($_POST['slugtelefon']) <= 0) {$error[] = '��������� �� ����. '.'��������� ������� 0YY XXXXXXX';}
	if(strlen($_POST['category']) <= 0) {$error[] = '��������� �� ����. '.'�������� ������ (� � �)';}
	if(strlen($_POST['groplata']) <= 0) {$error[] = '��������� �� ����. '.'����� ������ �����';}
	if(strlen($_POST['stagdergyear']) <= 0) {$error[] = '��������� �� ����. '.'���� �������� ������, ����';}
	//if(strlen($_POST['stagdergmonth']) <= 0) {$error[] = '��������� �� ����. '.'���� �������� ������, ������';}
	if(strlen($_POST['stagposadayear']) <= 0) {$error[] = '��������� �� ����. '.'���� ������ �� �����, �� �������, ����';}
	//if(strlen($_POST['stagposadamonth']) <= 0) {$error[] = '��������� �� ����. '.'���� ������ �� �����, �� �������, ������';}
	if(strlen($_POST['osvitavnz']) <= 0) {$error[] = '��������� �� ����. '.'����� ���� �����. ����� ���';}
	if(strlen($_POST['osvitayear']) <= 0) {$error[] = '��������� �� ����. '.'����� ���� �����. г� ���������';}
	if(strlen($_POST['osvitaspec']) <= 0) {$error[] = '��������� �� ����. '.'����� ���� �����. �������������';}
	//if(strlen($_POST['pisliaosvitavnz']) <= 0) {$error[] = '��������� �� ����. '.'ϳ����������� �����. ����� ���';}
	//if(strlen($_POST['pisliaosvitayear']) <= 0) {$error[] = '��������� �� ����. '.'ϳ����������� �����. г� ���������';}
	//if(strlen($_POST['pisliaosvitaspec']) <= 0) {$error[] = '��������� �� ����. '.'ϳ����������� �����. �������������';}
	//if(strlen($_POST['naukastup']) <= 0) {$error[] = '��������� �� ����. '.'�������� ������, ����� ������';}
	//if(strlen($_POST['tema']) <= 0) {$error[] = '��������� �� ����. '.'���� �������� ������';}	
	if(strlen($_POST['pidvishenia']) <= 0) {$error[] = '��������� �� ����. '.'�� ���������� ����������� �� ������� 3 ����';}
	
	
	/*if(!isset($_POST['prizvishe'])) {$error[] = '��������� �� ����. '.'�������';}
	if(!isset($_POST['name'])) {$error[] = '��������� �� ����'."��'�";}
	if(!isset($_POST['pobatkovi'])) {$error[] = '��������� �� ����. '.'�� �������';}
	if(!isset($_POST['birthday'])) {$error[] = '��������� �� ����. '.'���� ����������';}
	if(!isset($_POST['organvlady'])) {$error[] = '��������� �� ����. '.'����� �����';}
	if(!isset($_POST['adresamisto'])) {$error[] = '��������� �� ����. '.'���. �����';}
	if(!isset($_POST['adresaraion'])) {$error[] = '��������� �� ����. '.'�����';}
	if(!isset($_POST['adresaoblast'])) {$error[] = '��������� �� ����. '.'�������';}	
	if(!isset($_POST['posada'])) {$error[] = '��������� �� ����. '.'����� ����� ������';}
	if(!isset($_POST['slugtelefon'])) {$error[] = '��������� �� ����. '.'��������� ������� 0YY XXXXXXX';}
	if(!isset($_POST['category'])) {$error[] = '��������� �� ����. '.'�������� ������ (� � �)';}
	if(!isset($_POST['groplata'])) {$error[] = '��������� �� ����. '.'����� ������ �����';}
	if(!isset($_POST['stagdergyear'])) {$error[] = '��������� �� ����. '.'���� �������� ������, ����';}
	if(!isset($_POST['stagdergmonth'])) {$error[] = '��������� �� ����. '.'���� �������� ������, ������';}
	if(!isset($_POST['stagposadayear'])) {$error[] = '��������� �� ����. '.'���� ������ �� �����, �� �������, ����';}
	if(!isset($_POST['stagposadamonth'])) {$error[] = '��������� �� ����. '.'���� ������ �� �����, �� �������, ������';}
	if(!isset($_POST['osvitavnz'])) {$error[] = '��������� �� ����. '.'����� ���� �����. ����� ���';}
	if(!isset($_POST['osvitayear'])) {$error[] = '��������� �� ����. '.'����� ���� �����. г� ���������';}
	if(!isset($_POST['osvitaspec'])) {$error[] = '��������� �� ����. '.'����� ���� �����. �������������';}
	if(!isset($_POST['pisliaosvitavnz'])) {$error[] = '��������� �� ����. '.'ϳ����������� �����. ����� ���';}
	if(!isset($_POST['pisliaosvitayear'])) {$error[] = '��������� �� ����. '.'ϳ����������� �����. �������������';}
	if(!isset($_POST['pisliaosvitaspec'])) {$error[] = '��������� �� ����. '.'ϳ����������� �����. г� ���������';}
	if(!isset($_POST['naukastup'])) {$error[] = '��������� �� ����. '.'�������� ������, ����� ������';}
	if(!isset($_POST['tema'])) {$error[] = '��������� �� ����. '.'���� �������� ������';}	
	if(!isset($_POST['pidvishenia'])) {$error[] = '��������� �� ����. '.'�� ���������� ����������� �� ������� 3 ����';}*/
	

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
					$registrclosedonline = "��������� ��� �������. ����� �������� ����������."; 
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
							organvlady, adresamisto, adresaraion, adresaoblast, posada, email, slugtelefon, category, groplata, 
							stagdergyear, stagdergmonth, stagposadayear, stagposadamonth, osvitavnz, osvitayear, osvitaspec, 
							pisliaosvitavnz, pisliaosvitayear, pisliaosvitaspec, naukastup, pidvishenia, tema, groupcat,  
							active) 
							VALUES 							( :username, :password, :prizvishe, :name, :pobatkovi, :birthday, 
							:organvlady, :adresamisto, :adresaraion, :adresaoblast, :posada, :email, :slugtelefon, :category, :groplata, 
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
						':adresamisto' => $_POST['adresamisto'],
						':adresaraion' => $_POST['adresaraion'],
						':adresaoblast' => $_POST['adresaoblast'],
						':posada' => $_POST['posada'], 
						':email' => $_POST['email'],
						':slugtelefon' => $_POST['slugtelefon'],
						':category' => $_POST['category'],
						':groplata' => $_POST['groplata'], 
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
						':active' => 'Yes'/*$activasion*/
					));
					$id = $db->lastInsertId('memberID');

					//send email
					$to = $_POST['email'];
					$subject = "Registration Confirmation";
					$body = "<p>Thank you for registering at demo site.</p>
					<p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
					<p>Regards Site Admin</p>";

					$mail = new Mail();
					$mail->setFrom(SITEEMAIL);
					$mail->addAddress($to);
					$mail->subject($subject);
					$mail->body($body);
					$mail->send();

					//redirect to index page
					header('Location: index.php?action=joined');
					exit;

					//else catch the exception and show the error.
					} catch(PDOException $e) {
						$error[] = $e->getMessage();
					}
				}					
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
	}
}

//define page title
$title = 'Demo';

//include header template
require('layout/header.php');
?>

<style>
input[pattern]:invalid{
  color:red;
}
</style>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-16 col-sm-offset-2 col-md-offset-1">
			<form role="form" method="post" action="" autocomplete="off">
		<?php if(isset($registrclosed)) { 
					echo '<h3>'.$_SESSION['count']."/".$_SESSION['maxmembers']."(".$_SESSION['groupcat'].")".":".$_SESSION['groupname'].'<h3>';
					echo '<h2 class="bg-success">'.$registrclosed.'</h2>'	;
					echo "<p>��� ������������? <a href='login.php'>�����</a></p>";
			  }
			  elseif (isset($registrclosedonline))	{
						echo '<h3>'.$_SESSION['count']."/".$_SESSION['maxmembers']."(".$_SESSION['groupcat'].")".":".$_SESSION['groupname'].'<h3>';
						echo '<h2 class="bg-success">'."�� ����, ".$_SESSION['registrclosedonline'].'</h2>';
					    echo "<p>��� ������������? <a href='login.php'>�����</a></p>";
						}
			  else {   ?>
				<h2>���������. </h2>
				<h3><?php echo $_SESSION['count']."/".$_SESSION['maxmembers']."(".$_SESSION['groupcat'].")".":".$_SESSION['groupname']; ?></h3>
				<p>��� ������������? <a href='login.php'>�����</a></p>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				//if action is joined show sucess
				
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){ 
					echo "<h2 class='bg-success'>³����! ��������� ����������� ������.<br/>"; 
					echo "������ <a href='login.php'>�����</a> � ���� ������+������� ��� ����������� ���� �����.
					��� <a href='../nads/nads.shtml'>�����������</a> �� ����.</h2>";
					//echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}else {
				?>

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
					<label>��'� ��� �����</label>
					<div class="form-group">
							<input type="text" pattern="[A-Za-z0-9]{3,50}" name="username" id="username" class="form-control " placeholder="��'� ��� �����" title="ҳ���� ������� ����� � �����" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-5">
					<label>Email</label>					
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control " placeholder="���������� �����" title="���������� �����" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
						</div>						
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control " placeholder="������" value="<?php if(isset($error)){ echo $_POST['password']; } ?>" title="������" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control " placeholder="ϳ��������� ������" value="<?php if(isset($error)){ echo $_POST['passwordConfirm']; } ?>" title="ϳ��������� ������" tabindex="4">
						</div>
					</div>
				</div>
				
				<label>ϲ�, ���� ����������</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="prizvishe" id="prizvishe" class="form-control " placeholder="�������" value="<?php if(isset($error)){ echo $_POST['prizvishe']; } ?>" title="�������" tabindex="5">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control " placeholder="��'�" value="<?php if(isset($error)){ echo $_POST['name']; } ?>" title="��'�" tabindex="6">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="pobatkovi" id="pobatkovi" class="form-control " placeholder="�� �������" value="<?php if(isset($error)){ echo $_POST['pobatkovi']; } ?>" title="�� �������" tabindex="7">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="birthday" id="birthday" class="form-control " placeholder="���� ����������" value="<?php if(isset($error)){ echo $_POST['birthday']; } ?>" title="���� ����������" tabindex="8">
						</div>
					</div>		
				</div>
				
				<label>̳��� ������</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="organvlady" id="organvlady" class="form-control " placeholder="����� �����" value="<?php if(isset($error)){ echo $_POST['organvlady']; } ?>" title="����� �����" tabindex="9">
						</div>
					</div>
				</div>
				
				<label>������ ���� ������ (��� �����, �����, �������)</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="text" name="adresamisto" id="adresamisto" class="form-control " placeholder="���. �����" value="<?php if(isset($error)){ echo $_POST['adresamisto']; } ?>" title="������ ���� ������, ���. �����" tabindex="10">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="adresaraion" id="adresaraion" class="form-control " placeholder="�����" value="<?php if(isset($error)){ echo $_POST['adresaraion']; } ?>" title="������ ���� ������, �����" tabindex="11">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="adresaoblast" id="adresaoblast" class="form-control " placeholder="�������" value="<?php if(isset($error)){ echo $_POST['adresaoblast']; } ?>" title="������ ���� ������, �������" tabindex="12">
						</div>
					</div>
				</div>
				<label>����� ������ (�����)</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="posada" id="posada" class="form-control " placeholder="����� ����� ������" value="<?php if(isset($error)){ echo $_POST['posada']; } ?>" title="����� ����� ������" tabindex="13">
						</div>
					</div>
				</div>
				<label>��������� ������� 0YYXXXXXXX</label>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="tel" pattern="0[0-9]{9}" name="slugtelefon" id="slugtelefon" class="form-control " placeholder="��������� ������� 0YYXXXXXXX"
							value="<?php if(isset($error)){ echo $_POST['slugtelefon']; } ?>" title="��������� ������� 0YYXXXXXXX" tabindex="14">
						</div>
					</div>
				</div>				
				<label>�������� ������ (� � �)</label>
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2">
						<div class="form-group">
							<input type="text" pattern="[�,�,�]" name="category" id="category" class="form-control "  value="<?php if(isset($error)){ echo $_POST['category']; } ?>" title="�������� ������ (� � �)" tabindex="15">
						</div>
					</div>
				</div>
				<label>����� ������ �����</label>				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="groplata" id="groplata" class="form-control " placeholder="����� ������ �����" value="<?php if(isset($error)){ echo $_POST['groplata']; } ?>" title="����� ������ �����" tabindex="16">
						</div>
					</div>
				</div>

				<label>���� �������� ������ (����, ������)</label>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="integer" pattern="[0-9]{1,2}" name="stagdergyear" id="stagdergyear" class="form-control " placeholder=" ����" value="<?php if(isset($error)){ echo $_POST['stagdergyear']; } ?>" title="���� �������� ������, ����" tabindex="17">
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="number" min="0" max="12" name="stagdergmonth" id="stagdergmonth" class="form-control " placeholder="������" value="<?php if(isset($error)){ echo $_POST['stagdergmonth']; } ?>" title="���� �������� ������, ������" tabindex="18">
						</div>
					</div>					
				</div>				

				<label>���� ������ �� �����, �� ������� (����, ������)</label>
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="integer" pattern="[0-9]{1,2}" name="stagposadayear" id="stagposadayear" class="form-control " placeholder="����" value="<?php if(isset($error)){ echo $_POST['stagposadayear']; } ?>" title="���� ������ �� �����, ����" tabindex="19">
						</div>
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3">
						<div class="form-group">
							<input type="number" min="0" max="12" name="stagposadamonth" id="stagposadamonth" class="form-control " placeholder="������" value="<?php if(isset($error)){ echo $_POST['stagposadamonth']; } ?>" title="���� ������ �� �����, ������" tabindex="20">
						</div>
					</div>					
				</div>	

				<label>����� ���� ����� (���, �������������, �� ���������)</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="osvitavnz" id="osvitavnz" class="form-control " placeholder="����� ���" value="<?php if(isset($error)){ echo $_POST['osvitavnz']; } ?>" title="����� ���" tabindex="21">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="text" name="osvitaspec" id="osvitaspec" class="form-control " placeholder="�������������" value="<?php if(isset($error)){ echo $_POST['osvitaspec']; } ?>" title="�������������" tabindex="22">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="osvitayear" id="osvitayear" class="form-control " placeholder="г� ���������" value="<?php if(isset($error)){ echo $_POST['osvitayear']; } ?>" title="г� ���������" tabindex="23">
						</div>	
					</div>						
				</div>

				<label>ϳ����������� ����� (���, �������������, �� ���������)</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="pisliaosvitavnz" id="pisliaosvitavnz" class="form-control " placeholder="����� ���" value="<?php if(isset($error)){ echo $_POST['pisliaosvitavnz']; } ?>" title="����� ���" tabindex="24">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-4">
						<div class="form-group">
							<input type="text" name="pisliaosvitaspec" id="pisliaosvitaspec" class="form-control " placeholder="�������������" value="<?php if(isset($error)){ echo $_POST['pisliaosvitaspec']; } ?>" title="�������������" tabindex="25">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3">
						<div class="form-group">
							<input type="date" name="pisliaosvitayear" id="pisliaosvitayear" class="form-control " placeholder="г� ���������" value="<?php if(isset($error)){ echo $_POST['pisliaosvitayear']; } ?>" title="г� ���������" tabindex="26">
						</div>	
					</div>						
				</div>

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="naukastup" id="naukastup" class="form-control " placeholder="�������� ������, ����� ������" value="<?php if(isset($error)){ echo $_POST['naukastup']; } ?>" title="�������� ������, ����� ������" tabindex="27">
						</div>
					</div>
				</div>	

				<label>��� ��������, �� ���������� �� ���������� ���������</label>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
							<input type="text" name="tema" id="tema" class="form-control " placeholder="���� �������� ������" value="<?php if(isset($error)){ echo $_POST['tema']; } ?>" title="���� �������� ������" tabindex="28">
						</div>
					</div>
				</div>
				<label >�� ���������� ����������� �� ������� 3 ����?</label >				
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-5">
						<div class="form-group" >
							<label class="radio-inline" ><input type="radio" name="pidvishenia" class="form-control "  value="1" tabindex="29">���</label>
							<label class="radio-inline" ><input type="radio" name="pidvishenia" class="form-control "  value="2"  checked  tabindex="30">&ensp;ͳ&ensp;</label>
							<!--input type="radio" name="pidvishenia" id="pidvishenia" class="form-control " placeholder="���� �������� ������" value="<php if(isset($error)){ echo $_POST['pidvishenia']; } ?>" title="�� ���������� ����������� �� ������� 3 ����?" tabindex="28"-->
						</div>
					</div>
				</div>
				
				<div class="row">
					<input type="hidden" name="group" id="group" class="form-control input-lg" value="<?php echo $groupcat; ?>" >
					<input type="hidden" name="maxmembers" id="maxmembers" class="form-control input-lg" value="<?php echo $maxmembers; ?>" >
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="���������" class="btn btn-primary btn-block btn-lg" tabindex="31"></div>
					<p><a href='../nads/nads.shtml'>³����</a></p>
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


</div>

<?php
//include header template
require('layout/footer.php');
?>