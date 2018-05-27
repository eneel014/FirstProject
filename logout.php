
    <script type="text/javascript" src="js/custom/checkCookies.js"></script>
<?php 

include('includes/mysql_connect.php');
insertAuditLog("$logName", "Logout", $conn);

 ?>
<script type="text/javascript">
eraseCookie('username');
eraseCookie('cooUserType');
eraseCookie('empID');
window.location.href = "index";
</script>