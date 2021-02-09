# E-commerce website
Scope of this project is the development of an e-commerce application using Symfony, Twig and Bootstrap.

# Requirements:
- Docker v.19.03.18

# How to launch the application
Execute the following commands:
- docker-compose up --build
- CTRL-C
- docker-compose up -d
- Connect to client docker container in order to set up the DB environment:
  - docker exec -ti client
  - php bin/console doctrine:database:create
  - php bin/console doctrine:schema:create

That's it. You can now connect to the following link http://localhost:8080. 
