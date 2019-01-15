<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <script src="https://cdn.bootcss.com/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
        <script type="text/javascript" src="http://www.boolaw.com/tpl/default/js/jquery-1.8.3.min.js"></script>
        <title>html2canvas网页截图</title>
        <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
        <meta http-equiv="description" content="this is my page">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <!-- html2canvas()中,第一个参数是要截图的Dom对象，第二个参数时渲染完成后回调的canvas对象。  -->
       <script language="javascript">
    $(document).ready(function (){
        html2canvas($("#html2canvas")).then(function (canvas) {
            window.html_canvas = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            var pHtml = "<img src="+window.html_canvas+" id='image_down'/>";
            $('#html2canvas').html(pHtml);
            // $('#down_button').remove();
            ceshi(window.html_canvas);
        });

    });

    /**
     * 把图片文件流保存到本地
     */
    function ceshi(path){
        alert(path);
         $.post('', {path:path}, function(json){
                    }, 'json');
    }
</script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div id="html2canvas">
        此网页演示了html2canvas截图后将截图后的网页追加到了原网页之上        <br>      <br>
        这里可以看作是边界线      <hr/>
        </div>
        <a type="button" id="down_button">下载</a>
    <?php
if (isset($_POST['path'])) {
      $base64_string = $_POST['path'];
      $url = time().rand(1000,9999).".png";
      $base64_string= explode(',', $base64_string); //截取data:image/png;base64, 这个逗号后的字符
      $data= base64_decode($base64_string[1]);//对截取后的字符使用base64_decode进行解码
      file_put_contents('./'.$url, $data); //写入文件并保存
  }

?>
    </body>
</html>