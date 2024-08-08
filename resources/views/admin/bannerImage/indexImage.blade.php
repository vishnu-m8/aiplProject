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
                            <a class="btn btn-sm btn-info" href="{{ route('bannerImageAdd') }}">Add
                               Image
                                </a>
                            </div>
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bannerData as $bannerImg)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $bannerImg->title }}</td>
                                        <td>{{ $bannerImg->description }}</td>
                                        <td>
                                            <a href="{{ asset('public/banner/image/'.$bannerImg->image) }}" target="_blank">
                                                <img src="{{ asset('public/banner/image/' . $bannerImg->image) }} "
                                                    style="height:50px; width:50px;" />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('banneActionUpdate', ['id' => $bannerImg->id] ) }}"
                                                class="btn btn-sm btn-{{ $bannerImg->status ? 'success' : 'danger' }}"
                                                onclick="event.preventDefault(); document.getElementById('update-status-form-{{ $bannerImg->id }}').submit();">
                                                {{ $bannerImg->status ? 'Active ' : 'InActive ' }}
                                            </a>

                                            <form id="update-status-form-{{ $bannerImg->id }}"
                                                action="{{ route('banneActionUpdate', ['id' => $bannerImg->id] ) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('bannerImageEdit', ['id' => $bannerImg->id] ) }}"><i
                                                    class="fa fa-edit" style="color:blue"></i></a>
                                            <a onclick="return confirm('Are you sure?')"
                                                href="{{ route('bannerImageDestory', ['id' => $bannerImg->id] ) }}"><i
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