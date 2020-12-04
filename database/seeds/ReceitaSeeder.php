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
            'nome' => 'Suco verde de ora-pro-nobis e urtiga',
            'tipo' => 'Bebidas',
            'porcoes' => 'Serve 5 pessoas',
            'tempoPreparo' => '5m',
            'modoPreparo' => 'bata todos os ingredientes no liquidificador e coe ou passe por uma peneira. ',
            'observacao' => 'Aqui nessa receita podemos incluir também o própolis verde. Se preferir, acrescente bastante gelo.',
            'fotos' => 'https://s2.glbimg.com/jV5icES7rQKDZKSLHqLnMbJoQT4=/0x0:898x1169/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2020/n/m/x32x2bRx68CIgdqXOL9g/suco-verde.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Ora-pro-nóbis')->first()->id,
            'receitas_id' => $id,
            'quantidade' => '2 folha'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Urtiga')->first()->id,
            'receitas_id' => $id,
            'quantidade' => '1/2 folha'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'água',
            'quantidade'=> '300ml'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);

        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Geleia de dente-de-leão',
            'tipo' => 'Doces e Bolos',
            'porcoes' => 'Serve 10 pessoas',
            'tempoPreparo' => '1 h',
            'modoPreparo' => 'Coloque o dente de leão junto com a água em uma panela com fogo baixo até dissover o dente de leao e acrescente o açúcar e o limão até dar o ponto de geleia',
            'fotos' => 'https://jardimdomundo.com/wp-content/uploads/2020/02/g4.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Dente-de-leão')->first()->id,
            'receitas_id' => 2,
            'quantidade' => '3 xícaras'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'açúcar',
            'quantidade'=> '4 xícaras e meia'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 2,
            'ingredientes_id' => $idIngrediente
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'suco de limão',
            'quantidade'=> '2 colheres'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 2,
            'ingredientes_id' => 2
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'água',
            'quantidade'=> '300ml'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 2,
            'ingredientes_id' => 3
        ]);


        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Bertalha refolgada',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => 'Serve 5 pessoas',
            'tempoPreparo' => '10 m',
            'modoPreparo' => 'Coloque o óleo para esquentar e acrescente a bertalha',
            'fotos' => 'https://www.receiteria.com.br/wp-content/uploads/receitas-com-bertalha-1-730x449.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Bertalha')->first()->id,
            'receitas_id' => 3,
            'quantidade' => '3 maços'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'óleo',
            'quantidade'=> '3 colheres'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 3,
            'ingredientes_id' => 4
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Beldroega com ovo',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => 'Serve 5 pessoas',
            'tempoPreparo' => '10 m',
            'modoPreparo' => 'Coloque o óleo para esquentar e acrescente a planta com o ovo e tempere a gosto',
            'fotos' => 'https://t2.rg.ltmcdn.com/pt/images/9/1/7/img_beldroega_com_ovo_4719_paso_5_600.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Beldroega')->first()->id,
            'receitas_id' => 4,
            'quantidade' => '3 maços'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'ovos',
            'quantidade'=> '3 unidades'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 4,
            'ingredientes_id' => 5
        ]);


        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Farofa de taioba',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '3 pessoas',
            'tempoPreparo' => '10m ',
            'modoPreparo' => 'Lave bem as folhas de taioba, retire os talos e corte em tiras finas. Em uma frigideira, adicione azeite e aqueça. Adicione o alho e deixe pegar sabor. Adicione taioba e misture bem. Acrescente a manteiga, coloque os ovos batidos e em seguida acrescente farinha de mandioca. Misture bem até ficar crocante e sirva.',
            'fotos' => 'https://2.bp.blogspot.com/-ai-n8g1obiU/UPQqRV-pmaI/AAAAAAAAPzI/DUwtQHWQqfU/s200/farofa-de-couve.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Taioba')->first()->id,
            'receitas_id' => 5,
            'quantidade' => '10 folhas'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Alho',
            'quantidade'=> 'A gosto'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 5,
            'ingredientes_id' => 6
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Ovos',
            'quantidade'=> '3 unidades'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 5,
            'ingredientes_id' => 7
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Manteiga, óleo ou azeita',
            'quantidade'=> 'Fio'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 5,
            'ingredientes_id' => 8
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Farinha',
            'quantidade'=> 'A gosto'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 5,
            'ingredientes_id' => 9
        ]);


        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Ensopado de Jacatupé',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => 'Serve 5 pessoas',
            'tempoPreparo' => '40m',
            'modoPreparo' => 'Corte os temperos a sua preferencia e refolgue, em seguida coloque o jacatupé e a água até cobrir e coloque na pressão por 30m',
            'fotos' => 'https://pt.food-of-dream.com/content/14/14925/eb047804d442a5b722270481bddf2a61.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Jacatupé')->first()->id,
            'receitas_id' => 6,
            'quantidade' => '3 unidades'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Temperos',
            'quantidade'=> 'A gosto'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 6,
            'ingredientes_id' => 10
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Água',
            'quantidade'=> 'Até cobrir'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 6,
            'ingredientes_id' => 11
        ]);


        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Drink de hibisco e gengibre',
            'tipo' => 'Bebidas',
            'porcoes' => '4 pessoas',
            'tempoPreparo' => '7 minutos',
            'modoPreparo' => 'Bata tudo no liquidificador e sirva com gelo',
            'fotos' => 'https://s2.glbimg.com/1DVYU4Yf5wpCFwCg5ngk4qu33cA=/smart/e.glbimg.com/og/ed/f/original/2019/02/28/gengibroca_rosa.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Hibisco')->first()->id,
            'receitas_id' => 7,
            'quantidade' => '3 unidades'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Genbigre',
            'quantidade'=> '50g'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 7,
            'ingredientes_id' => 12
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Água',
            'quantidade'=> '500ml'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 7,
            'ingredientes_id' => 13
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Açúcar',
            'quantidade'=> 'A gosto'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 7,
            'ingredientes_id' => 14
        ]);

        /*$id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => '',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '',
            'tempoPreparo' => '',
            'modoPreparo' => '',
            'fotos' => ''
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', '')->first()->id,
            'receitas_id' => $id,
            'quantidade' => ''
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => '',
            'quantidade'=> ''
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => '',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '',
            'tempoPreparo' => '',
            'modoPreparo' => '',
            'fotos' => ''
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', '')->first()->id,
            'receitas_id' => $id,
            'quantidade' => ''
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => '',
            'quantidade'=> ''
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => '',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '',
            'tempoPreparo' => '',
            'modoPreparo' => '',
            'fotos' => ''
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', '')->first()->id,
            'receitas_id' => $id,
            'quantidade' => ''
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => '',
            'quantidade'=> ''
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);




        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => '',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '',
            'tempoPreparo' => '',
            'modoPreparo' => '',
            'fotos' => ''
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', '')->first()->id,
            'receitas_id' => $id,
            'quantidade' => ''
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => '',
            'quantidade'=> ''
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => '',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '',
            'tempoPreparo' => '',
            'modoPreparo' => '',
            'fotos' => ''
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', '')->first()->id,
            'receitas_id' => $id,
            'quantidade' => ''
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => '',
            'quantidade'=> ''
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => '',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '',
            'tempoPreparo' => '',
            'modoPreparo' => '',
            'fotos' => ''
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', '')->first()->id,
            'receitas_id' => $id,
            'quantidade' => ''
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => '',
            'quantidade'=> ''
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => '',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '',
            'tempoPreparo' => '',
            'modoPreparo' => '',
            'fotos' => ''
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', '')->first()->id,
            'receitas_id' => $id,
            'quantidade' => ''
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => '',
            'quantidade'=> ''
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => $id,
            'ingredientes_id' => $idIngrediente
        ]);*/
    }
}
