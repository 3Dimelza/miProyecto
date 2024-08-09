<?php
$thejson=null;
$events = ReservationData::getEvery();
foreach($events as $event){
	$thejson[] = array("title"=>$event->title,"url"=>"./?view=editreservation&id=".$event->id,"start"=>$event->date_at."T".$event->time_at);
}
?>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@2.9.0/dist/fullcalendar.min.css' rel='stylesheet' />

<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@2.9.0/dist/fullcalendar.min.js'></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@2.9.0/dist/lang/es.js"></script>
<script src='fullcalendar/lang/es.js'></script>
<script>
	$(document).ready(function() {

		$('#calendar').fullCalendar({
			
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			locale: 'es',
			defaultDate: '<?php echo date('Y-m-d');?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
			
		});
		
	});

</script>


<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Calendario de Citas</h4>
  </div>
  <div class="card-content table-responsive">
<div id="calendar"></div>
</div>
</div>
</div>
</div>
