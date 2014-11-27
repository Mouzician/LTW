<!DOCTYPE html>
<?php
$cookie_name = "Voted";
$cookie_value = "Poll Id";
setcookie($cookie_name, $cookie_value, time() + ((86400 * 60)), "/"); // expires in 60 days
?>
<html>
<body>

<?php
if(isset($_COOKIE[$cookie_name]) &&  $_COOKIE[$cookie_name] == $poolID) {
	//reject voting
} else {
    //do voting
}
?>

</body>
</html>