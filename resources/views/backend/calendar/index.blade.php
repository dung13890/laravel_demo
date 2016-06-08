@extends('layouts.backend')

@section('head.title')
	Calendar
@stop

@section('body.content')

	<div class="container-fluid">
		{!! Breadcrumbs::render('backend.calendar')!!}
			<div class="row">
				<div class="col-md-6 col-xs-6"><h3 class="margin-top-0">Calendar </h3></div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Table</div>
						<div class="panel-body">
							<div id="calendar"></div>
							<div id="modal-calendar"></div>
						</div>
					</div>
				</div>
			</div>
	</div>
@stop
@section('body.js')
<script type="text/javascript">
	$(document).ready(function(){
        $('#calendar').fullCalendar({
        	header : {
        		left: 'prev,next today',
        		center: 'title',
        		right: 'month,agendaWeek,agendaDay'
        	},
        	lang: 'vi',
        	selectable: true,
        	selectHelper: true,
        	select: function(start, end) {
        		$.get("{!!URL::to('admin/calendar/create')!!}",function(result){
        			$('#modal-calendar').html(result);
        			var rangeTime = end - start;
	        		if(rangeTime < 86400000)
	        		{
	        			$('#create-calendar').find('.modal-title').text('Time: ' + moment(start).format('dd, D MMMM, HH:mm') + ' - ' + moment(end).format('HH:mm'));
	        		}
	        		if(rangeTime == 86400000)
	        		{
	        			$('#create-calendar').find('.modal-title').text('Time: ' + moment(start).format('dd, D MMMM'));
	        		}
	        		if(rangeTime > 86400000)
	        		{
	        			$('#create-calendar').find('.modal-title').text('Time: ' + moment(start).format('dd, D MMMM') + ' - ' + moment(end).format('dd, D MMMM'));
	        		}
	        		$('#create-calendar').find('#start_time').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
	        		$('#create-calendar').find('#end_time').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
	        		$('#create-calendar').modal(); 

	        		$("#submit-create-calendar").on('click', function(e){
			    		e.preventDefault();
			    		createCalendar(start,end);
			    		});
	        		});
        	},
        	editable: true,
        	eventLimit: true,
        	events: {!!json_encode($calendar)!!},
        	eventClick: function(event){
        		$.get("{!!URL::to('admin/calendar/edit')!!}" + '/' + event.id,function(result){
        			$('#modal-calendar').html(result);
        			//alert(event.end - event.start);
        			if(event.end - event.start == 86400000)
	        		{
	        			$('#edit-calendar').find('.modal-title').text('Time: ' + moment(event.start).format('dd, D MMMM'));
	        		}
	        		if(event.end - event.start < 86400000)
        			{
        				$('#edit-calendar').find('.modal-title').text('Time: ' + moment(event.start).format('dd, D MMMM, HH:mm') + ' - ' + moment(event.end).format('HH:mm'));
        			}
        			if(event.end - event.start > 86400000)
        			{
        				$('#edit-calendar').find('.modal-title').text('Time: ' + moment(event.start).format('dd, D MMMM') + ' - ' + moment(event.end).format('dd, D MMMM'));
        			}
        			$('#edit-calendar').find('#start_time').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
	        		$('#edit-calendar').find('#end_time').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
        			$('#edit-calendar').modal(); 
        			$("#submit-delete-calendar").on('click', function(e){
			        	e.preventDefault();
			        	if(confirm('Are you sure you want to delete this item?'))
			        		{deleteCalendar(event.id);}
			        });

			        $("#submit-edit-calendar").on('click', function(e){
			        	e.preventDefault();
			        	editCalendar(event.start, event.end, event.id);
			        });

        		});
        	}

        });

		function createCalendar(start,end)
		{
			$.ajax({
	    			url: "{!!URL::to('admin/calendar/store')!!}",
	    			data: $('form.form-create-calendar').serialize(),
	    			type: "POST",
	    		}).success(function(idcalendar) {
						  $('#create-calendar').modal('hide');
						  eventData = {
						  	id: idcalendar,
						  	title: $('#title').val(),
						  	start: start,
						  	end: end,
						  };
						 $('#calendar').fullCalendar('renderEvent',eventData,true);
					}).fail(function(response) {
		                   var jsonErrors = response.responseJSON;
		                   var alertText = "Whoops! There were some problems with your input:\n\n";
		                   $.each(jsonErrors, function(n, elem) {
	                        alertText = alertText + elem + "\n";
	                    });
	                    alert(alertText);
		                });
		}

		function deleteCalendar(id)
		{
			//alert($('form.form-edit-calendar').serialize());
			$.ajax({
				url: "{!!URL::to('admin/calendar/destroy')!!}",
	    		data: {id: id},
	    		type: "POST",
			}).success(function(){
				//alert(id);
			     $('#edit-calendar').modal('hide');
				 $('#calendar').fullCalendar('removeEvents',id)
			});
		}

		function editCalendar(start, end, id)
		{
			$.ajax({
				url: "{!!URL::to('admin/calendar/update')!!}" + '/' + id,
	    		data: $('form.form-edit-calendar').serialize(),
	    		type: "POST",
			}).success(function(result){
				 $('#edit-calendar').modal('hide');
				 eventData = {
						  	id: id,
						  	title: $('#title').val(),
						  	start: start,
						  	end: end,
						  	color: ($('input[name="status"]:checked').val()==2) ? '#d9534f' : null,
						  };
				$('#calendar').fullCalendar('removeEvents',id);
				$('#calendar').fullCalendar('renderEvent',eventData,true);
			});
		}



    });
</script>
@stop

