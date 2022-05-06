<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Borrow;
use Illuminate\Http\Request;

class borrowController extends Controller
{
    public function index()
    {
      $book = Books::all();
      $data = $book->toArray();
      $bookavailable= [
          'bookavailable' => $data,
      ];

      return response()->json($bookavailable, 202);
    }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   public function store(Request $request)
  {
     $validat = $request->validate([
           'userid'=>'required',
           'bookname'=>'required',
          //  'borrowdate'=>'required',
      ]);
      
// if($validat->fails()){
// $response=[
// 'success' => 'failed',
// 'data' => 'validation error',
// 'message' => $validat->errors()
// ];
// return response()->json($response, 404);
// }
 $borrowbook = Borrow::create($request->all());
$data = $borrowbook->toArray();
$response =[
    'success' => 'true',
    'data' => $data,
    'status' => "Book borrow successfully"
    ];

    return response()->json($response, 202);
}


}
