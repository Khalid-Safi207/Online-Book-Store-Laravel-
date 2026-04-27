<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

use function Pest\Laravel\delete;

class BooksController extends Controller {
    public function index() {
        $books = Book::all();
        return view( 'admin.books', [ 'books' => $books ] );
    }

    public function create() {
        return view( 'admin.book.add' );
    }

    public function store( Request $request ) {
        $validated = $request->validate( [
            'book_name' => 'required',
            'book_description' => 'required|min:30',
            'book_category' => 'required',
            'book_author'=>'required',
            'book_price'=>'required',
            'book_image'=>'required|image|max:2048'
        ] );
        $path = $request->file( 'book_image' )->store( 'uploads', 'public' );
        Book::create( [
            'book_name'=>$validated[ 'book_name' ],
            'book_description'=>$validated[ 'book_description' ],
            'category'=>$validated[ 'book_category' ],
            'author'=>$validated[ 'book_author' ],
            'price'=>$validated[ 'book_price' ],
            'book_img'=> $path
        ] );
        return redirect()->route( 'admin.books' );
    }

    public function edit( $id ) {
        $book = Book::findOrFail( $id );
        return view( 'admin.book.edit', [ 'book'=>$book ] );
    }

    public function update( Request $request, $book_id ) {
        $validated = $request->validate( [
            'book_name' => 'required',
            'book_description' => 'required|min:30',
            'book_category' => 'required',
            'book_author'=>'required',
            'book_price'=>'required',

        ] );
        if ( $request->hasFile( 'book_image' ) ) {
            // Delete Old Image
            $old_image = Book::where( 'id', $book_id )->first( 'book_img' );
            $path = public_path( 'storage/' . $old_image[ 'book_img' ] );

            if ( file_exists( $path ) ) {
                FacadesStorage::disk( 'public' )->delete( $old_image[ 'book_img' ] );
            }

            // Upload New Image
            $img_validate = $request->validate( [ 'book_image'=>'image|max:2048' ] );
            $path = $request->file( 'book_image' )->store( 'uploads', 'public' );
            Book::find( $book_id )->update( [ 'book_img'=>$path ] );
        }
        Book::find( $book_id )->update(
            [
                'book_name'=>$validated[ 'book_name' ],
                'book_description'=>$validated[ 'book_description' ],
                'category'=>$validated[ 'book_category' ],
                'author'=>$validated[ 'book_author' ],
                'price'=>$validated[ 'book_price' ],
            ]
        );
        return redirect()->route( 'admin.books' );

    }

    public function destroy( $book_id ) {
        // Delete Old Image
        $old_image = Book::where( 'id', $book_id )->first( 'book_img' );
        $path = public_path( 'storage/' . $old_image[ 'book_img' ] );

        if ( file_exists( $path ) ) {
            FacadesStorage::disk( 'public' )->delete( $old_image[ 'book_img' ] );
        }

        Book::findOrFail($book_id)->delete();
        return redirect()->route( 'admin.books' );

    }
}
