@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('project_Update',$data->id) }}" enctype="multipart/form-data">
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
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Image</label>
                                        <img src="{{ asset('public/projects/image/'.$data->image) }}"
                                            style="height:50px; width:50px;" alt="Current Image">
                                        <input type="file" class="form-control" placeholder="Image" name="image"
                                            value="{{ $data->image }}" accept="image/*">
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
                                            value="{{ $data->client }}">
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
                                        <input class="form-control" placeholder="Consultant" name="consultant"
                                            value="{{ $data->consultant }}">
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
                                        <input class="form-control" placeholder="Area" name="area"
                                            value="{{ $data->area }}">
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
                                            <option value="" disabled selected>Select Project Type</option>
                                            <option value="india"
                                                {{ $data->project_type === 'india' ? 'selected' : '' }}>India Project
                                            </option>
                                            <option value="international"
                                                {{ $data->project_type === 'international' ? 'selected' : '' }}>
                                                International Project</option>
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