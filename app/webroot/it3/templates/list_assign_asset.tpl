{* Purpose : To list and search assign asset.
   Created : Nikitasa
   Date : 18-06-2016 *}

	{include file='include/header.tpl'}		
	<div id="page_wrapper">
	{include file='include/menu.tpl'}
	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Assign Asset</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="list_assign_asset.php">List Assign Asset</a>
						</li>
					</ul>
					
				</div>
			   {if $ALERT_MSG}
				 <div id="flashMessage" class="alert alert-success">
				 <button type="button" class="close" data-dismiss="alert">&#x2A2F;</button>{$ALERT_MSG}</div>					
			   {/if}	
					<div class="row-fluid  footer_div previewDiv" >
					<div class="span12">
						<div class="box box-bordered box-color">
						
						<div class="box-title">
								<h3><i class="icon-list"></i>Assign Asset</h3>
							</div>
							
						

						<form action="list_assign_asset.php" name="" id="formID" class="" method="post" accept-charset="utf-8">							<div class="box-content">
							
						<div class="dataTables_wrapper">
						
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				
				<span>Search:</span>  
				<input name="keyword" value="{$keyword}"  class="input-large" id="keyword" autocomplete="off" placeholder="Search here..." type="text"/> 
			   <span></span>	
            {html_options name='emp_name' class="input-medium" placeholder="Employee" style="clear:left" id="HrEmployeeRecStatus" options=$emp_name_drop selected=$emp_name}
				<span></span>	
			   {html_options name='asset_type' class="input-medium"  style="clear:left" id="HrEmployeeRecStatus" options=$asset_type_drop selected=$asset_type}	   
		      <span></span>	
		      <input name="f_date" value="{$f_date}" class="input-small datepick" placeholder="From Date" type="text" id="HrEmployeeDob"/> 
	         <input name="t_date" value="{$t_date}" class="input-small datepick" placeholder="To Date" type="text" id="HrEmployeeDob"/> 
		      <input type="submit" value="Search" class="btn btn-primary" style="margin-bottom:9px;margin-left:4px;">
            <a href="list_assign_asset.php"><button style="margin-bottom:9px;margin-left:4px;" type="button" class="btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
            <a href="add_assign_asset.php"><button type="button" class="btn btn-primary" style="float:right"><i class="icon-plus"></i> Assign Asset</button></a>
            <a href="list_assign_asset.php?action=export&keyword={$smarty.post.keyword}&emp_name={$smarty.post.emp_name}&asset_type={$smarty.post.asset_type}&f_date={$smarty.post.f_date}&t_date={$smarty.post.t_date}"><button type="button" class="btn btn-primary" style="float:right;margin-right:20px;"><i class="icon-reply"></i> Export</button></a>		
            </div>			
								
				<table class="table table-hover table-nomargin table-bordered usertable dataTable">
				<thead>
				<tr>	
					<th width="80">
						<a href="list_assign_asset.php?field=emp_name&order={$order}&page={$smarty.get.page}&keyword={$keyword}&emp_name={$emp_name}&asset_type={$asset_type}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_emp_name}">Employee Name</a></th>
					<th width="80">
						<a href="list_assign_asset.php?field=asset_type&order={$order}&page={$smarty.get.page}&keyword={$keyword}&emp_name={$emp_name}&asset_type={$asset_type}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_asset_type}">Asset Type</a></th>
					<th width="80">
						<a href="list_assign_asset.php?field={$sort_field}&order={$order}&page={$smarty.get.page}&keyword={$keyword}&emp_name={$emp_name}&asset_type={$asset_type}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_sort_field}">Asset</a>	</th>		
					<th width="80">
						<a href="list_assign_asset.php?field=brand&order={$order}&page={$smarty.get.page}&keyword={$keyword}&emp_name={$emp_name}&asset_type={$asset_type}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_brand}">Brand</a></th>
					<th width="80">
						<a href="list_assign_asset.php?field=created_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&emp_name={$emp_name}&asset_type={$asset_type}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_created_date}">Last Modified</a></th>
					<th width="80">Options</th>
				</tr>
			   </thead>
				<tbody>	
				{foreach from=$data item=item key=key}		
					{if $item.emp_name}										
					<tr>		
						<td>{$item.emp_name}</td> 
						<td>{$item.asset_type}</td>
						<td>{if $item.edition}{$item.edition} ({$item.sw_type}){else}{$item.hw_type}{/if}</td>
						<td>{$item.brand}</td> 
						<td>{$item.created_date}</td>
						<td class='hidden-480'>
							<a href="view_assign_asset.php?id={$item.id}&type={$item.asset_type}" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
						   <a href="edit_assign_asset.php?id={$item.id}" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>	
							<a href="delete_assign_asset.php?id={$item.id}&page={$smarty.get.page}&asset_type={$item.asset_type}" name="21" onclick="return deletefunction()"	class="btn delRec" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
						</td>
					</tr>
					{/if}
	    		 {/foreach}	
         	</tbody>
				</table>
		         <div class="dataTables_info" id="DataTables_Table_8_info">
					 {$page_info}
					</div>
					<div class="table-pagination" id="DataTables_Table_8_paginate">
					 {$page_links}		
					</div>
					&nbsp;							
					</div>	
				</div>
				<input type="hidden" id="page" value="assign_asset">
				<input type="hidden" id="asset_type" value="{$item.asset_type}">
			</form>						
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
