<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;

class EBookController extends Controller
{
    public function getDetails(Request $request){
        $id = $request->id;

        $selectedBook = EBook::where('e_books.id', $id)->first();

        $data=[
            'selectedBook' => $selectedBook
        ];

        return view('detail', $data);
    }
}
