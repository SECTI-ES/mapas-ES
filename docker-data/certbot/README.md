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
