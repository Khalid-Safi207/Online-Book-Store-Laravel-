@extends('admin.layout.layout')
@section('title')
    إنشاء كتاب جديد
@endsection
@section('content')
    @if ($errors->any())
        @section('toast')
            @foreach ($errors->all() as $error)
                <script>
                    // Configure toastr options
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "timeOut": "5000", // 5 seconds
                        "positionClass": "toast-top-right"
                    };

                    // Show an error toast
                    toastr.error("{{ $error }}", "Error");
                </script>
            @endforeach
        @endsection
    @endif
    <div id="content" class="container-fluid" style="padding:30px;transition:0.3s;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2">
                <button onclick="toggleSidebar()" class="btn btn-dark">
                    <i class="fa fa-bars"></i>
                </button>
                <h3 class="mb-0">تعديل كتاب</h3>
            </div>
            <a href="{{ route('admin.books') }}" class="btn btn-outline-dark mb-2">رجوع للوراء</a>
        </div>

        <form action="{{ route('admin.book.update', $book->id) }}" method="POST" class="d-flex flex-column gap-3"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div>
                <label for="book_name" class="form-label fw-bold">إسم الكتاب</label>
                <input type="text" name="book_name" id="book_name" class="form-control" required value="{{ $book->book_name }}">
            </div>
            <div>
                <label for="book_description" class="form-label fw-bold">وصف الكتاب</label>
                <textarea name="book_description" id="book_description" cols="30" rows="10" class="form-control">{{ $book->book_description }}</textarea>
            </div>
            <div>
                <label for="book_category" class="form-label fw-bold">فئة الكتاب</label>
                <select required name="book_category" id="book_category" class="form-select"
                    aria-label="Default select example">
                    <option value="دينية" @if($book->category == "دينية" ) selected @endif>دينية</option>
                    <option value="علمية"  @if($book->category == "علمية" ) selected @endif>علمية</option>
                    <option value="برمجة"  @if($book->category == "برمجة" ) selected @endif>برمجة</option>
                    <option value="تاريخية" @if($book->category == "تاريخية" ) selected @endif>تاريخية</option>
                </select>
            </div>
            <div>
                <label for="book_author" class="form-label fw-bold">مؤلف الكتاب</label>
                <input type="text" name="book_author" id="book_author" class="form-control" required value="{{ $book->author }}">
            </div>
            <div>
                <label for="book_price" class="form-label fw-bold">سعر الكتاب</label>
                <input required type="number" step="0.1" name="book_price" id="book_price" class="form-control" value="{{ $book->price }}">
            </div>
            <div>
                <label for="formFile" class="form-label fw-bold">صورة الكتاب</label>
                <input class="form-control" type="file" id="formFile" name="book_image">
            </div>
            <div>
                <button type="submit" class="btn btn-info">تعديل الكتاب</button>
            </div>
        </form>
    </div>
@endsection
