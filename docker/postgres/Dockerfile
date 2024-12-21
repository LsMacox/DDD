FROM postgres:${POSTGRES_VERSION:-16}-alpine

RUN apk add --no-cache postgresql-contrib

COPY ./docker/postgres/init.sql /docker-entrypoint-initdb.d/
