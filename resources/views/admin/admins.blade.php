@extends('admin.layout.layout')
@section('title')
    الأدمن - لوحة التحكم
@endsection
@section('content')
    <!-- Content -->
    <div id="content" class="container-fluid" style="padding:30px;transition:0.3s;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <button onclick="toggleSidebar()" class="btn btn-dark"><i class="fa fa-bars"></i></button>
                <h3 class="mb-0">الأدمن</h3>
            </div>
            <a href="{{ route('admin.admin.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> إضافة أدمن</a>
        </div>

        <div class="card border-0" style="border-radius:15px;">
            <div class="card-header fw-bold">قائمة الأدمن</div>
            <table class="table mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>تاريخ تسجيل المستخدم</th>
                        <th>إسم المستخدم</th>
                        <th>إيميل المستخدم</th>
                        <th>تاريخ تريقيته</th>
                        <th>تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $admin->created_at }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->admin_created_at }}</td>
                            <td>
                                <form action="{{ route("admin.admin.destroy", $admin->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
