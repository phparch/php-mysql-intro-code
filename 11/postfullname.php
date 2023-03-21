<html>
<head>
    <title>Full Name</title>
</head>
<body>
<h2>Greetings!</h2>
<?php
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];

echo "Hello " . $first_name . " " . $last_name . ". Thanks for submitting the form!";
?>
</body>
</html>