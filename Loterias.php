<?php

    function menu(): void {

        $continuar = true;

        do{

            print("\nEscolha uma loteria\n");
            print("1 - Mega Sena\n");
            print("2 - Quina\n");
            print("...\n");
            print("0 - Sair\n");
            print("Opção: ");

            $opcao = trim(readline());


            switch($opcao){
                case "1":
                    print("Você escolheu a Mega Sena.\n");
                    megaSena();
                    break;
                
                case "2":
                    print("Você escolheu a Quina.\n");
                    break;
                
                case "0":
                    print("Você escolheu sair.\n");
                    $continuar = false;
                    break; 
                
                default :
                    print("Opção inválida.");
                    break;
                
            }

        } while($continuar);

    }

    function megaSena():void{


        $sorteados = [];

        $qntdJogos = readline("Quantos jogos deseja?");
        $qntdDezenas = readline("Quantas dezenas para cada jogo?");

        $contador = 0;

        while (count($sorteados) < $qntdDezenas) {
            $dezenaSorteada = rand(1,60);

            if(!in_array($dezenaSorteada, $sorteados)) {
                $sorteados[] = $dezenaSorteada;
            
        }

        
    
         //fiz alguma besteira no código e simplesmente não está funcionando
    }

        sort($sorteados);
        print_r($sorteados);



  

}

megaSena();

menu();