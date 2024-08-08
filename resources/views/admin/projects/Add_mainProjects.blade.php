@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('project_Store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-12">
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
                                            value="{{ old('image') }}" accept="image/*">
                                        <span class="text-danger">
                                            @error('image')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Client</label>
                                        <input class="form-control" placeholder="Client" name="client"
                                            value="{{ old('client') }}">
                                        <span class="text-danger">
                                            @error('client')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Consultant</label>
                                        <input class="form-control" placeholder="Consultant"
                                            name="consultant" value="{{ old('consultant') }}">
                                        <span class="text-danger">
                                            @error('consultant')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Area</label>
                                        <input class="form-control" placeholder="Area"
                                            name="area" value=" {{old('area') }}">
                                        <span class="text-danger">
                                            @error('area')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label for="projectType">Project Type</label>
                                        <select class="form-control" name="project_type">
                                            <option value="" disabled selected>Select Your City</option>
                                            <option value="india">India Project</option>
                                            <option value="international">International Project</option>
                                        </select>
                                        <span class="text-danger">
                                            @error('project_type')
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