<?php 
$i = 1;

$total_productfeatures = 0;
foreach ($modules as $module) { 

	if ($module['code'] == 'productfeatures') {
		$total_productfeatures++;
	}
	
}

foreach ($modules as $module) { 

	if ($module['code'] == 'productfeatures') {
		
		if ($i == 1) {
		
			echo '<div class="home_category_featured">';
		
		} 
		 
		  	echo $module['content']; 
        
		if ($i == $total_productfeatures) {
		
			echo '</div>';
		
		} 
		
	 } else { 
	 
	 	 echo $module['content'];
		 
   } 
   $i++;
}
?>