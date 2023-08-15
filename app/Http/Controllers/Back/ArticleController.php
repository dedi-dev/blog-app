<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Category;
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
        return view('back.article.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension(); // get extension file
        $file->storeAs('/public/back/', $fileName); // store file /public/back/img23.jpg
        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);
        Article::create($data);
        return redirect('articles')->with('success', 'Success create new article');
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
