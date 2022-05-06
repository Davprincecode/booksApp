<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $book = Books::all();
      $data = $book->toArray();
      $response = [
          'success' => 'true',
          'data' => $data,
          'message' => 'data successfully found'

      ];

      return response()->json($response, 202);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
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
          'bookname'=>'required',
           'publishername'=>'required',
      ]);
      
if($validat->fails()){
$response=[
'success' => 'failed',
'data' => 'validation error',
'message' => $validat->errors()
];
return response()->json($response, 404);
}

 $book = Books::create($request->all());
$data = $book->toArray();
$response =[
    'success' => 'true',
    'data' => $data,
    'message' => "post created successfully"
    ];

    return response()->json($response, 200);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $book = Books::find($id);
       $data = $book->toArray();
     if(is_null($book)){
         $response=[
             'success'=>'fail',
             'data' =>'empty data',
              'message' => 'data not found'
         ];
     return response()->json($response, 404);
     }
    
     $response=[
        'success'=>'true',
        'data' =>$data,
         'message' => 'post retrieve succesfully'
    ];
    return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books)
    {
        
    }
}
