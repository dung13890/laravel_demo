<script type="text/javascript">
    $(document).ready(function () {

        // dynamic table
        oTable = $('#{{ $id }}').dataTable({
            "oLanguage": { "sLengthMenu":"_MENU_","sSearch":"<div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-search'></i></span>_INPUT_</div>" }, 
            
        @foreach ($options as $k => $o)
            {!! json_encode($k) !!}: {!! json_encode($o) !!},
        @endforeach

        @foreach ($callbacks as $k => $o)
            {!! json_encode($k) !!}: {!! $o !!},
        @endforeach

        });
      
  oTable.addClass('table-striped ');
  $('.dataTables_filter input').attr('placeholder', 'Search...');
    
    });
</script>
