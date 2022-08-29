<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class SnackController
 * @package App\Http\Controllers
 */
class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('can:snacks.index');
    }
    public function index()
    {
        $snacks = Snack::paginate();

        return view('snack.index', compact('snacks'))
            ->with('i', (request()->input('page', 1) - 1) * $snacks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $snack = new Snack();
        return view('snack.create', compact('snack'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Snack::$rules);
        $imagenes = $request->file('url')->store('public/imagenes');
        
        $url= Storage::url($imagenes);
        Snack::create([
        'bar_id' => $request->input('bar_id'),
        'nombre' => $request->input('nombre'),
        'precio' => $request->input('precio'),
        'disponible' => $request->input('disponible'),
        'descripcion' => $request->input('descripcion'),
        'url' => $url
        ]
    
    );
    
    return redirect()->route('snacks.index')
    ->with('success', 'Snack Creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $snack = Snack::find($id);

        return view('snack.show', compact('snack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $snack = Snack::find($id);

        return view('snack.edit', compact('snack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Snack $snack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snack $snack)
    {
        request()->validate(Snack::$rules);

        $snack->update($request->all());

        return redirect()->route('snacks.index')
            ->with('success', 'Snack actualizado ');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $snack = Snack::find($id)->delete();

        return redirect()->route('snacks.index')
            ->with('success', 'Snack borrado ');
    }
}
