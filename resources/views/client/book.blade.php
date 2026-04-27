@extends('layout.layout')
@section('title')
    {{ $book['book_name'] }}
@endsection

@section('content')

<style>
body{
    background:#f5f5f5;
}

/* ===== PRODUCT CARD ===== */
.product-box{
    background:#fff;
    border-radius:16px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

/* ===== IMAGE ===== */
.book-img{
    width:100%;
    max-width:220px;
    aspect-ratio:3/4;
    object-fit:cover;
    border-radius:12px;
}

/* ===== TITLE ===== */
.book-title{
    font-weight:700;
    color:#1f2937;
}

/* ===== PRICE ===== */
.price{
    color:#16a34a;
    font-weight:700;
    font-size:1.3rem;
}

/* ===== STARS ===== */
.stars i{
    color:#f59e0b;
    margin-left:2px;
}

/* ===== DESCRIPTION ===== */
.desc{
    color:#6b7280;
    line-height:1.8;
}

/* ===== ADD TO CART ===== */
.btn-cart{
    border-radius:25px;
    padding:8px 18px;
}

/* ===== REVIEW CARD ===== */
.review{
    background:#fff;
    border:1px solid #eee;
    border-radius:12px;
    padding:10px 15px;
    margin-bottom:10px;
    transition:0.2s;
}

.review:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(0,0,0,0.05);
}

/* ===== RTL ===== */
body, html{
    direction:rtl;
}
</style>


<div class="container py-5">

    <div class="product-box">

        <div class="row align-items-center g-4">

            <!-- IMAGE -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('storage/' . $book['book_img']) }}" class="book-img">
            </div>

            <!-- INFO -->
            <div class="col-md-8">

                <h2 class="book-title">{{ $book->book_name }}</h2>

                <p class="text-muted">✍️ {{ $book->author }}</p>

                <!-- ⭐ AVERAGE RATING -->
                <div class="stars mb-2">
                    @for($i=1;$i<=5;$i++)
                        @if($i <= $avg)
                            <i class="fa-solid fa-star"></i>
                        @else
                            <i class="fa-regular fa-star"></i>
                        @endif
                    @endfor

                    <span class="text-muted">({{ $avg }})</span>
                </div>

                <div class="price mb-2">
                    ${{ $book->price }}
                </div>

                <!-- ADD TO CART -->
                @if (!$checkInCart)
                    <form action="{{ route('client.addBookToCart', $book->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-dark btn-cart">
                            <i class="fa-solid fa-cart-plus"></i>
                            إضافة إلى السلة
                        </button>
                    </form>
                @else
                    <div class="alert alert-secondary mt-2">
                        هذا الكتاب مضاف بالفعل إلى السلة
                    </div>
                @endif

                <hr>

                <!-- DESCRIPTION -->
                <p class="desc">
                    {{ $book->book_description }}
                </p>

            </div>

        </div>

    </div>


    <!-- REVIEWS -->
    <div class="mt-5">

        <h5 class="mb-3 fw-bold">التقييمات</h5>

        @if (count($reviews) > 0)

            @foreach ($reviews as $review)

                <div class="review">

                    <div class="stars mb-1">
                        @for($i=1;$i<=5;$i++)
                            @if($i <= $review['stars'])
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-regular fa-star"></i>
                            @endif
                        @endfor
                    </div>

                    <small class="text-muted">
                        {{ $review['created_at'] }}
                    </small>

                </div>

            @endforeach

        @else
            <div class="text-muted">لا يوجد تقييمات</div>
        @endif

    </div>

</div>

@endsection