<pre><?php 
//print_r(json_decode(file_get_contents('http://data.processdo.com/testjson.php')));
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
 $returned_content = get_data('http://data.processdo.com/testjson.php');
print_r(json_decode($returned_content));
?>