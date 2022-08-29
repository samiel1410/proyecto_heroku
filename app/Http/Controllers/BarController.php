<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use Illuminate\Http\Request;

/**
 * Class BarController
 * @package App\Http\Controllers
 */
class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('can:bars.index');
    }
    public function index()
    {
        $bars = Bar::paginate();

        return view('bar.index', compact('bars'))
            ->with('i', (request()->input('page', 1) - 1) * $bars->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bar = new Bar();
        return view('bar.create', compact('bar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bar::$rules);

        $bar = Bar::create($request->all());

        return redirect()->route('bars.index')
            ->with('success', 'Bar created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bar = Bar::find($id);

        return view('bar.show', compact('bar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bar = Bar::find($id);

        return view('bar.edit', compact('bar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bar $bar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bar $bar)
    {
        request()->validate(Bar::$rules);

        $bar->update($request->all());

        return redirect()->route('bars.index')
            ->with('success', 'Bar updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bar = Bar::find($id)->delete();

        return redirect()->route('bars.index')
            ->with('success', 'Bar deleted successfully');
    }
}
