FROM alpine:latest
MAINTAINER dawson dawson_2014@163.com
RUN echo 'http://mirrors.ustc.edu.cn/alpine/edge/main' > /etc/apk/repositories && apk update && apk add tzdata && ln -snf /usr/share/zoneinfo/Hongkong /etc/localtime && cd /usr/share/zoneinfo/ && ls | grep -v Hongkong|xargs rm -rf &&echo 'vm.overcommit_memory = 1' >> /etc/sysctl.conf && echo "echo never > /sys/kernel/mm/transparent_hugepage/enabled" >> /etc/rc.local && apk add redis && rm -r /var/cache/apk && rm -r /usr/share/man && mkdir /app/ 
COPY redis.conf /etc/
EXPOSE 6379
CMD ["redis-server","/etc/redis.conf"]
