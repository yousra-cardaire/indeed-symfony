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
                ->_navbar.html.twig
- import the navbar in index.html.twig

5## install Webpack
- composer require symfony/webpack-encore-bundle
- npm install
- uncomment the entry comments in base.html.twig
- run webpack
     npm run dev-server

6## creating entities
- symfony console make:entity