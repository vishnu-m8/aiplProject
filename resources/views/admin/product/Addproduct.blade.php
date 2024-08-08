@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('product_Store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Title" name="title" id="title" value="{{ old('title') }}">
                                        <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}">
                                        <span class="text-danger">
                                            @error('title')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3 mt-3 w-100">
                                    <label>Image</label>
                                        <input type="file" class="form-control" placeholder="Image" name="image" value="{{ old('image') }}" accept="image/*">
                                        <span class="text-danger">
                                            @error('image')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Description</label>
                                        <textarea class="form-control editor" placeholder="Description" name="description"></textarea>
                                        <span class="text-danger">
                                            @error('description')
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const titleInput = document.getElementById("title");
        const slugInput = document.getElementById("slug");
        
        titleInput.addEventListener("input", function() {
            const titleValue = titleInput.value;
            const slugValue = titleValue
            .toLowerCase()
            .replace(/ /g, "-")
            .replace(/[^\w-]/g, "");
            
            slugInput.value = slugValue;
        });
    });
</script>


@endsection