FROM ubuntu:14.04
# Install modules
COPY sources.list.trusty /etc/apt/sources.list
RUN apt-get update && apt-get -y install php5 php5-curl php5-gd php5-mysql && rm -r /var/lib/apt/lists/*
ADD entrypoint.sh /
RUN bash /entrypoint.sh && rm /entrypoint.sh
COPY config/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY config/php.ini /etc/php5/apache2/php.ini
COPY run.sh /
COPY run_code.sh /opt/run_code.sh

EXPOSE 80

RUN userdel www-data && useradd www-data

CMD ["/bin/bash", "/run.sh"]
