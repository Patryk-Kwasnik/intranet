<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    protected $statuses = [
        1=>"Nowe",
        2=>"W trakcie realizacji",
        3=>"Zrealizowane",
        4=>"Anulowane"
    ];
    protected $priorities = [
        1=>"Niski",
        2=>"Normalny",
        3=>"Wysoki",
    ];

    function __construct()
    {
        $this->middleware('permission:tasks-list|tasks-create|tasks-edit|tasks-delete', ['only' => ['index','show']]);
        $this->middleware('permission:tasks-create', ['only' => ['create','store']]);
        $this->middleware('permission:tasks-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:tasks-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Tasks::orderBy('id','DESC')->paginate(5);

        return view('admin.tasks.index',compact('tasks', ))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = $this->statuses;
        $priorities = $this->priorities;
        $employees = User::pluck('name','id')->toArray();
        return view('admin.tasks.create',compact('statuses','priorities', 'employees' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['id_author'] = Auth::id();
        $this->validate($request, [
            'name' => 'required',
            'text' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'id_user_assigned' => 'required',
        ]);

        Tasks::create($request->all());

        return redirect()->route('tasks.index')
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
        $task = Tasks::find($id);
        $statuses = $this->statuses;
        $priorities = $this->priorities;

        $employees = User::pluck('name','id')->toArray();
        return view('admin.tasks.show',compact('task', 'statuses', 'priorities', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
        $statuses = $this->statuses;
        $priorities = $this->priorities;
        $employees = User::pluck('name','id')->toArray();
        return view('admin.tasks.edit',compact('task', 'statuses', 'priorities', 'employees'));
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
            'name' => 'required',
            'text' => 'required',
        ]);
        $tasks = Tasks::find($id);
        $tasks->update($request->all());

        return redirect()->route('tasks.index')->with('success',__('system.success_update_mes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("tasks")->where('id',$id)->delete();
        $notification = array(
            'message' => __('system.success_del_mess'),
            'alert-type' => 'info'
        );
        return redirect()->route('tasks.index')->with($notification);
    }
}
