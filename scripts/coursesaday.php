<?php 
						$timee = strtotime("08:00");
						$timeeintern = $timee;
						$output = "";
						$breakcount = 0;
						$breakcount2 = 0;
						for($i = 0; $i < 49; $i++){
								$start = "'".$startoftheweekday." ".date("H:i", $timeeintern)."'";
								$timeeinternend = $timeeintern + 15*60;
								$end = "'".$startoftheweekday." ".date("H:i", $timeeinternend)."'";
								#$output = $output. "<td>".$start." - ".$end."</td>";
								$sql = "SELECT * FROM timetable.learningUnit WHERE ((coursestart > ".$start." and coursestart < ".$end.") or (courseend > ".$start." and coursestart < ".$end." ) and (coursestart != '0000-00-00 00:00:00'))";
								$result = $db->query($sql);
									if ($result->num_rows > 0) {
												if ($breakcount == 6){
												$output = $output. "<div class=\"courseobjectbreakb\"></div>\n";
												$breakcount = 0;
												}elseif($breakcount == 4) {
												$output = $output. "<div class=\"courseobjectbreakh\"></div>\n";
												$breakcount = 0;
												}elseif($breakcount == 3) {
												$output = $output. "<div class=\"courseobjectbreakhh\"></div>\n";
												$output = $output. "<div class=\"courseobjectbreakq\"></div>\n";
												$breakcount = 0;
												}elseif($breakcount == 2){
												$output = $output. "<div class=\"courseobjectbreakhh\"></div>\n";
												$breakcount = 0;
												}elseif($breakcount == 1){
												$output = $output. "<div class=\"courseobjectbreakq\"></div>\n";
												$breakcount = 0;
												} 
									// output data of each row
										while($row = $result->fetch_assoc()) {
										
											if($row["coursestart"] == ($startoftheweekday." ".date("H:i:s", $timeeintern))){
												$output = $output."<a class=\"hvr-grow\">";
												if(( strtotime($row["coursestart"]) < strtotime("now")) and (strtotime("now") < strtotime($row["courseend"]))){
													$output = $output."<div class=\"nowobject\">";
													}else {
													$output = $output."<div class=\"label\">";
													}
												if((strtotime($row["courseend"]) - strtotime($row["coursestart"])) == 5400){ //1,5 Stunden
													if($row["coursetype"] == "Information"){
													$output = $output. "<div class=\"courseobjectblock\"><div class=\"information\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}elseif($row["coursetype"] == "Klausur"){
													$output = $output. "<div class=\"courseobjectblock\"><div class=\"klausur\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}else{
													$output = $output. "<div class=\"courseobjectblock\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div>\n";
													}
												}
												if((strtotime($row["courseend"]) - strtotime($row["coursestart"])) == 3600){ //1 Stunde
													if($row["coursetype"] == "Information"){
													$output = $output. "<div class=\"courseobjecthour\"><div class=\"information\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}elseif($row["coursetype"] == "Klausur"){
													$output = $output. "<div class=\"courseobjecthour\"><div class=\"klausur\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}else{
													$output = $output. "<div class=\"courseobjecthour\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div>\n";
													}
												}
												if((strtotime($row["courseend"]) - strtotime($row["coursestart"])) == 1800){ //1/2 Stunde
													if($row["coursetype"] == "Information"){
													$output = $output. "<div class=\"courseobjecthalfhour\"><div class=\"information\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}elseif($row["coursetype"] == "Klausur"){
													$output = $output. "<div class=\"courseobjecthalfhour\"><div class=\"klausur\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}else{
													$output = $output. "<div class=\"courseobjecthalfhour\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div>\n";
													}
												}
												if((strtotime($row["courseend"]) - strtotime($row["coursestart"])) == 900){ //1/4 Stunde
													if($row["coursetype"] == "Information"){
													$output = $output. "<div class=\"courseobjectquaterhour\"><div class=\"information\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}elseif($row["coursetype"] == "Klausur"){
													$output = $output. "<div class=\"courseobjectquaterhour\"><div class=\"klausur\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div></div>\n";
													}else{
													$output = $output. "<div class=\"courseobjectquaterhour\"><label class=course>".$row["coursename"]."</label><br><label class=teacher>".$row["courseteacher"]."</label><br><label class=room>".$row["courseroom"]."</label></div>\n";
													}
												}												
												if(( strtotime($row["coursestart"]) < strtotime("now")) and (strtotime("now") < strtotime($row["courseend"]))){
													$output = $output."</div>\n";
													}else {$output = $output."</div>\n";}
												$output = $output."</a>";
											}
										}
									}else {
									if ($breakcount == 6){
												$output = $output. "<div class=\"courseobjectbreakb\"></div>\n";
												$breakcount = 0;
												$breakcount2 = 1;
												}elseif(($breakcount2==1) and ($breakcount==1)){
												$output = $output. "<div class=\"courseobjectbreakq\"></div>\n";
												$breakcount2 = 0;
												$breakcount = 0;
												}
										$breakcount++;
										#$output = $output.$breakcount."\n";
									}
									$timeeintern = $timeeintern + 15*60;
								}
								echo $output;
								$startoftheweekday = date('Y-m-d', strtotime("+1 day", strtotime($startoftheweekday)));
?>