# E-commerce website
Scope of this project is the development of an e-commerce application using Symfony, Twig and Bootstrap.

# Requirements:
- Docker
- docker-compose

# How to launch the application
Execute the following commands:
- docker-compose up -d --build
- Connect to client docker container in order to set up the DB environment:
  - docker exec -ti client bash
  - php bin/console doctrine:schema:create

That's it. You can now connect to the following link http://localhost:8080. 
