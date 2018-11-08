@extends('admin.layout')

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
                <h3 class="box-title"><b>{{ $implementation[0]->name_site}}</b></h3> 
                <p class="pull-right">
                  <a href="{{ route('pdf.show', $implementation[0]->id_implementation) }}" class="btn btn-success btn-sm ad-click-event">
                      Exportar PDF
                  </a>
                </p>
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
              <form id="guardar" method="POST" action="{!! route('implementation.update', $implementation[0]->id_implementation) !!}" role="form">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
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
                  @if(!empty($TC[0]))
                    <div class="box box-success collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Tarjetas de Credito</h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    @foreach ($TC as $item)
                      <div class="box-body" style="display: none;">
                        <div class="form-group">                     
                          <div class="row">
                            <div class="col-md-5 checkbox">
                              <label><input class="TC" type="checkbox" name="TC[]" value="{{ $item->id_detail_implementations }}">{{ $item->description }}</label>
                            </div>
                            <div class="col-md-6">
                              <textarea class="TCD" class="col-md-12" name="TCD[{{ $item->id_detail_implementations }}]" value="{{ $item->observation }}"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  @endif
                  @if(!empty($PSE[0]))
                    <div class="box box-success collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title">PSE</h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    @foreach ($PSE as $item)
                      <div class="box-body" style="display: none;">
                        <div class="form-group">                     
                          <div class="row">
                            <div class="col-md-5 checkbox">
                              <label><input type="checkbox" name="PSE[]" value="{{ $item->id_item }}">{{ $item->description }}</label>
                            </div>
                            <div class="col-md-6">
                              <textarea class="col-md-12" name="PSED[{{ $item->id_detail_implementations }}]" value="{{ $item->observation }}"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  @endif
                  @if(!empty($TY[0]))
                    <div class="box box-success collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title">TUYA</h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    @foreach ($TY as $item)
                      <div class="box-body" style="display: none;">
                        <div class="form-group">                     
                          <div class="row">
                            <div class="col-md-5 checkbox">
                              <label><input type="checkbox" name="TY[]" value="{{ $item->id_item }}">{{ $item->description }}</label>
                            </div>
                            <div class="col-md-6">
                              <textarea class="col-md-12" name="TYD[{{ $item->id_detail_implementations }}]" value="{{ $item->observation }}"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  @endif
                  @if(!empty($EF[0]))
                    <div class="box box-success collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Efectivo</h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                      @foreach ($EF as $item)
                        <div class="box-body" style="display: none;">
                          <div class="form-group">                     
                            <div class="row">
                              <div class="col-md-5 checkbox">
                                <label><input type="checkbox" name="EF[]" value="{{ $item->id_item }}">{{ $item->description }}</label>
                              </div>
                              <div class="col-md-6">
                                <textarea class="col-md-12" name="EFD[{{ $item->id_detail_implementations }}]" value="{{ $item->observation }}"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @endif
                  @if(!empty($EFP[0]))
                    <div class="box box-success collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Efectivo Propio</h3>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                      @foreach ($EFP as $item)
                        <div class="box-body" style="display: none;">
                          <div class="form-group">                     
                            <div class="row">
                              <div class="col-md-5 checkbox">
                                <label><input type="checkbox" name="EFP[]" value="{{ $item->id_item }}">{{ $item->description }}</label>
                              </div>
                              <div class="col-md-6">
                                <textarea class="col-md-12" name="EFPD[{{ $item->id_detail_implementations }}]" value="{{ $item->observation }}"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @endif
                </div>
                <textarea class="col-md-12" name="prueba" id="prueba"></textarea>
                <div class="box-footer">
                  <button id="Guardar" type="submit" class="btn btn-primary">Guardar</button>
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
    $('.collapse').collapse();
   
    

    $('#Guardar').click(function(){
      if(!$('input[type=checkbox]').prop('checked')){
        $('this').val('hola');
      }
        
    });
     
    

  </script>
@endsection
