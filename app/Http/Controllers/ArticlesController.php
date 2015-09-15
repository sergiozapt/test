<?php

namespace Pipeline\Http\Controllers;

use Pipeline\Article;
use Pipeline\Tag;
use Pipeline\Http\Requests;
use Pipeline\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Pipeline\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ArticlesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show main page with all articles
     * @return Response
     */
    public function index()
    {
        $pageTitle = trans('titles.homepage');
    	$articles = Article::latest('published_at')->published()->get();

    	return view('articles.index', compact('articles', 'pageTitle'));
    }


    /**
     * Show unpublished articles (future publishing date)
     * @return type
     */
    public function deleted()
    {
        //$articles = Article::withTrashed()->get();
        $articles = Article::onlyTrashed()->get();
        $pageTitle = trans('titles.deleted_articles');
        return view('articles.index', compact('articles', 'pageTitle'));
    }

    /**
     * Show unpublished articles (future publishing date)
     * @return type
     */
    public function unpublished()
    {
        $articles = Article::latest('published_at')->unpublished()->get();
        $pageTitle = trans('titles.future_articles');

        return view('articles.index', compact('articles', 'pageTitle'));
    }

    /**
     * Show specific article
     * @param type $id 
     * @return Response
     */
    public function show(Article $article)
    {
        
    	//$article = Article::findOrFail($id);

    	return view('articles.show', compact('article'));
    }


    /**
     * Show specific article
     * @param type $id 
     * @return Response
     */
    public function destroy(Article $article)
    {
        //$article = Article::findOrFail($id);
        $article->delete();

        return redirect('articles');
    }


           
    public function restore($article)
    {
        //$article = Article::withTrashed()->findOrFail($id);
        $article->restore();

        return redirect('articles');
    }

    /**
     * Create article
     * @return Reponse
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

    	return view('articles.create', compact('tags'));
    }

    /**
     * Save article
     * @return Reponse
     */
    public function store(ArticleRequest $request)
    {

        //$article = new Article($request->all());
        //auth()->user()->articles()->save($article);
        //session()->flash('flash_message', 'Your article has been created');
        $article = auth()->user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tags'));

        //flash('Testing');
        flash()->overlay('Your article has been sucessfully created!', 'Good job');//->important();

    	return redirect('articles');/*->with([
            'flash_message' => 'Your article has been created', 
            'flash_message_important' => true
            ]);*/
    }

    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        //$article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }


}
