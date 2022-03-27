FROM php:8.1.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apt-get update && apt-get install -y git
RUN composer install
CMD [ "composer", "test" ]