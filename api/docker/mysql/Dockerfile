ARG MYSQL_VERSION=latest
FROM mysql:${MYSQL_VERSION}

RUN chown -R mysql:root /var/lib/mysql/

COPY my.cnf /etc/mysql/conf.d/my.cnf

CMD ["mysqld"]

EXPOSE 3306