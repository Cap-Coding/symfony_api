#!/usr/bin/env bash
set -e

if [[ $1 == "prod" ]]
then
  printf "Running prod...\n"
  docker-compose -f docker-compose_prod.yml up -d
  sudo service google-fluentd restart
  sudo service stackdriver-agent restart
elif [[ $1 == "build" ]]
then
  printf "Building prod...\n"
  docker-compose -f docker-compose_prod.yml build
elif [[ $1 == "refresh-database" ]]
then
  printf "Refreshing database...\n"
  docker-compose exec php bin/console --env=dev app:database:empty --force
  docker-compose exec php bin/console --env=dev doctrine:migrations:migrate -n
else
  printf "Running dev...\n"
  docker-compose up --build --remove-orphans
fi;
