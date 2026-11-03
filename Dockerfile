FROM wordpress:latest
RUN apt update && apt upgrade -y
RUN apt install git curl links -y

WORKDIR /var/www/html/wp-content/themes/
RUN git clone https://github.com/sohakolan/res508_herbergement-wordpress.git --depth 1
WORKDIR /var/www/html/
