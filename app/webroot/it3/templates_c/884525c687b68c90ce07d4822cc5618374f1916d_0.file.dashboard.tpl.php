<?php
/* Smarty version 3.1.29, created on 2017-11-16 17:56:27
  from "C:\xampp\htdocs\bigoffice\app\webroot\it\templates\dashboard.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0d83f33fced7_41288646',
  'file_dependency' => 
  array (
    '884525c687b68c90ce07d4822cc5618374f1916d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bigoffice\\app\\webroot\\it\\templates\\dashboard.tpl',
      1 => 1469713195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/menu.tpl' => 1,
    'file:include/footer.tpl' => 1,
    'file:include/footer_js.tpl' => 1,
    'file:include/dashboard_js.tpl' => 1,
  ),
),false)) {
function content_5a0d83f33fced7_41288646 ($_smarty_tpl) {
?>


	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		
	<div id="page_wrapper">
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
				</div>
				<div class="breadcrumbs"  style="width:88%">
					<ul>
						<li>
							<a href="dashboard.php">Dashboard</a>
						</li>
					</ul>						
				</div>				
			<div class="row-fluid footer_div" id="pcontent" >
					
		
					<div class="span5 bdBox">
					
						<div class="box box-bordered">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Software By Type</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart1" style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					<div class="span5 bdBox">
					
						<div class="box box-bordered">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Software By Edition</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart2" style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					<div class="span5 bdBox">
					
						<div class="box box-bordered">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Assigned Software By Edition</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart3" style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					<div class="span5 bdBox">
					
						<div class="box box-bordered">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Unassigned Software By Edition</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart4" style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					
					<div class="span5 bdBox">
						<div class="box box-bordered ">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Hardware By Type</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart5"  style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					<div class="span5 bdBox">
						<div class="box box-bordered ">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Hardware By Brand</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart6"  style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					<div class="span5 bdBox">
						<div class="box box-bordered ">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Assigned Hardware By Brand</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart7"  style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					<div class="span5 bdBox">
						<div class="box box-bordered ">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Unassigned Hardware By Brand</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart8"  style="height:250px;"></div>
							</div>
						</div>
					</div>
					
					
					<div class="span5 bdBox">
					<div class="box box-bordered">
						<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Tickets</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart9" style="height:250px;"></div>
							</div>
						</div>
					</div>	
					<div class="span5 bdBox">
							<div class="box box-bordered ">
							<div class="box-title dashTitle">
								<h3><i class="icon-bar-chart"></i>Request Change</h3>
								
							</div>
							<div class="box-content">
								<div id="piechart10" style="height:250px;"></div>
							</div>
						</div>
					</div>
			</div>
			</div>
		</div>
		</div>
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</div>
	<input type="hidden" value="/" id="css_root">
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/dashboard_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
