@extends('admin.layout')

@section('link')
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Implementación</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Lider</th>
            <th>Ingeniero</th>
          </tr>
        </thead>
        <tbody> 
        @foreach ($implementation as $item)
          <tr>
            <td><a href="{{ route('implementation.show', $item->id_implementation) }}">{{ $item->name_site }}</a></td>
            <td>{{ $item->name_leader }}</td>
            <td>{{ $item->name_engineer }}</td>
          </tr>
        @endforeach
        </tbody>
        <!--<tfoot>
          <tr>
            <th><a>Nombre</a></th>
            <th>Lider</th>
            <th>Ingeniero</th>
          </tr>
        </tfoot>-->
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  

          
@endsection

@section('script')
  <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endsection