@extends('admin.layout')


@section('content')
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Devolución</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      {{ $result = json_encode( $data ) }}
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
 
@endsection