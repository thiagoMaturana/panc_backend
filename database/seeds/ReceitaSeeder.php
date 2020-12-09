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
            'tipo' => 'Prato principal',
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
            'tipo' => 'Sopas',
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


        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Patê de Serralha',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '10 pessoas',
            'tempoPreparo' => '5 minutos ',
            'modoPreparo' => 'Comece picando a cebola, o alho e as folhas de serralha.
            Coloque todos os ingredientes no liquidificador e bata tudo muito bem.
            Adicione os temperos a gosto (cebolinha, pimenta, chimichurri) e acerte o sal.
            Veja se a consistência está boa: se desejar mais líquido, adicione mais azeite!',
            'fotos' => 'https://img.itdg.com.br/tdg/images/recipes/000/021/040/173171/173171_original.jpg?mode=crop&width=710&height=400'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Serralha')->first()->id,
            'receitas_id' => 8,
            'quantidade' => '1 xícara'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'requeijão',
            'quantidade'=> '2 potes'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 8,
            'ingredientes_id' => 15
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'alho',
            'quantidade'=> '2 dentes'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 8,
            'ingredientes_id' => 16
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'cebola',
            'quantidade'=> '1/2 cebola'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 8,
            'ingredientes_id' => 17
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Azeite',
            'quantidade'=> '4 colheres'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 8,
            'ingredientes_id' => 18
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Refrigerante de Picão-preto',
            'tipo' => 'Bebidas',
            'porcoes' => '15 pessoas',
            'tempoPreparo' => '1 semana e 1 dia',
            'modoPreparo' => 'Ferver a água com o picão por 15 minutos.
            Deixar esfriar e acrescentar o açúcar e o suco de limão.
            Misturar bem. Deixar descansar por 24hrs. Coar e envazar em garrafa pet. (Não encha totalmente mas retire o ar apertando a garrafa até o líquido chegar à borda.) Feche a garrafa e deixe descansando por uma semana.',
            'observacao' => 'Apenas para ressaltar: refrigerante contém açúcar, que deve ser consumido com moderação. Pessoas alérgicas a cafeína não devem consumir o refrigerante. O refrigerante não deve ser consumido por pessoas que estejam fazendo uso de medicamentos diluidores de sangue.',
            'fotos' => 'https://biowit.files.wordpress.com/2014/07/picc3a3o.jpg?w=300&h=225'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Picão-preto')->first()->id,
            'receitas_id' => 9,
            'quantidade' => '250 g (toda planta, exceto a raiz)'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Água',
            'quantidade'=> '10 litros'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 9,
            'ingredientes_id' => 19
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Açúcar',
            'quantidade'=> '1 quilo'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 9,
            'ingredientes_id' => 20
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Suco de limão',
            'quantidade'=> '1/2 copo'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 9,
            'ingredientes_id' => 21
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Peixinho da horta empanado',
            'tipo' => 'Saladas, Molhos e Acompanhamentos',
            'porcoes' => '3 pessoas',
            'tempoPreparo' => '15 minutos',
            'modoPreparo' => 'Em uma tigela, misture a farinha, a água e um pouquinho de sal até obter uma mistura homogênea;
            Em outra tigela, coloque a farinha panko ou a de rosca;
            Empane as folhas do peixinho: primeiro na mistura de farinha com água e depois na farinha para deixar crocante;
            Leve para fritar em óleo quente até ficarem douradinhas;
            Sirva com limão e aproveite!',
            'fotos' => 'https://www.receiteria.com.br/wp-content/uploads/receitas-de-peixinhos-da-horta-1.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Peixinho da horta')->first()->id,
            'receitas_id' => 10,
            'quantidade' => '6 folhas'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Água',
            'quantidade'=> '1 xícara de chá'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 10,
            'ingredientes_id' => 22
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Farinha de trigo',
            'quantidade'=> '1 xícara de chá'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 10,
            'ingredientes_id' => 23
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Farinha de rosca ou panko',
            'quantidade'=> '1 xícara'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 10,
            'ingredientes_id' => 24
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Limão',
            'quantidade'=> 'A gosto'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 10,
            'ingredientes_id' => 25
        ]);




        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Chá de Caruru',
            'tipo' => 'Bebidas',
            'porcoes' => '4 pessoas',
            'tempoPreparo' => '20 minutos',
            'modoPreparo' => 'Coloque a planta na água fervendo por 2 minutos, depois desligue a abafe por 18 minutos. Sirva quente.',
            'fotos' => 'https://conteudo.imguol.com.br/c/entretenimento/02/2017/08/03/cha-verde-1501773798026_v2_1920x1280.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Caruru')->first()->id,
            'receitas_id' => 11,
            'quantidade' => '100 gramas (folhas e sementes)'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Água',
            'quantidade'=> '1 litro'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 11,
            'ingredientes_id' => 26
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Risoto de tanchagem com cenoura',
            'tipo' => 'Prato principal',
            'porcoes' => '2 pessoas',
            'tempoPreparo' => '30 minutos',
            'observacao' => '1. procure usar as folhas mais novas, menores, porque elas são mais macias e saborosas; 2. as fibras longitudinais parecem que vão incomodar enquanto você está picando, mas acredite: não vão. Não se preocupe em tirar essas fibras, que o resultado das folhas cozidas é muito parecido com ao que acontece com as fibras da acelga (que nem se nota); 3. procure usar a folha inteira, fica mais saborosa que picada (e com mais gosto de cogumelo, mas não sei o motivo).',
            'modoPreparo' => 'Comece aquecendo um caneco com água em uma das bocas do fogão. Se você tiver algumas folhas de alho poró (a parte de cima do bulbo, que geralmente descartamos), ou caldo de legumes caseiro coloque nesta água. Caso não tenha, não se preocupe, a água sozinha é suficiente pra fazer o prato. A água precisa estar fervendo para colocarmos no risoto;
            Em outra panela, refogue a cebola na manteiga em fogo baixo até que o fundo da panela comece a ficar com um agarradinho escuro;
            Coloque o arroz, deixe torrar por 1 minuto enquanto mexe, e jogue o vinho branco para soltar o fundo da panela;
            Assim que o vinho secar, coloque as cenouras e comece a colocar sobre o arroz a água que você deixou ferver. Não despeje tudo. Coloque um pouco até o arroz ficar envolto em água, mexa, cozinhe por mais alguns minutos esperando que ela evapore, e em seguida coloque mais um pouquinho. Essa operação vai precisar ser repetida de 3 a 4 vezes até que o risoto fique pronto;
            Depois de colocar a terceira água, ou quando o arroz estiver mudando de cor de translúcido pra branco e quase ficando al dente, coloque as folhas de tansagem;
            Acerte o sal e desligue o fogo. É desejável que não se seque muito o risoto, e que ele fique bem molhadinho.',
            'fotos' => 'https://carlasoaresblog.files.wordpress.com/2018/06/dsc0105.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Tanchagem')->first()->id,
            'receitas_id' => 12,
            'quantidade' => '2-3 pés'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Cebola',
            'quantidade'=> '1 unidade média'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 12,
            'ingredientes_id' => 27
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Arroz de risoto (arbóreo)',
            'quantidade'=> '1/2 xícara'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 12,
            'ingredientes_id' => 28
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Manteiga',
            'quantidade'=> '1 colher'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 12,
            'ingredientes_id' => 29
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Vinho branco seco',
            'quantidade'=> '1/3 xícara'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 12,
            'ingredientes_id' => 30
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Cenoura',
            'quantidade'=> '1-2 unidades'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 12,
            'ingredientes_id' => 31
        ]);



        $id = DB::table('receitas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Bolo de Araruta',
            'tipo' => 'Doces e Bolos',
            'porcoes' => 'Serve 6 pessoas',
            'tempoPreparo' => '40 minutos',
            'modoPreparo' => 'Bata as gemas e o açúcar na batedeira.
            Coloque o restante dos ingredientes, exceto as claras, e continue batendo até ficar bem homogêneo.
            Em seguida adicione as claras em ponto de neve, misturando sem bater.
            Despeje em uma fôrma de buraco no meio, 24cm, untada e enfarinhada.
            Leve para assar em forno médio, preaquecido, por cerca de 30 minutos
            Retire do forno e desenforme.',
            'fotos' => 'https://comidinhasdochef.com/wp-content/uploads/2017/12/Bolo-de-Araruta.jpg'
        ]);
        DB::table('plantas_receitas')->insert([
            'plantas_id' => (int)Planta::where('nome', '=', 'Araruta')->first()->id,
            'receitas_id' => 13,
            'quantidade' => '250 g (farinha)'
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Açúcar',
            'quantidade'=> '1 xícara'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 13,
            'ingredientes_id' => 32
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Ovos (gemas e claras separadas)',
            'quantidade'=> '4 unidades'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 13,
            'ingredientes_id' => 33
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Limão (raspa da casca)',
            'quantidade'=> '1 unidade'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 13,
            'ingredientes_id' => 34
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Fermento em pó',
            'quantidade'=> '1 colher'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 13,
            'ingredientes_id' => 35
        ]);
        $idIngrediente = DB::table('ingredientes')->insert([
            'nome' => 'Margarina e trigo',
            'quantidade'=> 'Para untar'
        ]);
        DB::table('receitas_ingredientes')->insert([
            'receitas_id' => 13,
            'ingredientes_id' => 36
        ]);
    }
}
