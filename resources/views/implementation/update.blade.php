@extends('admin.layout')

@section('link')

@endsection

@section('content')
  
  <div class="content-fluid">
      <!-- Content Header (Page header) -->
      @section('Page header')
        <section class="content-header">
          <h1>
            Implementación
          </h1>
        </section>
      @endsection
      <!-- Main content -->
      <section class="content">
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: {{ $implementation[0]->progress }}%; color: black" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><b>{{ $implementation[0]->progress }}%</b></div>
        </div>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><b>{{ $implementation[0]->name_site  }}</b></h3>
                <input type="hidden" name="id_implementation" value="{{ $implementation[0]->id_implementation }}">
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br/>
              @endif
              <form method="POST" action="" role="form">
                <div class="box-body">
                  <div class="form-group">
                    @csrf
                    <h4 name="" for="name"><b>Comercio: </b>{{ $implementation[0]->name_commerce}}</h4>
                    <h4 for="exampleInputPassword1"><b>Lider de Proyecto: </b>{{ $implementation[0]->name_leader}}</h4>
                    <h4 for="exampleInputPassword1"><b>Ingeniero: </b>{{ $implementation[0]->name_engineer}}</h4>
                    <h4 for="exampleInputPassword1"><b>Fecha de Inicio: </b>{{ $implementation[0]->start_date}}</h4>
                    <h4 for="exampleInputPassword1"><b>Modelo de recaudo: </b>{{ $implementation[0]->compensation}}</h4>
                    <h4 for="exampleInputPassword1"><b>Tipo de Integración: </b>{{ $implementation[0]->name_typeintegration}}</h4>
                  </div>
                  @if(!empty($TC))
                    
                  @endif
                  <div class="box box-success collapsed-box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Tarjetas de Credito</h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body" style="display: none;">
                      <div class="form-group">                     
                        <div class="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Solicitud Cartas de terminales</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Solicitud terminales</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Cargue terminales</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>                      
                      <div class="form-group">                     
                        <div class="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Pruebas terminales</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="box box-success collapsed-box">
                    <div class="box-header with-border">
                      <h3 class="box-title">PSE</h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body" style="display: none;">
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Afiliación del comercio ante ACH</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Configuración de códigos de prueba PSE</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Crear código de servicio y cuenta recaudadora</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Asociar cuenta y código de servicio</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Configurar datos reales de PSE en la consola</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="box box-success collapsed-box">
                    <div class="box-header with-border">
                      <h3 class="box-title">TUYA</h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body" style="display: none;">
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Afiliación del comercio ante ACH</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Configuración de códigos de prueba PSE</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Crear código de servicio y cuenta recaudadora</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Asociar cuenta y código de servicio</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">                     
                        <div class ="row">
                          <div class="col-md-5 checkbox">
                            <label><input type="checkbox" value="">Configurar datos reales de PSE en la consola</label>
                          </div>
                          <div class="col-md-6">
                            <textarea class="col-md-12"></textarea>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Crear Comercio</button>
                </div>

              </form>

            </div>
          </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>

@endsection
@section('script')
  <script type="text/javascript">
    $('#myCollapsible').collapse({
      toggle: false
    })
    $('.collapse').collapse()
  </script>
@endsection
