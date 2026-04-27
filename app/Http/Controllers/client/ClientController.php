<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller {
    public function index() {
        $book = Book::inRandomOrder()->withAvg( 'review', 'stars' )->first();
        $books = Book::withAvg( 'review', 'stars' )
        ->limit( 4 )
        ->get()
        ->groupBy( 'category' );

        $categories = Book::pluck( 'category' )->unique();

        return view( 'client.index', [
            'book' => $book,
            'books' => $books,
            'categories' => $categories
        ] );
    }
    public function about(){
        return view("client.about");
    }
public function contact(){
        return view("client.contact");
    }

    public function profile() {
        $user = Auth::user();
        $admin = false;
        if ( count( $user->admin()->get() ) > 0 ) {
            $admin = true;
        }
        $userCartBookIds = Auth::user()->cart()->pluck( 'book_id' );

        $userCart = Book::whereIn( 'id', $userCartBookIds )->get();

        return view( 'client.profile', [ 'user'=>$user, 'is_admin' => $admin, 'userCart'=>$userCart ] );
    }

    public function profileUpdate( Request $request ) {
        $user = auth()->user();

        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ] );

        $user->name = $request->name;
        $user->email = $request->email;

        if ( $request->filled( 'password' ) ) {
            $user->password = Hash::make( $request->password );
        }

        $user->save();

        return redirect()->route("client.profile");
    }

    public function showBook( $book_id ) {
        $book = Book::findOrFail( $book_id );
        $checkInCart = Cart::where( 'book_id', $book_id )->where( 'user_id', Auth::user()->id )->exists();
        $reviews = Review::where( 'book_id', $book_id )->get()->all();
        $average = Review::where( 'book_id', $book_id )->avg( 'stars' );
        return view( 'client.book', [ 'book'=>$book, 'checkInCart'=>$checkInCart, 'reviews' => $reviews, 'avg'=>floor( $average ) ] );
    }

    public function addBookToCart( Cart $cart, $book_id ) {
        Book::findOrFail( $book_id )->get( 'id' );
        $checkInCart = Cart::where( 'book_id', $book_id )->where( 'user_id', Auth::user()->id )->exists();
        if ( !$checkInCart ) {
            $cart->book_id = $book_id;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        return redirect()->route( 'client.profile' );
    }

    public function deleteBookFromCart( $book_id ) {
        Cart::where( 'book_id', $book_id )->where( 'user_id', Auth::user()->id )->delete();
        return redirect()->route( 'client.profile' );

    }

    public function showReview( $book_id ) {
        $checkInCart = Cart::where( 'book_id', $book_id )->where( 'user_id', Auth::user()->id )->exists();
        if ( !$checkInCart ) {
            return redirect()->route( 'client.profile' );
        }
        $book_img = Book::where( 'id', $book_id )->get( 'book_img' )->first();
        // dd( $book_img );
        return view( 'client.review', [ 'book_img'=>$book_img[ 'book_img' ], 'book_id'=> $book_id ] );
    }

    public function addReview( Request $req, Review $review, $book_id ) {
        $checkReview = Review::where( 'book_id', $book_id )->where( 'user_id', Auth::user()->id )->exists();
        if ( !$checkReview ) {
            $req->validate( [ 'rating' => 'required|min:1|max:5' ] );
            $review->book_id = $book_id;
            $review->user_id = Auth::user()->id;
            $review->stars = $req->input( 'rating' );
            $review->save();
            return redirect()->route( 'client.profile' );
        }
        return redirect()->back()->withErrors( [
            'rating' => 'لقد قمت بتقييم هذا الكتاب مسبقاً ❗'
        ] );
    }

    public function showCategory( $book_category ) {
        $books = Book::get()->where( 'category', $book_category );
        if ( count( $books ) < 1 ) {
            return abort( 404 );
        }
        return view( 'client.category', [ 'books'=>$books, 'category'=>$book_category ] );
    }

    public function showAuhor( $author ) {
        $books = Book::get()->where( 'author', $author );
        if ( count( $books ) < 1 ) {
            return abort( 404 );
        }
        return view( 'client.author', [ 'books'=>$books, 'author'=>$author ] );
    }
}
