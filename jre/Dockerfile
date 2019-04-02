FROM alpine:latest
COPY  glibc-2.25-r0.apk /tmp/ 
COPY  glibc-bin-2.25-r0.apk /tmp/ 
COPY  jre /opt/jre/
RUN   echo 'http://mirrors.ustc.edu.cn/alpine/edge/main' > /etc/apk/repositories \
      && apk update && apk add tzdata && ln -snf /usr/share/zoneinfo/Hongkong /etc/localtime \
      && cd /usr/share/zoneinfo/ && ls | grep -v Hongkong|xargs rm -rf && rm -rf /usr/share/man \ 
      && apk add --no-cache --allow-untrusted /tmp/*.apk \
      && echo "export LANG=C.UTF-8" > /etc/profile.d/locale.sh \
      && ln -s /opt/jre/bin/* /usr/bin/ && rm -rf /tmp/* && rm -rf /var/cache/apk/*
ENV LANG=C.UTF-8 
ENV JAVA_HOME="/opt/jre" 
