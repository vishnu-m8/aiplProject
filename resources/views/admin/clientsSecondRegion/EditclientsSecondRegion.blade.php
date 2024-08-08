@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
            <form method="post" action="{{ route('clientsSecond_Update',$data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
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
                                        <img src="{{ asset('public/clientsRegionSecond/image/'.$data->image) }}" style="height:50px; width:50px;"
                                    alt="Current Image">
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
                                            name="description">{{ $data->description}}</textarea>
                                        @error('description')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Team Member</label>
                                        <input class="form-control" placeholder="Team Member"
                                            name="team_member"value="{{ $data->team_member }}">
                                        <span class="text-danger">
                                            @error('team_member')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Team Details</label>
                                        <input class="form-control" placeholder="Team Details"
                                            name="team_details" value="{{ $data->team_details }}">
                                        <span class="text-danger">
                                            @error('team_details')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Project Details 1</label>
                                        <input class="form-control" placeholder="Project Details 1"
                                            name="project_details_1"value="{{ $data->project_details_1 }}">
                                        <span class="text-danger">
                                            @error('project_details_1')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Project Number 1</label>
                                        <input class="form-control" placeholder="Project Number 1"
                                            name="project_number_1" value="{{ $data->project_number_1 }}">
                                        <span class="text-danger">
                                            @error('project_number_1')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Project Details 2</label>
                                        <input class="form-control" placeholder="Project Details 2"
                                            name="project_details_2" value="{{ $data->project_details_2 }}">
                                        <span class="text-danger">
                                            @error('project_details_2')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Project Number 2</label>
                                        <input class="form-control" placeholder="Project Number 2"
                                            name="project_number_2" value="{{ $data->project_number_2}}">
                                        <span class="text-danger">
                                            @error('project_number_2')
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