FROM nginx:1.24.0

WORKDIR /data

RUN apt-get update

COPY ./.docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY . /data
