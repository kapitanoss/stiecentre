<?php
ob_start();
session_start();
ini_set('display_errors',1);
error_reporting(E_ALL);
//Debug 
define('DEBUG',true);
define('LOCAL',true);

//set timezone
date_default_timezone_set('Europe/Kiev');
if (defined('LOCAL')&& LOCAL) { 
//database credentials denwer
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','site_db');
}
else {
//database credentials hosting
define("DBHOST", "localhost");
define("DBUSER", "dfsu");
define("DBPASS", "Centre-2017/08/01");
define("DBNAME", "site_db");
}

//application address
define('DIR','http://www.centre-kiev.kiev.ua/register/');
define('SITEEMAIL','noreply.centrekievmail@gmail.com');
function adefine($value) {
	$admin1=$value; echo "adefine=".$admin1."! value=". $value;
	return $value;
}
function grname($groupcat){
    switch ($groupcat) {
        case '20':	$groupname='Тренінг «ВІКОВИЙ МЕНЕДЖМЕНТ»'; $groupmembers=20;  break;
        case '21':	$groupname='Тренінг «УПРАВЛІННЯ ПРОЕКТАМИ ТА ПРОГРАМАМИ В ПУБЛІЧНІЙ СФЕРІ»'; $groupmembers=20; break;
		case '22':	$groupname='Тренінг «КРОСКУЛЬТУРНА КОМУНІКАЦІЯ В ПУБЛІЧНІЙ СФЕРІ»'; $groupmembers=20; break;
		case '23':	$groupname='Тренінг «ВСТИГАТИ БІЛЬШЕ: 11 ПРАВИЛ ПО ТАЙМ-МЕНЕДЖМЕНТУ ТА ПРОДУКТИВНОСТІ»'; $groupmembers=20; break;
        case '24':	$groupname='Тренінг «МИСТЕЦТВО СПІЛКУВАННЯ: НАВИЧКИ АСЕРТИВНОЇ ПОВЕДІНКИ ТА ЕФЕКТИВНОЇ КОМУНІКАЦІЇ»'; $groupmembers=20; break;

		case '25':	$groupname='Тренінг «УПРАВЛІННЯ КОНФЛІКТАМИ У ДІЯЛЬНОСТІ ДЕРЖАВНИХ СЛУЖБОВЦІВ»'; $groupmembers=20; break;
        /*case '26':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 5 вересня 2017 року.'; $groupmembers=20; break;
		case '27':	$groupname='Модуль 3. «Лідерство та управління персоналом 5 вересня 2017 року.'; break;
		case '28':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 5 вересня 2017 року.'; break;
		case '29':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони»5 вересня 2017 року.'; break;

        case '30':	$groupname='Модуль 1. «Лідерство та ефективне управління« 6 вересня 2017 року.'; break;
        case '31':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 6 вересня 2017 року.'; break;
		case '32':	$groupname='Модуль 3. «Лідерство та управління персоналом» 6 вересня 2017 року.'; break;
		case '33':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 6 вересня 2017 року.'; break;
		case '34':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 6 вересня 2017 року.'; break;

        case '35':	$groupname='Модуль 1. «Лідерство та ефективне управління» 7 вересня 2017 року.'; break;
        case '36':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 7 вересня 2017 року.'; break;
		case '37':	$groupname='Модуль 3. «Лідерство та управління персоналом» 7 вересня 2017 року.'; break;
		case '38':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 7 вересня 2017 року.'; break;
		case '39':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 7 вересня 2017 року.'; break;
	
        case '40':	$groupname='Модуль 1. «Лідерство та ефективне управління» 8 вересня 2017 року.'; break;
        case '41':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 8 вересня 2017 року.'; break;
		case '42':	$groupname='Модуль 3. «Лідерство та управління персоналом» 8 вересня 2017 року.'; break;
		case '43':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 8 вересня 2017 року.'; break;
		case '44':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 8 вересня 2017 року.'; break;

        case '50':	$groupname='Модуль 1. «Лідерство та ефективне управління» 18 вересня 2017 року.'; break;
        case '51':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 18 вересня 2017 року.'; break;
		case '52':	$groupname='Модуль 3. «Лідерство та управління персоналом» 18 вересня 2017 року.'; break;
		case '53':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 18 вересня 2017 року.'; break;
		case '54':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 18 вересня 2017 року.'; break;

        case '55':	$groupname='Модуль 1. «Лідерство та ефективне управління» 19 вересня 2017 року.'; break;
        case '56':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 19 вересня 2017 року.'; break;
		case '57':	$groupname='Модуль 3. «Лідерство та управління персоналом» 19 вересня 2017 року.'; break;
		case '58':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 19 вересня 2017 року.'; break;
		case '59':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 19 вересня 2017 року.'; break;

		case '60':	$groupname='Модуль 1. «Лідерство та ефективне управління» 20 вересня 2017 року.'; break;
        case '61':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 20 вересня 2017 року.'; break;
		case '62':	$groupname='Модуль 3. «Лідерство та управління персоналом» 20 вересня 2017 року.'; break;
		case '63':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 20 вересня 2017 року.'; break;
		case '64':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 20 вересня 2017 року.'; break;

        case '65':	$groupname='Модуль 1. «Лідерство та ефективне управління» 21 вересня 2017 року.'; break;
        case '66':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 21 вересня 2017 року.'; break;
		case '67':	$groupname='Модуль 3. «Лідерство та управління персоналом» 21 вересня 2017 року.'; break;
		case '68':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 21 вересня 2017 року.'; break;
		case '69':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 21 вересня 2017 року.'; break;

        case '70':	$groupname='Модуль 1. «Лідерство та ефективне управління» 22 вересня 2017 року.'; break;
        case '71':	$groupname='Модуль 2. «Лідерство та ефективна комунікація» 22 вересня 2017 року.'; break;
		case '72':	$groupname='Модуль 3. «Лідерство та управління персоналом» 22 вересня 2017 року.'; break;
		case '73':	$groupname='Модуль 4. «Лідерство та стратегічне управління державним органом» 22 вересня 2017 року.'; break;
		case '74':	$groupname='Модуль 5. «Европейська та евроантлантична інтеграція. Національна політика в сфері безпеки і оборони» 22 вересня 2017 року.'; break;
*/
        case '90':	$groupname='Тематичний короткостроковий семінар «Стратегічне управління та планування». Термін навчання: 22-23 січня 2018 року.'; $groupmembers=80; break;
        case '91':	$groupname='Тематичний короткостроковий семінар «Управління проектами та програмами». Термін навчання: 25-26 січня 2018 року.'; $groupmembers=50; break;
		case '92':	$groupname='Тематичний короткостроковий семінар «Управління змінами». Термін навчання: 29-30 січня 2018 року.'; $groupmembers=40; break;
		case '93':	$groupname='Тематичний короткостроковий семінар «Крос-культурний менеджмент. Крос-культурні комунікації та взаємодія». Термін навчання: 05-06 лютого 2018 року.'; $groupmembers=60; break;
		case '94':	$groupname='Тематичний короткостроковий семінар «Мистецтво ведення переговорів». Термін навчання: 08-09 лютого 2018 року.'; $groupmembers=80; break;

        case '95':	$groupname='Професійна програма підвищення кваліфікації державних службовців (7-9 групи оплати праці). Термін навчання: 12-23 лютого 2018 року.'; $groupmembers=120; break;
        case '96':	$groupname='Тематичний короткостроковий семінар «Європейські стандарти демократичного врядування». Термін навчання: 15-16 лютого 2018 року.'; $groupmembers=40; break;
		case '97':	$groupname='Тематичний короткостроковий семінар «Актуільні питання реалізації нового законодавства про державну службу». Термін навчання: 22-23 лютого 2018 року.'; $groupmembers=25; break;
		case '98':  $groupname='Тематичний короткостроковий семінар «Тайм-менеджмент». Термін навчання: 26-27 лютого 2018 року.'; $groupmembers=70; break;
		case '99':  $groupname='Тематичний короткостроковий семінар «Україна-НАТО: напрями співробітництва та партнерства». Термін навчання: 01-02 березня 2018 року.'; $groupmembers=40; break;

		case '100': $groupname='Тематичний короткостроковий семінар «Електронне врядування в публічному управлінні». Термін навчання: 05-06 березня 2018 року.'; $groupmembers=50; break;
		case '101': $groupname='Професійна програма підвищення кваліфікації державних службовців (6 група оплати праці). Термін навчання: 12-13 березня 2018 року.'; $groupmembers=50; break;
		case '102': $groupname='Тематичний короткостроковий семінар «Ораторське мистецтво». Термін навчання: 26-27 березня 2018 року.'; $groupmembers=80; break;
		case '103': $groupname='Тематичний короткостроковий семінар «Актуільні питання реалізації нового законодавства про державну службу». Термін навчання: 9-30 березня 2018 року.'; $groupmembers=25; break;
		case '104': $groupname='Тематичний короткостроковий семінар «Електронне врядування в публічному управлінні». Термін навчання: 09-10 листопада'; $groupmembers=74; break;

		case '105': $groupname='Тематичний короткостроковий семінар «Медіація в публічному управлінні». Термін навчання: 05-06 квітня 2018 року.'; $groupmembers=65; break;
		case '106': $groupname='Тематичний короткостроковий семінар «Мистецтво ведення переговорів». Термін навчання: 10-11 квітня 2018 року.'; $groupmembers=90; break;
		case '107': $groupname='Тематичний короткостроковий семінар «Децентралізація влади та децентралізація фінансів в Україні». Термін навчання: 12-13 квітня 2018 року.'; $groupmembers=60; break; 
/*		
		case '150':	$groupname='Професійна програма «Інноваційні технології управління персоналом». Термін навчання: 04-08 вересня 2017 року.'; break;
		case '151':	$groupname='Професійна програма «Інноваційні технології управління персоналом». Термін навчання: 11-15 вересня 2017 року.'; break;
		case '152':	$groupname='Професійна програма «Інноваційні технології управління персоналом». Термін навчання: 18-22 вересня 2017 року.'; break;
		case '153':	$groupname='Професійна програма «Інноваційні технології управління персоналом». Термін навчання: 25-29 вересня 2017 року.'; break;
*/
		
        default:    $groupname=""; $groupmembers=0; break;
	}
	//return  $groupname;
	return array($groupname, $groupmembers);
}


$countvlada = 75;
function vlada_name_membr($vladacat){
    switch ($vladacat){
		 case '1': 	$vlada='Апарат Верховної Ради України'; 
					$vladamembers=3; break;
		 case '2': 	$vlada='Адміністрація Президента України'; 
					$vladamembers=3; break;
		 case '3': 	$vlada='Секретаріат Кабінету Міністрів України'; $vladamembers=3; break;
		 case '4': 	$vlada='Рахункова палата'; $vladamembers=3; break;
		 case '5': 	$vlada='Міністерство аграрної політики та продовольства України'; $vladamembers=3; break;
		 case '6': 	$vlada='Міністерство внутрішніх справ України'; $vladamembers=3; break;
		 case '7': 	$vlada='Міністерство екології та природних ресурсів України'; $vladamembers=3; break;
		 case '8': 	$vlada='Міністерство економічного розвитку і торгівлі України'; $vladamembers=3; break;
		 case '9': 	$vlada='Міністерство енергетики та вугільної промисловості України'; $vladamembers=3; break;
		 case '10': $vlada='Міністерство закордонних справ України'; $vladamembers=3; break;
		 case '11': $vlada='Міністерство інформаційної політики України'; $vladamembers=3; break;
		 case '12': $vlada='Міністерство інфраструктури України'; $vladamembers=3; break;
		 case '13': $vlada='Міністерство культури України'; $vladamembers=3; break;
		 case '14': $vlada='Міністерство молоді та спорту України'; $vladamembers=3; break;
		 case '15': $vlada='Міністерство з питань тимчасово окупованих територій та внутрішньо переміщених осіб України'; $vladamembers=3; break;
		 case '16': $vlada='Міністерство оборони України'; $vladamembers=3; break;
		 case '17': $vlada='Генеральний штаб Збройних Сил України'; $vladamembers=3; break;
		 case '18': $vlada='Міністерство освіти і науки України'; $vladamembers=3; break;
		 case '19': $vlada="Міністерство охорони здоров'я України"; $vladamembers=3; break;
		 case '20': $vlada='Міністерство регіонального розвитку, будівництва та житлово-комунального господарства України'; $vladamembers=3; break;
		 case '21': $vlada='Міністерство соціальної політики України'; $vladamembers=3; break;
		 case '22': $vlada='Міністерство фінансів України'; $vladamembers=3; break;
		 case '23': $vlada='Міністерство юстиції України'; $vladamembers=3; break;
		 case '24': $vlada='Державна авіаційна служба України'; $vladamembers=3; break;
		 case '25': $vlada='Державна архівна служба України'; $vladamembers=3; break;
		 case '26': $vlada='Державна аудиторська служба України'; $vladamembers=3; break;
		 case '27': $vlada='Державна казначейська служба України'; $vladamembers=3; break;
		 case '28': $vlada='Державна міграційна служба України'; $vladamembers=3; break;
		 case '29': $vlada='Державна регуляторна служба України'; $vladamembers=3; break;
		 case '30': $vlada='Державна служба геології та надр України'; $vladamembers=3; break;
		 case '31': $vlada='Державна служба експортного контролю України'; $vladamembers=3; break;
		 case '32': $vlada='Державна служба статистики України'; $vladamembers=3; break;
		 case '33': $vlada='Державна служба України з лікарських засобів та контролю за наркотиками'; $vladamembers=3; break;
		 case '34': $vlada='Державна служба України з безпеки на транспорті'; $vladamembers=3; break;
		 case '35': $vlada='Державна служба України з питань безпечності харчових продуктів та захисту споживачів'; $vladamembers=3; break;
		 case '36': $vlada='Державна служба України з питань геодезії, картографії та кадастру'; $vladamembers=3; break;
		 case '37': $vlada='Державна служба України з питань праці'; $vladamembers=3; break;
		 case '38': $vlada='Державна служба України з надзвичайних ситуацій'; $vladamembers=3; break;
		 case '39': $vlada='Державна служба фінансового моніторингу України'; $vladamembers=3; break;
		 case '40': $vlada='Державна фіскальна служба України'; $vladamembers=3; break;
		 case '41': $vlada='Державна служба України у справах ветеранів війни та учасників антитерористичної операції'; $vladamembers=3; break;
		 case '42': $vlada='Державне агентство автомобільних доріг України'; $vladamembers=3; break;
		 case '43': $vlada='Державне агентство водних ресурсів України'; $vladamembers=3; break;
		 case '44': $vlada='Державне агентство з енергоефективності та енергозбереження України'; $vladamembers=3; break;
		 case '45': $vlada='Державне агентство з питань електронного урядування України'; $vladamembers=3; break;
		 case '46': $vlada='Державне агентство лісових ресурсів України'; $vladamembers=3; break;
		 case '47': $vlada='Державне агентство резерву України'; $vladamembers=3; break;
		 case '48': $vlada='Державне агентство рибного господарства України'; $vladamembers=3; break;
		 case '49': $vlada='Державне агентство України з  управління зоною відчуження'; $vladamembers=3; break;
		 case '50': $vlada='Державне агентство України з питань кіно'; $vladamembers=3; break;
		 case '51': $vlada='Державне космічне агентство України'; $vladamembers=3; break;
		 case '52': $vlada='Державна архітектурно-будівельна інспекція України'; $vladamembers=3; break;
		 case '53': $vlada='Державна екологічна інспекція України'; $vladamembers=3; break;
		 case '54': $vlada='Державна інспекція навчальних закладів України'; $vladamembers=3; break;
		 case '55': $vlada='Державна інспекція енергетичного нагляду України'; $vladamembers=3; break;
		 case '56': $vlada='Державна інспекція ядерного регулювання України'; $vladamembers=3; break;
		 case '57': $vlada='Пенсійний фонд України'; $vladamembers=3; break;
		 case '58': $vlada="Український інститут національної пам'яті"; $vladamembers=3; break;
		 case '59': $vlada='Державний комітет телебачення і радіомовлення України'; $vladamembers=3; break;
		 case '60': $vlada='Державне бюро розслідувань'; $vladamembers=3; break;
		 case '61': $vlada='Фонд державного майна України'; $vladamembers=3; break;
		 case '62': $vlada="Адміністрація Державної служби спеціального зв'язку та захисту інформації України"; $vladamembers=3; break;
		 case '63': $vlada='Адміністрація Державної прикордонної служби України'; $vladamembers=3; break;
		 case '64': $vlada='Національне агентство з питань запобігання корупції'; $vladamembers=3; break;
		 case '65': $vlada='Національне агентство з питань виявлення, розшуку та управління активами, одержаними від корупційних та інших злочинів'; $vladamembers=3; break;
		 case '66': $vlada='Національне агентство України з питань державної служби'; $vladamembers=3; break;
		 case '67': $vlada="Національна комісія ,що здійснює державне регулювання у сфері зв'язку та інформатизації"; $vladamembers=3; break;
		 case '68': $vlada='Національна комісія з цінних паперів та фондового ринку'; $vladamembers=3; break;
		 case '69': $vlada='Національна комісія ,що здійснює державне регулювання у сфері ринків фінансових послуг'; $vladamembers=3; break;
		 case '70': $vlada='Національна комісія, що здійснює державне регулювання у сферах енергетики та комунальних послуг(НКРЕКП)'; $vladamembers=3; break;
		 case '71': $vlada='Національна Рада України з питань телебачення і радіомовлення'; $vladamembers=3; break;
		 case '72': $vlada='Національна служба посередництва і примирення'; $vladamembers=3; break;
		 case '73': $vlada='Національна поліція України'; $vladamembers=3; break;
		 case '74': $vlada='Антимонопольний комітет України'; $vladamembers=3; break;
		 case '75': $vlada='Адміністрація Державної спеціальної служби транспорту '; $vladamembers=3; break;

		 default: 	$vlada="none list"; $vladamembers=0; break;
	}
	return array($vlada, $vladamembers);
}

$category = array(		
		1 => 'А',
		2 => 'Б',
		3 => 'В'
	);

$groplaty = array(
	1 => array(
		// Категорія посади А
		1 => '1',
		2 => '2',
		3 => '3'
	),
	2 => array(
		// Категорія посади Б
		1 => '4',
		2 => '5',
		3 => '6'
	),
	3 => array(
		// Категорія посади В
		1 => '7',
		2 => '8',
		3 => '9'
	)
);

$rangslug = array(
	1 => array(
		// Категорія посади А
		1 => '1',
		2 => '2',
		3 => '3'
	),
	2 => array(
		// Категорія посади Б
		1 => '3',
		2 => '4',
		3 => '5',
		4 => '6'		
	),
	3 => array(
		// Категорія посади В
		1 => '6',
		2 => '7',
		3 => '8',
		4 => '9'		
	)
);

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8", DBUSER, DBPASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//mysql_set_charset('utf8');
	//mysql_query("SET NAMES 'utf8';");
	//mysql_query("SET CHARACTER SET 'utf8';");
    //mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
