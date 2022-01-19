# Main image
FROM nginx:1.19.2-alpine
# Author
MAINTAINER Ilichev Sergey <sergey.my.activity@gmail.com>

# todo: разобраться почему нельзя использовать в default.conf nginx
ENV DOLLAR=$
ENV WORKDIR=/var/www/code
ENV FASTCGI=php-fpm:9000

RUN apk update && apk add bash

CMD /bin/sh -c "nginx -g 'daemon off;'"
