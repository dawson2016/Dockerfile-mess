FROM harbor.hseduyun.net/hs/tomcat-7.0.90:latest 
ENV  CAT_SERVER 192.168.27.103
RUN  mkdir -p /data/appdatas/cat && mkdir -p /data/applogs/cat
COPY run.sh /
COPY cat.war  /usr/local/tomcat/webapps
COPY *.xml /data/appdatas/cat/
EXPOSE 8080
ENTRYPOINT ["/run.sh"]
CMD ["catalina.sh", "run"]
