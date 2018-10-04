@extends('admin.layout')

@section('content')
  <style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
  	Crear Comercio
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="">
        
          <h2>Sitio</h2>
        <br>
       <div class="form-group">
                <div class="row">
                  <div class="col-sm-6" >
                    <label for="price">Nombre :</label>
                    <input type="text" class="form-control" name="name" required />
                </div>
                  <div class="col-sm-6" >
                    <label for="price">Comercio :</label>
                    <select type="text" class="form-control" name="commerce" required >
                      @foreach ($commerce as $item2)
                          <option value="$item2->id_commerce">{{ $item2->name  }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Crear Transaccion</button>
      </form>
  </div>
</div>

@endsection