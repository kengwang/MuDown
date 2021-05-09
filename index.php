<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multicraft 下载 - 北京阿里云主机 - Kengwang</title>
</head>

<body>

    <h1>Multicraft 下载 - 北京阿里云主机节点 - Kengwang</h1>
    <h2>ChangeLog 更新日志</h2>
    <p>请点击 <a href="/changes.html">此处</a> 查看更新日志</p>
    <p>这是 <a href='https://blog.tysv.top'>Kengwang</a> 的一个公益项目,资源来自于网络,本项目人员不能保证代码纯洁,下载前请仔细甄别.如有资源欢迎联系Kengwang补充</p>
    <p>应大家要求,增加了OSS高速链接.本地下载不超过1MB/s但是不会花作者钱,OSS速度贼快但是要花作者钱</p>
    <p>大家行行好,帮忙打个赏,尽量不要OSS,作者肾会透支的</p>

    
    <h2>打赏信息</h2>
    <p>bitcoin : 1Q6RSmD7PPAjuMRs2Wo5F8awugTogAyFx</p>
    <p>usd : 0xF684271Da71b26c5b1f452BFA17c6599f4c83685</p>
    <p>bitcoin cash : qqmuvz3r6auqvucz7l63h5qvl3g2nzkzksaxerhgug</p>
    <p>Ether : 0xF684271Da71b26c5b1f452BFA17c6599f4c83685</p>
    <p>Stellar : GCZIMQYQB6SMLPMQYWJHMLHPUJHNDIR7VH2CU7GJSNEQPLXJNELIUQ6X</p>
    <h2>文件列表</h2>
    <p>括号内为文件MD5值,供下载校验</p>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $scans = array(
        0 => array(
            'dir' => 'Linux64',
            'name' => 'Linux 64位',
            'des' => 'Linux64位系统运行的,一般在Linux上安装都选这个'
        ),
        1 => array(
            'dir' => 'Linux32',
            'name' => 'Linux 32位(x86)',
            'des' => '给32位Linux使用,仅限于特殊主机使用,该版本旧资源缺失严重'
        ),
        2 => array(
            'dir' => 'WindowsStandalone',
            'name' => 'Windows Standalone 独立版',
            'des' => '独立版 也就是SQLite,Apache这些都直接集成且配置好了,但是对于环境纯洁度要求很高,不太建议使用'
        ),
        3 => array(
            'dir' => 'WindowsInstaller',
            'name' => 'Windows Installer 安装版',
            'des' => '基于Bitnami的集成安装包,仅限Windows,小白可以来看看'
        ),
        4 => array(
            'dir' => 'Preview',
            'name' => 'Preview 预览',
            'des' => 'Multicraft发布的预览版,可能会不稳定,建议下载前面的正式版'
        )
    );
    function NoticeEmail($version, $du,$name ,$preview = false)
    {
        $json = file_get_contents('./emails.json');
        $users = json_decode($json, true);

        include_once('./PHPMailer/src/PHPMailer.php');
        include_once('./PHPMailer/src/SMTP.php');
        $message = '尊敬的用户您好:<br>Multicraft的 '.$name.' 版本已经更新,版本为:' . $version . '<br>您可以到<a href="' . $du . '">' . $du . '</a>下载<br>该邮件为 <a href="http://mudown.tysv.top:88">Multicraft下载站</a> 自动系统发送<br>如需停止订阅联系QQ:1136772134<br>顺颂<br>时祺<br><br>Multicraft下载站 - Kengwang敬上';
        $from = "robot@tysv.top";
        // 实例化PHPMailer核心类
        $mail = new PHPMailer();
        // 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        //$mail->SMTPDebug = 1;
        // 使用smtp鉴权方式发送邮件
        $mail->isSMTP();
        // smtp需要鉴权 这个必须是true
        $mail->SMTPAuth = true;
        // 链接qq域名邮箱的服务器地址
        $mail->Host = 'smtp.qq.com';
        // 设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';
        // 设置ssl连接smtp服务器的远程服务器端口号
        $mail->Port = 465;
        // 设置发送的邮件的编码
        $mail->CharSet = 'UTF-8';
        // 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = 'Multicraft下载站';
        // smtp登录的账号 QQ邮箱即可
        $mail->Username = '****';
        // smtp登录的密码 使用生成的授权码
        $mail->Password = '****';
        // 设置发件人邮箱地址 同登录账号
        $mail->From = '****';
        // 邮件正文是否为html编码 注意此处是一个方法
        $mail->isHTML(true);
        // 设置收件人邮箱地址     
        if ($preview) {
            $users = $users['Preview'];
            $mail->Subject = 'Multicraft 预览版本 [' . $version . ']';
        } else {
            $users = $users['Release'];
            $mail->Subject = 'Multicraft 新版本 [' . $version . ']';
        }
        foreach ($users as $key => $user) {
            $mail->addAddress($user);
        }
        // 添加该邮件的主题

        // 添加邮件正文
        $mail->Body = $message;
        // 发送邮件 返回状态
        $status = $mail->send();
    }
    foreach ($scans as $scan) {
        $files = scandir('./' . $scan['dir'] . '/');
        ?>
        <h3><?php echo $scan['name']; ?></h3>
        <p><?php echo $scan['des']; ?></p>
        <ul>
            <?php
                foreach ($files as $file) {
                    if ($file == '.' || $file == '..') continue; //.和..不显示
                    if (strpos($file, 'md5sum') !== false) continue;
                    if (strpos($file, 'aria2') !== false) continue;
                    if (is_file('./' . $scan['dir'] . '/' . $file . '.aria2')) {
                        ?>
                <li><?php echo $file; ?> Downloading...... Please Wait 正在从Multicraft下载,请等待</li>

                        <?php
                        continue;
                    }
                    //$md5=md5_file('./Linux64/'.$file);
                    $md5 = @file_get_contents('./' . $scan['dir'] . '/' . $file . '.md5sum');
                    if ($md5 == false) {
                        $md5 = md5_file('./' . $scan['dir'] . '/' . $file);
                        $md5file = fopen('./' . $scan['dir'] . '/' . $file . '.md5sum', "w") or die('Failed to open md5 file');
                        fwrite($md5file, $md5);
                        fclose($md5file);
                        if ($scan['dir'] == 'Preview') {
                            NoticeEmail($file, 'http://mudown.tysv.top:88/' . $scan['dir'] . '/' . $file,$scan['name'], true);
                        } else {
                            NoticeEmail($file, 'http://mudown.tysv.top:88/' . $scan['dir'] . '/' . $file,$scan['name']);
                        }
                    }
                    ?>
                <li><?php echo $file; ?>: <a href='http://mudown.tysv.top:88/<?php echo $scan['dir']; ?>/<?php echo $file; ?>'>本地下载</a>  <a href='http://	
multicraftshell.oss-cn-beijing.aliyuncs.com/muallver/<?php echo $scan['dir']; ?>/<?php echo $file; ?>'>OSS高速下载</a> (<?php echo $md5; ?>)</li>

        <?php

            }
            echo '</ul>';
        }
        ?>
        <p>&nbsp;</p>
        <h2>协议</h2>
        <p>该网站由Kengwang维护,资源收集自网络,来源多路,恕不能一一注明,如有疑问和建议请联系<a href='mailto:1136772134@qq.com'>Kengwang</a></p>
        <p>本站内容全公益性,不过欢迎打赏!</p>
</body>

</html>