@extends('layout.layout')
@section('title')
    e-Library
@endsection

@section('content')

<style>
:root{
  --text:#1f2937;
  --muted:#6b7280;
  --bg:#f5f5f5;
}

body{
  background: var(--bg);
  direction: rtl;
}

/* ===== FEATURED ===== */
.featured-box{
  background:#fff;
  border-radius:16px;
  padding:30px;
  box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.featured-img{
  width:100%;
  max-width:250px;
  aspect-ratio:3/4;
  object-fit:cover;
  border-radius:12px;
}

.price{
  color:#374151;
  font-weight:700;
}

/* ===== SECTION TITLE ===== */
.section-title{
  font-weight:700;
  border-right:3px solid #ddd;
  padding-right:10px;
}

/* ===== GRID ===== */
.book-grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(200px,1fr));
  gap:20px;
}

/* ===== CARD ===== */
.book-card{
  background:#fff;
  border-radius:12px;
  overflow:hidden;
  transition:.3s;
  display:flex;
  flex-direction:column;
  height:100%;
  border:1px solid #eee;
}

.book-card:hover{
  transform:translateY(-6px);
  box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

/* ===== IMAGE ===== */
.book-img{
  width:100%;
  aspect-ratio:3/4;
  object-fit:cover;
}

/* ===== BODY ===== */
.book-body{
  padding:12px;
  display:flex;
  flex-direction:column;
  flex-grow:1;
  text-align:center;
}

.book-title{
  font-size:0.95rem;
  font-weight:600;
  color:var(--text);
  min-height:40px;
}

/* ===== STARS ===== */
.stars i{
  color:#f59e0b;
  font-size:0.85rem;
  margin-left:2px;
}

/* ===== BUTTONS ===== */
.btn-dark{
  border-radius:20px;
  font-size:0.85rem;
}

.btn-outline-dark{
  border-radius:20px;
  font-size:0.85rem;
}

/* ===== VIEW ALL ===== */
.view-all{
  font-size:0.85rem;
  text-decoration:none;
  color:#555;
}

</style>

<!-- 🔥 FEATURED BOOK -->
<div class="container mt-5">

@if (isset($book))

<div class="featured-box">
  <div class="row align-items-center g-4">

    <div class="col-md-4 text-center">
      <img src="{{ asset('storage/' . $book->book_img) }}" class="featured-img">
    </div>

    <div class="col-md-8 text-center text-md-end">

      <h3 class="fw-bold">{{ $book['book_name'] }}</h3>
      <p class="text-muted">بقلم: {{ $book['author'] }}</p>

      <!-- ⭐ STARS -->
      <div class="stars mb-2">
        @php $rating = floor($book['review_avg_stars']); @endphp

        @for($i=1;$i<=5;$i++)
            @if($i <= $rating)
                <i class="fa-solid fa-star"></i>
            @else
                <i class="fa-regular fa-star"></i>
            @endif
        @endfor
      </div>

      <p class="text-muted">
        {{ substr($book['book_description'],0,120) }}...
      </p>

      <div class="price mb-2">
        ${{ $book['price'] }}
      </div>

      <a target="_blank"
         href="{{ route('client.showbook',$book['id']) }}"
         class="btn btn-dark btn-sm px-4">
         عرض التفاصيل
      </a>

    </div>

  </div>
</div>

@endif

</div>


<!-- 🔥 BOOKS -->
<div class="container">

@if (isset($categories))
@foreach ($categories as $category)

<div class="mt-5">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="section-title">{{ $category }}</h5>

    <a target="_blank"
       href="{{ route('client.showCategory',$category) }}"
       class="view-all">
       عرض الكل →
    </a>
  </div>

  <div class="book-grid">

    @foreach ($books[$category] as $b)

    <div class="book-card">

      <img src="{{ asset('storage/' . $b['book_img']) }}" class="book-img">

      <div class="book-body">

        <div class="book-title">
          {{ $b['book_name'] }}
        </div>

        <!-- ⭐ STARS -->
        <div class="stars mb-1">
          @php $rating = floor($b['review_avg_stars']); @endphp

          @for($i=1;$i<=5;$i++)
              @if($i <= $rating)
                  <i class="fa-solid fa-star"></i>
              @else
                  <i class="fa-regular fa-star"></i>
              @endif
          @endfor
        </div>

        <div class="price mb-2">
          ${{ $b['price'] }}
        </div>

        <a target="_blank"
           href="{{ route('client.showbook',$b['id']) }}"
           class="btn btn-outline-dark btn-sm mt-auto">
           عرض التفاصيل
        </a>

      </div>

    </div>

    @endforeach

  </div>

</div>

@endforeach
@endif

</div>

@endsection