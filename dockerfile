# Use uma imagem PHP 8.3 oficial como base
FROM php:8.3-apache

# Instala extensões necessárias do PHP e outras dependências
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instala o Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Habilita o módulo rewrite do Apache
RUN a2enmod rewrite

# Copie o código fonte do seu projeto para o diretório root do Apache
COPY . /var/www/html/

# Copie as configurações personalizadas do PHP
COPY ./php.ini /usr/local/etc/php/php.ini

# Define permissões adequadas para o diretório
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Exponha a porta 80 para o Apache
EXPOSE 80

# Inicia o Apache quando o container for iniciado
CMD ["apache2-foreground"]
