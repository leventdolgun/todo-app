<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();

        //         Todo::create([
        //  'value' => "norun abi",
        //  "is_completed" => false
        //         ]);

        /*$todo = new Todo();
        $todo->value= "test";
        $todo->is_completed= false;
        $todo->save();*/

        return view('todos.index', ['todos' => $todos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $yapilacakIs = $request->yapilacak_is;

        Todo::create([
            'value' => $yapilacakIs,
            "is_completed" => false
        ]);

        return redirect()->to('/')->with('notification', 'Todo basariyla eklenmistir.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $yapilacakIs = $request->get("yapilacak_is");
        $tamamlandiMi = $request->has("tamamlandi_mi");

        $todo->update([
            'value' => $yapilacakIs,
            'is_completed' => $tamamlandiMi
        ]);

        return redirect()->to('/')->with('notification', 'Todo basariyla  güncellenmişmiştir.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->to('/')->with('notification', 'Todo basariyla silinmiştir.');
    }
}
