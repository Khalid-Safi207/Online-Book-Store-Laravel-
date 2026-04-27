@extends("admin.layout.layout")
@section("title") الأدمن - لوحة التحكم @endsection
@section("content")
<!-- Content -->
<div id="content" class="container-fluid" style="padding:30px;transition:0.3s;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-2">
            <button onclick="toggleSidebar()" class="btn btn-dark"><i class="fa fa-bars"></i></button>
            <h3 class="mb-0">الأدمن</h3>
        </div>
        <a href="{{ route("admin.admins") }}" class="btn btn-outline-dark"> رجوع للوراء</a>
    </div>
    <form action="{{route("admin.admin.store")}}" method="POST">
        @csrf
        <label for="user" class="fw-bold">إختر اسم المستخدم الذي تريد ترقيته:</label>
        <select name="user" id="user" class="form-select mt-2" required>
            @foreach ($users as $user)
                <option value="{{ $user->email }}">{{ $user->name }} ({{ $user->email }})</option> 
            @endforeach
        </select>
        <button type="submit" class="btn btn-success mt-2">ترقية</button>
    </form>
</div>
@endsection