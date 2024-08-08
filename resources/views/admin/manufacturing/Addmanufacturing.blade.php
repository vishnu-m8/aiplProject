@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('manufacturing_Store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Highlight</label>
                                        <input type="text" class="form-control" placeholder="Highlight" name="highlight"
                                            value="{{ old('highlight') }}">
                                        <span class="text-danger">
                                            @error('highlight')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
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
                                <div class="col-md-12">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Description</label>
                                        <textarea class="form-control editor" placeholder="Description"
                                            name="description"></textarea>
                                        @error('description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <!-- <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Meta Title</label>
                                        <textarea class="form-control" placeholder="Meta Title"
                                            name="meta_title">{{ old('meta_title') }}</textarea>
                                        <span class="text-danger">
                                            @error('meta_title')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" placeholder="Meta Description"
                                            name="meta_description">{{ old('meta_description') }}</textarea>
                                        <span class="text-danger">
                                            @error('meta_description')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Meta Keyword</label>
                                        <textarea class="form-control" placeholder="Meta Keyword"
                                            name="meta_keyword">{{ old('meta_keyword') }}</textarea>
                                        <span class="text-danger">
                                            @error('meta_keyword')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div> -->
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