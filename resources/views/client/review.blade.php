@extends('layout.layout')

@section('title')
    تقييم الكتاب
@endsection

@section('content')

<style>

body{
    background:#f5f5f5;
    direction:rtl;
}

/* CARD */
.review-card{
    background:#fff;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    padding:30px;
    text-align:center;
}

/* IMAGE */
.book-img{
    max-height:280px;
    object-fit:contain;
    border-radius:12px;
}

/* STARS */
.star-rating{
    font-size:2rem;
    cursor:pointer;
}

.star-rating i{
    color:#d1d5db;
    transition:0.2s;
}

.star-rating i.checked{
    color:#f59e0b;
}

/* BUTTON */
.btn-submit{
    border-radius:25px;
    padding:8px 25px;
}

/* RESULT */
.result-text{
    font-weight:600;
    color:#2563eb;
}

</style>


<div class="container py-5">

    <div class="review-card">

        <h4 class="mb-4 fw-bold">⭐ تقييم الكتاب</h4>

        <!-- BOOK IMAGE -->
        <img src="{{ asset('storage/' . $book_img) }}"
             class="img-fluid book-img mb-4">

        <!-- FORM -->
        <form action="{{ route('client.addReview', $book_id) }}" method="POST">
            @csrf

            <!-- STARS -->
            <div id="stars" class="star-rating mb-3">

                <i class="fa-solid fa-star" data-value="1"></i>
                <i class="fa-solid fa-star" data-value="2"></i>
                <i class="fa-solid fa-star" data-value="3"></i>
                <i class="fa-solid fa-star" data-value="4"></i>
                <i class="fa-solid fa-star" data-value="5"></i>

            </div>

            <!-- hidden input -->
            <input type="hidden" name="rating" id="ratingSelect" value="1">

            @if ($errors->any())

                <div class="alert alert-danger mt-3">

                    <ul class="mb-0 text-end">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                    <a href="{{ route('client.profile') }}"
                       class="btn btn-danger mt-2">
                       الصفحة الشخصية
                    </a>

                </div>

            @else

                <button type="submit" class="btn btn-dark btn-submit mt-2">
                    إرسال التقييم
                </button>

            @endif

        </form>

        <!-- RESULT -->
        <p class="mt-3 result-text" id="ratingResult">
            اختر تقييمك
        </p>

    </div>

</div>

<script>

const stars = document.querySelectorAll('#stars i');
const result = document.getElementById('ratingResult');
const ratingSelect = document.getElementById('ratingSelect');

// default
stars[0].classList.add('checked');
result.textContent = "لقد اخترت 1 نجمة";

stars.forEach(star => {

    star.addEventListener('click', () => {

        const value = star.getAttribute('data-value');

        stars.forEach(s => s.classList.remove('checked'));

        for (let i = 0; i < value; i++) {
            stars[i].classList.add('checked');
        }

        ratingSelect.value = value;

        result.textContent = `لقد اخترت ${value} نجمة`;

    });

});

</script>

@endsection