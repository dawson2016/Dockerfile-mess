FROM openjdk:8-jre-alpine
MAINTAINER dawson.dong <dawson_2014@163.com>

# Install required packages

ENV ZOO_USER zookeeper
ENV ZOO_CONF_DIR /conf
ENV ZOO_DATA_DIR /data
ENV ZOO_DATA_LOG_DIR /datalog
COPY zookeeper-3.4.9 /mnt/zookeeper-3.4.9/
# Add a user and make dirs
RUN set -x \
    && adduser -D "$ZOO_USER" \
    && mkdir -p "$ZOO_DATA_LOG_DIR" "$ZOO_DATA_DIR" "$ZOO_CONF_DIR" \
    && chown "$ZOO_USER:$ZOO_USER" "$ZOO_DATA_LOG_DIR" "$ZOO_DATA_DIR" "$ZOO_CONF_DIR" \
    && echo 'http://mirrors.aliyun.com/alpine/v3.6/main/' > /etc/apk/repositories \
    && apk update && apk add --no-cache bash su-exec tzdata && ln -snf /usr/share/zoneinfo/Hongkong /etc/localtime \
    && cd /usr/share/zoneinfo/ && ls | grep -v Hongkong|xargs rm -rf && rm -rf /usr/share/man \
    && ls /mnt \
    && mv /mnt/zookeeper-3.4.9/conf/* "$ZOO_CONF_DIR" 

WORKDIR /mnt/zookeeper-3.4.9

ENV ZOO_PORT 2181
EXPOSE $ZOO_PORT

ENV PATH $PATH:/mnt/zookeeper-3.4.9/bin
ENV ZOOCFGDIR $ZOO_CONF_DIR

COPY run.sh /
ENTRYPOINT ["/run.sh"]
CMD ["zkServer.sh", "start-foreground"]
