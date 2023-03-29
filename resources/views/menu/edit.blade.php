@extends('layout.layout')


@section('content')
<section>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2 ">
                <h2>Add New Menu</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('menu.index') }}"> All Post</a>
            </div>
        </div>
    </div>

    <div >
        <div class="card-body">

            @if ($errors->any())
                <div class="mt-2 alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  


        <form action="{{ route('menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
            <input type="hidden" name="id" value="{{$menu->id}}">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Title</strong>
                        <input value="{{$menu->title}}" type="text" name="title" class="form-control" placeholder="Menu Title">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Description</strong>
                        <textarea class="form-control" placeholder="Menu Description" name="description" id="description" cols="100" rows="3">{{$menu->description}}</textarea>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image</strong>
                            <input type="file" name="images" class="form-control" placeholder="Uplpoad Images">
                            <img class="mt-2" src="{{asset($menu->images)}}" width="300px">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Price</strong>
                        <textarea class="form-control" placeholder="Menu Price" name="price" id="price" cols="100" rows="3">{{$menu->price}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update menu</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection
