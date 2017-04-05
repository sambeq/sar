<?php
	session_start();
	include("dbconnect.php");
	if (empty($_SESSION['numer'])) {
		$_SESSION['numer'] = 0;
	}

    if ($_SESSION['Email']) {
        $email1 = $_SESSION['Email'];
        $user= "select UserId from user where Email= '$email1'";
    }else{
        $email1 = $userData['email'];
        $user= "select UserId from user where Email= '$email1'";

    }

    $stmt1 = $conn->prepare($user);
    $stmt1->execute();
    $userid = $stmt1->fetch(PDO::FETCH_ASSOC);
    $userid1= $userid["UserId"] ;
	$stat = "select count(JtripId) as Counts from jointrip jt join createtrip ct on jt.CTrip = ct.CTripId where ct.UserId= $userid1 and status=0";
    $counter = $conn->prepare($stat);
    $counter->execute();
    $not_counter1 = $counter->fetch(PDO::FETCH_ASSOC);
    $not_counter = $not_counter1["Counts"] ;

	if($not_counter!=0){
	echo $not_counter;
		if($not_counter>$_SESSION['numer']){
			echo '<script type="text/javascript">play_sound();</script>';?>
				<script type="text/javascript">
		$(document).ready(
            function() {
				$("#nww").load("show_not1.php");
            });
	</script>
			
<?php
			$_SESSION['numer']=$not_counter;
		}
   }
?>