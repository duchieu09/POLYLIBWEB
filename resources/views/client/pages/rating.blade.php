@extends('client.layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/client/pages/rating.css') }}">
<link rel="stylesheet" href="{{ asset('css/client/pages/book-detail.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="book-rating__wrapper">
        <div class="row book-rating__header">
            <div class="col-md-12 ho-so-ca-nhan">
                <h2>Đánh giá của tôi</h2>
            </div>
        </div>
        <div class="data-tabs book-rating__content">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#all">Tất cả</a></li>
                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#da_danh_gia">Đã đánh giá</a></li>
                <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#chua_danh_gia">Chưa đánh giá</a></li>
            </ul>

            <div class="tab-content">
                <div id="all" class="tab-pane in active">
                    @foreach ($order as $user_order)
                    <table class="table table-bordered">
                        <div class="book-user-comment">
                            <tr>
                                <td width="100px">
                                    <div class="text-center">
                                        <a href="{{route('book.detail',$user_order->book->id)}}">
                                            <img width="70" src="{{ $user_order->book->image }}"
                                                alt="{{ $user_order->book->title }}">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <div class="book-user-comment__heading">
                                            <div class="book-user-comment__name">
                                                <a href="{{route('book.detail',$user_order->book->id)}}">
                                                    {{ $user_order->book->title }}
                                            </div>
                                            </a>
                                            <div class="book-user-comment__footer">
                                                <div class="book-user-comment__link">
                                                    <span class="book-star">
                                                        @for ($i=1; $i <= 5; $i++) @if (round($avg_rating,1)>=
                                                            round($i,1) )
                                                            <i class="fas fa-star"></i>
                                                            @else
                                                            <i class="far fa-star"></i>
                                                            @endif
                                                            @endfor
                                                            <span>
                                                </div>
                                                <div class="book-user-comment__date">
                                                    {{ date('d-m-Y', strtotime($user_order->created_at)) }}</div>
                                            </div>
                                            <div class="book-user-comment__content text-justify">
                                                @if($user_order->body != "")
                                                    {{ $user_order->body }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="book-rating__user__button">
                                        <a href="{{ route('book.review', $user_order->book_id) }}"
                                            class="btn btn-primary">
                                            Xem đánh giá
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </div>
                    </table>
                    @endforeach
                </div>
                <div id="da_danh_gia"  class="tab-pane">
                    @foreach ($user_rating as $user_rate)
                    <table class="table table-bordered">
                        @if ($user_rate->book)
                        <div class="book-user-comment">
                            <tr>
                                <td width="100px">
                                    <div class="text-center">
                                        <a href="{{route('book.detail',$user_rate->book->id)}}">
                                            <img width="70" src="{{ $user_rate->book->image }}"
                                                alt="{{ $user_rate->book->title }}">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <div class="book-user-comment__heading">
                                            <div class="book-user-comment__name">
                                                <a href="{{route('book.detail',$user_rate->book->id)}}">
                                                    {{ $user_rate->book->title }}
                                            </div>
                                            </a>
                                            <div class="book-user-comment__footer">
                                                <div class="book-user-comment__link">
                                                    <span class="book-star">
                                                        @for ($i=1; $i <= 5; $i++) @if (round($avg_rating,1)>=
                                                            round($i,1) )
                                                            <i class="fas fa-star"></i>
                                                            @else
                                                            <i class="far fa-star"></i>
                                                            @endif
                                                            @endfor
                                                            <span>
                                                </div>
                                                <div class="book-user-comment__date">
                                                    {{ date('d-m-Y', strtotime($user_rate->created_at)) }}</div>
                                            </div>
                                            <div class="book-user-comment__content text-justify">
                                                @if($user_rate->body != "")
                                                    {{ $user_rate->body }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="book-rating__user__button">
                                        <a href="{{ route('book.review', $user_rate->rateable_id) }}"
                                            class="btn btn-primary">
                                            Xem đánh giá
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </div>
                        @endif
                    </table>
                    @endforeach
                </div>
                <div id="chua_danh_gia"  class="tab-pane">
                    @foreach ($user_rating as $user_rate)
                        <div class="book-user-comment__name">
                            <a href="{{route('book.detail',$user_rate->book->id)}}">
                                {{ $user_rate->book->title }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection