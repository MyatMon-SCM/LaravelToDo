<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\FuncCall;

/**
 * This is Post controller.
 * This handles Post CRUD processing.
 */
class ToDoController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {

  }

  /**
   * To show create post view
   * 
   * @return View create post
   */
  public function showCreateView()
  {
    return view('todo.create');
  }

    /**
     * To save Todo
     * @param Request $request name, instruction
     * @return view welcome page
     */
    public function createToDo(Request $request) {
        $name = $request->name;
        $instruction = $request->instruction;
        DB::transaction(function () use ($name, $instruction) {
            DB::insert("insert into todos (name, instruction) values (?,?) ", [$name, $instruction]);
        });
        return redirect()->route('welcome-view');
    }

    /**
     * To view Todo
     * @param
     * @return view todoList page with array $todos
     */
    public function showToDo() {
        $todos = DB::table('todos')->get();
        return view('todo.todoList', ['todos' => $todos]);
    }

    /**
     * To Update Todo
     * 
     */
    public function updateToDoView($id) {
        $todos = DB::table('todos')->where('id', $id)->get();
        // Log::info($todos);
        return view('todo.update', ['todos' => $todos]);
    }
    /**
     * * To update Todo
     * @param Request $request name, instruction
     * @return view welcome page
     */
    public function updateToDo(Request $request) {
        $id = $request->id;
        $name = $request->name;
        $instruction = $request->instruction;
        DB::update('update todos set name = ?, instruction = ? where id = ?',[$name, $instruction, $id]);
        return redirect()->route('welcome-view');
    }

    public function deleteToDo($id) {
        DB::delete("delete from todos where id = ?", [$id]);
        return redirect()->route('todo-show-view');
    }
}