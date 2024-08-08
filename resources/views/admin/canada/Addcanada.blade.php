@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('Canada_Store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-50">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Title" name="title"
                                            value="{{ old('title') }}">
                                        <span class="text-danger">
                                            @error('title')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="form-check mb-7">
                                <button class="btn btn-sm btn-info" type="submit">Create</button>
                            </div>

                </form>
            </div>
        </div>
    </div>

</div>


@endsection