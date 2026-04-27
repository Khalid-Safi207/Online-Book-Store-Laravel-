@extends("admin.layout.layout")
@section("title") لوحة التحكم - مكتبة @endsection
@section("content")
<!-- Content -->
<div id="content" class="container-fluid" style="padding:30px;transition:0.3s;">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-2">
            <button onclick="toggleSidebar()" class="btn btn-dark">
                <i class="fa fa-bars"></i>
            </button>
            <h3 class="mb-0">Dashboard</h3>
        </div>

    </div>

    <!-- Stats -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="p-4 text-white" style="border-radius:20px;background:linear-gradient(135deg,#6366f1,#4f46e5);position:relative;">
                <h6>عدد الكتب</h6>
                <h2>{{ $booksCount }}</h2>
                <i class="fa fa-book fa-3x" style="position:absolute;left:20px;bottom:20px;opacity:0.2;"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 text-white" style="border-radius:20px;background:linear-gradient(135deg,#f59e0b,#d97706);position:relative;">
                <h6>عدد الأدمن</h6>
                <h2>{{ $adminsCount }}</h2>
                <i class="fa fa-user-shield fa-3x" style="position:absolute;left:20px;bottom:20px;opacity:0.2;"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 text-white" style="border-radius:20px;background:linear-gradient(135deg,#ef4444,#dc2626);position:relative;">
                <h6>عدد المستخدمين</h6>
                <h2>{{ $usersCount }}</h2>
                <i class="fa fa-users fa-3x" style="position:absolute;left:20px;bottom:20px;opacity:0.2;"></i>
            </div>
        </div>
    </div>

    <!-- Tables -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card border-0" style="border-radius:15px;">
                <div class="card-header fw-bold">أحدث الكتب</div>
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>الاسم</th>
                            <th>القسم</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($recentBooks as $book)
                            <tr><td>{{ $book->book_name }}</td><td>{{ $book->category }}</td></tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0" style="border-radius:15px;">
                <div class="card-header fw-bold">التسجيلات الجديدة</div>
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>اسم المستخدم</th>
                            <th>الإيميل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentUsers as $user)
                            <tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td></tr>
                            
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection