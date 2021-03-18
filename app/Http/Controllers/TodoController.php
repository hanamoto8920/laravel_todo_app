<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Todoモデルを使う
use App\Models\Todo;
use DB;

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
        return view('todo/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo;
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('todo/index');


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
        $todo = Todo::find($request->id);
        return view('todo/edit', ['form' => $todo]);
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
        // $todo = Todo::find($request->id);
        // $form = $request->all();
        // unset($form['_token']);
        // $todo->fill($form)->save();
        // return redirect('/todo/index');
        $todo = Todo::find($request->id);
        $todo->title = $request->title;
        $todo->text = $request->text;
        $todo->update();
        return redirect('todo/index', ['form' => $todo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('todo.destroy', ['form' => $todo]);
    }
    public function delete(Request $request) 
    {
        $todo = Todo::find($request->id);
        $todo->delete();
        return redirect('todo/index');
    }
}
