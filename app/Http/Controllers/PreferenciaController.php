<?php

namespace App\Http\Controllers;

use App\Models\Preferencia;
use Illuminate\Http\Request;

/**
 * Class PreferenciaController
 * @package App\Http\Controllers
 */
class PreferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('can:preferencias.index');
       $this->middleware('auth');
    }
    public function index()
    {
        $preferencias = Preferencia::paginate();

        return view('preferencia.index', compact('preferencias'))
            ->with('i', (request()->input('page', 1) - 1) * $preferencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preferencia = new Preferencia();
        return view('preferencia.create', compact('preferencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Preferencia::$rules);

        $preferencia = Preferencia::create($request->all());

        return redirect()->route('preferencias.index')
            ->with('success', 'Preferencia creado .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preferencia = Preferencia::find($id);

        return view('preferencia.show', compact('preferencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preferencia = Preferencia::find($id);

        return view('preferencia.edit', compact('preferencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Preferencia $preferencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preferencia $preferencia)
    {
        request()->validate(Preferencia::$rules);

        $preferencia->update($request->all());

        return redirect()->route('preferencias.index')
            ->with('success', 'Preferencia actualizada ');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $preferencia = Preferencia::find($id)->delete();

        return redirect()->route('preferencias.index')
            ->with('success', 'Preferencia borrada ');
    }
}
