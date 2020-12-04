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
            'fotos' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Pissenlit.jpg/250px-Pissenlit.jpg',
            'status' => 'aprovada',
            'referencia' => '- https://hortodidatico.ufsc.br/dente-de-leao/'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => $id, 'nome' => ' dente-de-leão-dos-jardins']);
        DB::table('nomes_populares')->insert(['plantas_id' => $id, 'nome' => 'chicória-silvestre']);
        DB::table('nomes_populares')->insert(['plantas_id' => $id, 'nome' => 'alface-de-cão']);
        DB::table('nomes_populares')->insert(['plantas_id' => $id, 'nome' => 'alface-de-coco']);
        DB::table('nomes_populares')->insert(['plantas_id' => $id, 'nome' => 'soprão']);
        DB::table('nomes_populares')->insert(['plantas_id' => $id, 'nome' => 'salada-de-toupeira']);
        


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
            'fotos' => 'https://hortodidatico.ufsc.br/files/2020/02/ORA-PRO-NOBIS5.jpg',
            'status' => 'aprovada',
            'referencia' => '- https://hortodidatico.ufsc.br/ora-pro-nobis/'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 2,'nome' => 'trepadeira-limão']);
        DB::table('nomes_populares')->insert(['plantas_id' => 2,'nome' => 'groselha-de-Barbados']);
        DB::table('nomes_populares')->insert(['plantas_id' => 2,'nome' => 'proteína-vegetal']);
        DB::table('nomes_populares')->insert(['plantas_id' => 2,'nome' => 'carne-vegetal']);
        DB::table('nomes_populares')->insert(['plantas_id' => 2,'nome' => 'groselha-da-América']);



        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Bertalha',
            'nomeCientifico' => 'Anredera cordifolia',
            'tamanho' => 'Cresce de 4cm a 6cm por dia',
            'folha' => 'Redondas em forma de coração',
            'caracteristicas' => 'É uma planta trepadeira, muito ramificada e de crescimento rápido.',
            'familia' => 'Basellaceae',
            'genero' => 'Anredera',
            'especie' => 'A. cordifolia',
            'propriedadesMedicinais' => 'É considerada um alimento nutracêutico na alimentação de crianças e para tratamento de anemias, as folhas são ricas em ferro, cálcio e zinco..',
            'propriedadesCulinarias' => 'O gosto da bertalha é terroso, e a folha quando refogada é viscosa, como a ora-pro-nobis ou o quiabo. No Rio o mais comum é se refogar com ovos. A folha crua também é ótima pra ser adicionada em saladas – é o jeito que mais gosto de comer. Além das folhas, também são comestíveis as raízes: são tubérculos como qualquer batata, e podem ser cozinhados, fritos, assados. As folhas podem ser secas e moídas para se fazer farinha na confecção de pães.',
            'cultivo' => 'A bertalha é uma trepadeira, e por isso precisa de tutoreamento pra crescer. O caule dela vai se agarrando a qualquer coisa que encontra. Pra ajudar a planta, por aqui coloco  pregos na parede e amarro barbante nesses pregos para guiá-la. Assim, a planta acha o caminho até a rede de proteção que tenho na sacada. A planta cresce se enroscando e tornando a parede verde, fica muito agradável permanecer na varanda. E no auge do verão, ela ainda abre longas pistões com flores miudinhas brancas muito cheirosas.',
            'cultivo' => 'A bertalha é propagada normalmente através de sementes, mas também pode ser propagada usando pedaços de ramos, que enraízam facilmente quando plantados em solo úmido.

            As sementes podem ser semeadas diretamente no local definitivo, a uma profundidade de 0,5 cm. Também podem ser semeadas em sementeiras, bandejas e copos de papel, sendo transplantadas 20 dias após a germinação, que leva normalmente de 1 a 3 semanas. Antes da semeadura, é melhor deixar as sementes na água morna por um dia para facilitar a germinação.',
            'fotos' => 'https://1.bp.blogspot.com/-uFassoclGPc/XRjGYIajQrI/AAAAAAAA7zo/djATRtA5wQIu0WiURj2nzRVlQt7xLmUjQCEwYBhgL/s1600/DSC00760.JPG',
            'status' => 'aprovada',
            'referencia' => '
            - http://www.matosdecomer.com.br/2015/02/bertalha-coracao-na-sua-janela.html <br>
            - https://outracozinha.com.br/2017/09/21/outra-panc-para-se-cultivar-em-casa-bertalha-coracao/ <br>
            - https://hortodidatico.ufsc.br/bertalha-coracao/
            '
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 3,'nome' => 'Bertalha-coração']);
        DB::table('nomes_populares')->insert(['plantas_id' => 3,'nome' => 'Basela']);
        DB::table('nomes_populares')->insert(['plantas_id' => 3,'nome' => 'Cipó-balão']);
        DB::table('nomes_populares')->insert(['plantas_id' => 3,'nome' => 'Folha-santa']);
        DB::table('nomes_populares')->insert(['plantas_id' => 3,'nome' => 'trepadeira-mimosa']);
        DB::table('nomes_populares')->insert(['plantas_id' => 3,'nome' => 'quiabento ']);
    
        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Beldroega',
            'nomeCientifico' => 'Portulaca oleracea',
            'tamanho' => 'Ramos rosados de 20-40cm de comprimento',
            'folha' => 'São redondas',
            'caracteristicas' => 'Herbácea prostrada, anual, suculenta, ramificada, glabra.',
            'familia' => 'Portulacaceae',
            'genero' => 'Portulaca',
            'especie' => 'Oleracea',
            'propriedadesMedicinais' => 'Popularmente constitui como medicamento contra afecções do fígado, da bexiga e dos rins, além de combater o escorbuto. Quando cozido é diurético e aumenta a secreção de leite materno, o suco da planta é usada para afecções dos olhos e as sementes contra parasitas intestinais. É antioxidante por ser uma fonte de vitamina C, anti-inflamatória, antifúngica e analgésica. Folhas suculentas da beldroega têm mais ácidos graxos ômega-3 do que em alguns dos óleos de peixe. É empregada internamente contra disenteria (principalmente infantil), enterite aguda, mastite e hemorróidas.Afecções do fígado, dos rins e da bexiga, cálculos biliares, escorbuto (Planta toda).    Azia, erisipela, inflamação dos olhos, afecções das vias urinárias (folhas e caules).Externamente é usada em queimaduras, úlceras, feridas e nevralgias. O suco é efetivo, no tratamento de doenças de pele.Distúrbios menstruais, afecções das vias urinárias, verminose (sementes).',
            'propriedadesCulinarias' => 'Desde a antiguidade a Portulaca oleracea tem sido usada na alimentação humana em saladas ou cozida. É uma planta comestível, podendo ser consumidos talos e folhas quando tenros e verdes, crus ou refogados. As raízes são amargas e duras.',
            'cultivo' => 'O plantio é feito por sementes. Semeie no local definitivo da horta ou em sementeiras, saquinhos para mudas ou copinhos de papel, transplantando quando as mudas tiverem de 4 a 6 folhas verdadeiras. As sementes devem ser cobertas apenas por uma leve camada de terra peneirada ou de serragem fina.',
            'fotos' => 'https://formasaudavel.com.br/wp-content/uploads/2013/06/beldroega02.jpg',
            'status' => 'aprovada',
            'referencia' => '- https://hortodidatico.ufsc.br/beldroega/'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 4,'nome' => 'caaponga']);
        DB::table('nomes_populares')->insert(['plantas_id' => 4,'nome' => 'bredo-de-porco']);
        DB::table('nomes_populares')->insert(['plantas_id' => 4,'nome' => 'onze-horas']);
        
        
        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Taioba',
            'nomeCientifico' => 'Xanthosoma sagittifolium',
            'tamanho' => 'Produz um rizoma central grande e outros laterais mais estreitos e alongados, com até 20 cm de comprimento.',
            'folha' => 'É grande, parece com um grande coração',
            'caracteristicas' => 'A taioba é de cultivo fácil e cresce em qualquer quintal. Desenvolve-se com mais facilidade em climas quentes e úmidos (presentes em quase todo país).  Originária da América Tropical e Equatorial, o vegetal produz um rizoma central grande e outros laterais, mais estreitos e alongados, com até 20 cm de comprimento. Possui um pseudocaule formado pela bainha das folhas, que são largas e grandes, podendo atingir mais de 1 metro de altura. As folhas são a principal parte comestível, mas os rizomas também podem ser consumidos se bem cozidos ou quando processados na forma de farinha.',
            'familia' => 'Araceae',
            'genero' => 'Xanthosoma',
            'especie' => 'Sagittifolium',
            'propriedadesMedicinais' => 'As pesquisas já comprovaram que a folha tem mais vitamina A do que a cenoura, o brócolis ou o espinafre. Por ser rica em vitamina A e amido, é um alimento fundamental para as crianças, idosos, atletas, grávidas e mulheres que amamentam. Em sua composição, encontramos cálcio, fósforo, ferro, proteínas e uma grande quantidade de vitaminas: vitamina A, vitaminas B1, B2 e C. Tanto o talo quanto as folhas apresentam os mesmos elementos, apenas em proporções diferentes. Nas folhas, encontramos mais ferro e mais vitamina A.',
            'propriedadesCulinarias' => 'A taioba-mansa também possui oxalato de cálcio, porém em quantidades muito menores do que em sua versão selvagem. Ainda assim, é recomendado cozinhá-la ou refogá-la para eliminar a substância. O preparo da hortaliça não exige técnicas apuradas e é muito rápido: basta picar grosseiramente e jogar em uma frigideira com um pouco de azeite ou óleo e uma pitada de sal. Em poucos minutos sua taioba estará pronta para o consumo.

            Ela pode ser consumida refogada ou em outras preparações, como caldos, molhos, bolinhos e tortas salgadas, por exemplo. Além disso, nada é desperdiçado e seu talo pode ser transformado em um delicioso purê.',
            'fotos' => 'https://saberhortifruti.com.br/wp-content/uploads/2018/08/Taioba.jpg',
            'status' => 'aprovada',
            'cultivo' => 'O plantio é feito geralmente com pedaços de seu cormo ou com rebentos laterais que surgem próximos ao cormo principal. São plantados de 6 a 10 cm de profundidade, com espaçamento de 1 m a 1,3 m entre as plantas ou de 1 m entre as linhas e 40 a 50 cm entre as plantas.',
            'avisos' => 'Vale destacar o perigo do consumo por engano da taioba-brava (Colocasia antiquorum Schott), planta tóxica se consumida por humanos devido ao oxalato de cálcio.  Ambas as plantas possuem oxalato de cálcio, e seu consumo causa ardor na garganta e na boca. Para o consumo da taioba mansa, recomenda-se ferver as folhas por alguns minutos e, em seguida, escorrer a água usada.',
            'referencia' => '- https://pt.wikipedia.org/wiki/Xanthosoma_sagittifolium <br>
            - https://saberhortifruti.com.br/taioba-inclua-o-vegetal-na-alimentacao/ <br>
            - https://hortas.info/como-plantar-taioba'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 5,'nome' => 'orelha-de-elefante']);
        DB::table('nomes_populares')->insert(['plantas_id' => 5,'nome' => 'macabo']);
        DB::table('nomes_populares')->insert(['plantas_id' => 5,'nome' => 'mangará']);
        DB::table('nomes_populares')->insert(['plantas_id' => 5,'nome' => 'mangareto']);
        DB::table('nomes_populares')->insert(['plantas_id' => 5,'nome' => 'taiá ']);
                

        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Jacatupé',
            'nomeCientifico' => 'Pachyrhizus ahipa',
            'tamanho' => 'A espécie ereta pode crescer até 15–40 cm de altura, a semiereta cerca de 30–60 cm e as formas entrelaçadas de 60–200 cm de comprimento.',
            'folha' => 'Redonda',
            'caracteristicas' => 's flores, que crescem em caules curtos, são de cor branca ou lilás pálido. Eles mostram um cálice tubular e uma corola papilionácea. Geralmente, as flores exibem um estigma curvo internamente em contato próximo com as anteras. As sementes são pretas, lilases, marrons ou mosqueadas em preto e branco. Eles são redondos, em forma de rim e têm cerca de 0,8-1 cm de comprimento. A produção de sementes difere de planta para planta e fica entre 20 e 100 por planta. Cada planta apresenta uma única raiz inchada, que afina nas duas extremidades. As raízes têm cerca de 15 cm de comprimento e geralmente pesam cerca de 500-800 g. A casca amarela da raiz envolve uma polpa branca, que é entrelaçada com uma fibra macia. A aparência lembra uma batata doce, só que achatada e lobulada. Pelo menos a nossa, já que algumas variedades podem se alongar como cenouras. A textura úmida e crocante, assim como a brancura, fazem lembrar o nabo ou a batata-da-serra, da Chapada Diamantina, mas as semelhanças param por aí, pois não tem a pungência do primeiro nem a timidez da segunda.',
            'fruto' => 'Os frutos têm 13–17 cm de comprimento e 16 mm de largura.',
            'familia' => 'Fabaceae',
            'genero' => 'Pachyrhizus',
            'especie' => 'P. ahipa',
            'propriedadesMedicinais' => 'As raízes ricas em carboidratos podem ser comidas cruas e fornecer calorias e vitamina K e vitamina C , além de potássio. Normalmente, é consumido fresco, quase como uma fruta. Em alguns casos crus, também é preparado como suco. As raízes têm um sabor doce e são crocantes como uma maçã e são uma adição atraente para saladas verdes. Podem ser fervidos e mesmo depois de cozidos, mantêm a sua textura crocante. Os tubérculos de Ahipa são considerados como tendo um efeito de limpeza no corpo. É suposto curar infecções da garganta e da passagem do ar.  Sua matéria seca varia de 15-30%.',
            'propriedadesCulinarias' => '',
            'fotos' => 'https://s2.glbimg.com/tVSDpdZGfLKtyWULsHrKtTrtnQI=/e.glbimg.com/og/ed/f/original/2018/04/01/c2.jpg',            
            'cultivo' => 'Antes da semeadura, o solo deve ser solto até uma profundidade de 15–25 cm. Além disso, o solo deve ser completamente limpo de ervas daninhas e pedras. Na Bolívia, P. ahipa é normalmente semeada entre agosto e outubro, dependendo da estação das chuvas. A taxa de semeadura está entre 40 e 65 kg / ha. Na determinação da taxa, as características preferidas, como o tamanho do tubérculo, desempenham um papel importante. Além disso, a fertilidade do solo e o peso da semente devem ser levados em consideração. A distância de plantio é de 20–60 cm entre linhas e 6–25 cm entre plantas na mesma linha. Portanto, cerca de seis a 83 plantas / m 2 são possíveis. É plantado em serras , quando é irrigado por inundação, o que ocorre principalmente na região andina.',
            'status' => 'aprovada',
            'referencia' => '- https://en.wikipedia.org/wiki/Pachyrhizus_ahipa <br> - https://come-se.blogspot.com/2009/05/jacatupe-e-o-que-e-ou-feijao-macuco-ou.html'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 6,'nome' => 'feijão-macuco']);
        DB::table('nomes_populares')->insert(['plantas_id' => 6,'nome' => 'jicama']);
        DB::table('nomes_populares')->insert(['plantas_id' => 6,'nome' => 'ahipa']);
        DB::table('nomes_populares')->insert(['plantas_id' => 6,'nome' => 'feijão-inhame andino']);

        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Serralha',
            'nomeCientifico' => 'Sonchus oleraceus',
            'tamanho' => 'Alcança entre 30 a 80 cm. de altura.',
            'folha' => 'Junto com o caule',
            'caracteristicas' => 'Herbácea anual, ereta, medindo de 40 a 110 cm de altura, talo redondo, oco, com seiva leitosa em seu interior, glabra, pouco ramificada, folhas sésseis, as superiores inteiras e as inferiores runcinadas(folha oblanceolada com margem partida ou lacerada), de base auriculada (Auriculada: base termina por um par de pequenos lobos, cada um dos lobos semelhante a uma orelha humana), de 6-17 cm de comprimento. Flores liguladas, reunidas em capítulos grandes, dispostos em panículas terminais. ',
            'fruto' => 'Os frutos são aquênios lanceolados, contendo um tufo de pêlos em uma das extremidades, facilitando sua disseminação.',
            'familia' => 'Asteraceae',
            'genero' => '	Sonchus',
            'especie' => 'S. oleraceus',
            'propriedadesMedicinais' => 'No Brasil o chá da planta é usado como digestivo e diurético e para problemas hepáticos e intestinais. A mesma infusão é utilizada em aplicações externas para lavar feridas.',
            'propriedadesCulinarias' => 'Essa erva, encontrada em quase todo o mundo, é comestível e rica em vitaminas A, D e E; possui um sabor amargo e paladar que lembra o espinafre, e é usada em saladas acompanhada com um copo de vinho e cozidos; também é utilizada com fins medicinais.',
            'fotos' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/2006-11-16Sonchus_oleraceus03-03.jpg/250px-2006-11-16Sonchus_oleraceus03-03.jpg',            
            'cultivo' => 'Para plantar a serralha, os cuidados são os mesmos dos de outras plantas do mesmo porte, pois ela pode ser cultivada tanto em campos abertos, como em hortas, onde a única característica é que o PH seja entre 5,5 e 6,5. O clima deve ser ameno e o solo deve ser úmido, mas não encharcado.',
            'avisos' => 'O látex da planta fresca pode ocasionar dermatite de contato.',
            'status' => 'aprovada',
            'referencia' => '- https://pt.wikipedia.org/wiki/Sonchus_oleraceus <br> - https://hortodidatico.ufsc.br/serralha/ <br> - https://www.greenme.com.br/usos-beneficios/6528-serralha-beneficios-como-plantar'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 7,'nome' => 'ciúmo']);
        DB::table('nomes_populares')->insert(['plantas_id' => 7,'nome' => 'cerraja ']);
        DB::table('nomes_populares')->insert(['plantas_id' => 7,'nome' => 'chicória-lisa']);
    
    
        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Hibisco',
            'nomeCientifico' => 'Hibiscus sabdariffa',
            'tamanho' => 'Cerca de 2 metros de altura',
            'folha' => 'Folhas lobadas',
            'caracteristicas' => 'Apresenta pétalas de tons vermelhos intensos. Com flores brancas ou amarelas com o centro escuro. As sépalas carnosas e vermelhas são rodeadas por uma camada de brácteas (epicálice)',
            'familia' => 'Malvaceae',
            'genero' => 'Hibiscus',
            'especie' => 'Sabdariffa',
            'propriedadesMedicinais' => 'O hibisco é rico em antocianinas, cálcio, cobre, ferro, fibras, fósforo, magnésio, polifenóis, potássio, vitaminas A, B1, B2, B3 e C, entre outros nutrientes.',
            'propriedadesCulinarias' => 'Além de elas serem utilizadas na produção de chás e fitoterápicos, por exemplo, seus frutos e caule também podem fazer parte das linhas de produção, tornando a planta um alimento quase todo comestível.',
            'fotos' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Hsabdariffa1.jpg/250px-Hsabdariffa1.jpg',            
            'cultivo' => 'o hibisco híbrido é plantado em substrato composto de cinco partes de terra preta, três partes de esterco de gado, uma parte de terra vermelha e outra de areia de rio. O solo deve possuir pH entre 6,8 e 7,2. Já é possível começar a produzir os porta-enxertos, ou cavalos, após seis meses de cultivo.',
            'status' => 'aprovada',
            'referencia' => '- https://content.paodeacucar.com/saudabilidade/o-que-e-hibisco <br>'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 8,'nome' => 'Azedinha']);
        DB::table('nomes_populares')->insert(['plantas_id' => 8,'nome' => 'Cardade']);
        DB::table('nomes_populares')->insert(['plantas_id' => 8,'nome' => 'Flor-da-jamaica']);
        DB::table('nomes_populares')->insert(['plantas_id' => 8,'nome' => 'Papoula']);
        DB::table('nomes_populares')->insert(['plantas_id' => 8,'nome' => 'Vinagreira']);
    

        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Picão-preto',
            'nomeCientifico' => 'Bidens alba',
            'tamanho' => 'Chegam a 5m de altura',
            'folha' => 'Longas',
            'caracteristicas' => 'Bidens alba é uma planta vascular . Tem um sistema de raiz e caule semelhante a outros da família Asteraceae dicotiledônea . Após a germinação, as raízes evoluem para uma raiz principal que cresce verticalmente no solo. O tecido primário dos meristemas apicais aumenta o comprimento da planta e as raízes secundárias dos meristemas laterais dão origem à largura. B. alba atinge uma altura de aproximadamente cinco metros de altura.

            O caule da planta B. alba emerge da raiz principal, mas o caule dobrado na base também tem a capacidade de se transformar em raízes nos nós inferiores. Os caules são geralmente sem pelos e de cor verde a arroxeada. O feixe vascular fornece nutrientes por toda a planta, com o floema transportando água das raízes e o xilema obtendo alimento das folhas.
            
            As folhas de Bidens alba , que são simples no lado oposto e compostas na parte inferior, têm 2–10 centímetros (0,8–3,9 pol.) De comprimento e 1,0–3,5 cm (0,4–1,4 pol.) De largura. A folha inferior é peluda e tem bordas dentadas. As folhas podem ser lobadas, dependendo da espécie. Alguns têm dentes e outros não; cada nó produz duas folhas ao longo do caule.',
            'familia' => 'Asteraceae',
            'genero' => 'Bidens',
            'especie' => 'B. alba',
            'propriedadesMedicinais' => 'O Picão-preto é uma planta medicinal, também conhecida popularmente por Picão, Pica-pica ou Amor de mulher, utilizada para tratar inflamações, como artrite, dor de garganta ou dor muscular, por exemplo, devido às suas excelentes propriedades anti-inflamatórias.',
            'propriedadesCulinarias' => 'Só uma coisa, não é bom comer crua pois podem ter saponinas -  outras plantas comestíveis também tem. Em excesso, estas substâncias podem ser irritantes para a mucosa intestinal. Use a erva em cozidos ou afervente com água e sal antes, mesmo porque ela é um pouco firme e precisa de alguns minutos de cozimento para que fique macia. O sabor é algo como folhas de cenoura, jambu e espinafre. ',
            'fotos' => 'https://static.tuasaude.com/media/article/zu/yc/picao-preto_34567_l.webp',            
            'cultivo' => 'Bidens alba é uma erva daninha de crescimento rápido e disseminação rápida devido ao seu enorme número de sementes e à capacidade de crescer novamente a partir dos caules. Em sub-tropical às condições tropicais, B. alba pode crescer em quase toda parte em pleno sol com pouca ou nenhuma umidade. O maior crescimento ocorre na matéria orgânica com solo solto; no entanto, eles também podem se propagar bem em rochas de areia e calcário em habitats não irrigados. As sementes são dispersas principalmente por animais ou humanos , embora algumas também sejam carregadas pelo vento e pela água.',
            'status' => 'aprovada',
            'avisos' => 'Estudo com a ingesta de picão preto e substâncias que causam proliferação celular sugere ação como cofator na formação de tumores; outros estudos não mostram atividade genotóxica. É considerada planta sem toxicidade para seres humanos.',
            'referencia' => '- https://en.wikipedia.org/wiki/Bidens_alba <br> '
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 9,'nome' => 'agulhas de pastor']);
        DB::table('nomes_populares')->insert(['plantas_id' => 9,'nome' => 'amor-seco']);
        DB::table('nomes_populares')->insert(['plantas_id' => 9,'nome' => 'pico-pico']);



        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Peixinho da horta',
            'nomeCientifico' => 'Stachys byzantina',
            'tamanho' => 'Cresce até 20 cm',
            'folha' => 'Aveludada',
            'caracteristicas' => 'Folhas verdes têm gosto de folhas verdes, concorda? Umas mais amargas, outras ardidinhas ou neutras, mas sempre com um fundinho de planta. O peixinho da horta (Stachys byzantina), também conhecido como orelha de coelho e lambari da horta, é exceção. Considerado uma PANC (planta alimentícia não convencional), ele ganhou o nome popular de peixinho não só por causa do formato alongado, mas principalmente pelo leve sabor de peixe quando empanada e frita.  ',
            'familia' => 'Lamiaceae',
            'genero' => 'Stachys',
            'especie' => 'Byzantina',
            'propriedadesMedicinais' => 'As folhas e flores do peixinho têm propriedades que combatem o tumor cerebral (pelo menos em ratos) e o carcinoma no útero humano. O extrato metanólico do peixinho apresenta atividade antioxidante.',
            'propriedadesCulinarias' => 'O peixinho vai muito bem frito, empanado ou à milanesa. Mas antes do consumo deve ser muito bem higienizado, pois a característica aveludada de suas folhas faz com que ele prenda algumas impurezas do solo. Depois de lavá-lo, seque para preparar receitas ou guarde em sacos de pano na geladeira.',
            'fotos' => 'https://cdn.shopify.com/s/files/1/0127/3711/8265/files/peixinho_folhas_1_1024x1024.jpg?v=1558664161',            
            'cultivo' => 'O plantio do peixinho se dá por meio da de touceiras, que devem ser plantadas em dias frescos diretamente no local definitivo. Depois de dois meses e meio, quando a planta atinge entre oito e 15 cm, pode ser feita a primeira colheita.',
            'status' => 'aprovada',
            'referencia' => '- https://vegmag.com.br/blogs/alimentacao/peixinho-da-horta-e-panc <br>'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 10,'nome' => 'lambarizinho']);
        DB::table('nomes_populares')->insert(['plantas_id' => 10,'nome' => 'orelha-de-coelho']);
        DB::table('nomes_populares')->insert(['plantas_id' => 10,'nome' => 'orelha-de-lebre']);


        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Caruru',
            'nomeCientifico' => 'Amaranthus viridis',
            'tamanho' => '20 a 80 cm de altura',
            'folha' => 'Longas',
            'caracteristicas' => '',
            'familia' => 'Amaranthaceae',
            'genero' => 'Amaranthus',
            'especie' => 'viridis',
            'propriedadesMedicinais' => 'Ela contém altos teores de vitamina A, B1, B2 e C além de cálcio, ferro e potássio.  seu alto teor de cálcio faz com que o seu consumo seja uma ótima forma de combater a osteoporose e outras doenças ósseas. O chá feito a partir das folhas também pode ser usado para tratar infecções e limpar o fígado. Mas antes de preparar o chá é recomendado que se faça o branqueamento das folhas para eliminar componentes indesejáveis.',
            'propriedadesCulinarias' => 'As suas folhas podem ser consumidas de várias formas. Só não se deve consumir folhas cruas de caruru, que possuem saponinas, nitrato e ácido oxálico. Mas basta um cozimento para remover esses componentes. A minha forma preferida de comer caruru é fazendo um refogado, que lembra muito o espinafre.',
            'fotos' => 'https://miro.medium.com/max/700/1*3s9uC80rOEa4AqeLDUmzRA.jpeg',            
            'cultivo' => 'Basta colocar algumas sementes em um vaso ou no solo, regar e esperar. Ele cresce com facilidade e não precisa de nenhum cuidado além de uma rega de vez em quando. Inclusive, não se deve adubar o caruru, pois ele pode transformar o adubo em componentes tóxicos.',
            'status' => 'aprovada',
            'referencia' => ''
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 10,'nome' => 'bredo']);   


        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Tanchagem',
            'nomeCientifico' => 'Plantago major',
            'tamanho' => 'pode chegar até 40cm de altura',
            'folha' => 'As folhas são dispostas em roseta basal, com pecíolo longo e lâmina membranácea com nervuras bem destacadas, de 15-25 cm de comprimento.',
            'caracteristicas' => 'Flores muito pequenas, hermafroditas, dispostas em inflorescências espigadas eretas sobre haste floral de 20-30 cm de comprimento, de cor verde-amarelada. As sementes são facilmente colhidas raspando-se entre os dedos a inflorescência. Multiplica-se por sementes. A raiz é fasciculada. ',
            'fruto' => 'Os frutos são cápsulas elipsóides de 2 a 4 mm de largura.',
            'familia' => 'Plantaginaceae',
            'genero' => 'Plantago',
            'especie' => 'P. major',
            'propriedadesMedicinais' => 'As propriedades da Tanchagem incluem sua ação antibacteriana, adstringente, desintoxicante, expectorante, analgésica, anti-inflamatória, diurética, antidiarreica, expectorante, hemostática e cicatrizante, sendo empregada contra infecções das vias respiratórias superiores (faringite, amigdalite, estomatite), bronquite crônica e como auxiliar no tratamento de úlceras pépticas',
            'propriedadesCulinarias' => 'Podem ser usados folhas e sementes.',
            'fotos' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Plantago_major_002.JPG/250px-Plantago_major_002.JPG',            
            'cultivo' => '',
            'status' => 'aprovada',
            'referencia' => '- https://pt.wikipedia.org/wiki/Plantago_major'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 12,'nome' => 'Orelha de veado']);
        DB::table('nomes_populares')->insert(['plantas_id' => 12,'nome' => 'Tanchá']);
        DB::table('nomes_populares')->insert(['plantas_id' => 12,'nome' => '7 nervos']);



        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Araruta',
            'nomeCientifico' => 'Maranta arundinacea',
            'tamanho' => '30-50 cm',
            'folha' => 'Longas e compridas',
            'caracteristicas' => 'Herbácea ereta, perene, rizomatosa, densamente cespitosa, medindo de 40-90 cm de altura, de folhagem seca quando a planta completa o ciclo, no final do outono, apresentando rizomas fusiformes brancos, medindo de 20-30 cm de comprimento. Folhas simples, largo-lanceolada, cartácea, glabra, medindo de 30-50 cm de comprimento. Inflorescências escapifólias, em racemos curtos, com poucas flores brancas discretas',
            'familia' => 'Marantaceae',
            'genero' => 'Maranta',
            'especie' => 'M. arundinacea',
            'propriedadesMedicinais' => 'Contra as febres intermitentes, contra a dispepsia, sendo que seu suco acre serve contra a mordedura de cobra e picada de insetos e quando colocado sobre a língua aumenta a salivação.',
            'propriedadesCulinarias' => 'Os rizomas podem ser lavados e triturados para a extração do polvilho de araruta. O amido de araruta tem alta digestibilidade e pode ser usado para o preparo de cremes, mingaus, pães, biscoitos, pão-de-queijo e para engrossar molhos.',
            'fotos' => 'Contra as febres intermitentes, contra a dispepsia, sendo que seu suco acre serve contra a mordedura de cobra e picada de insetos e quando colocado sobre a língua aumenta a salivação.',            
            'cultivo' => 'Para as culturas de ciclo longo, como é o caso da araruta, é muito importante se conhecer o tipo e o tamanho da muda, assim como a forma que deve ser plantada, e, portanto, há necessidade de estabelecer o mais rápido a população final desejada. Este trabalho teve como objetivo avaliar tipos de propágulos de araruta, provenientes do rizoma e haste pós-colheita, para produção de mudas.',
            'status' => 'aprovada',
            'referencia' => '- https://hortodidatico.ufsc.br/araruta/ <br> -https://pt.wikipedia.org/wiki/Araruta'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 13,'nome' => 'maranta']);
        DB::table('nomes_populares')->insert(['plantas_id' => 13,'nome' => 'raruta']);
        DB::table('nomes_populares')->insert(['plantas_id' => 13,'nome' => 'planta-de-sagú']);


        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Urtiga',
            'nomeCientifico' => 'Urtica dioica',
            'tamanho' => '40-120 cm de altura',
            'folha' => 'Folhas inteiras, de 7-15 cm de comprimento.',
            'caracteristicas' => 'Flores pequenas de cor branca ou amarelada. O pecíolo das folhas e ramos possuem pêlos e cerdas com forte ação urticante, causadas pela presença de ácido fórmico e aminas.',
            'familia' => 'Urticaceae',
            'genero' => 'Urtica',
            'especie' => 'Dioica',
            'propriedadesMedicinais' => 'stancar sangramentos (infusão de folhas e ramos), rinite alérgica crônica (folhas), diurético (raízes), alívio dos sintomas da hiperplasia prostática benigna (raízes), inflamações articulares, reumatismos, diabetes, fortificante capilar, cicatrizante e hemostático de feridas, hemorragias nasais, dores de cabeça, cansaço. É também usada para anemia, hemorragia uterina, erupções cutâneas, eczema infantil , eczema de fundo nervoso, doenças crônicas do cólon, diarréia, disenteria, queimaduras, hipermenorréia, asma, condições dermatológicas pruriginosas, picadas de inseto, febre do feno, aumentar a produção de leite, e externamente em inflamações orofaríngeas (gargarejos). O suco pode ser utilizado para tratar ardência provocada por urtiga. Em casos de lombociatalgias, neuralgias ou artralgias é utilizada fazendo-se a urticação: esfrega-se folhas frescas (principalmente coletadas pouco antes da floração, em seu momento mais urticante) sobre a superfície dolorosa e em seguida faz-se fricção com água fria sobre a superfície.',
            'propriedadesCulinarias' => 'Pode ser usada suas folhas e raízes, basicamente toda a planta',
            'fotos' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Brennnessel_1.JPG/240px-Brennnessel_1.JPG',            
            'cultivo' => 'Para plantar, você pode utilizar suas sementes ou os pés com as raízes, pois a planta de adapta facilmente em qualquer tipo de terreno e temperatura. É tão resistente que consegue suportar temperaturas de até 45 graus negativos. É uma planta que praticamente se cultiva sozinha.',
            'status' => 'aprovada',
            'referencia' => '- https://pt.wikipedia.org/wiki/Urtica_dioica <br>'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 14,'nome' => 'urtiga-mansa']);
        DB::table('nomes_populares')->insert(['plantas_id' => 14,'nome' => 'urtiga-européia']);


        $id = DB::table('plantas')->insert([
            'usuarios_id' => '1',
            'nome' => 'Capuchinha',
            'nomeCientifico' => 'Tropaeolum majus',
            'tamanho' => '1-2 metros',
            'folha' => 'Folhas membranáceas, glabras, peltadas, longo-pecioladas, com 5-7 nervuras principais saindo do ponto de inserção do pecíolo, de 4-10 cm de diâmetro, com bordos inteiros ou ligeiramente lobulados.',
            'caracteristicas' => 'Flores solitárias, grandes, de cor vermelha, alaranjada, amarela ou branca, muito ornamentais. Multiplica-se por sementes. Nativa das regiões montanhosas do México e Perú. ',
            'fruto' => 'O fruto é um triaqüênio globular e subcarnoso.',
            'familia' => 'Tropaeolaceae',
            'genero' => 'Tropaeolum',
            'especie' => 'T. majus L.',
            'propriedadesMedicinais' => 'Expectorante, antiescorbútica, diurética, tônica, depurativa, aperiente e para infecções do sistema respiratório e urinário. Também é usado como antimicótico, analgésico e contra queda de cabelos. Para dor de garganta costuma-se comer as flores frescas. Toda a planta é considerada comestível. Os frutos verdes são consumidos como substituto da alcaparra, quando maduros são usados como laxantes. ',
            'propriedadesCulinarias' => '',
            'fotos' => 'https://hortodidatico.ufsc.br/files/2020/01/CAPUCHINHA1.jpg',            
            'cultivo' => 'em ser muito exigente quanto ao solo, a capuchinha se dá melhor nos que se apresentam leves, ricos em matéria orgânica e com boa umidade. Na propagação por sementes, a semeadura pode ser no local definitivo, com cerca de 1 centímetro de profundidade, ou em sementeiras e bandejas.',
            'status' => 'aprovada',
            'referencia' => '- https://pt.wikipedia.org/wiki/Tropaeolum_majus <br>'
        ]);
        DB::table('nomes_populares')->insert(['plantas_id' => 15,'nome' => 'chaguinha']);
        DB::table('nomes_populares')->insert(['plantas_id' => 15,'nome' => 'mastruço-do-peru']);
        DB::table('nomes_populares')->insert(['plantas_id' => 15,'nome' => 'flor-de-sangue']);
    }
}
