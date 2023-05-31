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
            <form action="{{route('Food.update',[$food->id])}}" method="post" enctype="multipart/form-data" >@csrf
           {{method_field('PUT')}}
            <div class="card">
                <div class="card-header">Update Food</div>

                <div class="card-body">

                <div class="form-group">
                    <label for="Name">
                     Name
                    </label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$food->name}}">
                    @error('name')
                        {{ $message }}
                    @enderror


                </div>

                <div class="form-group">
                    <label for="description">
                     Description
                    </label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                      
                    {{$food->description}}
                           </textarea>
                           @error('description')
                        {{ $message }}
                    @enderror


                </div>

                <div class="form-group">
                    <label for="price">
                     Price
                    </label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$food->price}}">

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
                     
                    <option value="{{$category->id}}"


                    @if($category->id==$food->category_id)
                    selected @endif
                    
                    >

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
