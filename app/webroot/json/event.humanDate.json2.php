<?php
header('Content-type: text/json');
date_default_timezone_set('Asia/Calcutta');

echo '[';
$separator = "";
$days = 16;
 //   echo '  { "date": "2013-03-19 17:30:00", "type": "meeting", "title": "Test Last Year", "description": "Lorem Ipsum dolor set", "url": "" },';
  //  echo '  { "date": "2013-03-23 17:30:00", "type": "meeting", "title": "Test Next Year", "description": "Lorem Ipsum dolor set", "url": "http://www.event3.com/" },';

$i = 1;
    echo $separator;
    $initTime = date("Y")."-".date("m")."-".date("d")." ".date("H").":00:00";
    //$initTime = date("Y-m-d H:i:00");
    echo '  { "date": "2014-06-08 05:30:00", "user": "Priya", "plan_date" : "08-Jun-2014", "type": "meeting", "title": "Recruitment Process", "start_time": "8:30am", "end_time": "6:30pm",  "description": "Recruit 10 members for a Software Developer position by 12th.. <a href=#>view more</a>", "status": "<i data-placement=bottom rel=tooltip class=\"show-tip click_hide cursor icon-circle unread\" original-title=\"Mark as Read\" title=\"Mark as Read\"></i> <span class=\"label label-warning\">Postponed</span>", "plan_action": "Recruitment Drive", "plan_type": "<span title=\"Project Plan\" class=\"label label-warning\">P</span>", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
	 echo '  { "date": "2014-06-10 05:30:00", "user": "Sundar", "plan_date" : "10-Jun-2014", "type": "meeting", "title": "Client Meeting", "start_time": "8:30am", "end_time": "6:30pm",  "description": "Going for the client meeting for new project on 10th... <a href=#>view more</a>", "status": "<i data-placement=bottom rel=tooltip class=\"show-tip click_hide cursor icon-circle unread\" original-title=\"Mark as Read\" title=\"Mark as Read\"></i> <span class=\"label label-success\">Executed</span>", "plan_action": "Recruitment Drive", "plan_type": "<span title=\"Daily Plan\" class=\"label label-success\">D</span>", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
	  echo '  { "date": "2014-06-12 05:30:00", "user": "Vimal", "plan_date" : "12-Jun-2014", "type": "meeting", "title": "Documentation", "start_time": "8:30am", "end_time": "6:30pm",  "description": "Proposal preparation for temp staffing for new company.. <a href=#>view more</a>", "status": "<i data-placement=bottom rel=tooltip class=\"show-tip click_hide cursor icon-circle unread\" original-title=\"Mark as Read\" title=\"Mark as Read\"></i> <span class=\"label label-important\">Modified</span>", "plan_action": "Recruitment Drive", "plan_type": "<span title=\"Daily Plan\" class=\"label label-success\">D</span>", "url": "http://localhost/pdca_html/v1.3/view_task.html" }';
   /* echo '  { "date": "2014-06-09 12:30:00", "type": "meeting", "title": "", "description": "<ul class=messages style=width:60%><li class=left><div class=image><img src=img/demo/user-2.jpg></div><div class=message><span class=caret></span><span class=name>Sundar</span> <span class=\"badge badge-warning\" style=float:right>Daily Plan</span> <p><a href=view_task.html>Preparation of proposal for the daimler for the 10000 candidates recruitment...</a> </p><span class=\"label label-success\">Executed</span></div></li></ul>", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 1 days + 4 hours')); echo '", "type": "meeting", "title": "", "description": "<ul class=messages style=width:60%><li class=left><div class=image><img src=img/demo/user-3.jpg></div><div class=message><span class=caret></span><span class=name>Rohit</span> <span class=\"badge badge-success\" style=float:right>Project Plan</span> <p><a href=view_task.html>Going for the client meeting for the new project in pune city...</a> </p><span class=\"label label-warning\">Modified</span></div></li></ul>", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 5 days + 4 hours')); echo '", "type": "demo", "title": "", "description": "<ul class=messages style=width:60%><li class=left><div class=image><img src=img/demo/user-4.jpg></div><div class=message><span class=caret></span><span class=name>Vimala</span> <span class=\"badge badge-success\" style=float:right>Project Plan</span> <p><a href=view_task.html>Planned to go to Auditor office the the IT submission for the assessment year 2015...</a> </p><span class=\"label\">Modified</span></div></li></ul>.", "url": "http://localhost/pdca_html/v1.3/view_task.html" }';

    /*echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 1 days 8 hours')); echo '", "type": "meeting", "title": "Test Project '; echo $i; echo ' Brainstorming", "description": "Lorem Ipsum dolor set", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 2 days 3 hours')); echo '", "type": "test", "title": "A very very long name for a f*cking project '; echo $i; echo ' events", "description": "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 2 days 3 hours')); echo '", "type": "meeting", "title": "Project '; echo $i; echo ' meeting", "description": "Lorem Ipsum dolor set", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 4 days 3 hours')); echo '", "type": "demo", "title": "Project '; echo $i; echo ' demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 7 days 1 hours')); echo '", "type": "meeting", "title": "Test Project '; echo $i; echo ' Brainstorming", "description": "Lorem Ipsum dolor set", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 12 days 3 hours')); echo '", "type": "test", "title": "A very very long name for a f*cking project '; echo $i; echo ' events", "description": "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 20 days 10 hours')); echo '", "type": "demo", "title": "Project '; echo $i; echo ' demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 22 days 3 hours')); echo '", "type": "meeting", "title": "Test Project '; echo $i; echo ' Brainstorming", "description": "Lorem Ipsum dolor set", "url": "http://localhost/pdca_html/v1.3/view_task.html" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 28 days 1 hours')); echo '", "type": "test", "title": "A very very long name for a f*cking project '; echo $i; echo ' events", "description": "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.", "url": "http://localhost/pdca_html/v1.3/view_task.html" }';
	*/
    $separator = ",";

echo ']';
?>