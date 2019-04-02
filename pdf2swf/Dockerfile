FROM alpine:3.6
MAINTAINER dawson dawson_2014@163.com
COPY swftools-2013-04-09-1007.tar.gz  /home/
RUN set -x \
    && echo 'http://mirrors.aliyun.com/alpine/v3.6/main/' > /etc/apk/repositories && apk update \
    && apk add \
       libstdc++ \
       jpeg-dev \
       freetype-dev \
    && apk add --virtual .build-deps \
       gcc \
       g++ \
       libc-dev \
       libffi-dev \
       linux-headers \
       make \
       zlib-dev \
    && cd /home \
    && tar xf swftools-2013-04-09-1007.tar.gz \
    && cd swftools-2013-04-09-1007 \
    && ./configure --disable-lame \
    && make && make install \
    && apk del --purge .build-deps \
    && rm -rf /home/swftools* \  
    && rm -rf /tmp/* \
    && rm -rf /var/cache/apk/* \
    && rm -rf /usr/local/share/*
