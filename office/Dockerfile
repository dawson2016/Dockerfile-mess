FROM alpine:latest
MAINTAINER dawson dawson_2014@163.com
RUN echo 'http://mirrors.ustc.edu.cn/alpine/v3.3/main/' >/etc/apk/repositories && apk update && apk add libreoffice \ 
    && apk add tzdata && ln -snf /usr/share/zoneinfo/Hongkong /etc/localtime \
    && rm -rf /tmp/* /var/cache/apk/* && cd /usr/share/zoneinfo/ && ls | grep -v Hongkong|xargs rm -rf && rm -rf /usr/share/man\
    && mkdir -p /usr/lib/libreoffice/share/fonts/truetype
ADD sim*  /usr/lib/libreoffice/share/fonts/truetype/
ADD index.php  /var/www/html/
ADD run.sh  /run/
EXPOSE 8100
CMD ["/run/run.sh"]
