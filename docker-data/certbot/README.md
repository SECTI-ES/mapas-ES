# Gerar Certificado SSL via Let's Encrypt

Este guia fornece instruções para gerar um certificado SSL usando o Let's Encrypt e configurá-lo para um FQDN específico.

Esses arquivos são necessários para o docker-compose.prod.yml.

## Passos

### 1. Configurar o FQDN

Configure o Fully Qualified Domain Name (FQDN) do servidor:

```bash
    $ hostnamectl set-hostname mapa.inovacao.es.gov.br
```

### 2. Gerar o certificado com o certbot

Gerar certificado do Certbot inicial e copiar para a pasta docker-data/certbot/conf

```bash
$ sudo apt install certbot
$ sudo certbot certonly –standalone -d mapa.inovacao.es.gov.br
$ sudo cp -r /etc/letsencrypt/* docker-data/certbot/conf/.
$ sudo chown -R mapas:mapas docker-data/certbot
```
### 3. Alterar configuração do init-letsencrypt.sh

Editar o arquivo no diretório root do repositório ./init-letsencrypt.sh e acionar a configuração de domínios:
domains=(treinamento.mapa.inovacao.es.gov.br mapa-hm.inovacao.es.gov.br)

### 4. Fazer após os containers subirem

Agora será preciso alterar a configuração do certbot para webroot, uma vez que ele estará funcionando via container.

Acessar o container do certbot e executar o comando:

```bash
$:~/mapas-ES-prod$ docker-compose -f docker-compose.prod.yml exec certbot sh

/opt/certbot# certbot certonly --webroot -w /var/www/certbot -d treinamento.mapa.inovacao.es.gov.br -d mapa-hm.inovacao.es.gov.br
```
Aí é só responder as perguntas e renovar o certificado.
