FROM davidcaste/alpine-java-unlimited-jce:jre8

MAINTAINER Dawson <dawson_2014@163.com>

ENV TOMCAT_MAJOR=9 
ENV TOMCAT_VERSION=9.0.12 
ENV TOMCAT_HOME=/opt/tomcat
ENV CATALINA_HOME=/opt/tomcat
ENV CATALINA_OUT=/dev/null 

RUN echo 'http://mirrors.aliyun.com/alpine/v3.3/main/' >/etc/apk/repositories && apk update &&\
    apk upgrade --update && \ 
    apk add --update curl && \
    apk add tzdata && ln -snf /usr/share/zoneinfo/Hongkong /etc/localtime && \
    curl -jksSL -o /tmp/apache-tomcat.tar.gz http://archive.apache.org/dist/tomcat/tomcat-${TOMCAT_MAJOR}/v${TOMCAT_VERSION}/bin/apache-tomcat-${TOMCAT_VERSION}.tar.gz && \
    gunzip /tmp/apache-tomcat.tar.gz && \
    tar -C /opt -xf /tmp/apache-tomcat.tar && \
    ln -s /opt/apache-tomcat-${TOMCAT_VERSION} ${TOMCAT_HOME} && \
    rm -rf ${TOMCAT_HOME}/webapps/* && \
    apk del curl && \
    rm -rf /tmp/* /var/cache/apk/*
COPY logging.properties ${TOMCAT_HOME}/conf/logging.properties
COPY run.sh /
EXPOSE 8080
CMD ["/run.sh"]
