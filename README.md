# Ambiente para API RESTful com Hyperf

Você precisa ter o Docker e o Docker Compose instalados em seu servidor para configurar este ambiente.

Um único container será utilizado com um serviço responsável por executar o ambiente automatizado do Hyperf.

## Executando o ambiente

- Crie a imagem do aplicativo com o seguinte comando:

```bash
docker run -v ${PWD}:/app -p 9501:9501 -it --entrypoint /bin/sh hyperf/hyperf:8.0-alpine-v3.13-swoole
```

- Instale uma nova instância de projeto com o comando:

```bash
composer create-project hyperf/hyperf-skeleton
```

- Entre no diretório app que foi criado com o comando acima:

```bash
cd app
```

- Inicie o projeto via bash com o comando abaixo:

```bash
php bin/hyperf.php start
```

- Configure em tempo real as opções do seu projeto (bases de dados, ferramentas de cache, etc)
```bash
Configuração feita em tempo de execução no terminal.
```

- Agora vá para o seu navegador e acesse o nome de domínio ou endereço IP do seu servidor na porta `9501`: `http://server_domain_or_IP:9501`. Caso você esteja executando esta demonstração em sua máquina local, use `http://localhost:9501` para acessar o aplicativo a partir de seu navegador.

## Transformando o ambiente em Hot Realoder

Como o Swoole é executado via PHP CLI, devemos ter em mente que toda alteração torna necessária a reinicialização do mesmo. Para contornar o problema, podemos adicionar o componente Watcher, que recarrega nosso código automaticamente. Para tal, faça:

- Instale o componente Watcher:
```bash
composer require hyperf/watcher --dev
```

- Publique o arquivo de configurações:
```bash
php bin/hyperf.php vendor:publish hyperf/watcher
```

- Um arquivo foi criado no diretório config/autoload/watcher.php. Caso deseje alterar alguma configuração do Watcher, utilize o arquivo.

- Rode o projeto via Watcher:
```bash
php bin/hyperf.php server:watch
```

## Implementando testes

Os testes no Hyperf são feitos pelo PHPUnit por padrão. Como o Hyperf é um framework de corrotinas, o PHPUnit pode não funcionar adequadamente. Portanto, o Hyperf nos dá a opção de utilizar o co-phpunit, componente derivado do PHPUnit já adaptado para corrotinas. Para realizar a instalação, faça:

- Instale o componente co-phpunit:
```bash
composer require hyperf/testing
```