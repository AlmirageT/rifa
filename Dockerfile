FROM sistemasincube/img:lvs
ENV APP_HOME /var/www/html/framework
RUN mkdir -p $APP_HOME
ADD apache.conf /etc/apache2/sites-enabled/000-default.conf
ADD default-ssl.conf /etc/apache2/sites-available/default-ssl.conf
RUN wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add -
RUN echo "deb https://packages.sury.org/php/ stretch main" | tee /etc/apt/sources.list.d/php.list
RUN apt-get update
RUN apt-get install php7.2-imap -y
RUN a2dissite 000-default && \
        a2ensite 000-default && \
        a2enmod rewrite && \
        a2dismod php7.0 && \
        a2enmod php7.2 && \
        a2enmod ssl && \
        a2ensite default-ssl
RUN chmod 777 -R /var/www/html/framework
EXPOSE 80
EXPOSE 443
RUN service apache2 restart
WORKDIR $APP_HOME

#RUN php artisan key:generate #quitando key:generate dado que por cada inicio se crea UNA NUEVA KEY. Se debe ejecutar manualmente en el contenedor "docker start <contenedor_id> && docker exec -ti <contenedor_id> php artisan key:generate" y respaldar el archivo .ENV

# Ejecutando gestores de paquetes despues de montado el volumen y apache
# ( ** nota: no funciona con \ como saltos de linea **)
CMD bash -c "echo 'indicando permisos chmod' && chmod 775 -R . && chmod 777 -R storage/ && chmod 777 -R bootstrap/cache/ && chmod 777 -R public && echo 'fin de modificacion de permisos chmod' && composer install --no-interaction && npm install --silent && npm run dev && /usr/sbin/apache2ctl -D FOREGROUND"
