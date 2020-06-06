<?php

use Illuminate\Database\Seeder;
use App\User;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(User $user)
    {
        $user->create([
            'nome'=>Str::random(10),
            'sexo'=>'M',
            'nascimento'=>'2019-05-15'
        ]);
        $user->create([
            'nome'=>Str::random(10),
            'sexo'=>'F',
            'nascimento'=>'2019-02-20'
        ]);
        $user->create([
            'nome'=>Str::random(10),
            'sexo'=>'F',
            'nascimento'=>'2019-09-11'
        ]);
        $user->create([
            'nome'=>Str::random(10),
            'sexo'=>'M',
            'nascimento'=>'2019-04-16'
        ]);
        $user->create([
            'nome'=>Str::random(10),
            'sexo'=>'M',
            'nascimento'=>'2019-11-04'
        ]);
    }
}
