<!DOCTYPE html>
<html>
    <head>
        <title>文件上传</title>
        <meta  name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.3.2.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mobile-1.3.2.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </head>

      <body>
            <form action="/upload" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    PHOTO:
                  <input type="file" name="img" value="" />

                  <input type="submit" name="submit" id="submit" value="提交" />
            </form>
      </body>
</html>