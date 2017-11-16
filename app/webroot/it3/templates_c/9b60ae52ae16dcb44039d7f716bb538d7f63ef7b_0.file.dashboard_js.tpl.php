<?php
/* Smarty version 3.1.29, created on 2017-11-16 17:56:27
  from "C:\xampp\htdocs\bigoffice\app\webroot\it\templates\include\dashboard_js.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0d83f378b1a7_07362975',
  'file_dependency' => 
  array (
    '9b60ae52ae16dcb44039d7f716bb538d7f63ef7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bigoffice\\app\\webroot\\it\\templates\\include\\dashboard_js.tpl',
      1 => 1470742823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d83f378b1a7_07362975 ($_smarty_tpl) {
?>
 
 <?php echo '<script'; ?>
 type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1(){
        var data = google.visualization.arrayToDataTable([
          ['Software', 'No.'], 
		 	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_sw_type']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_0_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_0_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rec']->value['edition'];?>
)',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_0_saved_local_item;
}
if ($__foreach_rec_0_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_0_saved_item;
}
?>
		      
        ]);

        var options = {
          title: 'Software By Type',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
      }
      
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2(){
        var data = google.visualization.arrayToDataTable([
          ['Software', 'No.'], 
		 	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_sw_edition']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_1_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_1_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['edition'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rec']->value['no_license'];?>
)',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['no_license'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_1_saved_local_item;
}
if ($__foreach_rec_1_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_1_saved_item;
}
?>
		      
        ]);

        var options = {
          title: 'Software By Edition',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }
      
      google.charts.setOnLoadCallback(drawChart3);
      function drawChart3(){
        var data = google.visualization.arrayToDataTable([
          ['Software', 'No.'], 
		 	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_assign_sw']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_2_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_2_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['edition'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rec']->value['no_license'];?>
)',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_2_saved_local_item;
}
if ($__foreach_rec_2_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_2_saved_item;
}
?>
		      
        ]);

        var options = {
          title: 'Assigned Software',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart.draw(data, options);
      }
      
      google.charts.setOnLoadCallback(drawChart4);
      function drawChart4(){
        var data = google.visualization.arrayToDataTable([
          ['Software', 'No.'], 
		 	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_unassign_sw']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_3_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_3_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['edition'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rec']->value['no_license'];?>
)',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_3_saved_local_item;
}
if ($__foreach_rec_3_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_3_saved_item;
}
?>
		      
        ]);

        var options = {
          title: 'Unassigned Software',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart.draw(data, options);
      }
	  
      google.charts.setOnLoadCallback(drawChart5);
      function drawChart5(){
        var data = google.visualization.arrayToDataTable([
          ['Hardware', 'No.'],
        	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_hw_type']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_4_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_4_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['title'];?>
',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_4_saved_local_item;
}
if ($__foreach_rec_4_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_4_saved_item;
}
?>
		    
        ]);

        var options = {
          title: 'Hardware By Type',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
        chart.draw(data, options);
      }
      
      google.charts.setOnLoadCallback(drawChart6);
      function drawChart6(){
        var data = google.visualization.arrayToDataTable([
          ['Hardware', 'No.'],
        	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_hw_brand']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_5_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_5_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rec']->value['brand'];?>
)',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_5_saved_local_item;
}
if ($__foreach_rec_5_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_5_saved_item;
}
?>
		    
        ]);

        var options = {
          title: 'Hardware By Brand',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
        chart.draw(data, options);
      }
      
      google.charts.setOnLoadCallback(drawChart7);
      function drawChart7(){
        var data = google.visualization.arrayToDataTable([
          ['Hardware', 'No.'],
        	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_assign_hw']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_6_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_6_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rec']->value['brand'];?>
)',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_6_saved_local_item;
}
if ($__foreach_rec_6_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_6_saved_item;
}
?>
		    
        ]);

        var options = {
          title: 'Assigned Hardware',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart7'));
        chart.draw(data, options);
      }
      
      google.charts.setOnLoadCallback(drawChart8);
      function drawChart8(){
        var data = google.visualization.arrayToDataTable([
          ['Hardware', 'No.'],
        	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_unassigned_hw']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_7_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_7_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['brand'];?>
',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_7_saved_local_item;
}
if ($__foreach_rec_7_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_7_saved_item;
}
?>
		    
        ]);

        var options = {
          title: 'Unassigned Hardware',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart8'));
        chart.draw(data, options);
      }
	  
	  google.charts.setOnLoadCallback(drawChart9);
      function drawChart9(){
        var data = google.visualization.arrayToDataTable([
          ['Status', 'No.'],
        	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_ticket']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_8_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_8_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['status'];?>
',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_8_saved_local_item;
}
if ($__foreach_rec_8_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_8_saved_item;
}
?>
		    
        ]);

        var options = {
          title: 'Ticket Details',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart9'));
        chart.draw(data, options);
      }
	  
	  google.charts.setOnLoadCallback(drawChart10);
      function drawChart10(){
        var data = google.visualization.arrayToDataTable([
          ['Status', 'No.'],
        	  		 
		  <?php
$_from = $_smarty_tpl->tpl_vars['data_req_change']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rec_9_saved_item = isset($_smarty_tpl->tpl_vars['rec']) ? $_smarty_tpl->tpl_vars['rec'] : false;
$_smarty_tpl->tpl_vars['rec'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rec']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rec']->value) {
$_smarty_tpl->tpl_vars['rec']->_loop = true;
$__foreach_rec_9_saved_local_item = $_smarty_tpl->tpl_vars['rec'];
?>
          ['<?php echo $_smarty_tpl->tpl_vars['rec']->value['status'];?>
',  <?php echo $_smarty_tpl->tpl_vars['rec']->value['count'];?>
],
		  <?php
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_9_saved_local_item;
}
if ($__foreach_rec_9_saved_item) {
$_smarty_tpl->tpl_vars['rec'] = $__foreach_rec_9_saved_item;
}
?>
		    
        ]);

        var options = {
          title: 'Request Change',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart10'));
        chart.draw(data, options);
      }
    <?php echo '</script'; ?>
>
<?php }
}
