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
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Crear implementación</h3>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div><br />
              @endif
              <form method="POST" action="{{ route('implementation.store') }}" role="form">
                <div class="box-body">
                  <div class="form-group">
                    @csrf
                    <label for="name">Comercio</label>
                    <select type="text" class="form-control" name="commerce" required >
                      @foreach ($commerce as $item)
                          <option name ="id_commerce" value="{{ $item->id_commerce }}">{{ $item->name  }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sitio">Sitio</label>
                    <input type="text" class="form-control" name="name_sitio" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="ingeniero">Ingeniero</label>
                    <select type="text" class="form-control" name="ingeniero" required >

                        @foreach ($arrayDetalle as $item)
                          <option value="{{ $item->id }}">{{ $item->name  }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tIntegración">Tipo de integración</label>
                    <select type="text" class="form-control" name="tIntegración" required >
                      @foreach ($typeintegrations as $item)
                        <option value="{{ $item->id_type_integration }}">{{ $item->name  }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="commerce">Metodo de compensación</label>
                    <select type="text" class="form-control" name="compensation_id" required >
                      <option>Agregador</option>
                      <option>GetWay</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input name="MP" value="1" type="checkbox">
                        Tarjetas de Credito
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="MP" value="2" type="checkbox">
                        PSE
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="MP" value="3" type="checkbox">
                        TUYA
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="MP" value="4" type="checkbox">
                        Efectivo
                      </label>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Crear Implementación</button>
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
