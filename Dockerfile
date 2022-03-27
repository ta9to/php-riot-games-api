FROM php:8.1.4-cli
WORKDIR /usr/src/myapp
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip