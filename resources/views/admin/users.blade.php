@extends('admin.layout.layout')
@section('title')
    المستخدمين - لوحة التحكم
@endsection
@section('content')
    <!-- Content -->
    <div id="content" class="container-fluid" style="padding:30px;transition:0.3s;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <button onclick="toggleSidebar()" class="btn btn-dark"><i class="fa fa-bars"></i></button>
                <h3 class="mb-0">المستخدمين</h3>
            </div>
        </div>

        <div class="card border-0" style="border-radius:15px;">
            <div class="card-header fw-bold">قائمة المستخدمين</div>
            <table class="table mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الإيميل</th>
                        <th>تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route("admin.users.destroy", $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>

                                </form>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
