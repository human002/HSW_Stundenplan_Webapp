<?php
	$sql="SELECT * FROM timetable.learningUnit where coursestart != \"0000-00-00 00:00:00\" order by coursestart limit 1;";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$startofcourses = $row["coursestart"];
		}
	}
	if(isset($startofcourses)){
		$startofcalc = strtotime($startofcourses);
		$startofcalc = date('d.m.Y',strtotime("last monday",$startofcalc));
	}else {
		$startofcalc = date('d.m.Y',strtotime("monday this week"));
	}
	


?>