<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <style>

/* ===== GLOBAL ===== */
body{
    background:#f5f5f5;
}

/* ===== NAVBAR ===== */
.navbar{
    background:#fff !important;
    box-shadow:0 5px 20px rgba(0,0,0,0.06);
    padding:12px 30px;
}

.navbar-brand{
    font-weight:700;
    color:#333 !important;
}

.nav-link{
    color:#555 !important;
    font-weight:500;
    margin-left:10px;
    transition:0.3s;
}

.nav-link:hover{
    color:#000 !important;
}

/* dropdown */
.dropdown-menu{
    border:none;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    border-radius:12px;
}

.dropdown-item{
    text-align:right;
    transition:0.2s;
}

.dropdown-item:hover{
    background:#f1f1f1;
}

/* ===== SEARCH ===== */
.search-results{
    position:absolute;
    top:110%;
    right:0;
    width:100%;
    background:#fff;
    border-radius:12px;
    box-shadow:0 15px 40px rgba(0,0,0,0.1);
    overflow:hidden;
    display:none;
    z-index:999;
}

.search-item{
    display:flex;
    align-items:center;
    gap:10px;
    padding:10px;
    text-decoration:none;
    color:#333;
    transition:0.2s;
}

.search-item:hover{
    background:#f5f5f5;
}

.search-item img{
    width:40px;
    height:55px;
    object-fit:cover;
    border-radius:6px;
}

.search-item .title{
    font-size:0.9rem;
    font-weight:500;
}

.search-empty{
    padding:15px;
    text-align:center;
    color:#888;
}
.search-modern input{
    border-radius:25px;
    border:1px solid #ddd;
    padding:8px 15px;
    width:220px;
    transition:0.3s;
}

.search-modern input:focus{
    width:280px;
    outline:none;
    border-color:#999;
}

.search-results{
    position:absolute;
    background:#fff;
    width:100%;
    border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    display:none;
    z-index:999;
}

/* ===== FOOTER ===== */
footer{
    background:#111;
    color:#aaa;
}

footer h5, footer h6{
    color:#fff;
}

footer a{
    color:#aaa;
    text-decoration:none;
    transition:0.3s;
}

footer a:hover{
    color:#fff;
    padding-right:5px;
}

.social i{
    font-size:1.2rem;
    transition:0.3s;
}

.social i:hover{
    transform:translateY(-3px);
    color:#fff;
}

    </style>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>

<body>

<!-- 🔥 NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">

    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('client.index') }}">
            <i class="fa-solid fa-book"></i> e-Library
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.index') }}">
                        <i class="fa-solid fa-house"></i> الرئيسية
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.profile') }}">
                        <i class="fa-solid fa-user"></i> ملفي
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-tag"></i> التصنيفات
                    </a>

                    <ul class="dropdown-menu">
                        @foreach ($categories as $categ)
                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('client.showCategory',$categ) }}">
                                   {{ $categ }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </li>

                <!-- Authors -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-pen"></i> المؤلفين
                    </a>

                    <ul class="dropdown-menu">
                        @foreach ($authors as $author)
                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('client.showAuthor',$author) }}">
                                   {{ $author }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </li>

            </ul>

            <!-- 🔍 SEARCH -->
            <div class="position-relative search-modern">
                <input type="text" id="search" placeholder="ابحث عن كتاب...">
                <div id="searchResult" class="search-results"></div>
            </div>

        </div>

    </div>

</nav>

<!-- spacing -->
<div style="height:80px;"></div>

<!-- 🔥 CONTENT -->
@yield('content')

<!-- 🔥 FOOTER -->
<footer class="pt-5 pb-3 mt-5">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-4">
                <h5>📚 e-Library</h5>
                <p class="text-secondary">
                    منصة لبيع الكتب الرقمية في مختلف المجالات بطريقة بسيطة وسريعة.
                </p>
            </div>

            <div class="col-md-2">
                <h6>روابط</h6>
                <a href="{{ route("client.index") }}">الرئيسية</a><br>
                <a href="{{ route("client.about") }}">من نحن</a><br>
                <a href="{{ route("client.contact") }}">تواصل معنا</a>
            </div>

            <div class="col-md-3">
                <h6>الأقسام</h6>
                @foreach ($categories as $categ)
                    <a href="{{ route('client.showCategory',$categ) }}">
                        {{ $categ }}
                    </a><br>
                @endforeach
            </div>

            <div class="col-md-3">
                <h6>تابعنا</h6>

                <div class="social d-flex gap-3 mt-2">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-github"></i>
                </div>

            </div>

        </div>

        <hr class="border-secondary mt-4">

        <div class="text-center text-secondary small">
            © 2026 جميع الحقوق محفوظة
        </div>

    </div>

</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/search.js') }}"></script>

</body>
</html>