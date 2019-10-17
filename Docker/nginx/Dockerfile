FROM nginx:latest

RUN rm /etc/nginx/conf.d/*
COPY ./Docker/nginx/conf/gzip.conf /etc/nginx/conf.d/gzip.conf
COPY ./Docker/nginx/conf/nginx.conf /etc/nginx/conf.d/nginx.conf
COPY ./Docker/nginx/conf/server.conf /etc/nginx/conf.d/server.conf

COPY ./app/ /app/
WORKDIR /app/
