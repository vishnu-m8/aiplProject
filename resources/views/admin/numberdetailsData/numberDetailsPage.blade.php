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
                                        <th>Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($numberdetails as $banner)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->number }}</td>
                                        
                                        <td>
                                            <a href="{{ route('numberDetails_Edit', ['id' => $banner->id] ) }}"><i
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