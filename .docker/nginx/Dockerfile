FROM nginx:stable-alpine

COPY .docker/nginx/default.conf /etc/nginx/conf.d/

WORKDIR /var/www/html

COPY public public
