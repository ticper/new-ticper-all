<?php
	session_start();
	require_once('../config/config.php');
	$sql = mysqli_query($db_link,"SELECT COUNT(FoodID) AS num FROM tp_food");
	$result = mysqli_fetch_assoc($sql);
	$signageid = $result['num'];
?>
@charset "utf-8";
body{
	background-image: url(../img/0.png);
	background-repeat: no-repeat;
	background-size: cover;
}
#main{	
	margin-left:5%;
}
h1{
	border-radius: 25px;
	background-color: rgba(255,255,255,0.5);
	font-size: 80px;
	max-width: 40%;
	display: inline-block;
}

h2{
	border-radius: 10px;
	background-color: rgba(255,255,255,0.5);
	max-width: 40%;
	font-size: 50px;
	display: inline-block;
}

h2.stock{
	margin-left: 10px;
}

h2.food{
	font-size: 70px;
}

#footer{
	background-color: rgba(255,255,255,0.5);
	font-size: 60px;
	text-align: center;
	/*position: fixed;
	bottom: 95%;
	height: 5%; */
}

@keyframes fadeout {
	0% { opacity: : 1; }
	100% { opacity: 0; }
}

<?php
	$signage_n = 1;
	$time = 20;
	while($signage_n <= $signageid){
		print('#'.$signage_n.'{ animation: fadeout 5s ease '.$time.'s forwards;	}');
		$time = $time + 20;
		$signage_n++;
	} 
?>