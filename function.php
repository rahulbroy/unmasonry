<?php

function get_flex_item($post_slug) {

	$dir = "/gallery/" . $post_slug . "/1/"; //Add the necessary directory address for the gallery folders

	$x = 0;
	$image_array = [];
		
	if (is_dir($dir)){

		if ($dh = opendir($dir)){
		while (($file = readdir($dh)) !== false){
		  
			if ($file != "." && $file != "..") {
				$image_array[$x][0] = $dir.$file;
		  
				$image_array[$x][2] = getimagesize($dir.$file)[0];
				$image_array[$x][1] = floor((getimagesize($dir.$file)[1] * 226)/$image_array[$x][2]);
				$x++;
			}	
		  
		}
		closedir($dh);
	  }
	}

	function sort_by_height($a,$b) {
		if ($a[1]==$b[1]) return 0;
		return ($a[1]>$b[1])?-1:1;
	}

	uasort($image_array,"sort_by_height");
	$image_array = array_values($image_array);
	$height_array = [];

	for ( $x = 0; $x < count($image_array); $x++ ) {
		$height_array[$x] = $image_array[$x][1];	
	}
	$height_array = array_values(array_unique($height_array));
	$image_com = [];
	$image_height = [];

	for ( $x = 0; $x < count($height_array); $x++ ) {
		$z = 0;
		for ( $y = 0; $y < count($image_array); $y++ ) {
			
			if( $height_array[$x] == $image_array[$y][1] ) {
				$image_com[$x][$z] = $image_array[$y];
				$z++;
			}
		}
		
	}
	return $image_com;
}
?>
