@extends('admin.layouts.main')
@section('css')
    <link href="{{ asset('adminthame/css/book-form.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold h6 text-primary">Thêm mới sách</h3>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-2">
                <form action="{{ route('book.store') }}" method="post" class="mt-4 mb-4"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-dark font-weight-bold" for="exampleInputTitle">Tên sách</label><br>
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                        <input type="text" class="form-control" id="exampleInputTitle" placeholder="Tên sách" name="title"
                            value="{{ old('title') }}"> 
                    </div>
                    <div class="form-group">
                        <label class="text-dark font-weight-bold" for="exampleInputFile">Ảnh bìa sách</label>
                        <button type="button" class="btn btn-primary mb-2 btn-sm" data-toggle="modal"
                            data-target="#exampleModal">
                            Chọn ảnh
                        </button><br>
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                        <div class="show_image" class="mb-2">
                            <img src="" id="show_img" width="200" alt="" value="{{ old('image') }}">
                        </div>
                        <input type="text" id="image" name="image" hidden class="form-control">

                    </div>
                    <div class="form-group">
                        <label class="text-dark font-weight-bold" for="exampleInputFile">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text-dark font-weight-bold" for="exampleInputFile">Danh mục</label>
                        <br>
                        @if ($errors->has('cate_id'))
                            <div class="text-danger">{{ $errors->first('cate_id') }}</div>
                        @endif
                        <select id="choices-multiple-remove-button" name="cate_id[]" class="form-control"
                            placeholder="Chọn tối đa 5 danh mục" multiple>
                            @foreach ($cates as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text-dark font-weight-bold" for="exampleInputFile">Tác giả</label>
                        <br>
                        @if ($errors->has('author_id'))
                            <div class="text-danger">{{ $errors->first('author_id') }}</div>
                        @endif
                        <select id="choices-multiple-remove-button" name="author_id[]" class="form-control"
                            placeholder="Chọn tối đa 5 tác giả" multiple>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text-dark font-weight-bold">Audio file(Nếu có)</label>
                        <button type="button" class="btn btn-primary mb-2 btn-sm " data-toggle="modal"
                            data-target="#audio_gallery">
                            Chọn file
                        </button>
                        <div class="audio-gallery" class="mb-2">

                        </div>
                        @if ($errors->has('list_audio'))
                            <span class="text-danger">{{ $errors->first('list_audio') }}</span>
                        @endif
                        <input type="hidden" id="list_audio" name="list_audio" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label class="text-dark font-weight-bold">Nội dung sách</label>
                        <button type="button" class="btn btn-primary mb-2 btn-sm " data-toggle="modal"
                            data-target="#image_gallery">
                            Chọn ảnh
                        </button><br>
                        @if ($errors->has('list_image'))
                            <span class="text-danger">{{ $errors->first('list_image') }}</span>
                        @endif
                        <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2 img-gallery"> 
                        </div>
                        <input type="hidden" id="list_image" name="list_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="text-dark font-weight-bold" for="exampleInputDesc">Thông tin chi tiết</label><br>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                        <textarea type="text" class="form-control tinymce-editor" id="exampleInputDesc" rows="15"
                            placeholder="Nhập thông tin chi tiết" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-dark font-weight-bold" for="exampleInputDate">Ngày đăng</label><br>
                        @if ($errors->has('publish_date_from'))
                            <span class="text-danger">{{ $errors->first('publish_date_from') }}</span>
                        @endif
                        <input type="date" class="form-control" id="exampleInputDate" name="publish_date_from"
                            value="{{ old('publish_date_from') }}">

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary  btn-sm shadow-lg">Thêm mới</button>
                        <a href="{{ route('book.index') }}" class="btn btn-danger  btn-sm  shadow">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thư viện ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe
                        src="{{ url('') }}/filemanager/dialog.php?field_id=image&lang=en_EN&akey=urDy9RR9agzmDEQw7u7gPO6qee"
                        frameborder="0" width="100%" height="500"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary ">Lưu</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="image_gallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thư viện ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe
                        src="{{ url('') }}/filemanager/dialog.php?field_id=list_image&lang=en_EN&akey=urDy9RR9agzmDEQw7u7gPO6qee"
                        frameborder="0" width="100%" height="500"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Lưu</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal audio -->
    <div class="modal fade" id="audio_gallery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quản lý file</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe
                        src="{{ url('') }}/filemanager/dialog.php?field_id=list_audio&lang=en_EN&akey=urDy9RR9agzmDEQw7u7gPO6qee"
                        frameborder="0" width="100%" height="500"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Lưu</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('adminthame/js/book-form.js') }}"></script>
@endsection
