@extends('bootstrap')
@section('title','crud')
@section('content')
<div class="container">
<h1 class="text-center my-3">Crud by laravel</h1>
<table class="table text-center my-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">image</th>
        <th scope="col">delete</th>
        <th scope="col">update</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($ards as $ard )
      <tr>
        <th scope="row">{{ $n++ }}</th>
        <td>{{ $ard->name }}</td>
        <td><img src="{{ $ard->image }}" style="width: 150px;height:150px" /></td>
        <td><form action="{{ route('delete',$ard->id ) }}" method="POST">
          @csrf
          <button class="btn btn-primary" name="delete">delete</button>
        </form></td>
        <td><a href="update/{{ $ard->id }}"><button class="btn btn-primary">update</button></a>
        </td>
      </tr>
      @endforeach  
    </tbody>
  </table>
  {{ $ards->links('pagination::bootstrap-5') }}
</div>
    <div class="container-fluid my-3">
        <h2 class="text-center">add crud</h2>
        <div class="row mt-5 d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="{{ route('create') }}" enctype="multipart/form-data" method="POST">
                  @csrf 
                  <div class="form-outline mb-4">
                        <label class="mb-1"> name</label> <input type="text" class="form-control"
                            placeholder="name"  
                            name="name" />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="mb-1">image</label> <input type="file" class="form-control"
                           name="image" />
                  </div>
                    <div class="text-center">
                        <button class="bg-info mb-3 py-2 px-3 border-0" name="save">save</button>                    </div>

                </form>
            </div>
        </div>
    </div>
</body>




 

@endsection