@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('logistical_Store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Title 1</label>
                                        <input type="text" class="form-control" placeholder="Title 1" name="title_1"
                                            value="{{ old('title_1') }}">
                                        <span class="text-danger">
                                            @error('title1')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Title 2</label>
                                        <input type="text" class="form-control" placeholder="Title 2" name="title_2"
                                            value="{{ old('title_2') }}">
                                        <span class="text-danger">
                                            @error('title_2')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Description</label>
                                        <textarea class="form-control editor" placeholder="Description"
                                            name="description">{{ old('description') }}</textarea>
                                        <span class="text-danger">
                                            @error('description')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Image</label>
                                        <input type="file" class="form-control" placeholder="Image" name="image"
                                            value="{{ old('image') }}">
                                        <span class="text-danger">
                                            @error('image')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                               
 
                            </div>
                            <div class="form-check mb-7">
                                <button class="btn btn-sm btn-info" type="submit">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection