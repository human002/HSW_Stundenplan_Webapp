<?php
	$sql="SELECT * FROM timetable.learningUnit where coursestart != \"0000-00-00 00:00:00\" order by coursestart limit 1;";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$startofcourses = $row["coursestart"];
		}
	}
	$sql="SELECT * FROM timetable.learningUnit where coursestart != \"0000-00-00 00:00:00\" order by coursestart DESC limit 1;";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$endofcourses = $row["coursestart"];
		}
	}

	$countofweeks = ceil((strtotime($endofcourses)-strtotime($startofcourses))/604800);

?>