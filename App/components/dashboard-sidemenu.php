<?php ?>


<div id="mySidenav" class="sidenav">
	<div class="dash-logo">
		<label style="display: block;">Logo</label>
	</div>
	<div class="middle">
		<?php if (Auth::is_rmanager()) : ?>
			<a href="<?= ROOT ?>/rentalmanager" class="icon-a" <?php if (isset($current) && $current == 'Dashboard') echo 'id="current"'; ?>><i class="fa fa-dashboard icons"></i> <label>Dashboard</label></a>
			<a href="<?= ROOT ?>/rentalmanager/category" class="icon-a" <?php if (isset($current) && $current == 'EquipmentCategory') echo 'id="current"'; ?>><i class="fa fa-cogs"></i> <label>Equipment Categories</label></a>
			<a href="<?= ROOT ?>/rentalmanager/equipmentlisting" class="icon-a" <?php if (isset($current) && $current == 'EquipmentListing') echo 'id="current"'; ?>><i class="fa fa-cogs"></i> <label>Equipment Listing</label></a>
			<a href="<?= ROOT ?>/rentalmanager/equipmentsnew" class="icon-a" <?php if (isset($current) && $current == 'Equipments') echo 'id="current"'; ?>><i class="fa fa-list icons"></i> <label>Equipment Instances</label></a>
			<a href="#" class="icon-a"><i class="fa fa-tasks icons"></i> <label>Dashboard</label></a>
			<a href="#" class="icon-a"><i class="fa fa-user icons"></i> <label>Dashboard</label></a>
			<a href="#" class="icon-a"><i class="fa fa-list-alt icons"></i> <label>Dashboard</label></a>
	</div>
<?php endif; ?>
<?php if (Auth::is_cmanager()) : ?>
	<a href="<?= ROOT ?>/companymanager" class="icon-a" <?php if (isset($current) && $current == 'Dashboard') echo 'id="current"'; ?>><i class="fa fa-dashboard icons"></i> <label>Dashboard</label></a>
	<a href="<?= ROOT ?>/companymanager/quotationsnew" class="icon-a" <?php if (isset($current) && $current == 'Quotation') echo 'id="current"'; ?>><i class="fa fa-cogs"></i> <label>Quotation</label></a>
	<a href="<?= ROOT ?>/companymanager/listing/professional" class="icon-a" <?php if (isset($current) && $current == 'professionalListing') echo 'id="current"'; ?>><i class="fa fa-list icons"></i> <label>Professional Listing</label></a>
	<a href="#" class="icon-a"><i class="fa fa-shopping-bag icons"></i> <label>Dashboard</label></a>
	<a href="#" class="icon-a"><i class="fa fa-tasks icons"></i> <label>Dashboard</label></a>
	<a href="#" class="icon-a"><i class="fa fa-user icons"></i> <label>Dashboard</label></a>
	<a href="#" class="icon-a"><i class="fa fa-list-alt icons"></i> <label>Dashboard</label></a>
</div>
<?php endif; ?>


<div class="bottom">
	<a href="<?= ROOT ?>/logout" class="logout-btn"><i class='fa fa-sign-out '></i></i> <label>logout</label></a>
</div>
</div>



<div class="head">
	<div class="col-div-6">
		<span style="font-size:30px;cursor:pointer; color: rgb(0, 0, 0);" class="nav">☰ Dashboard</span>
		<span style="font-size:30px;cursor:pointer; color: rgb(0, 0, 0);" class="nav2">☰ Dashboard</span>
	</div>
	<div class="col-div-6">
		<div class="profile">
			<img src="images/user.png" class="pro-img" />
			<p>Manoj Adhikari <span>UI / UX DESIGNER</span></p>
		</div>


		<button class="dashboard-notify-btn" onclick="toggleDropdown()">
			<label class="dashboard-notify"><i class="fa fa-bell"></i></label>
		</button>

		<div id="dropdown-menu" class="dropdown-content">
			<!-- Your dropdown menu items go here -->
			<a href="#">Item 1</a>
			<a href="#">Item 2</a>
			<a href="#">Item 3</a>
		</div>
	</div>

	<div class="clearfix"></div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= ROOT ?>/assets/js/dashboard-sidemenu.js"></script>
<script>
	$(".nav").click(function() {
		$("#mySidenav").css('width', '4%');
		$("#main").css('margin-left', '4%');
		$(".logo").css('visibility', 'hidden');
		$(".logo span").css('visibility', 'visible');
		$(".logo span").css('margin-left', '-10px');
		$(".icon-a").css('visibility', 'hidden');
		$(".icon-a label").css('display', 'none');
		$(".icons").css('visibility', 'visible');
		$(".icons").css('margin-bottom', '60%');
		$(".icons").css('padding-left', '22%');
		$(".middle").css('margin-top', '150%');
		$(".nav").css('display', 'none');
		$(".nav2").css('display', 'block');
		$(".head").css('margin-left', '4%');
		$(".logout-btn label").css('display', 'none');

		$(".logout-btn").css('visibility', 'hidden');
		$(".logout-btn i").css('visibility', 'visible');
		$(".dash-logo").css('display', 'none');

	});

	$(".nav2").click(function() {
		$("#mySidenav").css('width', '18%');
		$("#main").css('margin-left', '18%');
		$(".logo").css('visibility', 'visible');
		$(".icon-a label").css('display', 'inline');
		$(".icon-a").css('visibility', 'visible');
		$(".icons").css('visibility', 'visible');
		$(".icons").css('margin-bottom', '');
		$(".icons").css('padding-left', '');
		$(".logout-btn label").css('display', 'inline');
		$(".logout-btn").css('visibility', 'visible');
		$(".middle").css('margin-top', '10%')
		$(".dash-logo").css('display', 'block');
		$(".nav").css('display', 'block');
		$(".nav2").css('display', 'none');
		$(".head").css('margin-left', '18%');

	});
</script>