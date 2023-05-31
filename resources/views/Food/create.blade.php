@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
            {{Session::get('message')}}

             </div>
           
            @endif
            <form action="{{route('Food.store')}}" method="post" enctype="multipart/form-data" >@csrf

            <div class="card">
                <div class="card-header">Add New Food


                
                </div>

                <div class="card-body">

                <div class="form-group">
                    <label for="Name">
                     Name
                    </label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        {{ $message }}
                    @enderror


                </div>

                <div class="form-group">
                    <label for="description">
                     Description
                    </label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">

                           </textarea>
                           @error('description')
                        {{ $message }}
                    @enderror


                </div>

                <div class="form-group">
                    <label for="price">
                     Price
                    </label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">

                    @error('price')
                        {{ $message }}
                    @enderror


                </div>

                <div class="form-group">
                    <label for="Name">
                     Category
                    </label>
                    
                    <select name="category" class="form-control @error('category') is-invalid @enderror">
    

                    <option value=""> Select Category</option>

                    @foreach(App\Models\Category::all() as $category)
                     
                    <option value="{{$category->id}}">

                    {{$category->name}}


                    </option>
                  
                    @endforeach


                   

                    </select>
                    @error('category')
                    {{ $message }}
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">
                     Image
                    </label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        {{ $message }}
                    @enderror


                </div>

                <div class="form-group p-2">
                  <button type="submit" class="btn btn-outline-primary">

                  Submit

                  </button>
                </div>

                  
                </div>
            </div>
</form>
        </div>
    </div>
</div>
@endsection
