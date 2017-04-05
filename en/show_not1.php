<?php
error_reporting(E_ALL); ini_set('display_errors', 0);
	session_start();
	include("dbconnect.php");
	include("ago.php");

        $email1 = $_SESSION['Email'];
        $user= "select UserId from user where Email= '$email1'";
        $stmt1 = $conn->prepare($user);
        $stmt1->execute();
        $userid = $stmt1->fetch(PDO::FETCH_ASSOC);
        $userid1= $userid["UserId"] ;

        $sql="select u.UserId, u.Firstname as FN, u.Lastname as LN, a.Source as SO, a.Destination as DE, jt.request_time, jt.JTripId 
          from jointrip jt 
          join user u on jt.UserId = U.UserId 
          join createtrip ct on jt.CTrip=ct.CTripId 
          join address a on a.AddressId = ct.AddressId 
          where ct.UserId=$userid1 and jt.status=0";

        $stmt2 = $conn->prepare($sql);
        $stmt2->execute();
        $not_count = $stmt2->rowCount();
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        if($not_count==0){
		echo "Nuk ka porosi te re!";
	    }else{

        foreach($result as $row1) {

		?>
      <div class="notification-item">
        <h4 class="item-title">New Notification!
		<?php 
			//$timeAgoObject = new convertToAgo;
			//$convertedTime = ($timeAgoObject -> convert_datetime($row['request_time'])); // Convert Date Time
			//$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
			//echo $when;
		?></h4>
        <p class="item-info" style="width:50%;display:inline;font-size: 12px;">
		<?php 
			echo $row1['FN'] ." ".$row1['LN'] . " kerkon te udhetoje me ju ne
			 udhetimin nga ".$row1['SO'] . " ne ".$row1['DE'] . " qe ju keni ofruar. </p> 
			 <p style='text-align:right;display:inline;'>
			 
			<a href= accept.php> Accept </a> |
			<a href= deny.php?id=" . $row["JTripId"] . "> Deny </a></p>";
		?>
		</p> 
      </div>
    <?php
		}
	}
?>