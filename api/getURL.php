<?
function getURL(){
			$url="http://movie.miguvideo.com/play.msp?nodeId=-1&contentId=623792841";
			$file = fopen($url,"r");
			$str = stream_get_contents($file);
			$str = json_decode($str,true);
			$real_url = "http://miguvodlimit.lovev.com:8080".substr($str["url"],25);
			return($real_url);
}
?>