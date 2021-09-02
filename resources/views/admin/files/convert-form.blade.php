@extends('admin.layouts.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chuyển đồi file pdf sang ảnh</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Form chuyển đổi</div>
                            @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class') }} text-center">{{ Session::get('message') }}</p>
                            @endif
                            <div class="card-body">
                                <form method="POST" action="" id="fileUploadForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="pdf_file" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>
            
                                        <div class="col-md-6">
                                            <input name="pdf_file" id="pdf_file" type="file" class="form-control @error('pdf_file') is-invalid @enderror" value="{{ old('pdf_file') }}" autocomplete="pdf_file" autofocus>
                                            @error('pdf_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('THỰC HIỆN') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection