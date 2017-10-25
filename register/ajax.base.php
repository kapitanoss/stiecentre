<?php
header("Content-type: text/html;charset=utf-8"); 
require('includes/config.php');
//if(!$user->is_logged_in()){ header('Location: login.php'); } 

//ini_set(default_charset,"UTF-8");

# include data base
//require "../../mysql.inc.php";

switch ($_POST['action']){
                
        case "showGroupRangForInsert":
	
				echo '<div class="col-xs-3 col-sm-3 col-md-3">';
				echo '<label>Група оплати праці</label><span>*</span>';				
				echo '<div class="form-group">';
                echo '<select size="1" name="groplata" id="groplata" class="form-control" >';
				echo '<option value="">Виберіть групу</option>';
                foreach ($groplaty[$_POST['id_category']] as $numRow => $arrgroplaty) {
                        echo '<option value="'.$numRow.'" ';
						if ((!empty($_POST['id_groplata']))&&($_POST['id_groplata']==$numRow)) 
						{
							//echo ' selected ="'.(!empty($_POST['id_groplata']))."=".isset($_POST['id_groplata']).'='.$_POST['id_groplata'].'='.$numRow. '"='; 
							echo ' selected '; 							
						} 
						echo '>'.$arrgroplaty.' </option>';
                };
                echo '</select>';				
				echo '</div> </div>';

				echo '<div class="col-xs-4 col-sm-4 col-md-4">';
				echo '<label>Ранг державної служби</label><span>*</span>';				
				echo '<div class="form-group">';
				echo '<select size="1" name="rang" id="rang" class="form-control" >';
				echo '<option value="">Виберіть ранг</option>';				
                foreach ($rangslug[$_POST['id_category']] as $numRow => $arrrangslug) {
                        echo '<option value="'.$numRow.'" ' ;
						if ((!empty($_POST['id_rang']))&&($_POST['id_rang']==$numRow)) 
						{
							//echo ' selected ="'.(!empty($_POST['id_rang']))."=".isset($_POST['id_rang']).'='.$_POST['id_rang'].'='.$numRow. '"='; 
							echo ' selected '; 							
						} 
						
						echo '>'.$arrrangslug.'</option>';
                };
                echo '</select>';
				echo '</div> </div>';				
                break;
                

        
};

?>