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
            <form action="{{route('Category.store')}}" method="post">@csrf

            <div class="card">
                <div class="card-header">Manage Item Category</div>

                <div class="card-body">
                   
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                    
                                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                </div>

                <div class="form-group p-2">
                    <button class="btn btn-outline-primary">Submit</button>

                </div>
                



                </div>
            </div>
</form>
        </div>
    </div>
</div>
@endsection
