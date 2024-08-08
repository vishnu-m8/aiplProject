@extends('layouts.main_admin')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-30">
            <div class="card">
                <form method="post" action="{{ route('contact_Store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Call</label>
                                        <input type="text" class="form-control" placeholder="Call" name="call_us"
                                            value="{{ old('call_us') }}">
                                        <span class="text-danger">
                                            @error('call_us')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Our Hours</label>
                                        <textarea class="form-control editor" placeholder="Our Hours"
                                            name="our_hours">{{ old('our_hours') }}</textarea>
                                        @error('our_hours')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Mail Us</label>
                                        <input class="form-control" placeholder="Mail Us"
                                            name="mail_us" value="{{ old('mail_us') }}">
                                        <span class="text-danger">
                                            @error('mail_us')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-3 w-100">
                                        <label>Contact With Us</label>
                                        <input class="form-control" placeholder="Contact With Us"
                                            name="contact_with" value="{{ old('contact_with') }}">
                                        <span class="text-danger">
                                            @error('contact_with')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-check mb-7">
                                <button class="btn btn-sm btn-info" type="submit">Create</button>
                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>

</div>


@endsection