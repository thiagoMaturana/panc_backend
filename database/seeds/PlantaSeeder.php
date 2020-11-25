<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Dente-de-leão',
            'nomeCientifico' => 'Taraxacum officinale',
            'tamanho' => 'Varia de 5cm a 30cm',
            'folha' => 'Folhas em roseta, simples, sem pecíolos, curto-pilosas ou glabras, inteiras ou pinatipartidas, de 15 a 25 cm de comprimento, de sabor amargo.',
            'caracteristicas' => 'Planta herbácea, perene, leitosa, acaule, com raiz tuberosa e pivotante. As flores são amarelas e hermafroditas, e os frutos são aquênios escuros e finos, contendo em uma das extremidades um chumaço branco de pelos que facilitam a sua flutuação no vento. Multiplica-se por sementes.',
            'familia' => 'Asteraceae',
            'genero' => 'Taraxacum',
            'especie' => 'T. officinale',
            'propriedadesMedicinais' => 'Considerada popularmente como uma das melhores plantas diuréticas, com efeitos laxativo, colagogos e coleréticos. A infusão da raiz fresca é utilizada em casos de cálculos biliares, estágios inicias de cirrose e hepatite.',
            'propriedadesCulinarias' => 'O dente-de-leão pode ser consumido na salada, em sucos ou chás, e pode ser tomado várias vezes ao dia, sem maiores efeitos colaterais. Ele também funciona muito bem como complemento nas receitas de sucos detox, e até como um "tempero" suave, salpicado nos pratos, podendo ser refogado com alho e cebola.',
            'cultivo' => 'Preferencialmente semeie no local definitivo da horta. Se semeadas em sementeiras e outros recipientes, o transplante deve ser feito assim que as mudas possam ser manuseadas. As sementes devem ficar na superfície do solo ou podem ser cobertas apenas por uma leve camada de terra peneirada ou de serragem.',
            'avisos' => 'Evitar o uso da planta por gestantes ou lactantes, pois os efeitos não são conhecidos. Pessoas com cálculos biliares, inflamações na vesícula ou obstrução do trato gastrointestinal também não devem utilizá-la . Contra-indicado para menores de 2 anos.',
            'fotos' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Pissenlit.jpg/250px-Pissenlit.jpg'
        ]);

        DB::table('nomes_populares')->insert([
            'plantas_id' => $id,
            'nome' => 'taráxaco'
        ]);


        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Ora-pro-nóbis',
            'nomeCientifico' => 'Pereskia aculeata.',
            'tamanho' => 'Chega até 1 metro de altura',
            'folha' => 'Folhas lanceoladas, suculentas, medindo de 3 a 10 cm de comprimento por 1,5 a 5 cm de largura, pecíolo curto, nervura central proeminente, de cor verde e providas de espinhos nas axilas.',
            'caracteristicas' => 'É uma herbácea de hábito trepador e escandente, caules compridos revestidos de agressivos espinhos, podendo alcançar até 10 m de comprimento. As flores são pequenas, 2,5 a 5 cm de diâmetro, coloração branca ou amarela clara ou creme, podendo ter outras variantes. Exalam um perfume forte característico e as anteras e grãos polínicos são dourados.',
            'fruto' => 'Os frutos são redondos, ovais ou piriformes, de coloração amarelada ou avermelhada, medindo de 1-2 cm de diâmetro. Produzem sementes marrons ou pretas com 4 mm de diâmetro aproximadamente.',
            'familia' => 'Cactaceae',
            'genero' => 'Pereskia',
            'especie' => 'P. aculeata',
            'propriedadesMedicinais' => 'Antioxidante, anti-inflamatório, nutracêutico, cicatrizante. A alta quantidade de fibras insolúveis pode auxiliar na prevenção de diversas doenças como: câncer de cólon, hemorroidas, varizes, tumores intestinais e diabetes.',
            'propriedadesCulinarias' => 'Na culinária as folhas podem ser consumidas cruas ou refogadas, adicionadas a farinha para serem feitas massa para pães, tortas, suflês, omeletes, misturadas ao feijão. As flores são utilizadas em preparações de saladas.',
            'cultivo' => 'Sua rusticidade permite que seja cultivada em diversos tipos de solo, inclusive não exige que eles sejam férteis. A ora-pro-nóbis também se desenvolve em ambientes com incidência de sol ou meia--sombra. Inicie o plantio no começo do período das chuvas. A hortaliça é resistente à seca, mas o acesso à água nessa fase do cultivo estimula o crescimento dos ramos.',
            'fotos' => 'https://hortodidatico.ufsc.br/files/2020/02/ORA-PRO-NOBIS5.jpg'
        ]);

        DB::table('nomes_populares')->insert([
            'plantas_id' => $id,
            'nome' => 'trepadeira-limão'
        ]);
        DB::table('nomes_populares')->insert([
            'plantas_id' => $id,
            'nome' => 'groselha-de-Barbados'
        ]);
    }
}
