@extends('layout.layout')
@section('title')
    من نحن
@endsection

@section('content')

<style>

body{
    background:#f5f5f5;
    direction:rtl;
}

/* HERO */
.about-hero{
    background:linear-gradient(135deg,#111,#333);
    color:#fff;
    padding:60px 20px;
    text-align:center;
    border-radius:16px;
}

.about-hero h1{
    font-weight:800;
}

.about-hero p{
    color:#d1d5db;
    max-width:700px;
    margin:auto;
}

/* SECTION */
.section-box{
    background:#fff;
    border-radius:16px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

/* ICON BOX */
.icon-box{
    background:#f3f4f6;
    width:60px;
    height:60px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    font-size:22px;
    color:#111;
}

.feature-title{
    font-weight:700;
    margin-top:10px;
}

.feature-text{
    color:#6b7280;
    font-size:0.9rem;
}

</style>


<div class="container py-5">

    <!-- HERO -->
    <div class="about-hero mb-5">

        <h1>📚 من نحن</h1>

        <p>
            منصة e-Library هي مكتبة إلكترونية حديثة تهدف إلى تسهيل الوصول إلى الكتب
            في مختلف المجالات مثل البرمجة، التاريخ، الدين، والتطوير الذاتي.
        </p>

    </div>

    <!-- ABOUT TEXT -->
    <div class="section-box mb-4">

        <h4 class="fw-bold mb-3">✨ رؤيتنا</h4>

        <p class="text-muted">
            نؤمن بأن المعرفة يجب أن تكون متاحة للجميع بسهولة. لذلك قمنا ببناء منصة
            بسيطة وسريعة تساعد المستخدمين على تصفح وشراء الكتب الرقمية بكل سهولة.
        </p>

    </div>

    <!-- FEATURES -->
    <div class="row g-4 text-center">

        <div class="col-md-4">
            <div class="section-box h-100">

                <div class="icon-box">
                    <i class="fa-solid fa-book"></i>
                </div>

                <div class="feature-title">مكتبة ضخمة</div>

                <div class="feature-text">
                    تحتوي على كتب متنوعة في مختلف المجالات
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="section-box h-100">

                <div class="icon-box">
                    <i class="fa-solid fa-bolt"></i>
                </div>

                <div class="feature-title">تصفح سريع</div>

                <div class="feature-text">
                    تجربة مستخدم سلسة وسريعة بدون تعقيد
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="section-box h-100">

                <div class="icon-box">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="feature-title">آمن</div>

                <div class="feature-text">
                    بيانات المستخدمين محمية وآمنة بالكامل
                </div>

            </div>
        </div>

    </div>

    <!-- FOOTER TEXT -->
    <div class="section-box mt-4 text-center">

        <h5 class="fw-bold">🚀 هدفنا</h5>

        <p class="text-muted mb-0">
            بناء أكبر منصة كتب رقمية عربية سهلة الاستخدام وسريعة الوصول.
        </p>

    </div>

</div>

@endsection