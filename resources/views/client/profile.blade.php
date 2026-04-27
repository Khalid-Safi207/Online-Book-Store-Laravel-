@extends('layout.layout')
@section('title')
    صفحتي الشخصية
@endsection

@section('content')

<style>

body{
    background:#f5f5f5;
    direction:rtl;
}

/* ================= PROFILE ================= */
.profile-card{
    background:#fff;
    border-radius:16px;
    padding:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    text-align:center;
}

.avatar{
    width:80px;
    height:80px;
    border-radius:50%;
    background:#e5e7eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    margin:auto;
}

.info p{
    margin:6px 0;
    color:#6b7280;
    font-size:0.9rem;
}

/* ================= CART ================= */
.cart-card{
    background:#fff;
    border-radius:16px;
    overflow:hidden;
    border:1px solid #eee;
    transition:0.3s;
    display:flex;
    flex-direction:column;
    height:100%;
}

.cart-card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

/* 🔥 IMAGE FIX (FULL IMAGE WITHOUT CROPPING) */
.cart-img{
    width:100%;
    height:140px;
    background:linear-gradient(145deg,#f8f9fa,#e9ecef);
    display:flex;
    align-items:center;
    justify-content:center;
    padding:8px;
}

.cart-img img{
    max-width:100%;
    max-height:100%;
    object-fit:contain; /* 🔥 أهم تعديل: صورة كاملة بدون قص */
}

/* BODY */
.cart-body{
    padding:12px;
    text-align:center;
    display:flex;
    flex-direction:column;
    flex-grow:1;
}

.book-title{
    font-weight:600;
    font-size:0.95rem;
    color:#111827;
    min-height:40px;
}

.price{
    color:#16a34a;
    font-weight:700;
    margin:8px 0;
}

/* ================= BUTTONS ================= */

/* ⭐ تقييم أصفر */
.btn-rating{
    border-radius:20px;
    font-size:0.85rem;
    border:1px solid #f59e0b;
    color:#f59e0b;
    background:#fff;
    transition:0.3s;
}

.btn-rating:hover{
    background:#f59e0b;
    color:#fff;
}

/* 🗑 حذف أحمر */
.btn-delete{
    border-radius:20px;
    font-size:0.85rem;
}

/* ================= SECTION ================= */
.section-title{
    font-weight:700;
    margin-bottom:15px;
}

</style>


@if (request('edit'))

<!-- ================= EDIT PROFILE ================= -->
<div class="container mt-4">

    <div class="profile-card text-end">

        <form action="{{ route('client.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>الاسم</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>البريد</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>كلمة المرور</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button class="btn btn-dark w-100">حفظ</button>

            <a href="{{ url()->current() }}"
               class="btn btn-outline-secondary w-100 mt-2">
               إلغاء
            </a>

        </form>

    </div>

</div>

@else

<!-- ================= PROFILE ================= -->
<div class="container py-5">

    <div class="row g-4">

        <!-- LEFT PROFILE -->
        <div class="col-md-4">

            <div class="profile-card">

                <div class="avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <h5 class="fw-bold mt-2">{{ $user->name }}</h5>
                <p class="text-muted small">{{ $user->email }}</p>

                <div class="info text-end mt-3">

                    <p>👤 الاسم: {{ $user->name }}</p>
                    <p>📧 البريد: {{ $user->email }}</p>
                    <p>📅 الانضمام: {{ $user->created_at }}</p>

                </div>

                <a href="{{ url()->current() . '?edit=true' }}"
                   class="btn btn-outline-dark w-100 mt-3">
                   تعديل الملف
                </a>

                @if ($is_admin)
                    <a href="{{ route('admin.dashboard') }}"
                       class="btn btn-outline-primary w-100 mt-2">
                       لوحة التحكم
                    </a>
                @endif

            </div>

        </div>

        <!-- RIGHT CART -->
        <div class="col-md-8">

            <div class="profile-card text-end">

                <h5 class="section-title">
                    <i class="fa-solid fa-cart-shopping"></i> السلة
                </h5>

                @if (isset($userCart))

                <div class="row row-cols-1 row-cols-md-2 g-4">

                    @foreach ($userCart as $cartBook)

                    <div class="col">

                        <div class="cart-card">

                            <!-- IMAGE -->
                            <div class="cart-img">
                                <img src="{{ asset('storage/' . $cartBook['book_img']) }}">
                            </div>

                            <!-- BODY -->
                            <div class="cart-body">

                                <div class="book-title">
                                    {{ $cartBook['book_name'] }}
                                </div>

                                <div class="price">
                                    ${{ $cartBook['price'] }}
                                </div>

                                <!-- ⭐ تقييم -->
                                <a href="{{ route('client.showReview', $cartBook['id']) }}"
                                   class="btn btn-rating btn-sm w-100 mb-2">
                                   <i class="fa-solid fa-star"></i> تقييم الكتاب
                                </a>

                                <!-- 🗑 حذف -->
                                <form action="{{ route('client.deleteBookFromCart', $cartBook['id']) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm w-100 btn-delete">
                                        <i class="fa-solid fa-trash"></i> حذف
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                @else
                    <p class="text-muted">السلة فارغة</p>
                @endif

            </div>

        </div>

    </div>

</div>

@endif

@endsection