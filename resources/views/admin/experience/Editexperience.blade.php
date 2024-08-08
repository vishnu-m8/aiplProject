@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
            <form method="post" action="{{ route('experience_update',$data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Happy Client</label>
                                        <input type="text" class="form-control" placeholder="Title" name="happy_client"
                                        value="{{ $data->happy_client }}">
                                        <span class="text-danger">
                                            @error('happy_client')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Year of Experience</label>
                                        <input type="text" class="form-control" placeholder="Description"
                                            name="year_of_experience" value=" {{ $data->year_of_experience }}">
                                        @error('year_of_experience')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Product Supplied</label>
                                        <input type="text" class="form-control" placeholder="Product Supplied"
                                            name="product_supplied" value="{{ $data->product_supplied }}">
                                        <span class="text-danger">
                                            @error('product_supplied')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" placeholder="Meta Description"
                                            name="meta_description">{{ old('meta_description') }}</textarea>
                                        <span class="text-danger">
                                            @error('meta_description')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Meta Keyword</label>
                                        <textarea class="form-control" placeholder="Meta Keyword"
                                            name="meta_keyword">{{ old('meta_keyword') }}</textarea>
                                        <span class="text-danger">
                                            @error('meta_keyword')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-check mb-7">
                                <button class="btn btn-sm btn-info" type="submit">Update</button>
                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>

</div>


@endsection