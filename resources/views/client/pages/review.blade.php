@extends('client.layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/client/pages/book-order.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('bookStar') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="card border-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=""><img src="{{ asset($book->image) }}" width="100%" /></div>
                                    </div>
                                    <div class="card-body col-md-6">
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                        <div class="rating">
                                            <div class="form-group">
                                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0"
                                                    data-max="5" data-step="1" value="" data-size="xs" value="{{old('rate')}}">
                                            </div>
                                            <input type="hidden" name="id" required="" value="{{ $book->id }}">
                                            <div class="form-group">
                                                <label for="rating-body">Nội dung phản hồi</label>
                                                <textarea name="body" id="" class="form-control" rows="10"
                                                    id="rating-body">{{old('body')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success">Đánh giá</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
