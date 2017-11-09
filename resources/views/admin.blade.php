@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create post</div>

                <div class="panel-body">

                    @if (isset($good))
                        <div class="alert alert-success">
                            <ul>
                                    <li>{{ $good }}</li>
                            </ul>
                        </div>
                    @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('create') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputTitle">Title</label>
                                <input name="title" type="text" class="form-control" id="exampleInputTitle" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPreview">Preview</label>
                                <input name="preview" type="text" class="form-control" id="exampleInputPreview" placeholder="Preview">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText">Text</label>
                                <textarea name="text" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="img">Select image</label>
                                <input  name="image" type="file" id="img">
                            </div>
                            <button  type="submit" class="btn btn-default">Add post</button>
                            {{ csrf_field() }}
                        </form>
            </div>
        </div>
    </div>
</div>
@endsection
