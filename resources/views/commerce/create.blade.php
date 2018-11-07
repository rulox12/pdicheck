@extends('admin.layout')

@section('content')

  <div class="content-fluid">
      <!-- Content Header (Page header) -->
      @section('Page header')
        <section class="content-header">
          <h1>
            Comercio
          </h1>
        </section>
      @endsection
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Crear Comercio</h3>
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
              <form method="POST" action="{{ route('commerces.store') }}" role="form">
                <div class="box-body">
                  <div class="form-group">
                    @csrf
                    <label for="name">NIT</label>
                    <input type="text" class="form-control" name="nit" placeholder="NIT">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="nombre">
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