<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<!--meta http-equiv="Content-Type" content="text/html" charset="utf-8" /-->
    <title><?php if(isset($title)){ echo $title; }?></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
	<script type="text/javascript" src="../news/widgets/slider_top/js/jquery.js"></script>
	<style>
		input[pattern]:invalid{
		color:red;
		}
	</style>	
	<script type="text/javascript">
					function selectGroupRang(){
							var id_category = $('select[name="category"]').val();
							var id_groplata = $('input[name="hidegroplata"]').val();
							var id_rang = $('input[name="hiderang"]').val();							
							//console.log('id_category='+id_category); 
							//console.log('id_groplata='+id_groplata);
							//console.log('id_rang='+id_rang);							
							if(!id_category){ //not select any
									$('select[name="groplata"]').prop('disabled', true);
									$('#groplata :first').attr("selected", "selected");									
									$('select[name="rang"]').prop('disabled', true);
									$('#rang :first').attr("selected", "selected");										
							} else	{
									$.ajax({
											type: "POST",
											url: "/register/ajax.base.php",
											data: { action: 'showGroupRangForInsert', id_category: id_category, id_groplata: id_groplata, id_rang: id_rang},
											cache: false,
											success: function(responce){ 
												$('div[name="selectDataGroupRang"]').html('');
												$('div[name="selectDataGroupRang"]').html(responce); }
									});
							};
					};
	</script>

</head>
<body>