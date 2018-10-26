@extends('admin.layout')

@section('link')

@endsection

@section('content')
@foreach ($arrayDetalle as $item2)
                          <option>{{ $item2->name  }}</option>
                      @endforeach
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
              <form method="POST" action="{{ route('createcomm') }}" role="form">
                <div class="box-body">
                  <div class="form-group">
                    @csrf
                    <label for="name">Comercio</label>
                    <select type="text" class="form-control" name="commerce" required >
                      @foreach ($commerce as $item2)
                          <option value="$item2->id_commerce">{{ $item2->name  }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sitio</label>
                    <input type="text" class="form-control" name="name" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="name">Ingeniero</label>
                    <select type="text" class="form-control" name="commerce" required >
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Tipo de integración</label>
                    <select type="text" class="form-control" name="commerce" required >
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Metodo de compensación</label>
                    <select type="text" class="form-control" name="commerce" required >
                      <option>Agregador</option>
                      <option>GetWay</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox">
                        Tarjetas de Credito
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox">
                        PSE
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox">
                        TUYA
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox">
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
@section('script')
@endsection
