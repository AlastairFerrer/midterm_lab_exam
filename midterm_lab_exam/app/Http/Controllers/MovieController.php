<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {
        $movies = Movie::where('title', 'like', '%'. $request->search .'%')
        ->Orwhere("director", "like", "%". $request->search . "%")->get();

        return view('search_result', compact('movies'));
    }

    public function refetch(Request $request)
    {
        $moviesQuery = Movie::query();

        if ($request && $request->has('search')) {
            $searchTerm = $request->search;
            $moviesQuery->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('director', 'like', '%' . $searchTerm . '%');
        }

        $movies = $moviesQuery->get();

        return view('search_result', compact('movies'));
    }
    public function get_details(Request $request)
    {
        $movie = Movie::find($request->id);

        return view('movie_details', compact('movie'));
    }

    public function add(Request $request)
    {
        $movie = null;

        return view('movie_editor', compact('movie'));
    }

    public function create(Request $request)
    {
        // your codes start here
        $movie = Validator::make($request->all(), [
            'title' => 'required',
            'director' => 'required',
            'release_year' => 'required|integer',
            'rating' => 'required|numeric',  
            'description' => 'required|string', 
        ]);
        
        if ($movie->fails()) {
            return response()->json(['errors' => $movie->errors()], 422);
        }
        
        Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'release_year' => $request->release_year,
            'rating' => $request->rating,
            'description' => $request->description,
        ]);

        return $this->refetch($request);

    }

    public function edit(Request $request)
    {
        $movie = Movie::find($request->id);

        return view('movie_editor', compact('movie'));
    }

    public function update(Request $request)
    {
        // your codes start here
        $validator = Validator::make($request->all(), [
            'id', 'exists:movie',
            'title' => 'required',
            'director' => 'required',
            'release_year' => 'required|integer',
            'rating' => 'required|numeric',  
            'description' => 'required|string', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $movie = Movie::find($request->id);

        if($movie){
            $movie->update([
                'title' => $request->title,
                'director' => $request->director,
                'release_year' => $request->release_year,
                'rating' => $request->rating,
                'description' => $request->description,
            ]);

            return response()->json(['message' => 'Successfully Updated!']);
        }

        return $this->refetch($request);
    }

    public function delete(Request $request)
    {
        // your codes start here
        
        $movie = Movie::find($request->id);

        if($movie){
            $movie->delete();

            return response()->json(['message' => 'Successfully Deleted!']);
        }
      
    }
}
