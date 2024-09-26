<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.calendarTasks.index');
    }
}
