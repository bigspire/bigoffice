{* Purpose : To view dashboard.
   Created : Nikitasa
   Date : 10-06-2016 *}

	{include file='include/header.tpl'}		
	<div id="page_wrapper">
	{include file='include/menu.tpl'}

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
	{include file='include/footer.tpl'}
	</div>
	<input type="hidden" value="/" id="css_root">
	{include file='include/footer_js.tpl'}

	{include file='include/dashboard_js.tpl'}