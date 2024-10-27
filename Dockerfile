FROM dunglas/frankenphp

ENV SERVER_NAME=:80
RUN install-php-extensions \
	pdo_mysql \
	mysqli

COPY . /app
