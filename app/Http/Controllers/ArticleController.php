<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $builder = Article::query()->with('preview')->with('category');
        $filters = $request->all();

        foreach ($filters as $filter => $value) {
            switch ($filter){
                case 'category_id':
                    $builder->where('category_id', '=', $value);
                    break;
                case 'last':
                    $builder->orderBy('created_at', 'desc')->take($value);
                    break;
                case 'first':
                    $builder->orderBy('created_at', 'asc')->take($value);
                    break;
                case 'views':
                    $builder->orderBy('views', $value);
                    break;
                case 'rating':
                    $builder->orderBy('rating', $value);
                    break;
            }
        }
        return $builder->get();
    }
    public function mappingById($article)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return [
            'data' => $article,
            'files' => $article->files()->get(),
            'preview_data' => $article->preview()->get(),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    public function allCategories(Request $request)
    {
        $categories = Category::all();
        $count = $request->input('last') ?? 6;

        $posts = [];
        foreach ($categories as $category) {
            $posts[$category->name] = Article::where('category_id', '=', $category->id)
                ->with('preview')
                ->with('category')
                ->orderByDesc('created_at')
                ->take($count)->get();
        }
        return $posts;
    }
    public function lastPost()
    {;
        return Article::latest()->first()->get();
    }
}
