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
                            <a class="btn btn-sm btn-info" href="{{ route('DesignDetail_Add') }}">Add
                                   Design details
                                </a>
                            </div>
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($designDetails as $banner)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{!! $banner->description !!}</td>
                                       
                                        <td>
                                            <a href="{{ route('DesignDetail_Action',['id' => $banner->id]) }}"
                                                class="btn btn-sm btn-{{ $banner->status ? 'success' : 'danger' }}"
                                                onclick="event.preventDefault(); document.getElementById('update-status-form-{{ $banner->id }}').submit();">
                                                {{ $banner->status ? 'Active ' : 'InActive ' }}
                                            </a>

                                            <form id="update-status-form-{{ $banner->id }}"
                                                action="{{ route('DesignDetail_Action',['id' => $banner->id]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('DesignDetail_Edit', ['id' => $banner->id] ) }}"><i
                                                    class="fa fa-edit" style="color:blue"></i></a>
                                            <a onclick="return confirm('Are you sure?')"
                                                href="{{ route('DesignDetail_Destory',['id' => $banner->id]) }}"><i
                                                    class="fa fa-trash" style="color:red"></i></a>
                                            @csrf
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