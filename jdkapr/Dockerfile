FROM harbor.hseduyun.net/hs/jdk-1.8.0:v3
COPY *.gz /tmp/
WORKDIR /tmp
RUN apk update && \
    apk add gcc g++ libtool make && \
    tar zxf apr-util-1.6.1.tar.gz && \
    tar zxf apr-1.6.5.tar.gz && \
    tar zxf tomcat-native.tar.gz && \
    cd /tmp/apr-1.6.5 && \
    ./configure && make && make install && \
    cd /tmp/tomcat-native-1.2.18-src/native/ && \
    ./configure && make && make install && \
    apk del gcc g++ make libtool  && \
    rm -rf /var/cache/apk/*  && \
    rm -rf /tmp/*
