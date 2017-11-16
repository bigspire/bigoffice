<div id="container" style="width: 700px; height: 400px; margin: 0 auto;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script language="JavaScript">
google.charts.load('current', {packages: ['corechart','line']});  

function drawChart() {
   
   var data = new google.visualization.DataTable();
   data.addColumn('string', 'verticals');
   data.addColumn('number', 'Budget(Rs.)');
   data.addColumn('number', 'Budget(Rs.)- Revised');
   data.addColumn('number', 'Actual(Rs.)');

   data.addRows([
      ['CHE-ES',  3333333, 1666667,479628],
      ['CHE-FLR', 3333333, 2000000,310507],
      ['OD',  3111111,2000000,371500],
      ['TS(DIRECT)',  1000000, 183333,38242],
      ['JOBFAC',  183333, 250000,162500]
      
   ]);
   
   // Set chart options
   var options = {'title' : 'Sales Budget Vs Actuals FEB 17 (FY 16-17)',
      hAxis: {
         title: ''
      },
      vAxis: {
         title: ''
      },   
     
      'height':400,
	 // legend: 'none',
      pointsVisible: true	  
   };

   // Instantiate and draw the chart.
   var chart = new google.visualization.LineChart(document.getElementById('container'));
   chart.draw(data, options);
}
google.charts.setOnLoadCallback(drawChart);
</script>
