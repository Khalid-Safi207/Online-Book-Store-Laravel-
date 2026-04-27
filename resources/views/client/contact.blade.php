@extends('layout.layout')
@section('title')
    تواصل معنا
@endsection

@section('content')

<style>

body{
    background:#f5f5f5;
    direction:rtl;
}

/* HERO */
.contact-hero{
    background:linear-gradient(135deg,#111,#333);
    color:#fff;
    padding:50px 20px;
    text-align:center;
    border-radius:16px;
}

.contact-hero h1{
    font-weight:800;
}

.contact-hero p{
    color:#d1d5db;
}

/* BOX */
.section-box{
    background:#fff;
    border-radius:16px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

/* ICON */
.icon-box{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#f3f4f6;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    font-size:18px;
}

/* INPUTS */
.form-control{
    border-radius:10px;
}

/* BUTTON */
.btn-dark{
    border-radius:20px;
}

.info-text{
    color:#6b7280;
    font-size:0.9rem;
}

</style>


<div class="container py-5">

    <!-- HERO -->
    <div class="contact-hero mb-5">

        <h1>📞 تواصل معنا</h1>

        <p>
            نحن هنا لمساعدتك في أي وقت، لا تتردد في التواصل معنا
        </p>

    </div>

    <div class="row g-4">

        <!-- FORM -->
        <div class="col-md-7">

            <div class="section-box">

                <h5 class="fw-bold mb-3">أرسل رسالة</h5>

                <form>

                    <div class="mb-3">
                        <label>الاسم</label>
                        <input type="text" class="form-control" placeholder="أدخل اسمك">
                    </div>

                    <div class="mb-3">
                        <label>البريد الإلكتروني</label>
                        <input type="email" class="form-control" placeholder="example@mail.com">
                    </div>

                    <div class="mb-3">
                        <label>الموضوع</label>
                        <input type="text" class="form-control" placeholder="موضوع الرسالة">
                    </div>

                    <div class="mb-3">
                        <label>الرسالة</label>
                        <textarea class="form-control" rows="5" placeholder="اكتب رسالتك هنا..."></textarea>
                    </div>

                    <button class="btn btn-dark w-100">
                        إرسال الرسالة
                    </button>

                </form>

            </div>

        </div>

        <!-- INFO -->
        <div class="col-md-5">

            <div class="section-box mb-3 text-center">

                <div class="icon-box">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <h6 class="fw-bold mt-2">العنوان</h6>

                <p class="info-text">
                    إسطنبول، تركيا - شارع الاستقلال رقم 45
                </p>

            </div>

            <div class="section-box mb-3 text-center">

                <div class="icon-box">
                    <i class="fa-solid fa-phone"></i>
                </div>

                <h6 class="fw-bold mt-2">الهاتف</h6>

                <p class="info-text">
                    +90 555 123 4567
                </p>

            </div>

            <div class="section-box text-center">

                <div class="icon-box">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <h6 class="fw-bold mt-2">البريد</h6>

                <p class="info-text">
                    support@e-library.com
                </p>

            </div>

        </div>

    </div>

</div>

@endsection