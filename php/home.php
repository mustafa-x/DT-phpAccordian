<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Simple Accordion with php, json & jQuery</title>
	<link rel="stylesheet" type="text/css" href="includes/css/styles.css">
	<?php
		// Requests to load and parse the json files. 
		$jsonQuestions= file_get_contents("includes/json/questions.json", true); 
		$decodedJQ = json_decode($jsonQuestions, true);
		$numberOfQuestions = sizeof($decodedJQ[questions]);

		$jsonAnswers = file_get_contents("includes/json/answers.json", true);
		$decodeJA = json_decode($jsonAnswers, true);
	?>
</head>
<body>
<div id="wrapper">

<?php
	// Simple for loop that lists each question and each answer. 
	for ($i=0; $i < $numberOfQuestions; $i++) { 
		echo "<article class='faq_container'><section class='faq_question'><header class='faq_header'>";

		// This if state checks to see if the current item we are looping is first.
		// If it is we add a class selector .plus if not we add .minus
		// The .plus and .minus selectors are simply the - & + signs in the accordian. 
		// With jQuery we add and remove them according to the currently selected menu. 
		
		if ( $i==0 ) { 
			echo "<h1 class='plus'>";
			echo $decodedJQ[questions][$i];
			echo "</h1></header><div class='expanded'>";
		}else {
			echo "<h1 class='minus'>";
			echo $decodedJQ[questions][$i];
			echo "</h1></header><div>";
		}
		echo $decodeJA[answers][$i];
		echo "</div></section></article>";
	}
?>
 
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script type="text/javascript" src="includes/js/behaviour.js"></script>
</body>
</html>