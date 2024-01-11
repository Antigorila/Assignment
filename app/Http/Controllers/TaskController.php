<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Eredmenyek;
use Illuminate\Http\Request;


use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add.add_task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretaskRequest $request)
    {
        $task = task::create([
            'category_id' => $request->category_id,
            'assignment_title' => $request->assignment_title,
            'assignment' => $request->assignment,
            'answer' => $request->answer,
            'description' => $request->description,
        ]);
        
        $task->save();
        return view('add.add_task');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        return view('show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        //
    }

    // Feltételezve, hogy van egy modellünk, amely Eredmenyek néven reprezentálja az eredményeket
// Feltételezve, hogy van egy vezérlőnk, amely TaskController néven kezeli a feladatokat és a feltöltést
// Feltételezve, hogy van egy útvonalunk, amely a /task/{id}/upload címen kezeli a feltöltési kérést

// A TaskController.php fájlban
public function upload(Request $request, $id)
{
    // Lekérjük a task id-t a kérésből
    $task_id = $request->input('task_id');

    // Lekérjük az aktuálisan bejelentkezett felhasználó azonosítóját
    $user_id = Auth::user()->id;

    // Létrehozunk egy új példányt az Eredmenyek osztályból a felhasználó azonosítójával és a feladat azonosítójával
    $eredmenyek = new Eredmenyek();
    $eredmenyek->user_id = $user_id;
    $eredmenyek->task_id = $task_id;

    // Elmentjük a példányt az adatbázisba
    $eredmenyek->save();

    // Visszairányítunk a feladat oldalára
    return redirect()->route('task.show', ['id' => $id]);
}

}
