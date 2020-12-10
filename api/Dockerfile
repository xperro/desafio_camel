FROM php:7.4-cli
RUN docker-php-source extract \
    # do important things \
    && docker-php-source delete
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR "/html"
EXPOSE 8000
CMD [ "php", "-S", "0.0.0.0:8000" ]