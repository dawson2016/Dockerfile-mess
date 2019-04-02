FROM alpine:latest
MAINTAINER dawson.dong <dawson_2014@163.com>

WORKDIR /app
COPY startup.sh /startup.sh

RUN  echo 'http://mirrors.aliyun.com/alpine/v3.7/main/' > /etc/apk/repositories \ 
    && apk update && apk add tzdata && ln -snf /usr/share/zoneinfo/Hongkong /etc/localtime \
    && cd /usr/share/zoneinfo/ && ls | grep -v Hongkong|xargs rm -rf \
    && apk add --no-cache mysql \ 
    && rm -f /var/cache/apk/* \
    && rm -rf /usr/share/man \ 
    && rm -rf /etc/mysql/my.cnf  
COPY my.cnf /etc/my.cnf
EXPOSE 3306
CMD ["/startup.sh"]
