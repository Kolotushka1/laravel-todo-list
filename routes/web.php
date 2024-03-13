<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get("/", function () {
        return redirect() -> route('tasks.index');
    });

    Route::get('/tasks', function (){
        return view('index', [
            "tasks" => Task::latest() -> paginate(10)
        ]);
    }) -> name('tasks.index');

    Route::view("/tasks/create", "create")
        ->name('tasks.create');

    Route::get('/tasks/{task}/edit', function (Task $task){
        return view('edit', [
            'task' => $task
        ]);
    }) -> name('tasks.edit');

    Route::get('/tasks/{task}', function (Task $task){
        return view('show', [
            'task' => $task
        ]);
    }) -> name('tasks.show');

    Route::post('/tasks', function (TaskRequest $request) {


        $task = Task::create($request->validated());

        return redirect()->route('tasks.show', ['task' => $task -> id])
            ->with('success', 'Task created successfully!');
    }) -> name('tasks.store');

    Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

        $data = $request->validated();

        $task->update($request->validated());

        return redirect()->route('tasks.show', ['task' => $task -> id])
            ->with('success', 'Task update successfully!');
    }) -> name('tasks.update');

    Route::fallback(function () {
        return "Still got somewhere!";
    });

    Route::delete('tasks/{task}', function (Task $task) {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task delete successfully!');
    })->name('tasks.destroy');

    Route::put('tasks/{task}/toggle-complete', function (Task $task) {
       $task->toggleComplete();

       return redirect()->back()->with('success', 'Task updated successfully!');
    }) -> name('tasks.toggle-complete');
