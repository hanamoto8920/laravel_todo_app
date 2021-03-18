<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Todoモデルを使う
use App\Models\Todo;
// DBクラスの使用
use DB;
// Auth機能を使用
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $todos = Todo::all();
        $todos = DB::table('todos')->orderBy('id','desc')->simplePaginate(5);
        return view('todo.index',['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        return view('todo/create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $todo = new Todo;
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('todo/index', ['user' => $user]);


        // $todo->title = $request->title;
        // $todo->text = $request->text;
        // $todo->save();
        // return redirect('todo/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $todo = Todo::find($request->id);
        return view('todo/edit', ['form' => $todo, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $todo = Todo::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        // return redirect('/todo/index');
        // $todo = Todo::find($request->id);
        // $todo->title = $request->title;
        // $todo->text = $request->text;
        // $todo->update();
        return redirect('todo/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $todo = Todo::find($request->id);
        return view('todo.destroy', ['form' => $todo, 'user' => $user]);
    }
    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->delete();
        return redirect('todo/index');
    }
}
