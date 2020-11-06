<? php
session_start();
if (isset($_SESSION["Email"]) == true )
{
	header("location: DOODLE.html");
	exit;
}
?>