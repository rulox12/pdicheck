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
      <div class="row progress active">
        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{ $implementation[0]->progress }}%; color: black">
          <b>{{ $implementation[0]->progress }}%</b>
          <span class="sr-only">40% Complete (success)</span>
        </div>
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
                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTC" class="collapsed" aria-expanded="false">
                          Tarjetas de Credito
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTC" class="panel-collapse collapse" aria-expanded="false">
                      @foreach ($TC as $item)
                        @if($item->status == 1 )
                          <div class="box-body">
                              <div class="form-group">                     
                              <div class="row alert alert-success alert-dismissible" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input class="TC" type="checkbox" name="TC[]" value="{{ $item->id_detail_implementations }}" checked disabled>{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="TCD col-md-12" name="TCD[{{ $item->id_detail_implementations }}]" disabled>{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          <div class="box-body">
                            <div class="form-group">                     
                              <div class="row" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input class="TC" type="checkbox" name="TC[]" value="{{ $item->id_detail_implementations }}">{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="TCD col-md-12" name="TCD[{{ $item->id_detail_implementations }}]">{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                @endif
                @if(!empty($PSE[0]))
                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePSE" class="collapsed" aria-expanded="false">
                          PSE
                        </a>
                      </h4>
                    </div>
                    <div id="collapsePSE" class="panel-collapse collapse" aria-expanded="false">
                      @foreach ($PSE as $item)
                        @if($item->status == 1 )
                          <div class="box-body">
                              <div class="form-group">                     
                              <div class="row alert alert-success alert-dismissible" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="PSE[]" value="{{ $item->id_detail_implementations }}" checked disabled>{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="PSED col-md-12" name="PSED[{{ $item->id_detail_implementations }}]" disabled>{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          <div class="box-body">
                            <div class="form-group">                     
                              <div class="row" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="PSE[]" value="{{ $item->id_detail_implementations }}">{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="PSED col-md-12" name="PSED[{{ $item->id_detail_implementations }}]">{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                @endif
                @if(!empty($TY[0]))
                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTY" class="collapsed" aria-expanded="false">
                          TUYA
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTY" class="panel-collapse collapse" aria-expanded="false">
                      @foreach ($TY as $item)
                        @if($item->status == 1 )
                          <div class="box-body">
                              <div class="form-group">                     
                              <div class="row alert alert-success alert-dismissible" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="TY[]" value="{{ $item->id_detail_implementations }}" checked disabled>{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="TYD col-md-12" name="TYD[{{ $item->id_detail_implementations }}]" disabled>{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          <div class="box-body">
                            <div class="form-group">                     
                              <div class="row" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="TY[]" value="{{ $item->id_detail_implementations }}">{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="TYD col-md-12" name="TYD[{{ $item->id_detail_implementations }}]">{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                @endif
                @if(!empty($EF[0]))
                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEF" class="collapsed" aria-expanded="false">
                          Efectivo
                        </a>
                      </h4>
                    </div>
                    <div id="collapseEF" class="panel-collapse collapse" aria-expanded="false">
                      @foreach ($EF as $item)
                        @if($item->status == 1 )
                          <div class="box-body">
                              <div class="form-group">                     
                              <div class="row alert alert-success alert-dismissible" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="EF[]" value="{{ $item->id_detail_implementations }}" checked disabled>{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="EFD col-md-12" name="EFD[{{ $item->id_detail_implementations }}]" disabled>{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          <div class="box-body">
                            <div class="form-group">                     
                              <div class="row" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="EF[]" value="{{ $item->id_detail_implementations }}">{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="EFD col-md-12" name="EFD[{{ $item->id_detail_implementations }}]">{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                @endif
                @if(!empty($EFP[0]))
                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEFP" class="collapsed" aria-expanded="false">
                          Efectivo Propio
                        </a>
                      </h4>
                    </div>
                    <div id="collapseEFP" class="panel-collapse collapse" aria-expanded="false">
                      @foreach ($EFP as $item)
                        @if($item->status == 1 )
                          <div class="box-body">
                              <div class="form-group">                     
                              <div class="row alert alert-success alert-dismissible" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="EFP[]" value="{{ $item->id_detail_implementations }}" checked disabled>{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="EFPD col-md-12" name="EFPD[{{ $item->id_detail_implementations }}]" disabled>{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          <div class="box-body">
                            <div class="form-group">                     
                              <div class="row" role="alert">
                                <div class="col-md-5 checkbox">
                                  <label><input type="checkbox" name="EFP[]" value="{{ $item->id_detail_implementations }}">{{ $item->description }}</label>
                                </div>
                                <div class="col-md-6">
                                  <textarea style="color: black;" class="EFPD col-md-12" name="EFPD[{{ $item->id_detail_implementations }}]">{{ $item->observation }}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                @endif
              </div>
              <div class="box-footer">
              @if($implementation[0]->progress == 100)
                <button id="Guardar" type="submit" class="btn btn-primary" disabled>Guardar</button>
              @else
                <button id="Guardar" type="submit" class="btn btn-primary">Guardar</button>
              @endif
                
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
   
    $('.TC').click(function(){
        if (this.checked){
          $('.TCD').prop('disabled', false);
        }else {
          $('.TCD').prop('disabled', true);    
        }
    });
     
    

  </script>
@endsection
