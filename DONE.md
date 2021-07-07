1## Symfony new project

- composer create-project symfony/website-skeleton indeed
- cd indeed

2## Controller

- symfony console make:controller
- name AppController

3## Database

- modify .env with DB infos
- create DB:indeed_symfony in phpMyAdmin

4## Templates/ adding bootstrap & modifying the index

- add bootstrap cdn css to base.html.twig
- new folder : components
  ->\_navbar.html.twig
- import the navbar in index.html.twig

5## install Webpack

- composer require symfony/webpack-encore-bundle
- npm install
- uncomment the entry comments in base.html.twig
- run webpack
  npm run dev-server

6## creating entities and relations

- symfony console make:entity
- Offer
- Contract : relation : offers -> Offer(related class) -> OneToMany -> contract (new field name inside offer) -> nullable
- ContractType : relation : offers -> Offer(related class) -> OneToMany -> contractType (new field name inside offer) -> nullable
- symfony console make:migration
- symfony console doctrine:migrations:migrate

7## Git first commit

- git init
- git add .
- git commit -m "First commit,controller and entities created"
- git remote add origin https://github.com/yousra-cardaire/indeed-symfony.git
- git push -u origin master

8## modifying the setters (name and slug) in Contract and ContractType

9## Creating Fixtures

- composer require orm-fixtures --dev
- symfony console make:fixtures
  -> to create OfferFixtures, ContractFixtures, ContractTypesFixtures
  -modify the files
