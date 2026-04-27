@extends('admin.layout.layout')
@section('title')
    الكتب - لوحة التحكم
@endsection
@section('content')
    <!-- Content -->
    <div id="content" class="container-fluid" style="padding:30px;transition:0.3s;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <button onclick="toggleSidebar()" class="btn btn-dark">
                    <i class="fa fa-bars"></i>
                </button>
                <h3 class="mb-0">الكتب</h3>
            </div>

            <a href="{{ route('admin.books.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> إضافة
                كتاب</a>
        </div>

        <!-- Table -->
        <div class="card border-0" style="border-radius:15px;">
            <div class="card-header fw-bold">قائمة الكتب</div>
            <table class="table mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>صورة الكتاب</th>
                        <th>اسم الكتاب</th>
                        <th>مؤلف الكتاب</th>
                        <th>القسم</th>
                        <th>السعر</th>
                        <th>تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($books as $book)
                        <tr>
                            <td><img style="width: 100px;" src="{{ asset('storage/' . $book->book_img) }}" alt="">
                            </td>
                            <td>{{ $i }}</td>
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category }}</td>
                            <td class="fw-bold text-success">{{ $book->price }}$</td>
                            <td>
                                <a href="{{ route("admin.book.edit",$book["id"]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <form class="d-inline-block" action="{{ route('admin.book.destroy', $book["id"]) }}" method="POST">@csrf @method("DELETE")<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></form>
                                <button class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
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
