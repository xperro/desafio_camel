FROM php:7.4-cli
RUN docker-php-source extract \
    # do important things \
    && docker-php-source delete
WORKDIR "/html"
EXPOSE 9000
CMD [ "php", "-S", "0.0.0.0:9000" ]