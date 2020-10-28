FROM yonh/php:alpine-apache
#RUN echo "https://mirrors.aliyun.com/alpine/v3.12/main\nhttps://mirrors.aliyun.com/alpine/v3.12/community" > /etc/apk/repositories \
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk add php7-cli composer git npm make

COPY run.sh /
COPY run_code.sh /opt/run_code.sh