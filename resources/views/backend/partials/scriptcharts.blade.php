<script type="text/javascript">
$(document).ready(function () {
    var typeChart = 'area';

    $('.charts-type').click(function(e){
       typeChart = $(this).attr('value');
       requestData("tab_active=month-filter");
       e.preventDefault();
    });

    function pieChart(){
        var options = {
                    chart: {
                        renderTo: 'pie-chart',
                        type : 'pie',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                    },
                    title: {
                        text: 'In Month 8/2015',
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    credits: {
                        enabled: false
                      },
                      series : [{
                                 data : [{
                                            name: "SEO",
                                            y: 56.33
                                        },{
                                            name: "Marketing",
                                            y: 21.03,
                                            sliced: true,
                                        },{
                                            name: "Design",
                                            y: 10.38,
                                        },{
                                            name: "Support",
                                            y: 6.91,
                                        },{
                                            name: "IT",
                                            y: 5.35
                                        }
                                        
                                 ]

                      }]

        };
        chart = new Highcharts.Chart(options);
    }
    pieChart();
	
	function requestData(request){

        var options = {
                    chart: {
                        renderTo: 'area-chart',
                        type: typeChart
                    },
                    title: {
                        text: '',
                        //x: -20 //center
                    },
                    xAxis: {
                        categories: []
                    },
                    yAxis: {
                        title: {
                            text: 'Value'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    plotOptions: {
                        series: {
                            marker: {
                                enabled: false
                            }
                        }
                    },
                    credits: {
                        enabled: false
                      },
                    series: [{}]
                };

	 	$.get("{!! URL::to('admin/ajax/charts')!!}",request,function(result){

                options.title.text = result['title'];
                options.xAxis.categories = result['labels'];
                options.series[0].name = 'tinh';
                options.series[0].data = result['value'];
                chart = new Highcharts.Chart(options);


	 	});
	}

    $('#month_filter-span').datetimepicker({
            viewMode: 'months',
            format: 'MM-YYYY'
        });
        $('#year_filter-span').datetimepicker({
            viewMode: 'years',
            format: 'YYYY'
        });
        $('#from_date').datetimepicker({
            viewMode: 'days',
            format: 'DD-MM-YYYY'
        });
        $('#to_date').datetimepicker({
            viewMode: 'days',
            format: 'DD-MM-YYYY',
            useCurrent: false //Important! See issue #1075
        });
        $("#from_date").on("dp.change", function (e) {
            $('#to_date').data("DateTimePicker").minDate(e.date);
        });
        $("#to_date").on("dp.change", function (e) {
            $('#from_date').data("DateTimePicker").maxDate(e.date);
        });

        $('#filter-time-modal').on('show.bs.modal', function (event) {
          var recipient = $(event.relatedTarget).data('whatever'); 
          var modal = $(this);
          //modal.find('.change-id').attr('id',recipient);
          modal.find("#submit-filter-time").attr('value-panel',recipient);
        });

         $('#filter-time-modal').find("#submit-filter-time").click(function(e){
             e.preventDefault();
             var tab_active = $('#filter-time-modal li').filter('.active')[0].childNodes[0].hash;
            if($(this).attr('value-panel') == 'filter-time-pie')
              {
                pieChart();
                $('#filter-time-modal').modal('hide');
              }
            if($(this).attr('value-panel') == 'filter-time-area')
              {
                requestData($('form.form-filter-time').serialize() + '&tab_active=' + tab_active.substr(1));
                $('#filter-time-modal').modal('hide');
              }
            if($(this).attr('value-panel') == 'filter-time-data')
              {
                alert($('form.form-filter-time').serialize());
                $('#filter-time-modal').modal('hide');
              }
            });



	requestData("tab_active=month-filter");


});
</script>