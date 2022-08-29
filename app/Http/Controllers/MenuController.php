<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('can:menus.index');
    }
    public function index()
    {
        $menus = Menu::paginate();

        return view('menu.index', compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * $menus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = new Menu();
        return view('menu.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        request()->validate(Menu::$rules);
        $folder ="imagenes";
       
        
        $url= Storage::disk('s3')->put($folder,$request->file('url'),'public');
        $menu= new Menu;
        $menu->bar_id = $request->bar_id;
        $menu->nombre = $request->nombre;
        $menu->disponible = $request->disponible;
        $menu->precio = $request->precio;
        $menu->descripcion = $request->descripcion;
        $menu->url = $url;
        
        $menu->save();
    return redirect()->route('menus.index')
    ->with('success', 'Menu creado .');
}
catch(\Exception $e){
    return redirect()->route('menus.index')
    ->with('error', 'Nose se pudo'.$e->getMessage());
}
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);

        return view('menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);

        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        request()->validate(Menu::$rules);

        $menu->update($request->all());

        return redirect()->route('menus.index')
            ->with('success', 'Menu actualizado ');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $menu = Menu::findOrFail($id);
            Storage::disk('s3')->delete($menu->url);

            return redirect()->route('menus.index')
                ->with('success', 'Menu borrado ');

        }
        catch(\Exception $e){
            return redirect()->route('menus.index')
            ->with('error', 'Nose se pudo'.$e->getMessage());
        }
    }
}
