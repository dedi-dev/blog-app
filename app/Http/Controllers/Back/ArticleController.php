<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('Category')->latest()->get();
            return DataTables::of($article)
            ->addColumn('category', function($article) {
                return $article->Category->name;
            })
            ->addColumn('status', function($article) {
                if ($article->status == 0) {
                    return '<span class="badge bg-danger">Private</span>';
                } else {
                    return '<span class="badge bg-success">Published</span>';
                }
            })
            ->addColumn('action', function($article){
                return '<div class="text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategory{{$article->id}}">Detail</button>
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createCategory{{$article->id}}">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategory{{$article->id}}">Delete</button>
                        </div>';
            })
            ->rawColumns(['category', 'status', 'action'])
            ->make();
        }

        return view('back.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
