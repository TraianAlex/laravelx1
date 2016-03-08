<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Auth;
use Gate;

class ArticleController extends Controller
{
    /**
     * Create a new article controller instance
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);//['only' => 'create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = \App\Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)//Request
    {    
        //dd($request->input('tag_list'));
        //$this->validate($request, ['title' => 'required', 'body' => 'required']);
        //Article::create($request->all());

        //$article = new Article($request->all());//
        //Auth::user()->articles()->save($article);//

        //$article = Auth::user()->articles()->create($request->all());//create an article with an auth user
        //$article->tags()->attach($request->input('tag_list'));//attach the tag id (getTagListAttribute -> tag_list) get from form by model binding

          //$this->syncTags($article, $request->input('tag_list'));
          $this->createArticle($request);
        //session()->flash('msg', 'Your article has been created!');
        //session()->flash('msg_important', true);
        //\Flash::success();//::info()//::error()//flash package
        //flash('Your article has been created!');
        //flash()->success('Your article has been created!');
        flash()->overlay('Your article has been created!', 'Good Job');
        return redirect('article');//->with([
            //'msg' => 'Your article has been created!',
            //'msg_important' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)//$id
    {
        //test
        //auth()->logout();//or change the users id
        // auth()->loginUsingId(8);//11

        // if(Gate::denies('edit', $article))
        // {
        //     abort(403, 'Sorry, not sorry.');
        // }

        //$article = Article::findOrFail($id);//if(is_null($user)) abort(404);
        //dd($article->published_at);
        //dd($article->created_at->addDays(8)->diffForHumans());//year//month//addDays(8)->format('Y-m')//diffForHumans()
        
        return view('articles.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)//$id
    {
         if(Gate::denies('edit', $article))//allows //edit-article if use AuthServiceProvider::boot
         {
             abort(403, 'Sorry, not sorry.');
         }

        //$this->authorize('edit-article', $article);

        // if(auth()->user()->can('edit-article', $article))//cannot
        // {
        //     return 'You can see this.';
        // }
        // if(auth()->user()->cannot('edit', $article))
        // {
        //     return redirect('article');
        // }

        //$article = Article::findOrFail($id);
        $tags = \App\Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)//$id
    {
        //if($this->authorize('edit-article', $article))
        if($request->user()->cannot('edit', $article))
        {
            return redirect('article');
        }

        //$article = Article::findOrFail($id);
        $article->update($request->all());
        //$article->tags()->sync($request->input('tag_list'));
        $this->syncTags($article, $request->input('tag_list'));
        return redirect('article');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(auth()->user()->cannot('edit', $article))//?
        {
            return redirect('article');
        }
        $article->tags()->detach();
        $article->delete();
        flash('Your article has been deleted!');
        return redirect('article');
    }
    /**
     * Sync up the list of tags in the database
     * @param  Article $article
     * @param  array $tags
     */
    private function syncTags(Article $article, $tags)//array
    {
        $article->tags()->sync(!$tags ? [] : $tags);
    }
    /**
     * @param  ArticleRequest $request
     * @return [type]
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        //$article->tags()->attach($request->input('tag_list'));
        $this->syncTags($article, $request->input('tag_list'));
        return $article;
    }
}