FROM httpd:2.4.33-alpine
RUN apk update; \
    apk upgrade;

COPY server.crt /usr/local/apache2/conf/
COPY server.key /usr/local/apache2/conf/

RUN sed -i \
        -e 's/^#\(Include .*httpd-ssl.conf\)/\1/' \
        -e 's/^#\(LoadModule .*mod_ssl.so\)/\1/' \
        -e 's/^#\(LoadModule .*mod_socache_shmcb.so\)/\1/' \
        conf/httpd.conf

# Copy apache vhost file to proxy php requests to php-fpm container
COPY demo.apache.conf /usr/local/apache2/conf/demo.apache.conf
RUN echo "Include /usr/local/apache2/conf/demo.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf

COPY demo.apache-ssl.conf /usr/local/apache2/conf/extra/demo.apache-ssl.conf
RUN echo "Include /usr/local/apache2/conf/extra/demo.apache-ssl.conf" \
    >> /usr/local/apache2/conf/extra/httpd-ssl.conf
