//gets the data from a URL  
function get_tiny_url($url)  {  
	$ch = curl_init();  
	$timeout = 5;  
	curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
	$data = curl_exec($ch);  
	curl_close($ch);  
	return $data;  
}

//test it out!
$new_url = get_tiny_url('http://davidwalsh.name/php-imdb-information-grabber');

//returns http://tinyurl.com/65gqpp
echo $new_url