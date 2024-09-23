![Status](https://status.beortizz.com/api/badge/39/status)

# Loja - Sistema de Gerenciamento de Produtos

## Descrição

Este projeto é um sistema básico de gerenciamento de produtos para uma loja, desenvolvido com **Laravel** e utiliza **Blade** e **Livewire** para a interface do usuário. O sistema permite que os administradores façam a gestão de produtos e categorias, além de possibilitar a importação de produtos de uma API externa.

### Funcionalidades Principais

1. **Login e Edição de Perfil**
   - O usuário pode se autenticar no sistema e editar suas informações pessoais como email, nome e telefone.

2. **Gerenciamento de Categorias**
   - Criação, leitura, atualização e exclusão (CRUD) de categorias para organização dos produtos.

3. **Gerenciamento de Produtos**
   - Criação, leitura, atualização e exclusão (CRUD) de produtos, com validação de dados.
   - Os produtos possuem os seguintes atributos:
     - **id**: Identificador único do produto.
     - **name**: Nome do produto.
     - **price**: Preço do produto.
     - **description**: Descrição detalhada.
     - **category**: Categoria associada.
     - **image_url**: URL da imagem do produto (opcional).

4. **Buscas**
   - Busca de produtos por nome e categoria.
   - Busca por produtos que possuem ou não uma imagem associada.
   - Busca por uma categoria específica.
   - Busca por ID único do produto.

5. **Importação de Produtos**
   - Importação de produtos de uma API externa ([Fake Store API](https://fakestoreapi.com/docs)).
   - Comando para importar todos os produtos da API:  
     ```bash
     php artisan products:import
     ```
   - Comando para importar um produto específico através de seu ID:  
     ```bash
     php artisan products:import --id={ID}
     ```

### Tecnologias Utilizadas

- **Laravel**: Framework PHP utilizado para o desenvolvimento do back-end.
- **Blade**: Motor de templates do Laravel para renderizar as views.
- **Livewire**: Ferramenta utilizada para criar componentes reativos no front-end
- **Tailwind CSS**: Para estilização da interface.
### Como Executar o Projeto

#### Requisitos

- PHP >= 8.0
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)
- [Node.js](https://nodejs.org/) (para gerenciamento de pacotes e compilação de assets)
- Laravel

#### Passo a Passo

1. **Clonar o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/nome-do-repositorio.git
   cd nome-do-repositorio
    ```
2. **Instalar as depedências:**
   ```bash
    composer install
    npm install
    ```
3. **Configure o ambiente**
    - Copie e cole o arquivo .env.example e o nomeie .env
    - Atualize as seguintes variaveis para o seu banco de dados 
    ```properties
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=[nome_do_seu_banco]
        DB_USERNAME=[seu_nome_de_usuario]
        DB_PASSWORD=[sua_senha_super_segura]
    ```
4. **Crie a chave da aplicação**
    ```bash
    php artisan key:generate
    ```
5. **Rode as Migrations**
    ```bash
    php artisan migrate
    ```
6. **Faça o link com o storage**
    ```bash
    php artisan storage:link
    ```
7. **Rode o seed do banco de dados (opcional)**
    ```bash
    php artisan db:seed
    ```
    Caso opte por isso, o usuário de teste é:

    - **Usuário**: `test@example.com`
    - **Senha**: `password`

8. **Rode o servidor de back-end**
    ```bash
    php artisan serve
    ```
9. **Rode o de front-end**
    ```bash
    npm run dev
    ```

10. **Acesse o Link**
    
    [127.0.0.1:8000](http://127.0.0.1:8000)

