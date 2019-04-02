FROM centos:latest
MAINTAINER Dawson.dong <dawson_2014@163.com>
RUN yum -y update && \
    yum -y install epel-release && \
    yum -y install nginx php php-fpm && \ 
    yum -y install libreoffice-headless libreoffice-calc libreoffice-writer libreoffice-impress && \ 
    yum install -y libreoffice-langpack-zh-Hans* && \
    yum clean all && \
    sed -i '/;cgi.fix_pathinfo=1/c\cgi.fix_pathinfo=0' /etc/php.ini && \
    sed -i '/listen = 127.0.0.1:9000/c\listen = /var/run/php-fpm/php-fpm.sock' /etc/php-fpm.d/www.conf && \
    sed -i '/;listen.owner = nobody/c\listen.owner = nobody' /etc/php-fpm.d/www.conf && \
    sed -i '/;listen.group = nobody/c\listen.group = nobody' /etc/php-fpm.d/www.conf && \
    sed -i '/user = apache/c\user = nginx' /etc/php-fpm.d/www.conf && \
    sed -i '/group = apache/c\group = nginx' /etc/php-fpm.d/www.conf && \
    rm -rf /usr/share/nginx/html/*
ADD index.php /usr/share/nginx/html/
ADD run.sh  /run/
EXPOSE 80 8100
CMD ["/run/run.sh"]
