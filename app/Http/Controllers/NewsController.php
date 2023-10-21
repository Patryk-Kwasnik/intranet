<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index','show']]);
        $this->middleware('permission:news-create', ['only' => ['create','store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::orderBy('id','DESC')->paginate(5);
        $categories = NewsCategory::pluck('name','id')->toArray();
        return view('admin.news.index',compact('news', 'categories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function showNewest()
    {
        $news = News::orderBy('id','DESC')->first();
        $categories = NewsCategory::pluck('name','id')->toArray();
        return view('admin.news.newest_window',compact('news', 'categories'))->render();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::pluck('name','id')->toArray();
        $categories = $this->addSelectOpt($categories);
        return view('admin.news.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        News::create($request->all());

        return redirect()->route('news.index')
            ->with('success',__('system.success_save_mess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        $category = DB::table('news_categories')->select('news_categories.*')->where('id', $news['id_category'])->first();
        return view('admin.news.show',compact('category', 'news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $category = DB::table('news_categories')->select('news_categories.*')->where('id', $news['id_category'])->first();
        $categories = NewsCategory::pluck('name','id')->toArray();
        $categories = $this->addSelectOpt($categories);
        return view('admin.news.edit',compact('categories','category','news'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $news = News::find($id);
        $news->update($request->all());

        return redirect()->route('news.index')->with('success',__('system.success_update_mes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("news")->where('id',$id)->delete();
        $notification = array(
            'message' => __('system.success_del_mess'),
            'alert-type' => 'info'
        );
        return redirect()->route('news.index')->with($notification);
    }
}
