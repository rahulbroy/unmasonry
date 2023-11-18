<?php
// Header, Footer, etc have been removed. This is only the body part of the template.
$image_com = [];
$image_com = get_flex_item($post_slug);


for ( $x = 0; $x < count($image_com); $x++ ) {
	$image_height[$x][0] = $image_com[$x][0][1];
	$image_height[$x][1] = floor(($image_com[$x][0][1] * 333)/226); // For mobile screen
}
?>
<style>
<?php for ( $x = 0; $x < count($image_height); $x++ ) { ?>
	
	@media only screen and (min-width: 1080px) { 
		.item-<?php echo $x; ?> {
			height: <?php echo $image_height[$x][0]; ?>px;		
		}
	}
	@media only screen and ((min-width: 481px) and (max-width: 1079px)) { 
		.item-<?php echo $x; ?> {
			height: <?php echo $image_height[$x][0]; ?>px;		
		}	
	}
	@media only screen and (max-width: 480px) { 
		.item-<?php echo $x; ?> {
			height: <?php echo $image_height[$x][1]; ?>px;	
		}
	}

<?php } ?>
</style>
<div class="flex-container">

	
	<?php $aff_link_done = 0; $ads_link_done = 0;
	
	for ($x=0; $x<count($image_com); $x++){
		
		for ($y=0; $y<count($image_com[$x]); $y++){
			
			if ( $x == 0 and $y == 0 ) { 
				
				$image_com[0][0][0] = str_replace('/var/www/folder_name','',$image_com[0][0][0]);
				$image_com[0][0][1] = str_replace('thumbs','images',$image_com[0][0][0]); ?>
				
				<div class="flex-item item-0">
					<a href="<?php echo $image_com[0][0][1]; ?>" alt="<?php echo $title; ?>">
						<img src="<?php echo $image_com[0][0][0]; ?>" alt="<?php echo $title; ?>" class="no-lazy"/>
					</a>
				</div>			
			
			<?php } else { ?>
				
					<?php if ( $y == 3 && $aff_link_done == 0) { ?>
						<?php $aff_link_done = 1; $y = $y-1; ?>
							<div class="flex-item">
								<a href="https://" target="_blank" rel="nofollow">Sample Image</a>
							</div>
					
					<?php 	} elseif ( (($x == 1 && $y == 2) || ($x == 0 && $y == 13) ) && $ads_link_done == 0  ) {  ?>
									<?php $ads_link_done = 1; $y = $y-1;?>
									<div class="flex-item">
										<a href="https://" target="_blank" rel="nofollow">Sample Image</a>
									</div>
						
					<?php } else { ?>
				
						<?php	$image_com[$x][$y][0] = str_replace('/var/www/folder_name','',$image_com[$x][$y][0]); ?>
						<?php	$image_com[$x][$y][1] = str_replace('thumbs','images',$image_com[$x][$y][0]); ?>
						<div class="flex-item item-<?php echo $x; ?>">
							<a href="<?php echo $image_com[$x][$y][1]; ?>" alt="<?php echo $title; ?>">
								<img src="<?php echo $image_com[$x][$y][0]; ?>" alt="<?php echo $title; ?>"/>
							</a>
						</div>	
					
					<?php } ?>

			<?php } ?>

		<?php } ?>
	
	<?php } ?>
				
				
</div>
