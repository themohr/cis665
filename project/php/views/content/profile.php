<?php

/* 
 * Authors: Dennis Mohr, Nick Hoyle, Hemang Vyas
 * Date: 03/03/2016
 * Description: Profile page allows coach to view, update, delete and add a team
 *  
 */
  
	@require_once('controller/FormProfile.php');
	$profile = new FormProfile();
?>

<div class="col-md-4">
	<h1>Profile</h1>
	<?php $profile->displayForm(); ?>
</div>
<div class="col-md-8">
	
	<?php include('views/content/roster.php');?>
</div>
