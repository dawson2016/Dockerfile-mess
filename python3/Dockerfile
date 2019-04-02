FROM mypy1 
LABEL maintainer="Dawson.dong  <dawson_2014@163.com>"
RUN pip3 install tornado==4.5
ADD app.py /opt/app.py
WORKDIR /opt/
EXPOSE 88
CMD ["python","app.py"]
