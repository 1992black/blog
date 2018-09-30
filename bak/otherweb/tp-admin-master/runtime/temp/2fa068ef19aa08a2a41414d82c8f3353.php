<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"/data/home/bxu2359050697/htdocs/otherweb/tp-admin-master/public/../app/admin/view//dispatch_jump.tpl";i:1485612889;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php echo \think\Lang::get('JumpPrompt'); ?></title>
    <meta name="KeyWords" content="<?php echo \think\Config::get('website.keywords'); ?>">
    <meta name="Description" content="<?php echo \think\Config::get('website.description'); ?>">
    <link rel="stylesheet" type="text/css" href="__LIB__/bootstrap3/css/bootstrap.css" />
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 16px; }
        h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
        .jump{ padding-top: 10px; }
        .success, .error{ line-height: 1.5em; font-size: 1.5em;}
        .success{color: #3c763d;}
        .error{color: #a94442;}
        .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display: none; }
        .jump #wait{color: #a94442;}
    </style>
</head>
<body>
    <table style="position: absolute;left: 0;right: 0;bottom: 20px;top: -10%;height: 100%;width: 100%;">
        <tr>
            <td style="text-align:center;">
                <div style="width:100%; margin:0 auto;">
                      <h3><?php echo \think\Lang::get('JumpPrompt'); ?></h3>
                          <?php switch ($code) {case 1:?>
                                <h2>:)</h2>
                                <p class="success"><?php echo(strip_tags($msg));?></p>
                                <?php break;case 0:?>
                                <h2>:(</h2>
                                <p class="error"><?php echo(strip_tags($msg));?></p>
                                <?php break;} ?>
                        <p class="detail"></p>
                        <p class="jump">
                            <?php echo \think\Lang::get('PageAuto'); ?> <a id="href" href="<?php echo($url);?>"><?php echo \think\Lang::get('Jump'); ?></a> <?php echo \think\Lang::get('WaitingTime'); ?>： <b id="wait"><?php echo($wait);?></b>
                        </p>
                </div>
            </td>
        </tr>
    </table>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>
