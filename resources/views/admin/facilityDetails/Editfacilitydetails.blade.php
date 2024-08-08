@extends('layouts.main_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
            <form method="post" action="{{ route('facilityDetails_Update',$data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-50">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Title" name="title"
                                        value="{{ $data->title }}">
                                        <span class="text-danger">
                                            @error('title')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-50">
                                        <label>Image</label>
                                        <img src="{{ asset('public/facilityDetails/icon/'.$data->image) }}" style="height:50px; width:50px;"
                                    alt="Current Image">
                                        <input type="file" class="form-control" placeholder="Image" name="image"
                                        value="{{ $data->title }}">
                                        <span class="text-danger">
                                            @error('image')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-check mb-7">
                                <button class="btn btn-sm btn-info" type="submit">update</button>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>

</div>


@endsection