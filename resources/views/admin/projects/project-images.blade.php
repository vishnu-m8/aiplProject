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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="box-content">
                        <div class="text-left">
                            <h4>Project Images</h4>
                        </div>
                        <form method="post" action="{{ route('project_Image_add', ['id' => $project_id]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="project_id" value={{$project_id}}>
                            <div class="card-body">
                                <div class="box-content">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3 mt-3 w-100">
                                                <label>Add Image</label>
                                                <input type="file" class="form-control" name="img_src" accept="image/*" required>
                                                <span class="text-danger">
                                                    @error('img_src')
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
                            @if(COUNT($list_project_images) > 0)
                                @foreach($list_project_images as  $image)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                        <a href="{{ asset('public/project_src/image/'.$image->img_src) }}" target="_blank">
                                                <img src="{{ asset('public/project_src/image/' . $image->img_src) }} "
                                                    style="height:50px; width:50px;" />
                                            </a>
                                        </td>
                                        <td>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('delete_project_image',['id' => $image->id]) }}"><i class="fa fa-trash fa-2x" style="color:red"></i></a>
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
@endsection
