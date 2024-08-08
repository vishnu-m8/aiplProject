@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
            <form method="post" action="{{ route('experience_logo_update',$data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Icon</label>
                                        <img src="{{ asset('public/exp_logo/icon/'.$data->icon) }}" style="height:50px; width:50px;"
                                    alt="Current Image">
                                        <input type="file" class="form-control" placeholder="Icon" name="icon"
                                            value="{{ old('icon') }}" accept="icon/*">
                                        <span class="text-danger">
                                            @error('icon')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Title"
                                            name="title" value="{{ $data->title }}">
                                        <span class="text-danger">
                                            @error('title')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Number</label>
                                        <input type="text" class="form-control" placeholder="Number"
                                            name="number" value="{{ $data->number }}">
                                        <span class="text-danger">
                                            @error('number')
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
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection