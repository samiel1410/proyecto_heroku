<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Role::create(['name'=>'Admin']);
        $encargado=Role::create(['name'=>'Encargado']);
        $cliente=Role::create(['name'=>'Cliente']);


        Permission::create(['name'=>'home','description'=>'Ver Dashboard'])->syncRoles([$admin,$encargado]);
        //roles campus
        Permission::create(['name'=>'campuses.index','description'=>'Ver lista de los Campus'])->syncRoles([$admin]);
        Permission::create(['name'=>'campuses.create','description'=>'Crear Campus'])->syncRoles([$admin]);
        Permission::create(['name'=>'campuses.edit','description'=>'Editar Campus'])->syncRoles([$admin]);
        Permission::create(['name'=>'campuses.show','description'=>'Mostrar Campus'])->syncRoles([$admin]);
        Permission::create(['name'=>'campuses.form','description'=>'Formulario de Campus'])->syncRoles([$admin]);

        //roles bar
        Permission::create(['name'=>'bars.index','description'=>'Ver lista de los Bares'])->syncRoles([$admin]);
        Permission::create(['name'=>'bars.edit','description'=>'Editar Bar'])->syncRoles([$admin]);
        Permission::create(['name'=>'bars.show','description'=>'Mostrar Bar'])->syncRoles([$admin]);
        Permission::create(['name'=>'bars.form','description'=>'Formulario de Bar'])->syncRoles([$admin]);
        Permission::create(['name'=>'bars.create','description'=>'Crear Bar'])->syncRoles([$admin]);
        

        //roles menu
        Permission::create(['name'=>'menus.index','description'=>'Ver listado de los Menus'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'menus.create','description'=>'Crear Menu'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'menus.edit','description'=>'Editar Menu'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'menus.show','description'=>'Mostrar Menu'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'menus.form','description'=>'Formulario de los Menus'])->syncRoles([$admin,$encargado]);

        //roles snack
        Permission::create(['name'=>'snacks.index','description'=>'Ver listado de los Snacks'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'snacks.create','description'=>'Crear Snack'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'snacks.edit','description'=>'Ediatr Snack'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'snacks.show','description'=>'Mostrar Snack'])->syncRoles([$admin,$encargado]);
        Permission::create(['name'=>'snacks.form','description'=>'Formulario de los Snacks'])->syncRoles([$admin,$encargado]);

        //roles buzon
        Permission::create(['name'=>'buzons.index','description'=>'Ver listado de los Buzones'])->syncRoles([$admin,$encargado,$cliente]);
        Permission::create(['name'=>'buzons.create','description'=>'Crear Buzon'])->syncRoles([$admin,$encargado,$cliente]);
        Permission::create(['name'=>'buzons.edit','description'=>'Editar Buzon'])->syncRoles([$admin,$encargado,$cliente]);
        Permission::create(['name'=>'buzons.show','description'=>'Mostrar Buzon'])->syncRoles([$admin,$encargado,$cliente]);
        Permission::create(['name'=>'buzons.form','description'=>'Formulario de Buzones'])->syncRoles([$admin,$encargado,$cliente]);



        //roles preferencias 
        Permission::create(['name'=>'preferencias.index','description'=>'Ver listado de las Preferencias'])->syncRoles([$cliente, $admin,$encargado]);
        Permission::create(['name'=>'preferencias.show','description'=>'Mostrar Preferencia'])->syncRoles([$cliente, $admin,$encargado]);
        Permission::create(['name'=>'preferencias.create','description'=>'Crear Preferencia'])->syncRoles([$cliente, $admin,$encargado]);
        Permission::create(['name'=>'preferencias.edit','description'=>'Editar Preferencia'])->syncRoles([$cliente, $admin,$encargado]);
        Permission::create(['name'=>'preferencias.form','description'=>'Formulario de Preferencias'])->syncRoles([$cliente, $admin,$encargado]);


     
    }
}
