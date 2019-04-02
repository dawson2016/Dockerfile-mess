#!/usr/bin/python
#coding:utf-8
import tornado.ioloop
import tornado.web
from tornado import gen,httpclient
import io 
from PIL import Image
class MainHandler(tornado.web.RequestHandler):
    @gen.coroutine
    def conv(self,response):
        tmpIm = io.BytesIO(response.body)
        size = self.get_argument('size')
        img = Image.open(tmpIm)
        img.thumbnail((int(size),int(size)))
        tmpIm.seek(0)
        img.save(tmpIm,'PNG')
        self.set_header("Content-type", "image/png")
        self.write(tmpIm.getvalue())
    @gen.coroutine
    def get(self):
        path = self.get_argument('url0')
        http = httpclient.AsyncHTTPClient()
        yield http.fetch(path,self.conv)
class BHandler(tornado.web.RequestHandler):
    def get(self):
        self.write('ok')
def make_app():
    return tornado.web.Application([
        (r"/", MainHandler),
        (r"/ok", BHandler),
    ])
if __name__ == "__main__":
    app = make_app()
    app.listen(99)
    tornado.ioloop.IOLoop.current().start()
