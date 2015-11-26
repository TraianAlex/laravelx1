<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Auth;

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
        //$this->validate($request, ['title' => 'required', 'body' => 'required']);
        //Article::create($request->all());
        //$article = new Article($request->all());//
        //Auth::user()->articles()->save($article);//
          //$article = Auth::user()->articles()->create($request->all());
          //$article->tags()->attach($request->input('tag_list'));
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
    public function destroy($id)
    {
        //
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