# Projeto de Notícias no CodeIgniter

## Feito por: Rodrigo Scola

# Como Rodar:

1. Clone este repositório para uma pasta dentro de seu computador;

2. Crie uma database com o nome `codeignite` no MySQL;

3. Em sua database, insira este bloco de código para criar as tabelas básicas necessárias

```sql

create table categorias (
     id int primary key auto_increment,
     nome varchar(255) unique,
     slug    varchar(255),
     corpo text
);

create table noticias (
     id int primary key auto_increment,
     titulo varchar(255),
     slug varchar(255),
     corpo text,
     categorias varchar(255)
);

insert into categorias(nome,slug,corpo)
values('politica','politica','Nossa equipe de especialistas em política está empenhada em fornecer uma cobertura abrangente dos eventos políticos mais importantes em níveis local, nacional e internacional. Analisamos as últimas decisões governamentais, eleições, debates e questões políticas que afetam a sociedade. Além disso, oferecemos opiniões bem fundamentadas sobre as tendências políticas emergentes e os líderes que moldam o cenário político atual.');

insert into categorias(nome,slug,corpo)
values('economia','economia','Queremos mantê-lo informado sobre os movimentos econômicos que impactam o mundo dos negócios e as finanças pessoais. Nossa equipe de especialistas em economia traz análises aprofundadas sobre as tendências do mercado, desenvolvimentos na indústria e o panorama econômico global. Seja você um investidor, empreendedor ou apenas interessado em economia, encontrará artigos e dicas valiosas para tomar decisões informadas.');

insert into categorias(nome,slug,corpo)
values('futebol','futebol','O esporte mais amado do mundo tem um lugar especial em nosso site. Nossa paixão pelo futebol é refletida em análises táticas, destaques das principais ligas e campeonatos, perfis de jogadores e cobertura de eventos esportivos emocionantes. Deixe-nos levá-lo aos bastidores do mundo do futebol e mantê-lo atualizado com todas as notícias e curiosidades sobre os times e estrelas do esporte.');


insert into noticias(titulo,slug,corpo,categorias)
values('Após agressão a Moraes, Zé de Abreu justifica cusparada em briga política','Após-agressão-a-Moraes,-Zé-de Abreu-justifica-cusparada-em-briga-política','após-agressão-a-moraes-zé-de-abreu-justifica-cusparada-em-briga-política','1');

insert into noticias(titulo,slug,corpo,categorias)
values('Michelle Bolsonaro pede que deputada retire prótese ocular durante evento do PL Mulher','michelle-bolsonaro-pede-que-deputada-retire-prótese-ocular-durante-evento-do-pl-mulher','Ex-primeira-dama guardou objeto no bolso durante discurso da parlamentar; cena aconteceu no sábado, na Paraíba','1,2');

insert into noticias(titulo,slug,corpo,categorias)
values('IBC-Br: Economia cai 2% em maio ante abril, aponta prévia do PIB do BC','ibc-br-economia-cai-2-em-maio-ante-abril-aponta-prévia-do-pib-do-bc','A economia brasileira apresentou forte contração em maio, conforme o Índice de Atividade Econômica do Banco Central (IBC-Br). O indicador caiu 2% ante a abril, na série livre de efeitos sazonais. Em abril, o avanço havia sido de 0,81% (dado atualizado hoje).','2');

insert into noticias(titulo,slug,corpo,categorias)
values('Desenrola Brasil: Como negociar e quitar dívidas no programa do governo','desenrola-brasil-como-negociar-e-quitar-dívidas-no-programa-do-governo','A partir de hoje (17), os bancos e instituições financeiras de crédito estão autorizados a se cadastrar no programa Desenrola Brasil, uma iniciativa do governo federal para estimular a renegociação de dívidas.','2');

insert into noticias(titulo,slug,corpo,categorias)
values('Manchester United libera Alex Telles para assinar com gigante do futebol brasileiro','manchester-united-libera-alex-telles-para-assinar-com-gigante-do-futebol-brasileiro','O brasileiro passou a última temporada emprestado ao Sevilla. Por lá, inclusive, foi campeão da Europa League, mas não foi comprado em definitivo e retornou a Old Trafford.','3');


```

4. Em sua linha de comando e no diretorio do projeto, insira o comando

```

php spark serve

```

## Troubleshooting

- Se não houver a conexão com MySQL ou algum erro no database contido, verifique se a extensão mysqli está ativada em seu `PHP.ini`;
