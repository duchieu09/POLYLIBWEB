@extends('client.layouts.index')
@section('css')
<link rel="stylesheet" href="{{ asset('css/client/pages/post-form.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@endsection
@section('title', 'PolyLib')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class') }} text-center">{{ Session::get('message') }}</p>
            @endif
            <!-- <form action="{{ route('post.store') }}" method="post" id="postForm" enctype="multipart/form-data"> -->
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="thumbnail">Tiêu đề bài viết</label><br>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <input id="my-input" class="form-control" type="text" name="title" placeholder="Nhập tiêu đề">
                </div>

                <div class="form-group">
                    <label for="thumbnail">Chọn ảnh đại diện bài viết</label>
                    <br>
                    @if ($errors->has('thumbnail'))
                        <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                    @endif
                    <input type="file" id="thumbnail" name="thumbnail">
                    <br>
                </div>
                <div class="form-group">
                    <label class="text-dark font-weight-bold" for="exampleInputFile">Danh mục</label>
                    <br>
                    <select id="choices-multiple-remove-button" name="cate_id[]" placeholder="Chọn tối đa 5 danh mục" multiple>
                        @foreach ($cates as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Đính kèm tệp (Nếu có)</h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="faqs" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>File</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="file_title[]" placeholder="tên file"></td>
                                        <td><input type="file" name="file_upload[]"></td>
                                        <td class="mt-10"><a href="javascript:;" class="badge bg-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center"><a href="javascript:;" onclick="addfaqs();" class="badge bg-success"><i class="fa fa-plus"></i> ADD NEW</a></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-dark font-weight-bold" for="exampleInputName">Nội dung</label><br>
                    @if ($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                    <textarea name="content" id="exampleInputDesc" rows="15" class="form-control" placeholder="Nội dung">
                    </textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark btn-sm shadow-lg">Lưu</button>
                    <a href="{{route('cate.index')}}" class="btn btn-danger btn-sm shadow">Hủy</a>
                </div>
            </form>
            <div class="mt-4" id="progress" style="display: none">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>
            </div>
            <div class="alert alert-success text-center" id="progress-arlert" style="display: none">Thêm sách thành công !</div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://cdn.tiny.cloud/1/z61mklx0qjtdxp2smr8tj2bcs3dkzef4894ven0bm30q2dv9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    $(document).ready(function() {

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 5,
            searchResultLimit: 5,
            renderChoiceLimit: 5
        });

    });


    tinymce.init({
        selector: 'textarea#exampleInputDesc',
        plugins: 'print preview searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',

        codesample_languages: [{
                text: 'HTML/XML',
                value: 'markup'
            },
            {
                text: 'JavaScript',
                value: 'javascript'
            },
            {
                text: 'CSS',
                value: 'css'
            },
            {
                text: 'PHP',
                value: 'php'
            },
            {
                text: 'Ruby',
                value: 'ruby'
            },
            {
                text: 'Python',
                value: 'python'
            },
            {
                text: 'Java',
                value: 'java'
            },
            {
                text: 'C',
                value: 'c'
            },
            {
                text: 'C#',
                value: 'csharp'
            },
            {
                text: 'C++',
                value: 'cpp'
            }
        ],
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',

        tinycomments_author: 'Author name',
        external_filemanager_path: "/filemanager/",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {
            "filemanager": "/filemanager/plugin.min.js"
        },
        tinycomments_mode: 'embedded',
    });

    var faqs_row = 0;

    function addfaqs() {
        html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><input type="text" class="form-control" name="file_title[]" placeholder="tên file"></td>';
        html += '<td><input type="file" name="file_upload[]"></td>';
        // html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
        html += '<td class="mt-10"><button class="badge badge-danger bg-danger" onclick="$(\'#faqs-row' + faqs_row +
            '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }
</script>
@endsection