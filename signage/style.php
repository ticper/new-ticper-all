<?php header('Content-Type: text/css; charset=utf-8');
	require_once('../config/config.php');
	$sql = mysqli_query($db_link,"SELECT COUNT(FoodID) AS num FROM tp_food");
	$result = mysqli_fetch_assoc($sql);
	$signageid = $result['num'];
	$footerid = $signageid;
	$signage_n = 1;
	$time_o = 12;
	$time_s = 2;
?>

html,body {
	
	margin: 0;
	padding: 0;
}

#root {
	position: absolute;
	top: 0; left: 0;
	width: 100%; height: 100%;
}

#screen {
	position: absolute;
	top: 0; left: 0;
	width: 100%; height: 100%;
	overflow: hidden;
}

.contents{
	position: absolute;
	top: 0; left: 0;
	width: 100%; height: 100%;
}

.contents .content {
	position: absolute;
	top: 0; left: 0;
	width: 100%; height: 100%;
	overflow: hidden;
	background-size: cover;
	background-repeat: no-repeat
}

.contents .content:after {
	content: "";
	display: block;
	position: absolute;
	top: 0; left: 0;
	background-size: cover;
	background-position: center;;
}

<?php
	$sql = mysqli_query($db_link,"SELECT * FROM tp_food ORDER BY OrgID DESC");
	$count = 1;
while($result = mysqli_fetch_assoc($sql)){
	$now = $result['FoodID'];
print('
.contents .content:nth-child('.$count.') { background-image: url(https://booth.yamabuki.ticper.com/img/'.$now.'.png); }
');
$count++;
}
?>

h1.place{
	font-size: 40px;
	margin-left: 15px;
}

h1.orgname{
	margin-left:5%;
}

h1{
	border-radius: none;
	background-color: rgba(255,255,255,0.5);
	font-size: 80px;
	max-width: 40%;
	display: inline-block;
	color: #000000;
	padding: 0.5em;
}

h2{
	border-radius: none;
	background-color: rgba(255,255,255,0.5);
	max-width: 40%;
	font-size: 50px;
	display: inline-block;
	color: black;
	padding: 0.5em;
}

h2.price{
	margin-left:5%;
}

h2.stock{
	margin-left: 10px;
}

h2.food{
	margin-left:5%;
	font-size: 70px;
}

.contents .content .footer{
	background-color: rgba(255,255,255,0.5);
	font-size: 60px;
	position: absolute;
	padding-left: 100%; 
	width: 350%;
	top: calc(100vh - 90px);
	overflow: hidden;
}
<?php
while($footerid >= 1){
print('.f_'.$footerid.' { animation: moved 10s linear '.$time_s.'s forwards; }');
$time_s = $time_s + 12;
$footerid--;
}
?>

@keyframes moved {
  0% { transform: translateX(0vw); }
  100% { transform: translateX(-250vw); }
}

@keyframes fadeout {
	0% { opacity: 1; }
	100%{ opacity: 0; }
}


<?php
while($signageid >= 1){
print('
.contents .content:nth-child('.$signageid.') { animation: fadeout 3s ease '.$time_o.'s forwards; }

');
		$time_o = $time_o + 12;
		$signageid--;
}
?> 

.red_bg{
	background-color: rgba(255,0,0,0.7);
}

.green_bg{
	background-color: rgba(153,255,51,0.7);
}

.blue_bg{
	background-color: rgba(0,255,255,0.7);
}

.yellow_bg{
	background-color: rgba(255,255,0,0.7);
}