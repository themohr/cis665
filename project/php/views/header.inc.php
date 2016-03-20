<header class="background background-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="site-title">Tournament Registration</h1>
			</div>
		</div>
	</div>
</header>
<nav class="background background-light">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="nav-main">
					<div class="nav-main-item"><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Home</a></div>
					<div class="nav-main-item"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=login">Login/Register</a></div>
					<div class="nav-main-item"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=locations">Tournaments</a></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="nav-main">
					<div class="nav-main-item">
						<?php if(isset($_SESSION['emailAddress'])){ 
							?><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=logoff">Log off</a>
							<?php } else {
								?>
									<a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=login">Login</a>
								<?php
							} ?></div>
				</div>
			</div>
		</div>
	</div>
</nav>