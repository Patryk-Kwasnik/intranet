<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use DB;

class NewsCategoryController extends Controller
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
        $news = NewsCategory::orderBy('id','DESC')->paginate(5);
        return view('admin.news.category.index',compact('news'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::get();
        return view('admin.news.category.create',compact('categories'));
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
            'name' => 'required'
        ]);
        NewsCategory::create($request->all());

        return redirect()->route('newsCategory.index')
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
        $category = DB::table('news_categories')->select('news_categories.*','news_parent.name as name_parent')
            ->leftJoin('news_categories as news_parent', 'news_parent.id', '=', 'news_categories.id_parent')
            ->where('news_categories.id',$id)->first();

        return view('admin.news.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = NewsCategory::pluck('name','id')->toArray();
        $array = [''=>'wybierz'];
        $categories = $array+$categories;

        $category = NewsCategory::find($id);
        return view('admin.news.category.edit',compact('category','categories'));
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
            'name' => 'required'
        ]);
        $category = NewsCategory::find($id);
        $category->update($request->all());

        return redirect()->route('newsCategory.index')->with('success',__('system.success_update_mes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("news_categories")->where('id',$id)->delete();
        $notification = array(
            'message' => __('system.success_del_mess'),
            'alert-type' => 'info'
        );
        return redirect()->route('newsCategory.index')->with($notification);
    }
}
