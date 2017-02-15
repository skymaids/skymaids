# Sistema Imatec 
CRM responsavel pelo controle da produção, visualização de imagens dos clientes, solicitações (OS), faturamento e demais processos internos e externos da empresa.
 
## Instalação Desenvolvimento

```
1- Instalar e Configurar Homestead e Vagrant
OBS: Seguir vídeo explicativo para cada sistema operacional na Code Education 

2- Abrir terminal e ligar Homestead
vhomestead up

3- Logar no Homestead
vhomestead ssh

4- Baixar fonte do Github
git clone git@github.com:camoloze/imatec-app.git
  
5- Instalar dependencias PHP pelo composer
composer update
 
6- Instalar dependencias CSS e JS pelo node.js
npm install
 
7- Arquivo .env (Configuração)
Renomear o arquivo .env.example para .env
 
8- Gerar chave da aplicação
php artisan key:generate
 
9- Gerar Banco de Dados básico
php artisan migrate:refresh --seed
 
10- Gerar dados de css, js, rodar webpack e browserSync   
gulp

```

## Uso Desenvolvimento

Deve ser aberto duas abas da máquina virtual uma para executar o gulp e outra para o servidor local. 
Isso acontece porque usamos browserSync.   

```
1- Abrir terminal e ligar Homestead
vhomestead up

2- Logar no Homestead (Execute esse comando em cada uma das abas abertas)
vhomestead ssh

3- Gerar servidor (Em outra aba do terminal da máquina virtual)
php artisan serve --host=0.0.0.0 

4- Gerar dados de css, js, rodar webpack e browserSync e ficar observando alterações para recriar fontes e executar browserSync
gulp watch

5- Acessar brownser local
192.168.10.10:3000

```

## Documentação do código
APIGEN

### Código de geração
```
php apigen.phar generate -s modules -d ./../docs --template-theme bootstrap --title "Imatec Gerenciamento Segura da Informação" 
```

#### Opções
* --source (-s)        Dirs or files documentation is generated for. (multiple values allowed)
* --destination (-d)   Target dir for documentation.
* --access-levels      Access levels of included method and properties. (default: ["public","protected"]) (multiple values allowed)
* --annotation-groups  Generate page with elements with specific annotation.
* --base-url           Base url used for sitemap (useful for public doc).
* --config             Custom path to apigen.neon config file. (default: "/Users/ruverd/Sites/imatecv3/apigen.neon")
* --google-cse-id      Custom google search engine id (for search box).
* --google-analytics   Google Analytics tracking code.
* --debug              Turn on debug mode.
* --deprecated         Generate documentation for elements marked as @deprecated
* --download           Add link to ZIP archive of documentation.
* --extensions         Scanned file extensions. (default: ["php"]) (multiple values allowed)
* --exclude            Directories and files matching this mask will not be parsed (e.g. */tests/*). (multiple values allowed)
* --groups             The way elements are grouped in menu. (default: "auto")
* --charset            Charset of scanned files. (multiple values allowed)ne
* --main               Elements with this name prefix will be first in tree.
* --internal           Include elements marked as @internal.
* --php                Generate documentation for PHP internal classes.
* --skip-doc-path      Files matching this mask will be included in class tree, but will not create a link to their documentation. (multiple values allowed)
* --no-source-code     Do not generate highlighted source code for elements.
* --template-theme     ApiGen template theme name. (default: "default")
* --template-config    Your own template config, has higher priority templateTheme.
* --title              Title of generated documentation.
* --todo               Generate documentation for elements marked as @todo.
* --tree               Generate tree view of classes, interfaces, traits and exceptions.
* --help (-h)          Display this help message.
* --quiet (-q)         Do not output any message.
* --version (-V)       Display this application version.

## Tema (layout)
Remark - Responsive Bootstrap 4 Admin Template

### Site
https://themeforest.net/item/remark-responsive-bootstrap-4-admin-template/11989202

### Documentação
http://remark-docs.readthedocs.io/en/latest/

## Laravel
Laravel versão 5.3

### Artisan
```
  //Comando padrão
  php artisan migrate:refresh --seed
   
  //Comandos com alias 
  pa migrate:refresh --seed 
  pam:rs
  ```
 
### ALIAS
OBS: Pode ser colocado na inicialização do sistema para não perder toda vez que é desligado

```
alias pa="php artisan"
alias par="php artisan routes"
alias pam="php artisan migrate"
alias pam:r="php artisan migrate:refresh"
alias pam:roll="php artisan migrate:rollback"
alias pam:rs="php artisan migrate:refresh --seed"
alias pda="php artisan dumpautoload"
alias cu="composer update"
alias ci="composer install"
alias cda="composer dump-autoload -o"
```

### Gulp e Elixir
Responsável pelo agrupamento e minificação e cache do css e js

Comando Desenvolvimento:
  ```
  $ gulp 
  ```
  
Comando Produção:
   ```
  $ gulp --production 
  ```
  
Comando para escutar alterações:
   ```
  $ gulp watch 
  ```
  
## Homestead

### Rodar Servidor

Comando Máquina Virtual:
 ```
  php artisan serve --host=0.0.0.0 
  ```
  
Caminho Brownser:
 ```
  http://192.168.10.10:8000/
  ```

## Problemas encontrados

### Arquivo não encontrado ou reconhecido
Quando um arquivo por exemplo uma seed não é localizado pelo artisan execute o comando abaixo:
 ```
  composer dump-autoload
  ```

### Datatables Packet
A ordenação de uma collection é case sensitive para acertar isso é necessário criar um packet novo ou alterar diretamente a classe CollectionEngine no method ordering adicionar após a function SORT_NATURAL | SORT_FLAG_CASE
```
  $this->collection = $this->collection->sortBy(  
      function ($row) use ($column) {
          $data = $this->serialize($row);
          return Arr::get($data, $column);
      },
      SORT_NATURAL | SORT_FLAG_CASE
  );
  ```

## Melhorias

### Menu
Os métodos makeMenu e makeLink não deveriam estar no repositório