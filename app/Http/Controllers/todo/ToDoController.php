<?php

namespace App\Http\Controllers\todo;

use App\Contracts\Services\Todo\TodoServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoPostRequest;

/**
 * This is Post controller.
 * This handles Post CRUD processing.
 */
class ToDoController extends Controller
{

    private $todoService;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(TodoServiceInterface $todoServiceInterface)
  {
    $this->todoService = $todoServiceInterface;

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
     * @return view todoList page
     */
    public function createToDo(TodoPostRequest $request) {
        $this->todoService->saveTodo($request->name, $request->instruction);
        return redirect()->route('todo-show-view');
    }

    /**
     * To show Todos data
     * @return view todoList page with array $todos
     */
    public function showToDo() {
        $todos = $this->todoService->getTodo();
        return view('todo.todoList', ['todos' => $todos]);
    }

    /**
     * To Update Todo
     * @param string $id todos id
     * @return view update page with array $todos
     */
    public function updateToDoView($id) {
        $todos = $this->todoService->getTodoById($id);
        return view('todo.update', ['todos' => $todos]);
    }
    /**
     * * To update Todo
     * @param Request $request name, instruction
     * @return view todoList page
     */
    public function updateToDo(TodoPostRequest $request) {
        $this->todoService->updateToDo($request->id, $request->name, $request->instruction);
        return redirect()->route('todo-show-view');
    }

    /**
     * To delete ToDo
     * @param string $id todos id
     * @return view todoList page
     */
    public function deleteToDo($id) {
        $this->todoService->deleteTodo($id);
        return redirect()->route('todo-show-view');
    }
}
