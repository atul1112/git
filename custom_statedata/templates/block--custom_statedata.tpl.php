<?php

  $arg2 = arg(2);
  
  //get id from google name
  $stid = careers_db_select('location_tids_mapping','st');
  $stid->fields('st',array('tid'));
  $stid->condition('google_name',$arg2,'=');
  $id = $stid->execute()->fetchField();



$que= careers_db_select('file_managed','f');
$que->fields('f',array('uri'));
$que->innerJoin('field_data_field_state_image','i','f.fid = i.field_state_image_fid');
$que->innerJoin('location_tids_mapping','st','st.tid = i.entity_id');
$que->condition('st.google_name',$arg2,'=');
$uri = $que->execute()->fetchField();
 
 ?>

 <div class= "row">
 	<div class = "col-md-2">
 	<?php 
 	if (isset($uri)) {
 		echo show_default_image('taxonomy.jpg', $uri, $width = 220, $height = 220, NULL, 'state picture', 'thumbnail');
    } 
    else {
        echo show_default_image('taxonomy.jpg', '', $width = 100, $height = 100, NULL, 'state picture', 'thumbnail');
    }

   ?>
 
 	</div>
 	<div class = "col-md-2">
 		<?php if($output['data_for']['Participating Colleges']){ ?>
 		<p><?php  echo "Participating Colleges"; ?></p>
 		<p><?php  echo $output['count']['Participating Colleges']; ?></p>
 		<?php } ?>
 	</div>
 	<div class = "col-md-2">
 		<?php if($output['data_for']['Faculty Count']){ ?>
 		<p><?php  echo "Faculty Count"; ?></p>
 		<p><?php  echo $output['count']['Faculty Count']; ?></p>
 		<?php ;} ?>
 	</div>
 	<div class = "col-md-2">
 		<?php if($output['data_for']['Course Count'] ){ ?>
 		<p><?php  echo "Course Count"; ?></p>
 		<p><?php  echo $output['count']['Course Count']; ?></p>
 		<?php ;} ?>
 	</div>
 	<div class = "col-md-1">
 		<?php if($output['data_for']['Exam Accepted'] ){ ?>
 		<p><?php  echo "Exam Accepted"; ?></p>
 		<p><?php  echo $output['count']['Exam Accepted']; ?></p>
 		<?php ;} ?>
 	</div>
 	<div class = "col-md-2">
 		<?php if($output['data_for']['College Intake']){ ?>
 		<p><?php  echo "College Intake"; ?></p>
 		<p><?php  echo $output['count']['College Intake']; ?></p>
 		<?php ;} ?>
 	</div>
 	
 	<div class = "col-md-1">
 		<p><?php  echo "Zone"; ?></p>
 		<p><?php  echo $zone; ?></p>
 	</div>
 </div>


