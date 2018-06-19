<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <title>中国-东盟太阳能技术转移中心</title>

    <!-- 导入版头css文件{ -->
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <!-- }导入版头css文件 -->

    <!-- 导入新闻展示模块css{ -->
    <link rel="stylesheet" type="text/css" href="./css/index_news.css">
    <!-- }导入新闻展示模块css文件 -->

    <!-- 导入钒钛通css和js文件{ -->
    <link rel="stylesheet" type="text/css" href="./css/common.css" id="theme1">
    <link rel="stylesheet" type="text/css" href="./css/home.css" id="theme2">
    <!-- }导入钒钛通css和js文件 -->

</head>
<body>

<!--  版头{  -->
<div class="header clearfix" id="header">

    <!--  登录模块{  -->
    <?php require_once('common/loginbar.php'); ?>
    <!--  }登录模块  -->

    <!--  网站横幅{  -->
    <?php require_once('common/banner.php'); ?>
    <!--  }网站横幅  -->

    <!--  导航栏{  -->
    <?php require_once('common/navbar.php'); ?>
    <!--  }导航栏  -->
</div>
<!--  }版头  -->

<!--  信息板块{  -->
<div class="main">
    <div class="xa_bread"> 当前位置： <a href="home.php">首页</a>&nbsp;&gt;&nbsp; <a href="demands.php">企业需求</a> &nbsp;&gt;&nbsp;详细页
    </div>
    <?php
    $id = $_GET['id'];
    include("sql/demandContent.php");
    $res = $result->fetch(PDO::FETCH_OBJ);
    ?>
    <div class="yun_xuqiu_det_a">
        <h1><?php echo $res->title; ?></h1>
        <div class="yun_xuqiu_det_aa">
            <div class="yun_xuqiu_det_aal"><span>发布时间：<?php echo $res->date; ?></span> <span>联系人：XXX经理</span> <br/>
                <span> 需求企业：<?php echo $res->entreprise; ?> </span> <span>需求地点：<?php echo $res->location; ?></span>
            </div>
        </div>
    </div>
    <div class="yun_xuqiu_det_b">
        <h2>需求简介</h2>
        <div class="hur1" style="word-break:break-all;word-wrap:break-word;"> <?php echo $res->description; ?></div>
        <p class="hur2">相关需求信息</p>
        <div class="hur3">
            <p><a href="#" target="_blank">太阳能即热器与高层建筑一体化应用技术</a> <span>2016-09-21</span></p>
            <p><a href="#" target="_blank">太阳能热泵一体机技术</a> <span>2016-05-18</span></p>
            <p><a href="#" target="_blank">太阳能空调热泵三合一技术</a> <span>2016-05-18</span></p>
        </div>
    </div>
</div>
<!-- }信息板块  -->

<?php require_once('common/footer.php'); ?>
</body>
</html>