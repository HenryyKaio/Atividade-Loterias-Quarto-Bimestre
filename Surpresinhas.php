<?php

$FimGrade = 0; // Uma variável para o fim dos volantes, que pode variar entre 60, 80, 100, 25, eu preciso usar esse valor como variável pois eu uso ele no comando range() dentro da função sorteio().
$min = 0; // O valor mínimo de dezenas
$max = 0; // O valor máximo de dezenas
$NumJogos = 0;

$ValoresMegaSena = [6, 42, 168, 504, 1260, 2772, 5544, 10296, 18018, 30030, 48048, 74256, 111384, 162792, 232560];
$ValoresQuina = [3, 18, 63, 168, 378, 756, 1386, 2376, 3861.50, 6006, 9009];
$ValoresLotofacil = [3.50, 56, 476, 2856, 13566, 54264];



function menu()
{

    global $min;
    global $max;
    global $InicioGrade;
    global $FimGrade;
    global $opcao;
    $continuar = true;

    do {
        print("Olá, seja bem vindo à nossa loteria!
O nosso software cria apostas prontas para você, geradas aleatóriamente, as chamadas \"surpresinhas\".
Para qual jogo você gostaria de gerar uma aposta hoje? \n");

        print "
 MegaSena [1]
  Quina   [2]
Lotomania [3]
Lotofácil [4]
   Sair   [0] \n";

        $opcao = trim(readline(""));

        switch ($opcao) {
            case "1":
                print("Você escolheu a MegaSena\nVocê pode apostar de 6 a 20 números.\n");
                $min = 6;
                $max = 20;
                $FimGrade = 60;
                Surpresinhas();
                break;

            case "2":
                print("Você escolheu a Quina\nVocê pode apostar de 5 a 15 números.\n");
                $FimGrade = 80;
                $min = 5;
                $max = 15;
                Surpresinhas();
                break;

            case "3":
                print("Você escolheu a Lotomania.\nSortearemos 50 números para você\n");
                $FimGrade = 100;
                Surpresinhas();
                break;

            case "4":
                print("Você escolheu a LotoFácil\nVocê pode apostar de 15 a 20 números.\n");
                $FimGrade = 25;
                $min = 15;
                $max = 20;
                Surpresinhas();
                break;

            case "0":
                print("Você escolheu sair. Volte sempre!\n");
                $continuar = false;
                break;

            default:
                print("Opção inválida.\n");
                break;
        }
    } while ($continuar);
}


function Carregando()
{
    print("Gerando Aposta");
    usleep(500000);
    print(".");
    usleep(500000);
    print(".");
    usleep(500000);
    print(".");
    print("\n");
}

function sortear($dezenas, $FimGrade)
{

    global $NumJogos;
    global $FimGrade;



    for ($i = 1; $i <= $NumJogos; $i++) {
        $numeros = range(1, $FimGrade);
        shuffle($numeros);
        $sorteio = array_slice($numeros, 0, $dezenas);
        sort($sorteio);

        print("Os números sorteados para a aposta Nº$i foram - ");
        for ($j = 0; $j < $dezenas; $j++) {
            print($sorteio[$j] . " - ");
        }
        print("\n");
        sleep(1);
    }
}


function Surpresinhas()
{

    global $min;
    global $opcao;
    global $max;
    global $FimGrade;
    global $NumJogos;
    global $Dezenas;
    $continuar = true;
    $Sorteados = [];


    do {
        $NumJogos = readline("Para quantos jogos você quer gerar números?: ");
        if ($NumJogos <= 0) {
            print("Por favor, insira um valor válido dentre os permitidos.\n");
        } else {
            $continuar = false;
        }
    } while ($continuar);

    if ($opcao == 3) {
        $Dezenas = 50;
    } else {
        $continuar = true;

        do {
            $Dezenas = readline("Quantas dezenas você vai apostar?: ");
            if ($Dezenas < $min or $Dezenas > $max) {
                print("Por favor, insira um valor válido dentre os permitidos.\n");
            } else {
                $continuar = false;
            }
        } while ($continuar);
    }

    Carregando();
    sortear($Dezenas, $FimGrade);
    Gastos();
    print("Muito obrigado por usar nosso programa! Se sinta à vontade para usar novamente.");
    $Enter = readline(" ");
    print("\n");
}


function Gastos()
{
    global $opcao;
    global $ValoresMegaSena;
    global $ValoresQuina;
    global $ValoresLotofacil;
    global $Dezenas;
    print("Com essa quantidade de números você gastará: ");
    if ($opcao == 1) {
        $Dezenas -= 6; //diminuí a quantidade de números escolhidos pelo mínimo de números a escolher para trazer a posição 0, 1, etc do array, puxando os valores certos de lá.
        print("$ValoresMegaSena[$Dezenas]" . "R$");
    } else if ($opcao == 2) {
        $Dezenas -= 5;
        print("$ValoresMegaSena[$Dezenas]" . "R$");
    } else if ($opcao == 3) {
        print("Um valor mínimo de 3.00R$");
    } else if ($opcao == 4) {
        $Dezenas -= 15;
        print("$ValoresMegaSena[$Dezenas]" . "R$");
    }

    print("\n");
}


menu();
