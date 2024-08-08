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
                            <a class="btn btn-sm btn-info" href="{{ route('product_Add') }}">Add
                                   Product
                                </a>
                            </div>
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Product as $banner)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>
                                            <a href="{{ asset('public/product/image/'.$banner->image) }}" target="_blank">
                                                <img src="{{ asset('public/product/image/' . $banner->image) }} "
                                                    style="height:50px; width:50px;" />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('product_Action',['id' => $banner->id]) }}"
                                                class="btn btn-sm btn-{{ $banner->status ? 'success' : 'danger' }}"
                                                onclick="event.preventDefault(); document.getElementById('update-status-form-{{ $banner->id }}').submit();">
                                                {{ $banner->status ? 'Active ' : 'InActive ' }}
                                            </a>

                                            <form id="update-status-form-{{ $banner->id }}"
                                                action="{{ route('product_Action',['id' => $banner->id]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('product_Edit', ['id' => $banner->id] ) }}"><i
                                                    class="fa fa-edit fa-2x" style="color:blue" title="Edit Product"></i></a>
                                            <a href="{{ route('show_product_images', ['id' => $banner->id] ) }}"><i
                                                    class="fa fa-image fa-2x" style="color:orange" title="Product Images"></i></a>
                                            <a href="{{ route('show_product_projects', ['id' => $banner->id] ) }}"><i
                                                    class="fa fa-plus fa-2x" style="color:pink" title="Product Projects"></i></a>
                                            <a onclick="return confirm('Are you sure?')"
                                                href="{{ route('product_Destory',['id' => $banner->id]) }}"><i
                                                    class="fa fa-trash fa-2x" style="color:red" title="Delete Product"></i></a>
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