<?php

use App\Planta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReceitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Suco verde de ora-pro-nobis',
            'tipo' => 'Bebidas',
            'modoPreparo' => 'bata todos os ingredientes no liquidificador e coe ou passe por uma peneira. ',
            'observacao' => 'Aqui nessa receita podemos incluir também o própolis verde. Se preferir, acrescente bastante gelo.',
            'fotos' => 'https://s2.glbimg.com/jV5icES7rQKDZKSLHqLnMbJoQT4=/0x0:898x1169/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/n/m/x32x2bRx68CIgdqXOL9g/suco-verde.jpg'
        ]);

        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Ora-pro-nóbis')->first()->id,
            'receitas_id' => $id,
            'quantidade' => '1 folha'
        ]);

        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'óleo',
            'quantidade'=> '3 colheres'
        ]);

        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);

    }
}
