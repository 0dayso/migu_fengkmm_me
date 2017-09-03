  <?php
  function get_Flow($number) {
  	$request .= "POST http://migumovie.lovev.com/iworld/flowQuery/qryFlowInfo?filterType=1&clientId=3b71930da7d8aea3cf41bda6a9c91271 HTTP/1.1\n";
  	$request .= "Host: migumovie.lovev.com\n";
  	$request .= "Content-type: application/x-www-form-urlencoded\n";
  	$request .= "Content-length: 33\n";
  	$request .= "\n";
  	$request .= 'httpbody={"mobile":"'.$number.'"}\n';
  	$fp = fsockopen( "migumovie.lovev.com", 80 );
  	fputs( $fp, $request );
  	while ( !feof( $fp ) ) {
  		$result .= fgets( $fp, 1024 );
  	}
  	fclose( $fp );
		$result = substr($result,strpos($result,"{"));
  	return($result);
  }
  ?>