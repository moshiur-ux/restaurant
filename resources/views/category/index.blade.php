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
            <div class="card">
                <div class="card-header">All Category


                <span class="float-right p-5">

<a href="{{route('Category.create')}}">

<button type="submit" class="btn btn-outline-secondary">

Add Category

</button>

</a>
</span>
                </div>

                <div class="card-body">

                <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @if(count($categories)>0)
    @foreach($categories as $key=>$category)

    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$category->name}}</td>
      <td>
        <a href="{{route('Category.edit',[$category->id])}}">@csrf

        <button class="btn btn-outline-success">Edit</button>
         </a>

      </td>
      <td>
      

       <form id="delete-form-{{ $category->id }}" method="POST"  action="{{route('Category.destroy',[$category->id])}}">@csrf
                    
                    {{method_field('DELETE')}}
  
                    </form>

      <a  href="#" onclick="if (confirm('Do you want to delete?'))
                
                {

                event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();

                }
                
                else
                  {
                    event.preventDefault();

                  }
                
                
                ">

              
                

          <button class="btn btn-outline-danger"  value="delete" type="submit">Delete</button>

          
    
                    </a>



      </td>
    </tr>

    @endforeach
    @else
    <td> No categories to display</td>
    @endif
    
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection