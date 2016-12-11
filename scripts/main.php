<div id="sidenavigation" class="sidenav">
  <div class="utilitybar">
	<div class="utilitybutton" id="login" href="javascript:void(0)" onclick="closeNav()"><b class="utilitybutton" >LOGIN</b> </div>
	<div class="utilitybutton" id="refresh"href="javascript:void(0)" onclick="closeNav()"><b class="utilitybutton" >REFRESH</b> </div>
	<div class="closebutton" id="closebutton"href="javascript:void(0)" onclick="closeNav()"><b class="closebtn">&times;</b></div>
  </div>
  <div class="menupoints">
	<?php
												for($iteration = 0; $iteration <= $countofweeks; $iteration++){
													if(isset($_GET["week"])){
														if($startofcalc == ($_GET["week"])){
															$selectedweek = "Woche vom ".$startofcalc." bis ".date('d.m.Y', strtotime("+1 week", strtotime($startofcalc)));
														}else{
															echo "<a href=\"index.php?week=".$startofcalc."\">Woche vom ".$startofcalc." bis ".date('d.m.Y', strtotime("+1 week", strtotime($startofcalc)))."</a>";
														}
													}elseif($startofcalc == date('d.m.Y',strtotime($startoftheweekday))){
															$selectedweek = "Woche vom ".$startofcalc." bis ".date('d.m.Y', strtotime("+1 week", strtotime($startofcalc)));
													}else{
															echo "<a href=\"index.php?week=".$startofcalc."\">Woche vom ".$startofcalc." bis ".date('d.m.Y', strtotime("+1 week", strtotime($startofcalc)))."</a>";
													}
													$startofcalc = date('d.m.Y', strtotime("+1 week", strtotime($startofcalc)));
												}
												?>




</div>
</div>

<div id="main">
<div class="weekchose">
  <span class="menubutton" onclick="openNav()">&#9776;</span><div class="week"><?php echo $selectedweek;?></div>
</div>
  <?php include("timetable.php"); ?>
</div>
