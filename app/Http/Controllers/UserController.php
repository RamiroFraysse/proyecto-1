<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Item;
use App\Lista;

class UserController extends Controller
{
    /**Index se va a referir a nuestro modulo de usuario, cuya logica va a estar encapsulada en UserController  */
    public function index(){

        //usoEloquentModel para obtener la tabla de usuarios
        $users = User::orderBy('name','desc')->get();

        //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**Muestra el detalle del usuario. */
    public function show(User $user){
        $user = User::find($user->id);
        if($user == null){
            return response()->view('errors.404',[],404);
        }
        else{
            return view('users.show', [
                'user'=> $user,
            ]);
        }
    }

    public function create(){
         if(auth()->user()!=null)
            return view('users.create');
         else
            return back();
    }
    public function createItem(){
        $lists = request()->all();
        return view('users.createItem', [
            'lists' => $lists,
        ]);
    }
public function storeItem(){
        $data = request()->all();
        Item::create([
            'nombre_club' => $data['nombre_club'],
            'nombre_estadio' => $data['nombre_estadio'],
            'capacidad_estadio' =>$data['capacidad_estadio'],
            'pais' =>$data['pais'],
            'list_id' => $data['list_id'],
        ]);
        return redirect()->route('users.createItem');
    }

    public function store(){
        /**Recibimos los datos del formulario */
        $data = request()->all();

        Lista::create([
            'name' => $data['name'],
            'isPublic' => true,
        ]);

        /**Redirecciono al usuario a detalles */
        return redirect()->route('users.createItem');
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user){
        $data = request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),], //En la busqueda me tiene que ignorar el mail actual del usuario.
            'password' => '',
        ]);

        if($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        }else{
            //Usamos unset para quitar el indice password del array asociativo de la variable data
            unset($data['password']);
        }


        $user->update($data);

        return redirect("usuarios/{$user->id}");
        // return redirect()->route('users.show', [
        //     'user' => $user->id
        // ]);
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('users.index');
    }
}
