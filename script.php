
<!DOCTYPE html>
<html>
<head>
	<title>PHP Demo</title>
</head>
<body>
<?php

$studentname = $_POST['studentname'];
$grade = $_POST['grade'];
$section = $_POST['section'];
$classteacher = $_POST['classteacher'];
echo "<h1> Student Information </h1>";

echo 'student name is : ' . $studentname . '<br>';
echo 'She is in Grade : ' . $grade . '<br>';
echo 'She is study in section : '. $section . '<br>';
echo 'She is taught by : '. $classteacher . '<br>';


?>
</body>
</html>