@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('logistical_Update',$data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Description</label>
                                        <textarea class="form-control editor" placeholder="Description"
                                            name="description">{{ $data->description }}</textarea>
                                        <span class="text-danger">
                                            @error('description')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Title 1</label>
                                        <input type="text" class="form-control" placeholder="Title 1" name="title_1"
                                            value="{{ $data->title_1 }}">
                                        <span class="text-danger">
                                            @error('title_1')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Title 2</label>
                                        <input type="text" class="form-control" placeholder="Title 2" name="title_2"
                                            value="{{ $data->title_2 }}">
                                        <span class="text-danger">
                                            @error('title_2')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Image</label>
                                        <img src="{{ asset('public/logistical/image/'.$data->image) }}"
                                            style="height:50px; width:50px;" alt="Current Image">
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
                                <button class="btn btn-sm btn-info" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection