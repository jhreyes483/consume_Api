<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categoria;
use App\Models\User;

class crudTest extends TestCase{

//    public function create_categoria(){
//        //1. Given => Teniendo usuario autenticado
//        $user = factory(User::class)->create();
//        $this->actingAs($user);
//        //2. When => Cueando hace un post request
//        $this->post(route('categorias.store'), ['nom_categoria'=>'categoria test']);
//
//        //3. Then => Entonces veo una nueva categoria en la base de datos
//        $this->assertDatabaseHas('categorias', [
//            'nom_categoria' => 'categoria test'
//        ]);
//
//    }

//    /**@test*/
//    public function test_create(){
//        $user = User::find(1);
//        if($user){
//            $this->actingAs($user);
//        }
//        $this->post(route('categorias.index'), ['nom_categoria'=>'categoria test']);
//
//        $this->assertDatabaseHas('categorias', [
//            'nom_categoria' => 'categoria test2'
//        ]);
//    }

//
//    public function test_index(){
//        $this->get('/categorias');
//        $this->assertDatabaseHas('categorias', [
//          'nom_categoria' => 'Alimentos'
//       ]);
//    }


//public function test_update(){
//    $r = $this->json('PUT','/categorias/1',
//    ['nom_categoria'=>'update ok']
//    );
//}



//    public function test_index(){
//        $this->get('/categorias');
//        $this->assertDatabaseHas('categorias', [
//          'nom_categoria' => 'Alimentos'
//       ]);
//    }


}
