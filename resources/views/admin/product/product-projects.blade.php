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
                                <h4>Product Projects</h4>
                            </div>
                            <form method="post" action="{{ route('add_product_project') }}">
                                @csrf
                                <input type="hidden" name="product_id" value={{$product_id}}>
                                <div class="card-body">
                                    <div class="box-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 mt-3 w-100">
                                                <label>Add Project</label>
                                                    <select class="form-control" name="project_id" required>
                                                        <option value="">Select Project</option>
                                                        
                                                        @php
                                                            $list_projects  = DB::table('projects')
                                                                            ->where('status', '1')
                                                                            ->get();  
                                                        @endphp
                                                        
                                                        @foreach($list_projects AS $list_projects_ind)
                                                            <option value="{{ $list_projects_ind->id }}">{{ $list_projects_ind->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-md btn-info" type="submit" style="margin-top:5%;">Add Project</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Project Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(COUNT($list_product_projects) > 0)
                                        @foreach($list_product_projects as $list_product_projects_ind)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $list_product_projects_ind->title }}</td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure?')" href="{{ route('delete_product_project',['id' => $list_product_projects_ind->id]) }}"><i class="fa fa-trash fa-2x" style="color:red"></i></a>
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