FROM harbor.hseduyun.net/hs/ocrmypdf 
USER root
RUN apt-get install tesseract-ocr-chi-sim

ADD server.py  /app/
ENTRYPOINT ["/app/entrypoint.sh"]
