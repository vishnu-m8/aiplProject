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
                            <div class="text-left">
                                <h4>Product Images</h4>
                            </div>
                            <form method="post" action="{{ route('add_product_image') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value={{$product_id}}>
                                <div class="card-body">
                                    <div class="box-content">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="mb-3 mt-3 w-100">
                                                <label>Add Image</label>
                                                    <input type="file" class="form-control" placeholder="Upload Image" name="img_src" accept="image/*" required>
                                                    <span class="text-danger">
                                                        @error('image')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-md btn-info" type="submit" style="margin-top:19%;">Add Image</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(COUNT($list_product_images) > 0)
                                        @foreach($list_product_images as $list_product_images_ind)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    <a href="{{ asset('public/product/image/'.$list_product_images_ind->img_src) }}" target="_blank">
                                                        <img src="{{ asset('public/product/image/' . $list_product_images_ind->img_src) }} "
                                                            style="height:50px; width:50px;" />
                                                    </a>
                                                </td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure?')" href="{{ route('delete_product_image',['id' => $list_product_images_ind->id]) }}"><i class="fa fa-trash fa-2x" style="color:red"></i></a>
                                                    @csrf
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
    										<td colspan="3" class="text-danger text-center">No Images Found!</td>
    									</tr>
                                    @endif
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