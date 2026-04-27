@extends('layout.layout')
@section('title')
    e-Library || {{ $category }}
@endsection

@section('content')

<style>

body{
    background:#f5f5f5;
    direction:rtl;
}

/* ================= HEADER ================= */
.category-header{
    text-align:center;
    margin-bottom:30px;
}

.category-header h2{
    font-weight:800;
}

.category-header p{
    color:#6b7280;
}

/* ================= BOOK CARD ================= */
.book-card{
    background:#fff;
    border-radius:16px;
    overflow:hidden;
    border:1px solid #eee;
    transition:0.3s;
    height:100%;
    display:flex;
    flex-direction:column;
}

.book-card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

/* IMAGE FIXED */
.book-img{
    width:100%;
    height:220px;
    background:#f3f4f6;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:10px;
}

.book-img img{
    max-width:100%;
    max-height:100%;
    object-fit:contain;
}

/* CONTENT */
.book-body{
    padding:15px;
    text-align:center;
    display:flex;
    flex-direction:column;
    flex-grow:1;
}

.book-title{
    font-weight:600;
    font-size:0.95rem;
    min-height:45px;
    color:#111827;
}

.price{
    color:#16a34a;
    font-weight:700;
    margin:6px 0;
}

.author{
    color:#6b7280;
    font-size:0.85rem;
}

/* STARS */
.stars i{
    color:#f59e0b;
    font-size:0.85rem;
}

/* BUTTON */
.btn-details{
    margin-top:auto;
    border-radius:20px;
    font-size:0.85rem;
}

</style>


<div class="container py-5">

    <!-- ================= HEADER ================= -->
    <div class="category-header">

        <h2>قسم ({{ $category }})</h2>

        <p>عدد الكتب: {{ count($books) }}</p>

    </div>

    <!-- ================= BOOKS ================= -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

        @foreach ($books as $book)

        <div class="col">

            <div class="book-card">

                <!-- IMAGE -->
                <div class="book-img">
                    <img src="{{ asset('storage/' . $book['book_img']) }}">
                </div>

                <!-- BODY -->
                <div class="book-body">

                    <div class="book-title">
                        {{ $book['book_name'] }}
                    </div>

                    <div class="price">
                        ${{ $book['price'] }}
                    </div>

                    <div class="author">
                        {{ $book['author'] }}
                    </div>

                    <!-- STATIC STARS (يمكن تطويرها لاحقاً) -->
                    <div class="stars my-2">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <a target="_blank"
                       href="{{ route('client.showbook', $book['id']) }}"
                       class="btn btn-outline-dark btn-sm btn-details w-100">

                        عرض التفاصيل

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection