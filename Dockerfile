FROM wyveo/nginx-php-fpm:latest

# Define o diretório principal do container como o diretório do Nginx
WORKDIR /usr/share/nginx/

# Troca a configuração padrão do Nginx pela nossa
COPY ./.docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Instalação da extensão do MongoDB para o PHP
RUN apt-get update \
    && apt-get install -y \
        libssl-dev \
        libcurl4-openssl-dev \
        pkg-config \
        libsslcommon2-dev \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala as dependências do Composer
RUN composer install

EXPOSE 8000

CMD [ "php artisan serve"  ]
