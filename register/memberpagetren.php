<?php 
header("Content-type: text/html;charset=utf-8");
require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: logintren.php'); } 
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
			list ($groupname, $maxgroupmembers) = grname($_POST['groupcat']);
			$stmtcat = $db->prepare("SELECT 'Прізвище','Ім''я','По батькові','Нас. пункт','Назва посади','Електронна пошта','Телефон','Тренінг'
			        		   UNION(SELECT  prizvishe, name, pobatkovi, adresamisto, posada, email, slugtelefon,'". $groupname ."' as grnames 
							   FROM memberstren WHERE groupcat= :groupcat  ORDER BY datezapovn)");
			$stmtcat->execute(array('groupcat' => $_POST['groupcat']));
//echo "1111". $_POST['groupcat']. "1111"; exit;
			$fp = fopen('file.csv', 'w'); $firstrec = true;
			while ($rowcsv = $stmtcat->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
						  //$data = $rowcsv[0] . "\t" . $rowcsv[1] . "\t" . grname($row[1]) ;
						  //echo "<option value='" . $row[1] ."'"; if($_POST['groupcat']==$row[1]) {echo  ' selected ';  } echo '>Кільк слухачів:' . $row[0]  . "\t" . grname($row[1]) . "</option>";
						  //print $data;

						  //echo "1=".$rowcsv['Прізвище'].$rowcsv["Ім'я"].$rowcsv['Центр. орган влади'].vladaname($rowcsv['Центр. орган влади'])."=1"; //exit;//="rowcsv-1";
						  /*if (!$firstrec) { 
							  list ($vladaname,$maxvladamembers) = vlada_name_membr($rowcsv['Центр. орган влади']);	
							  $rowcsv['Центр. орган влади'] = $vladaname;
							  if ($rowcsv['Центр. орган влади']=='none list') {$rowcsv['Центр. орган влади']="";}
							  $rowcsv['Група оплати праці'] = $groplaty[$rowcsv['Категорія посади']][$rowcsv['Група оплати праці']];
							  $rowcsv['Ранг держ. службы'] = $rangslug[$rowcsv['Категорія посади']][$rowcsv['Ранг держ. службы']];
							  $rowcsv['Категорія посади'] = $category[$rowcsv['Категорія посади']];						  
						  } else {$firstrec=false;}*/
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
			$stmtcat = $db->prepare('SELECT * FROM memberstren WHERE groupcat= :groupcat  ORDER BY datezapovn');
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
			$stmtuser = $db->prepare('SELECT * FROM memberstren WHERE prizvishe LIKE :prizvishe ORDER BY datezapovn');
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
			
				<h2>Ласкаво просимо, <?php echo $_SESSION['username_s']; ?></h2>
				<?php if (!$_SESSION['admin']){?> <p><a href='editmembertren.php'>Редагування персональних даних</a></p><?php } ?>
				<p><a href='logouttren.php'>Вихід</a></p>				
				<?php if ($_SESSION['admin']){  //result of select to HTML
				try {
					$stmt = $db->prepare('SELECT COUNT(*) as count, groupcat FROM memberstren WHERE groupcat!=0 GROUP BY groupcat ');
					$stmt->execute(); //array('groupcat' => $groupcat));?>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-12">
						<div class="form-group">
						<label for="sel1">Список тем/семінарів:</label>						
						<select class="form-control" name="groupcat" id='mymenu'>   					
						<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
						  list ($groupname, $maxgroupmembers) = grname($row['groupcat']);	
						  $data = $row['count'] . "\t" . $row['groupcat'] . "\t" . $groupname ;
						  echo "<option value='" . $row['groupcat'] ."'"; if(isset($_POST['groupcat'])&&($_POST['groupcat']==$row['groupcat'])) {echo ' selected '; }
						  echo '>Кільк слухачів:' . $row['count'] . "/" . $maxgroupmembers . "\t" . $groupname . "</option>";
						  //print $data;
						}?>
						</select>
						</div>						
					</div>		
				</div>

				<div class="row">
					<input type="hidden" name="groupname" id="groupname" class="form-control input-lg" value="<?php list($groupname,$maxgroupmembers)=grname($row[1]); echo $groupname; ?>" >				
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
					<label for="comment"><?php list($groupname,$maxgroupmembers)=grname($_POST['groupcat']); echo $groupname; ?> Список слухачів:</label>
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
					<label for="comment">Зберегти файл <a href="file.csv"><?php echo 'file.csv</a><br>'; list($groupname,$maxgroupmembers)=grname($_POST['groupcat']); echo $groupname; ?></label>
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
					 list ($groupname, $maxgroupmembers) = grname($rowuser['groupcat']);							
					 echo   $i  . "\t" . $rowuser['prizvishe'] . "\t" . $rowuser['name'] . "\t" . $rowuser['pobatkovi'] . "\t" .  $groupname . "\n";
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
