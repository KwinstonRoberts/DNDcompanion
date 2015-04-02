<!DOCTYPE html>

	<html>
		<head>
			<title>DND: Campaign Companion</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<link rel="stylesheet"  type="text/css" href="css/style.css">
		</head>
		<body>
			<?php include("header.php"); ?>
			
			<div class="container gray_hl main">
				<div class="row">
					<?php $segment1 = array(array("Character Name", "3",false),array("Level", "1",true)
					,array("Class", "2",false),array("Paragon Path", "2",false),array("Epic Destiny", "2",false)
					,array("Total XP", "2",true));
					for($i=0; $i<count($segment1); $i++){
						if($segment1[$i][2]){
							echo '<div class=" form-group col-sm-' . $segment1[$i][1] . '">
							<input type="number" class="form-control"><label class="tiny">' . $segment1[$i][0] . '</label></div>';
						}else{
							echo '<div class=" form-group col-sm-' . $segment1[$i][1] . '">
							<input class="form-control"><label class="tiny">' . $segment1[$i][0] . '</label></div>';
						}
					}?>
				</div>
				<div class="row">
					<?php $segment2 = array(array("Race", "3",false),array("Size", "1",false)
					,array("Age", "1",true),array("Gender", "1",true),array("Height", "1",true)
					,array("Weight", "1",true), array("Alignment", '1',false),array("Diety", '1',false),array("Adventuring Company", '2',false));
					for($i=0; $i<count($segment2); $i++){
						if($segment2[$i][2){
							echo '<div class=" form-group col-sm-' . $segment2[$i][1] . '">
							<input type="number" class="form-control"><label class="tiny">' . $segment2[$i][0] . '</label></div>';
						}else{
							echo '<div class=" form-group col-sm-' . $segment2[$i][1] . '">
							<input class="form-control"><label class="tiny">' . $segment2[$i][0] . '</label></div>';
						}
					}?>
				</div>
			</div>
			<div class="container gray_l">

					 <? $segment3 = array(array(array("Score", 3),array("Initiative", 4),array("DEX", 2),array("1/2 Lvl", 2),array("Misc", 1)),
					 	array(array("Score", 3),array("AC", 4),array("ACMod", 1),array("Armor", 1),array("Class", 1), array('misc', 1),array('misc',1)), 
					 	array(array('Score', 3),array('DEX',4),array('mod',3),array('misc',2)));
					for($i=0; $i<count($segment3); $i++){
						echo '<div class="col-sm-4">
							<div class="row">
							<div class="col-sm-12 title gray">';
							if($i == 0){
								echo '<h3> INITIATIVE </h3>';
							}else if($i == 1){
								echo '<h3> DEFENSES</h3>';
							}else{
								echo '<h3> MOVEMENT </h3>';
							}
						echo '</div>
						</div>
						<div class="row">';
						for ($j = 0; $j<count($segment3[$i]); $j++){
						echo '<div class="col-sm-' . $segment3[$i][$j][1] . ' gray">
							  <label class="tiny">' . $segment3[$i][$j][0] . '</label>
							  <h3 class="target"></h3>
							  </div>';
						} 
						echo '</div>';
					echo '<div class="row">
						<div class="col-sm-8">
							<label class="tiny"> Conditional Modifiers </label> 
							<input class="form-control">
						</div>
						<div class="col-sm-4">
							<button class="btn btn-default space-fix"> Add </button> 
						</div>
					</div>
				</div>';
			}?>
			</div>
		</body>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</html>
