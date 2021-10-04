
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- <div class="navbar-brand">
							<a href="index.php"><h1><span>K</span>hong<span>dee</span>สมุทปราการ</h1></a>
						</div> -->
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="index.php" class="active">KhongDee สมุทรปราการ</a></li>
								<?php
                                if( isset($login_user) and $login_user != "Guest" ) 
								{
									echo "
									<li role='presentation'>
									<a href='logout.php' title='Click is log out'>
									<span class='glyphicon glyphicon-user'></span> 
									".$login_user."
									</a>
									</li>
									";
								} else {
									echo "
									<li role='presentation'>
									<a href='login_v3/login.php' title='Click is log in'>
									<span class='glyphicon glyphicon-user'></span>
									Guest
									</a>
									</li>
									";
								}
								?>					
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>