@extends('layouts.main_admin')

@section('content')
<style>
    #example_wrapper {
        overflow-x: scroll !important;
    }

    .btn.btn-sm {
        font-size: 12px;
        line-height: 13px;
        padding: 5px 9px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <div class="card-body">
                    <!-- Your table and scripts go here -->
                    <div class="box-content">
                        <div class="text-right">
                            <a class="btn btn-sm btn-info" href="{{ route('project_Add') }}">Add
                                Project
                            </a>
                        </div>
                        <table id="example" class="table table-striped table-bordered display" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Title</th>
                                    <th>Client</th>
                                    <th>Consultant</th>
                                    <th>Area</th>
                                    <th>Project Type</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Home Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects_details as $banner)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $banner->title }}</td>
                                    <td>
                                        @if(isset($banner->client))
                                            {{ $banner->client }}
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($banner->consultant))
                                            {{ $banner->consultant }}
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($banner->area))
                                            {{ $banner->area }}
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($banner->project_type))
                                            {{ $banner->project_type }}
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($banner->description))
                                            {!! $banner->description !!}
                                        @else
                                            NA
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('public/projects/image/'.$banner->image) }}" target="_blank">
                                            <img src="{{ asset('public/projects/image/' . $banner->image) }} "
                                                style="height:50px; width:50px;" />
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('project_Action',['id' => $banner->id]) }}"
                                            class="btn btn-sm btn-{{ $banner->status ? 'success' : 'danger' }}"
                                            onclick="event.preventDefault(); document.getElementById('update-status-form-{{ $banner->id }}').submit();">
                                            {{ $banner->status ? 'Active ' : 'InActive ' }}
                                        </a>

                                        <form id="update-status-form-{{ $banner->id }}"
                                            action="{{ route('project_Action',['id' => $banner->id]) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('project_Edit', ['id' => $banner->id] ) }}"><i
                                                class="fa fa-edit" style="color:blue"></i></a>
                                        <a onclick="return confirm('Are you sure?')"
                                            href="{{ route('project_Destory',['id' => $banner->id]) }}"><i
                                                class="fa fa-trash" style="color:red"></i></a>
                                        @csrf
                                        <a href="{{ route('project_Image', ['id' => $banner->id] ) }}"><i
                                        class="fa fa-image fa-2x" style="color:orange" title="Project Images"></i></a>
                                    </td>

                                    <td>

                                        <form action="{{ route('projects.activate', ['id' => $banner->id]) }}"
                                            method="post" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                {{ $banner->home_status ? 'disabled' : '' }}>Show Home Page</button>
                                        </form>
                                        <form action="{{ route('projects.deactivate', ['id' => $banner->id]) }}"
                                            method="post" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                {{ $banner->home_status ? '' : 'disabled' }}>Hide Home Page</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>








@endsection