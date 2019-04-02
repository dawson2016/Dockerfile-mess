FROM paijp/officeconvert
RUN rm -rf /etc/yum.repos.d/*
COPY Centos-6.repo /etc/yum.repos.d/Centos-6.repo
RUN yum clean all && yum -y update && yum remove -y libreoffice-langpack-ja && yum install -y libreoffice-langpack-zh-Hans*
RUN sed -i '/memory_limit/s/128M/2048M/g' /etc/php.ini
ADD index.php /var/www/html/
EXPOSE 80 8100
CMD apachectl start&& libreoffice --headless --invisible   --norestore --nologo --nolockcheck --accept="socket,host=0.0.0.0,port=8100;urp;" --nofirststartwizard
