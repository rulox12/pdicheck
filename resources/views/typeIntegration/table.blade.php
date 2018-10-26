@extends('admin.layout')

@section('link')
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tipo Integración</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($typeint as $item)
          <tr>
            <td>{{ $item->name  }}</td>
            <td>
                <form method="post" action="{!! route('integrationtype.destroy', [$item->id_type_integration]) !!}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Are you sure you want to delete this merchant?')">
                        <i class="glyphicon glyphicon-trash"></i>
                        Eliminar
                    </button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Nombre</th>
          </tr>
        </tfoot>
      </table>

          
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