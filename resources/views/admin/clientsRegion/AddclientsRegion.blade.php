@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('clientsRegion_Store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
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
                               
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Team Member</label>
                                        <input class="form-control" placeholder="Team Member"
                                            name="team_member"value="{{ old('team_member') }}">
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
                                            name="team_details" value="{{ old('team_details') }}">
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
                                            name="project_details_1"value="{{ old('project_details_1') }}">
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
                                            name="project_number_1" value="{{ old('project_number_1') }}">
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
                                            name="project_details_2" value="{{ old('project_details_2') }}">
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
                                            name="project_number_2" value="{{ old('project_number_2')}}">
                                        <span class="text-danger">
                                            @error('project_number_2')
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