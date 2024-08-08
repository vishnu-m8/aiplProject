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
                            
                            </div>
                            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Title</th>
                                        <th>Team Member</th>
                                        <th>Team Details</th>
                                        <th>Project Details1</th>
                                        <th>Project Number1</th>
                                        <th>Project Details2</th>
                                        <th>Project Number2</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clientsRegion as $banner)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->team_member }}</td>
                                        <td>{{ $banner->team_details }}</td>
                                        <td>{{ $banner->project_details_1 }}</td>
                                        <td>{{ $banner->project_number_1 }}</td>
                                        <td>{{ $banner->project_details_2 }}</td>
                                        <td>{{ $banner->project_number_2 }}</td>
                                        <td>{!! $banner->description !!}</td>
                                        <td>
                                            <a href="{{ asset('public/clientsRegion/image/'.$banner->image) }}" target="_blank">
                                                <img src="{{ asset('public/clientsRegion/image/' . $banner->image) }} "
                                                    style="height:50px; width:50px;" />
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('clientsRegion_Edit', ['id' => $banner->id] ) }}"><i
                                                    class="fa fa-edit" style="color:blue"></i></a>
                                            
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