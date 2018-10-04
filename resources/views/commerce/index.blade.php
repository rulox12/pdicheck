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
      <form method="POST" action="{{ route('createcomm') }}">
          <div class="form-group">
              @csrf
              <label for="name">NIT:</label>
              <input type="text" class="form-control" name="nit"/>
          </div>
          <div class="form-group">
              <label for="price">Nombre :</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear Comercio</button>
      </form>
  </div>
</div>
@endsection