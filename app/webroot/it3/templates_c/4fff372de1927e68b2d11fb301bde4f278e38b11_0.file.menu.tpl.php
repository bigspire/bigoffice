<?php
/* Smarty version 3.1.29, created on 2017-11-16 18:09:52
  from "C:\xampp\htdocs\bigoffice\app\webroot\it\templates\include\menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0d8718151c58_77734734',
  'file_dependency' => 
  array (
    '4fff372de1927e68b2d11fb301bde4f278e38b11' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bigoffice\\app\\webroot\\it\\templates\\include\\menu.tpl',
      1 => 1510835971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d8718151c58_77734734 ($_smarty_tpl) {
?>

   
<div id="navigation">
		<div class="container-fluid">
			
			
			<ul class='main-nav'>
			
			<li class="dropdown" >
					<a href="/hrhome/" style="font-size:20px" data-toggle="dropdown" class='dropdown-toggle'>
						<span>IT</span>
						
					</a>
					<!--ul class="dropdown-menu">
						<li><a href="dashboard.php">Home</a></li>
						<li><a href="/ceo_apps/hrhome/">HRIS</a></li>
						<li><a href="#" class="">Finance</a></li>
						<li><a href="#" class="">Work Planner</a></li>
						<li><a href="#" class="">Biz Tour</a></li>
						<li><a href="#" class="">BD</a></li>
					</ul-->
				</li>
				
				
				<li class="<?php echo $_smarty_tpl->tpl_vars['dashboard_active']->value;?>
">
					<a href="dashboard.php">
						<span>Dashboard</span>
					</a>
				</li>
				<li class="<?php echo $_smarty_tpl->tpl_vars['software_active']->value;?>
 dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Software</span>
						<span class="caret"></span> 
							
					</a>
					<ul class="dropdown-menu">
					
					<li>
					<a href="list_software.php">Software</a>
					</li>			
						
					
										<li>
					<a href="add_software_details.php">Add Software</a>
					</li>
						
					
												
						
					
					</ul>
				</li>
				<li class="<?php echo $_smarty_tpl->tpl_vars['hardware_active']->value;?>
 dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Hardware</span>
						<span class="caret"></span>
							
							
					</a>
					<ul class="<?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 dropdown-menu">
					<li>
					<a href="list_hardware.php">Hardware</a>
					</li>
					<li>
							<a href="add_hardware_details.php">Add Hardware</a>
						</li>
					
					</ul>
				</li>
				<li class="<?php echo $_smarty_tpl->tpl_vars['assign_asset_active']->value;?>
 dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Assign Asset</span>
						<span class="label label-lightred bubble"><?php if ($_smarty_tpl->tpl_vars['change_asset_count']->value) {
echo $_smarty_tpl->tpl_vars['change_asset_count']->value;
}?></span>
						<span class="caret"></span>				
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_assign_asset.php"><span>Assign Asset</span></a>
					</li>
					<li>
							<a href="list_change_asset_info.php"><span>Change Asset Info</span> 
							<span class="label label-lightred bubble"><?php if ($_smarty_tpl->tpl_vars['change_asset_count']->value) {
echo $_smarty_tpl->tpl_vars['change_asset_count']->value;
}?></span>	
							</a>
						</li>
					<li>
							<a href="list_scrap_hardware.php">Scrap Hardware</a>
						</li>
					</ul>
				</li>
				<li class="<?php echo $_smarty_tpl->tpl_vars['help_desk_active']->value;?>
 dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Help Desk</span>
						<span class="label label-lightred bubble"><?php if ($_smarty_tpl->tpl_vars['ticket_count']->value) {
echo $_smarty_tpl->tpl_vars['ticket_count']->value;
}?></span>	
						<span class="caret"></span>	
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_ticket.php">Ticket <span class="label label-lightred bubble"><?php if ($_smarty_tpl->tpl_vars['ticket_count']->value) {
echo $_smarty_tpl->tpl_vars['ticket_count']->value;
}?></span></a>
					</li>
					
					
					</ul>
				</li>
					
				<li class="<?php echo $_smarty_tpl->tpl_vars['login_active']->value;?>
 dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Logins</span>
						<span class="caret"></span>
							
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_login.php">Login</a>
					</li>
					<li>
					<a href="add_login.php">Add Login</a>
					</li>
					
					
					</ul>
				</li>
				<li class="<?php echo $_smarty_tpl->tpl_vars['settings_active']->value;?>
 dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Settings</span>
						<span class="caret"></span>
							
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_role.php">Roles (Access Settings)</a>
					</li>
					<li>
					<a href="software_type.php">Software Type</a>
					</li>
					<li>
					<a href="hardware_type.php">Hardware Type</a>
					</li>
					<li>
					<a href="login_type.php">Login Type</a>
					</li>
					<li>
					<a href="list_brand.php">Brand</a>
					</li>
					</ul>
				</li>
			
					
				
			</ul>
			
			<div class="user" style="">
				<ul class="icon-nav">
					
				
			<li class="<?php echo $_smarty_tpl->tpl_vars['switch_module_active']->value;?>
 dropdown language-select">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-reply"></i><span>Switch Module 
						<span class="switchLoad"></span>
						<span class="label label-lightred bubble switchPre switchTot" id="total_count" style="top:14px; right:12px "></span></span>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="/bigoffice/home/"><i class="icon-home"></i><span>Home</span></a>
							</li>
							<li>
								<a href="/bigoffice/hrhome/" class=""><i class="icon-user"></i><span>HRIS
								<span class="switchLoad-sub"></span></span>
								<span class="label label-lightred bubble switchTour switchPre" id="hr_count"></span></a>
							</li>
							<li>
								<a href="/bigoffice/finhome/" class=""><i class="icon-money"></i><span>Finance
								<span class="switchLoad-sub"></span></span>
							<span class="label label-lightred bubble switchFin switchPre"  id="fin_count"></span>
							</a>
							</li>
							<li>
								<a href="/bigoffice/tskhome/" class=""><i class="icon-check"></i><span>Work Planner
								<span class="switchLoad-sub"></span></span>
								<span class="label label-lightred bubble switchWork switchPre"  id="tsk_count"></span></a>
							</li>
						
						<li>
								<a href="/bigoffice/tvlhome/" class=""><i class="icon-plane"></i><span>Biz Tour
								<span class="switchLoad-sub"></span></span>
								<span class="label label-lightred bubble switchTour switchPre"  id="tour_count"></span>
								</a>
							</li>
							<li>
								<a href="/bigoffice/bdhome/?type=N" class=""><i class="icon-lightbulb"></i><span>BD
								<span class=""></span></span>
								<span class="label label-lightred bubble switchTour switchPre"  id="bd_menu_count"></span></a>
							</li>
						</ul>
					</li>
			
				
				<li class='dropdown language-select'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><span><i class="icon-signin"></i>  <?php echo $_SESSION['user_name'];?>
 
						</span></a>
							<ul class="dropdown-menu pull-right">
						<!--li>
							<a href="#">Edit profile</a>
						</li>
						<li>
							<a href="#">Account settings</a>
						</li-->
						<li>
							<a href="/bigoffice/logins/logout"> Sign out</a>
						</li>
					</ul>
					</li>
					</ul>	
			</div>
		</div>
	</div>
<?php }
}
