@extends('admin.layouts.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đánh giá</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }} text-center">
                        {{ Session::get('message') }}</p>
                @endif
                <div>   
                    <form action="" method="get" id="form-page-size">
                        <label for="">Chọn số bản ghi</label>
                        <select name="page_size" id="page_size">
                            <option value="5" @if ($pagesize==5) selected @endif>5</option>
                            <option value="10" @if ($pagesize==10) selected @endif>10</option>
                            <option value="15" @if ($pagesize==15) selected @endif>15</option>
                        </select>
                    </form>
                </div>
                <div class="data-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#home">Đánh giá đã duyệt
                            <span>({{count($ratings_approved)}})</span> </a></li>
                        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#menu1">Đánh giá chờ duyệt
                            <span>({{count($ratings_pending)}})</span></a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#menu2">Đánh giá bị xóa
                            <span>({{count($ratings_deleted)}})</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane in active">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>User</th>
                                        <th>Tên Sách</th>
                                        <th>@sortablelink('rating','Số điểm')</th>
                                        <th>@sortablelink('created_at','Ngày gửi')</th>
                                        <th>
                                            Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ratings_approved as $key => $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->user->email }}</td>
                                            <td>{{ $comment->book->title }}</td>
                                            <td>{{ $comment->body }}</td>
                                            <td>
                                                {{ date_format($comment->created_at, 'Y-m-d') }}
                                            </td>
                                            <td class="text-center">
                                                <a href="" class="fas fa-eye text-warning p-1 btn-action"></a>
                                                <a onclick="return confirm('Bạn chắc chắn muốn hủy bình luận này?')" href="{{route('comment.destroy',$comment->id)}}"
                                                    class="fas fa-trash text-danger p-1 btn-action"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $ratings_approved->links('vendor.pagination.bootstrap-4') !!}
                        </div>
                        <div id="menu1" class="tab-pane">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>@sortablelink('id','ID')</th>
                                        <th>email</th>
                                        <th>Tên Sách</th>
                                        <th>Nội dung</th>
                                        <th>@sortablelink('created_at','Ngày bình luận')</th>
                                        <th>
                                            Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($ratings_pending) > 0)
                                        @foreach ($ratings_pending as $key => $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>{{ $comment->user->email }}</td>
                                                <td>{{ $comment->book->title }}</td>
                                                <td>{{ $comment->body }}</td>
                                                <td>
                                                    {{ date_format($comment->created_at, 'Y-m-d') }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('comment.approv',$comment->id)}}" class="">Duyệt</a>
                                                    <a onclick="return confirm('Bạn chắc chắn muốn hủy bình luận này?')"
                                                        href="{{route('comment.destroy',$comment->id)}}" class="text-danger p-1 btn-action">Hủy</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">Không có bình luận nào !</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div id="menu2" class="tab-pane">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>@sortablelink('id','ID')</th>
                                        <th>email</th>
                                        <th>Tên Sách</th>
                                        <th>Nội dung</th>
                                        <th>@sortablelink('created_at','Ngày bình luận')</th>
                                        <th>
                                            Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($ratings_deleted) > 0)
                                        @foreach ($ratings_deleted as $key => $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>{{ $comment->user->email }}</td>
                                                <td>{{ $comment->book->title }}</td>
                                                <td>{{ $comment->body }}</td>
                                                <td>
                                                    {{ date_format($comment->created_at, 'Y-m-d') }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('comment.restore',$comment->id)}}" class="text-success">Phục hồi</a>
                                                    <a href="{{route('comment.forcedelete',$comment->id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa bình luận này?')" class="text-danger">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">Không có bình luận nào !</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-center">{!!$users->links('vendor.pagination.bootstrap-4')!!}</div> --}}
            </div>
        </div>
    </div>


@endsection
