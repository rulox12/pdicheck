@extends('admin.layout')

@section('content')

  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @section('Page header')
        <section class="content-header">
          <h1>
            Sitios
          </h1>
        </section>
      @endsection
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Crear Sitio</h3>
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
              <form method="POST" action="" role="form">
                <div class="box-body">
                  <div class="form-group">
                    @csrf
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="name">Comercio</label>
                    <select type="text" class="form-control" name="commerce" required >
                      @foreach ($commerce as $item2)
                          <option value="$item2->id_commerce">{{ $item2->name  }}</option>
                      @endforeach
                    </select>
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