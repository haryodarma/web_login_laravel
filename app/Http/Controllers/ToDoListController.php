<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ToDoListService;

class ToDoListController extends Controller
{
    private ToDoListService $service;

    public function __construct(ToDoListService $service)
    {
        $this->service = $service;
    }

    public function todoList()
    {
        $todolist = $this->service->getToDoList();
        return response()->view("todolist.todolist", ["tittle" => "To Do List Page", "todolist" => $todolist]);

    }

    public function addToDoList(Request $request)
    {
        $todo = $request->input("todo");
        if (empty($todo)) {
            $todolist = $this->service->getToDoList();
            return redirect()->view("todoList", ["tittle" => "To Do List Page", "todolist" => $todolist, "error" => "Todo is required"]);
        }

        $this->service->addToDoList(uniqid(), $todo);
        return redirect()->action([ToDoListController::class, "todoList"]);

    }

    public function removetodoList($id)
    {
        $this->service->deleteToDoList($id);
        return redirect()->action([ToDoListController::class, "todoList"]);
    }
}
