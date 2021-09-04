<?php
require 'scrap/simple_html_dom.php';
//check is your device connected to the internet
function is_connected(){
    $connected = @fsockopen("www.example.com", 80); 
    //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;
}	

//if connected proceed
if(is_connected()){
	$search_query = $_POST['search_query']; //get search query
	$keywords =  preg_split("/[\s,]+/", $search_query); //split the words
	$text = $keywords[0];
	//bind the keywords to append to the url 
	for($i=1;$i<count($keywords);$i++){
		$text = $text."+".$keywords[$i];
	}
	$html = file_get_html("https://www.google.com/search?q=".$text."&num=10"); //fetch data from google
	echo $html; //this will send data to the front
}else{
	echo "<h6 align='center' style='color:red;'>Please connect to internet..!</h6>";
}

		



?>