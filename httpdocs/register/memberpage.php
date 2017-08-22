<?php 
header("Content-type: text/html;charset=utf-8");
require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 
if(isset($_POST['submitsave'])){ //CSV Excel - список зареєстрованих слухачів групи
			try {//echo date_default_timezone_get();
			//echo "select * from members" | mysql --host=localhost  --user=dfsu --password=Centre-2017/08/01 DATABASE.site_db > output.txt
			$datefile = date('_m.d.y H_i_s');
			/*echo "SELECT prizvishe, name, pobatkovi, birthday, 
					organvlady, adresamisto, adresaraion, adresaoblast, posada, email, slugtelefon, category, groplata, 
					stagdergyear, stagdergmonth, stagposadayear, stagposadamonth, osvitavnz, osvitaspec , osvitayear, 
					pisliaosvitavnz, pisliaosvitaspec, IFNULL(pisliaosvitayear,''),  naukastup, IF(pidvishenia=1,'Так','Ні'), tema,'". grname($_POST['groupcat']) ."' as grnames 
					FROM members WHERE groupcat= :groupcat  ORDER BY datezapovn";*/
//INTO OUTFILE "."'bd/group".$datefile.".csv'"."
//INTO OUTFILE "."'bd/group".$datefile.".csv'"." 
//FIELDS TERMINATED BY ';' ENCLOSED BY '' ESCAPED BY '\\\\'
//LINES STARTING BY '' TERMINATED BY '\r\n'
			$stmtcat = $db->prepare("SELECT 'Прізвище', 'Ім''я','По батькові','Дата народження',
							'Орган влади','Нас. пункт','Район','Область','Повна назва посади','Електронна пошта','Службовий телефон','Категорія посади','Група оплати праці',
							'Стаж державної служби,р','Стаж державної служби,м','Стаж роботи на посаді,р','Стаж роботи на посаді,м','Освіта. Назва ВНЗ','Освіта. Спеціальність','Освіта. Рік закінчення',
							'Друга освіта. Назва ВНЗ','Друга освіта. Спеціальність','Друга освіта. Рік закінчення','Науковий ступінь','Підв. кваліф?','Тема випускної роботи','Семінар' 
			
							UNION(SELECT  prizvishe, name, pobatkovi, birthday, 
							organvlady, adresamisto, adresaraion, adresaoblast, posada, email, slugtelefon, category, groplata, 
							stagdergyear, stagdergmonth, stagposadayear, stagposadamonth, osvitavnz, osvitaspec , osvitayear, 
							pisliaosvitavnz, pisliaosvitaspec, IFNULL(pisliaosvitayear,''),  naukastup, IF(pidvishenia=1,'Так','Ні'), tema,'". grname($_POST['groupcat']) ."' as grnames 
							FROM members WHERE groupcat= :groupcat  ORDER BY datezapovn)");
			$stmtcat->execute(array('groupcat' => $_POST['groupcat']));
//echo "1111". $_POST['groupcat']. "1111"; exit;
			$fp = fopen('file.csv', 'w');
			while ($rowcsv = $stmtcat->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
						  $data = $rowcsv[0] . "\t" . $rowcsv[1] . "\t" . grname($row[1]) ;
						  //echo "<option value='" . $row[1] ."'"; if($_POST['groupcat']==$row[1]) {echo  ' selected ';  } echo '>Кільк слухачів:' . $row[0]  . "\t" . grname($row[1]) . "</option>";
						  //print $data;
						  fputcsv($fp, $rowcsv, ";"); 
			}
			fclose($fp);
			//$username =$rowcat['username']; 
			//$email =$rowcat['email']; 
			//$groupcat = $rowcat['groupcat'];
			$outtofile = true;
			//else catch the exception and show the error.
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
}

if(isset($_POST['submitlist'])){ //Список зареєстрованих слухачів групи
			try {
			$stmtcat = $db->prepare('SELECT * FROM members WHERE groupcat= :groupcat  ORDER BY datezapovn');
			$stmtcat->execute(array('groupcat' => $_POST['groupcat']));
//echo "1111". $_POST['groupcat']. "1111"; exit;
			//$rowcat = $stmt->fetch(PDO::FETCH_ASSOC);
			//$username =$rowcat['username']; 
			//$email =$rowcat['email']; 
			//$groupcat = $rowcat['groupcat'];
			$outtextarea = true;
			//else catch the exception and show the error.
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
}

if(isset($_POST['submituser'])&&(strlen($_POST['prizvishe']) > 0)){ //Зареєстровані слухачі по фільтру
			try {
			$stmtuser = $db->prepare('SELECT * FROM members WHERE prizvishe LIKE :prizvishe ORDER BY datezapovn');
			$stmtuser->execute(array('prizvishe' => $_POST['prizvishe'].'%'));
//echo "1111". $_POST['groupcat']. "1111"; exit;
			//$rowcat = $stmt->fetch(PDO::FETCH_ASSOC);
			//$username =$rowcat['username']; 
			//$email =$rowcat['email']; 
			//$groupcat = $rowcat['groupcat'];
			$usertextarea = true;
			//else catch the exception and show the error.
			} catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
}

	
//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
// select groupcat, groupcatname, count user
//echo "Membadmin=".$_SESSION['admin'];
//if ($_SESSION['admin']){ echo 'ADMIN'; /*exit;*/
//				} else {echo 'NOADMIN'; /*exit;*/}
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-1">
			<form role="form" method="post" action="" autocomplete="off">
			
				<h2>Ласкаво просимо, <?php echo $_SESSION['username']; ?></h2>
				<?php if (!$_SESSION['admin']){?> <p><a href='editmember1.php'>Редагування персональних даних</a></p><?php } ?>
				<p><a href='logout.php'>Вихід</a></p>				
				<?php if ($_SESSION['admin']){  //result of select to HTML
				try {
					$stmt = $db->prepare('SELECT COUNT(*) as count, groupcat FROM members WHERE groupcat!=0 GROUP BY groupcat ');
					$stmt->execute(); //array('groupcat' => $groupcat));?>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
						<label for="sel1">Список тем/семінарів:</label>						
						<select class="form-control" name="groupcat" id='mymenu'>   					
						<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
						  $data = $row['count'] . "\t" . $row['groupcat'] . "\t" . grname($row['groupcat']) ;
						  echo "<option value='" . $row['groupcat'] ."'"; if($_POST['groupcat']==$row['groupcat']) {echo  ' selected ';  } echo '>Кільк слухачів:' . $row['count']  . "\t" . grname($row['groupcat']) . "</option>";
						  //print $data;
						}?>
						</select>
						</div>						
					</div>		
				</div>

				<div class="row">
					<input type="hidden" name="groupname" id="groupname" class="form-control input-lg" value="<?php echo grname($row[1]); ?>" >				
					<div class="col-xs-3 col-md-4"     style='width:710px;'>			
						<div style='float:left; padding:10px 10px 10px 0px;'>
							<input type="submit" name="submitlist" value="Список слухачів" class="btn btn-primary btn-block btn-lg" style="font-size: 14px;  padding: 5px 16px;" >
						</div>
						<div style='float:left; padding:10px;'>							
							<input type="submit" name="submitsave" value="Cписок слухачів в форматі excel (.csv)" class="btn btn-primary btn-block btn-lg" style="font-size: 14px;  padding: 5px 16px;" ></p>
						</div>			
					</div>
				</div>
				<?php if (isset($outtextarea) && $outtextarea) { ?>
				<hr  style="border: 1px solid #000;">			
				<div class="form-group">
					<label for="comment"><?php echo grname($_POST['groupcat']); ?> Список слухачів:</label>
					<textarea class="form-control" rows="10" placeholder="Список слухачів " id="comment"><?php 
					$i=1; 
					while ($rowcat = $stmtcat->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
					 echo   $i  . "\t" . $rowcat['prizvishe'] . "\t" . $rowcat['name'] . "\t" . $rowcat['pobatkovi'] . "\t" . $rowcat['datezapovn'] . "\t" . "\n";
					 $i=$i+1;   //print $data;
					}?></textarea>
				</div>
				<?php	}	?>

				<?php if (isset($outtofile) && $outtofile) { ?>
				<hr  style="border: 1px solid #000;">			
				<div class="form-group">
					<label for="comment">Зберегти файл <a href="file.csv"><?php echo 'file.csv</a><br>'; echo grname($_POST['groupcat']); ?></label>
					<textarea class="form-control" rows="10" placeholder="Список слухачів " id="comment"><?php 
						$a=file_get_contents("file.csv",false);
						echo $a;
					?></textarea>

				</div>
				<?php	}	?>
				<br>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-5">
						<div class="form-group">
						<input type="input" name="prizvishe" id="prizvishe" placeholder="Призвище" class="form-control"  >								
						</div>
						</div>
				</div>					
				<div class="row">
					<div class="col-xs-3 col-md-4">
						<input type="submit" name="submituser" value="Дані слухачів" class="btn btn-primary btn-block btn-lg" style="font-size: 14px;  padding: 5px 16px;" tabindex="5">						
					</div>
				</div>				
				<?php
				if (isset($usertextarea) && $usertextarea) { ?>
				<hr  style="border: 1px solid #000;">		
				<div class="form-group">
					<label for="comment">Дані слухачів: "<?php echo $_POST['prizvishe']; ?>"</label>
					<textarea class="form-control" rows="10" placeholder="Список слухачів " id="comment"><?php 
					$i=1; 
					while ($rowuser = $stmtuser->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
					 echo   $i  . "\t" . $rowuser['prizvishe'] . "\t" . $rowuser['name'] . "\t" . $rowuser['pobatkovi'] . "\t" .  grname($rowuser['groupcat']) . "\n";
					 $i=$i+1;   //print $data;
					}?></textarea>
				</div>				
				<?php	}			
			    //else catch the exception and show the error.
				} catch(PDOException $e) {
						echo '<p class="bg-danger">'.$e->getMessage().'</p>';
				}
										
	} ?>
				
			</form>
		</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
