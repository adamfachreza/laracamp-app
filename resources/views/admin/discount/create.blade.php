@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card mt-3">
                <div class="card-header">
                   Discount
                </div>
                <div class="card-body">
                    <form action="{{route('admin.discount.store')}}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control {{$errors->has('name' ? 'is-invalid' : '')}}" name="name" id="name" value="{{old('name')}}" required>
                            @if ($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Code</label>
                            <input type="text" class="form-control {{$errors->has('code' ? 'is-invalid' : '')}}" name="code" id="code" value="{{old('code')}}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" cols="0" rows="2" class="form-control {{$errors->has('description' ? 'is-invalid' : '')}}" >{{old('description')}}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control {{$errors->has('percentage' ? 'is-invalid' : '')}}" name="percentage" id="percentage" min="1" max="100" value="{{old('percentage')}}" required>
                        </div>
                        <div class="form-group mb-4">
                           <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
