#!/bin/bash

# como atualizar docker compose: https://docs.docker.com/compose/install/linux/#install-the-plugin-manually

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
CDIR=$( pwd )
cd $DIR

SLEEP_TIME="0"

# Check if no parameters were given
if [ $# -ne 1 ]; then
    echo "  Parâmetro recebido inválido.
    Execute o script com -h para ver opções.
    "
    exit 1
fi

if [ ! -d "../docker-data/postgres" ]; then
  SLEEP_TIME=15
fi


case $1 in
   -b|--build)
      docker compose up -d --build
   ;;
   -t| --terminal)
      echo "Use Ctrl+D para sair do container"
      docker exec -it dev-mapas-1  /bin/bash
   ;;
   -l| --logs)
      echo "Use Ctrl+C para sair do container"
      docker logs -f dev-mapas-1 
   ;;
   -d|--down)
      docker compose down
   ;;
   -r | --remove)
      docker volume prune -a
      docker image prune
      rm -rf ../docker-data
      rm -rf ../themes/MapaCulturalES/assets/css
   ;;
   -rd | -dr)
      docker compose down
      docker volume prune -a
      docker image prune
      rm -rf ../docker-data
      rm -rf ../themes/MapaCulturalES/assets/css
   ;;
   -h|--help)
    	echo "
   start.sh [ -b | -t | -d | -r | -rd | -h ]

    -b   | --build      Builda a imagem Docker
    -t   | --terminal   Abre o terminal do container dev-mapas-1, para ver e manipular arquivos
    -l   | --logs       Abre os logs in real-time do container dev-mapas-1
    -d   | --down       Executa o docker compose down
    -r   | --remove     Remove os arquivos criados no build e não excluídos no down
    -rd  | -dr          Executa docker compose down E remove os arquivos não excluídos
    -h   | --help       Imprime esta mensagem de ajuda
   "
      exit
   ;;
   *)
      echo "
   Parâmetro inválido
         
   Veja -h para parâmetros válidos.
   "
      exit 1
   ;;
esac

cd $CDIR
