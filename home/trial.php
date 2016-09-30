<?php
$i=0;
$posts=array("index"=>array(
	"description"=>'',
	"key"=>''));
while($i<5)
{
	$posts[$i]['key'] = 1;
	$posts[$i]['description'] = 'Vatsal';
	if($i==2)
	{
		$posts[$i]['description']='Sodha';
	}
	$i= $i+1;
}
$i=0;
echo count($posts);
echo $posts[3]['description'];
// while($i<count($posts){
// 	// $keys=array_keys($posts);
// 	echo $posts[$i]['key'];
// 	$i+=1;
// }
?>