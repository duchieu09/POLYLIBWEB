<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$book->title}}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/client/pages/reading-book.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/client/turn.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/ColonelParrot/ProtectImage.js@v1.2/src/ProtectImage.min.js"></script>

</head>
<!-- oncontextmenu="return false" -->

<body>
    <div class="topbar grid__full-width">
        <div class="topbar-item grid-custom">

            <div class="topbar__back">
                <a href="{{route('book.detail', ['slug' => $book->slug])}}"><i class="fas fa-reply"></i></a>
            </div>
            <div class="topbar__title">
                <h2>{{$book->title}}</h2>
            </div>
            <div class="topbar__tool">
                <div class="topbar-tool__item topbar-tool__display"><a href=""><i class="fas fa-eye"></i></a></div>
                <div class="topbar-tool__item topbar-tool__thumbnails"><a href=""><i class="fas fa-th-large"></i></a></div>
                <div class="topbar-tool__item topbar-tool__search">
                    <a href=""><i class="fas fa-search"></i></a>
                    <div class="dropdown-search ">
                        <form action="" id="search-form">
                            <input type="text" id="pageNumber" placeholder="Nhập số trang">
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="topbar-tool__item topbar-tool__list"><a href=""><i class="fas fa-list"></i></a></div>
                <div class="topbar-tool__item topbar-tool__bookmark"><a href=""><i class="far fa-bookmark"></i></a></div>
                <div id="toast"></div>

            </div>

        </div>
        <div class="topbar-aside hidden">
            <div class="topbar-aside__header">Danh sách trang sách</div>
            <div class="topbar-aside__list">

                <div class="topbar-aside__item">
                    @foreach($pages as $key => $p)
                    <a href="" class="aside-item__link">
                        <img class="aside-item__img" src="{{asset($p->url) }}" alt="" />
                    </a>
                    <div class="aside-item__footer">
                        {{$key+1}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="topbar-bookmark__wrap hidden">
            <div class="topbar-bookmark__header">
                <div class="bookmark-header__text">Bookmarks</div>
                <div class="bookmark-header__icon"><button><i class="fas fa-times"></i></button></div>
            </div>
            <div class="topbar-bookmark__body">
                <div class="topbar-bookmark__page">
                    <a href="">
                        <img src="https://books.google.com/books/publisher/content/reader?id=IGoEDgAAQBAJ&hl=en-GB&pg=PP1&img=1&zoom=1&subver=ACfU3U0Em1I3y_cVlVYc7Q7mkx0HhxJnBQ&sig=ACfU3U2ZDeTLeY4FbVY0AQHPs7xdWj6uog&source=ge-web-app&w=70" alt="">
                    </a>
                </div>
                <div class="topbar-bookmark__content">
                    <div class="topbar-content__page">
                        <a href="">
                            Trang số 6

                        </a>
                    </div>
                    <div class="topbar-content__time">
                        1 phút trước
                    </div>
                </div>
                <div class="topbar-bookmark__button">
                    <a href="" class="topbar-bookmark__button-link">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </div>
            </div>
            <div class="topbar-bookmark__body">
                <div class="topbar-bookmark__page">
                    <a href="">
                        <img src="https://books.google.com/books/publisher/content/reader?id=IGoEDgAAQBAJ&hl=en-GB&pg=PP1&img=1&zoom=1&subver=ACfU3U0Em1I3y_cVlVYc7Q7mkx0HhxJnBQ&sig=ACfU3U2ZDeTLeY4FbVY0AQHPs7xdWj6uog&source=ge-web-app&w=70" alt="">
                    </a>
                </div>
                <div class="topbar-bookmark__content">
                    <div class="topbar-content__page">
                        <a href="">
                            Trang số 213

                        </a>
                    </div>
                    <div class="topbar-content__time">
                        1 phút trước
                    </div>
                </div>
                <div class="topbar-bookmark__button">
                    <a href="" class="topbar-bookmark__button-link">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </div>
            </div>
            <div class="topbar-bookmark__body">
                <div class="topbar-bookmark__page">
                    <a href="">
                        <img src="https://books.google.com/books/publisher/content/reader?id=IGoEDgAAQBAJ&hl=en-GB&pg=PP1&img=1&zoom=1&subver=ACfU3U0Em1I3y_cVlVYc7Q7mkx0HhxJnBQ&sig=ACfU3U2ZDeTLeY4FbVY0AQHPs7xdWj6uog&source=ge-web-app&w=70" alt="">
                    </a>
                </div>
                <div class="topbar-bookmark__content">
                    <div class="topbar-content__page">
                        <a href="">
                            Trang số 2

                        </a>
                    </div>
                    <div class="topbar-content__time">
                        1 phút trước
                    </div>
                </div>
                <div class="topbar-bookmark__button">
                    <a href="" class="topbar-bookmark__button-link">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </div>
            </div>
            <div class="topbar-bookmark__body">
                <div class="topbar-bookmark__page">
                    <a href="">
                        <img src="https://books.google.com/books/publisher/content/reader?id=IGoEDgAAQBAJ&hl=en-GB&pg=PP1&img=1&zoom=1&subver=ACfU3U0Em1I3y_cVlVYc7Q7mkx0HhxJnBQ&sig=ACfU3U2ZDeTLeY4FbVY0AQHPs7xdWj6uog&source=ge-web-app&w=70" alt="">
                    </a>
                </div>
                <div class="topbar-bookmark__content">
                    <div class="topbar-content__page">
                        <a href="">
                            Trang số 3

                        </a>
                    </div>
                    <div class="topbar-content__time">
                        1 phút trước
                    </div>
                </div>
                <div class="topbar-bookmark__button">
                    <a href="" class="topbar-bookmark__button-link">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </div>
            </div>
            <div class="topbar-bookmark__body">
                <div class="topbar-bookmark__page">
                    <a href="">
                        <img src="https://books.google.com/books/publisher/content/reader?id=IGoEDgAAQBAJ&hl=en-GB&pg=PP1&img=1&zoom=1&subver=ACfU3U0Em1I3y_cVlVYc7Q7mkx0HhxJnBQ&sig=ACfU3U2ZDeTLeY4FbVY0AQHPs7xdWj6uog&source=ge-web-app&w=70" alt="">
                    </a>
                </div>
                <div class="topbar-bookmark__content">
                    <div class="topbar-content__page">
                        <a href="">
                            Trang số 4

                        </a>
                    </div>
                    <div class="topbar-content__time">
                        1 phút trước
                    </div>
                </div>
                <div class="topbar-bookmark__button">
                    <a href="" class="topbar-bookmark__button-link">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </div>
            </div>
            <div class="topbar-bookmark__body">
                <div class="topbar-bookmark__page">
                    <a href="">
                        <img src="https://books.google.com/books/publisher/content/reader?id=IGoEDgAAQBAJ&hl=en-GB&pg=PP1&img=1&zoom=1&subver=ACfU3U0Em1I3y_cVlVYc7Q7mkx0HhxJnBQ&sig=ACfU3U2ZDeTLeY4FbVY0AQHPs7xdWj6uog&source=ge-web-app&w=70" alt="">
                    </a>
                </div>
                <div class="topbar-bookmark__content">
                    <div class="topbar-content__page">
                        <a href="">
                            Trang số 5

                        </a>
                    </div>
                    <div class="topbar-content__time">
                        1 phút trước
                    </div>
                </div>
                <div class="topbar-bookmark__button">
                    <a href="" class="topbar-bookmark__button-link">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </div>
            </div>
            <div class="topbar-bookmark__body">
                <div class="topbar-bookmark__page">
                    <a href="">
                        <img src="https://books.google.com/books/publisher/content/reader?id=IGoEDgAAQBAJ&hl=en-GB&pg=PP1&img=1&zoom=1&subver=ACfU3U0Em1I3y_cVlVYc7Q7mkx0HhxJnBQ&sig=ACfU3U2ZDeTLeY4FbVY0AQHPs7xdWj6uog&source=ge-web-app&w=70" alt="">
                    </a>
                </div>
                <div class="topbar-bookmark__content">
                    <div class="topbar-content__page">
                        <a href="">
                            Trang số 13

                        </a>
                    </div>
                    <div class="topbar-content__time">
                        1 phút trước
                    </div>
                </div>
                <div class="topbar-bookmark__button">
                    <a href="" class="topbar-bookmark__button-link">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="space__between grid-custom ">
        <button id="previous"><i class="fas fa-angle-left"></i></button>

        <div id="flipbook">

            @foreach($pages as $p)
            <div class="flipbook-wrapper">
                <img class="flipbook-img" src="{{asset($p->url) }}" alt="" protected />
            </div>

            @endforeach
        </div>
        <button id="next"><i class="fas fa-angle-right"></i></button>
    </div>
    <div id="zoom-container"></div>
    <div class=" grid-custom ">
        <div class="slide-container">
            <input type="range" min="0" max={{count($pages)}} value="1" id="myRange" class="slider">
            <div class="page-number"><span id="slider-value">1</span> / <span class="page-total">{{count($pages)}}</span> </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-zoom/1.0.6/medium-zoom.min.js" integrity="sha512-N9IJRoc3LaP3NDoiGkcPa4gG94kapGpaA5Zq9/Dr04uf5TbLFU5q0o8AbRhLKUUlp8QFS2u7S+Yti0U7QtuZvQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/zoomooz/1.1.6/jquery.zoomooz.min.js" integrity="sha512-AjArtM7mKvqtbUJTylYXhk5TUfmK1o6aikn3HmkbuYlq+g5vcuzGGZhIsx7ZDHF9wMXjF7bLWoOTRQlW8O5i4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="{{asset('js/client/zoom.js')}}"></script> -->
    <!-- <script src="{{asset('js/client/zoomerang.js')}}"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/zooming/2.1.1/zooming.min.js" integrity="sha512-fAw3hLoeRiu86io4KGdDLz/Ed3OiNUMBXamPPmpqswqqJaU2YzbEBbvvr3/OyGPyMl1ZyijMuUI2dSwiDM5RiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script type="text/javascript">
        // Khoong cho xem nguon trang
        /**
         * Khi người dùng bật tab lên vào network vẫn xem được dữ liệu gửi đi và nhận về
         * Tắt F12 cũng là một giải pháp để tránh người dùng có thể xem được dữ liệu hình ảnh
         */

        // document.addEventListener('contextmenu', event => event.preventDefault());

        // document.onkeypress = function(event) {
        //     event = (event || window.event);
        //     if (event.keyCode == 123) {
        //         return false;
        //     }
        // }
        // document.onmousedown = function(event) {
        //     event = (event || window.event);
        //     if (event.keyCode == 123) {
        //         return false;
        //     }
        // }
        // document.onkeydown = function(event) {
        //     event = (event || window.event);
        //     if (event.keyCode == 123) {
        //         return false;
        //     }
        // }

        // jQuery(document).ready(function($) {
        //     $(document).keydown(function(event) {
        //         var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();

        //         if (event.ctrlKey && (pressedKey == "c" || pressedKey == "u")) {
        //             //disable key press porcessing
        //             return false;
        //         }
        //     });
        // });

        window.onload = () => {
            // ProtectImageJS.protect(document.querySelectorAll("img"))

        }
        console.log(document.querySelectorAll(".flipbook-img"))
        mediumZoom(document.querySelectorAll(".flipbook-img"), {
            background: '#ccc',
            margin: 24,
            scrollOffset: 500,
            container: '#zoom-container'

        })
        $('#flipbook').turn();



        // Thanh top bar hiển thị theo một trang hoặc 2 trang

        $('.topbar-tool__display').click(e => {
            e.preventDefault();
            if ($('#flipbook').turn('display') == 'double') {
                $('#flipbook').width('450px');
                $('#flipbook').height('580px');

                return $('#flipbook').turn('display', 'single')

            }
            if ($('#flipbook').turn('display') == 'single') {
                $('#flipbook').css('width', '900px');
                $('#flipbook').css('height', '580px');

                return $('#flipbook').turn('display', 'double')
            }
        })

        //Topbar thumbnails hình ảnh của cuốn sách
        let thumbnailEl = $('.topbar-tool__thumbnails');
        let topbarAside = $('.topbar-aside');
        let topbarLink = [...$('.aside-item__link')];
        thumbnailEl.click((event) => {
            event.preventDefault();
            event.stopPropagation();
            topbarAside.toggleClass('hidden');
        })
        $('body').click((event) => {
            if (!topbarAside.hasClass('hidden')) {

                topbarAside.addClass('hidden');
            }
        })
        topbarAside.click((event) => {
            event.stopPropagation();
        })
        topbarLink.forEach((item, index) => {
            item.addEventListener('click', (event) => {
                event.preventDefault();
                $('#flipbook').turn('page', index + 1);
                changeRange(index + 1);
                $('#myRange').val(index + 1);
            })
        })

        // $('#numb3').click((pageNumber) => {
        //     $('#flipbook').turn('page', pageNumber);
        // })



        $('.topbar-tool__search').click((e) => {
            e.preventDefault();
            $('.dropdown-search').toggleClass('active');
            $('#search-form').trigger("reset");

        })



        $('.dropdown-search').click((e) => {
            e.stopPropagation();
        })

        // search form
        $('#search-form').submit(function(e) {
            e.preventDefault();
            const pageNumber = $('#pageNumber').val();

            if (!$('#flipbook').turn('hasPage', pageNumber) && pageNumber != 0) {
                console.log('Không tìm thấy')

            } else {
                if (pageNumber == 0) {
                    $('#flipbook').turn('page', 1);
                } else {
                    $('#flipbook').turn('page', pageNumber);
                }
            };
        });

        // Nút điều hướng chuyển trang
        $('#next').click(() => {
            $('#flipbook').turn('next');
            let pageNumb = $('#flipbook').turn('page');
            changeRange(pageNumb);
            $('#myRange').val(pageNumb);
            // $('#slider-value').html(pageNumb);
        })
        $('#previous').click(() => {
            $('#flipbook').turn('previous');
            let pageNumb = $('#flipbook').turn('page');
            changeRange(pageNumb);
            $('#myRange').val(pageNumb);
            // $('#slider-value').html(pageNumb);
        })


        // thanh progress
        $('#myRange').on('input', function() {
            let x = $('#myRange').val();
            if (x == 0) {
                x = 1;
            }
            changeRange(x)
            $('#flipbook').turn('page', x)
        });


        $("#flipbook").bind("turned", function(event, page, view) {
            $('#slider-value').html(view.join('-'))
        });
        // thanh progress
        function changeRange(x) {
            let pageTotal = $('.page-total').text();
            let perce = (x) / pageTotal * 100;
            let color = 'linear-gradient(90deg,rgb(66,91,168)' + perce + '%, rgb(214,214,214)' + perce + '%)';
            $('#myRange').css('background', color);
        }
        changeRange(1)

        // An nut trai phai tren ban phim

        $(document).keydown(function(e) {

            var previous = 37,
                next = 39,
                esc = 27;

            switch (e.keyCode) {
                case previous:

                    // left arrow
                    $('#flipbook').turn('previous');
                    e.preventDefault();

                    break;
                case next:

                    //right arrow
                    $('#flipbook').turn('next');
                    e.preventDefault();

                    break;
                    // case esc:

                    //     $('#flipbook-viewport').zoom('zoomOut');	
                    //     e.preventDefault();

                    // break;
            }
        });

        /**
         * Đánh dấu trang đã đọc với nội dùng cần lưu lại
         * Giúp người dùng có thể xem lại một cách dễ dàng
         * 
         */

        $('.topbar-tool__bookmark').click(e => {
            e.preventDefault();
            if ($(e.target).hasClass('far')) {

                $(e.target).removeClass('far');
                $(e.target).addClass('fas');


                let pageCurrent = $('#flipbook').turn('page');
                console.log(pageCurrent);
                $.ajax({
                    url: '/api/addbookmark',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        page: pageCurrent,
                        book_slug: '{{{$book->slug}}}',
                        user_id: "{{{Auth::user()->id}}}"
                    },
                    success: function(data) {
                        console.log(data);
                        toast({
                            message: data.message,
                            type: "success",
                            duration: 2000
                        });
                    }
                })


            } else {
                console.log("Remove Bookmark")
                $(e.target).removeClass('fas');
                $(e.target).addClass('far');

                let pageCurrent = $('#flipbook').turn('page');

                $.ajax({
                    url: '/api/removebookmark',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        page: pageCurrent,
                        book_slug: '{{{$book->slug}}}',
                        user_id: "{{{Auth::user()->id}}}"
                    },
                    success: function(data) {
                        console.log(data);
                        toast({
                            message: data.message,
                            type: "error",
                            duration: 2000
                        });
                    }
                })
                
            }


        })
        /** 
         * Hiện danh sách bookmark
         */
        let topBarBookMark = $('.topbar-bookmark__wrap');
        let topBarBookMarkIcon = $('.bookmark-header__icon');
        $('.topbar-tool__list').click(e => {
            e.preventDefault();
            topBarBookMark.toggleClass('hidden');
        });
        topBarBookMarkIcon.click(e => {
            e.preventDefault();
            topBarBookMark.addClass('hidden');
        });

        // Toast function
        function toast({
            title = "",
            message = "",
            type = "info",
            duration = 3000
        }) {
            const main = document.getElementById("toast");
            if (main) {
                const toast = document.createElement("div");

                // Auto remove toast
                const autoRemoveId = setTimeout(function() {
                    main.removeChild(toast);
                }, duration + 1000);

                // Remove toast when clicked
                toast.onclick = function(e) {
                    if (e.target.closest(".toast__close")) {
                        main.removeChild(toast);
                        clearTimeout(autoRemoveId);
                    }
                };

                const icons = {
                    success: "fas fa-check-circle",
                    info: "fas fa-info-circle",
                    warning: "fas fa-exclamation-circle",
                    error: "fas fa-exclamation-circle"
                };
                const icon = icons[type];
                const delay = (duration / 1000).toFixed(2);

                toast.classList.add("toast", `toast--${type}`);
                toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

                toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                `;
                main.appendChild(toast);
            }
        }
    </script>
</body>

</html>