<?php
use Typecho\Widget\Helper\Form\Element\Text;
use Typecho\Widget\Helper\Form\Element\Textarea;
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once("core/shortcodes.php");
require_once("core/App.php");
require_once("core/ipdata.class.php");
function themeInit()
{
    Helper::options()->commentsAntiSpam = false; //关闭反垃圾
    Helper::options()->commentsCheckReferer = false; //关闭检查评论来源URL与文章链接是否一致判断(否则会无法评论)
    Helper::options()->commentsMaxNestingLevels = '999'; //最大嵌套层数
    Helper::options()->commentsPageDisplay = 'first'; //强制评论第一页
    Helper::options()->commentsOrder = 'DESC'; //将最新的评论展示在前
    Helper::options()->commentsHTMLTagAllowed = '<a href=""> <img src=""> <img src="" class=""> <code> <del>';
    Helper::options()->commentsMarkdown = true;
}
/**
 * 主题后台设置
 */
function themeConfig($form)
{
    $navsay = new Text('navsay', NULL, NULL, _t('导航栏右侧文字设置'), _t('直接书写文字即可，不建议过长。也可使用相关随机api'));
    $form->addInput($navsay);
    $sitefavicon = new Text('sitefavicon', NULL, NULL, _t('标题Logo设置'), _t('在这里输入图片链接'));
    $form->addInput($sitefavicon);
    $sitetime = new Text('sitetime', NULL, NULL, _t('网站页脚时间设置'), _t('在这里输入时间，例2022'));
    $form->addInput($sitetime);
    $heroimg = new Text('heroimg', NULL, NULL, _t('头部大图设置'), _t('在这里输入图片链接'));
    $form->addInput($heroimg);
    $lovetime = new Text('lovetime', NULL, NULL, _t('恋爱起始日期设定'), _t('格式“YYYY/MM/DD”，例“2022/07/16”'));
    $form->addInput($lovetime);
    $anniversarytime = new Text('anniversarytime', NULL, NULL, _t('周年日期设定'), _t('格式“YYYY/MM/DD”，例“2023/07/16”'));
    $form->addInput($anniversarytime);
    $wherearewegoingtime = new Text('wherearewegoingtime', NULL, NULL, _t('中考日期设定'), _t('格式“YYYY/MM/DD”，例“2023/06/24”'));
    $form->addInput($wherearewegoingtime);
    $boy = new Text('boy', NULL, NULL, _t('男生头像设置'), _t('在这里输入头像链接'));
    $form->addInput($boy);
    $girl = new Text('girl', NULL, NULL, _t('女生头像设置'), _t('在这里输入头像链接'));
    $form->addInput($girl);
    $boyname = new Text('boyname', NULL, NULL, _t('男生昵称设置'), _t('在这里输入昵称'));
    $form->addInput($boyname);
    $girlname = new Text('girlname', NULL, NULL, _t('女生昵称设置'), _t('在这里输入昵称'));
    $form->addInput($girlname);


    $loveListPageIcon = new Text('loveListPageIcon', NULL, NULL, _t('首页Love List页面图标'), _t('在此输入图标直链，将显示在首页Love List小版块中'));
    $form->addInput($loveListPageIcon);
    $loveListPageLink = new Text('loveListPageLink', NULL, NULL, _t('Love List页面链接'), _t('在此输入Love List页面链接'));
    $form->addInput($loveListPageLink);

    $blessingPageIcon = new Text('blessingPageIcon', NULL, NULL, _t('首页祝福板页面图标'), _t('在此输入图标直链，将显示在首页祝福板小版块中'));
    $form->addInput($blessingPageIcon);
    $blessingPageLink = new Text('blessingPageLink', NULL, NULL, _t('祝福页面链接'), _t('在此输入祝福页面链接'));
    $form->addInput($blessingPageLink);

    $timePageIcon = new Text('timePageIcon', NULL, NULL, _t('首页点点滴滴图标'), _t('在此输入图标直链，将显示在首页点点滴滴小版块中'));
    $form->addInput($timePageIcon);

    $albumPageLink = new Text('albumPageLink', NULL, NULL, _t('相册页面链接'), _t('在此输入相册页面链接'));
    $form->addInput($albumPageLink);
    $albumPageIcon = new Text('albumPageIcon', NULL, NULL, _t('首页相册图标'), _t('在此输入图标直链，将显示在首页相册小版块中'));
    $form->addInput($albumPageIcon);
    
    $maybeloveyouPageLink = new Text('maybeloveyouPageLink', NULL, NULL, _t('表白墙页面链接'), _t('在此输入表白墙页面链接'));
    $form->addInput($maybeloveyouPageLink);
    $maybeloveyouPageIcon = new Text('maybeloveyouPageIcon', NULL, NULL, _t('表白墙相册图标'), _t('在此输入图标直链，将显示在首页表白墙小版块中'));
    $form->addInput($maybeloveyouPageIcon);

    $CustomContenth = new Textarea('头部自定义', NULL, NULL, _t('头部自定义内容'), _t('位于头部，head内，适合放置一些链接引用或自定义内容'));
    $form->addInput($CustomContenth);
    $stylemyself = new Textarea('Css自定义', NULL, NULL, _t('自定义Css样式'), _t('已包含&lt;style&gt;标签，请直接书写样式'));
    $form->addInput($stylemyself);
    $CustomContent = new Textarea('底部自定义', NULL, NULL, _t('底部自定义内容'), _t('位于底部，footer之后body之前，适合放置一些js或自定义内容，如网站统计代码等，（注意：如果您开启了Pjax，暂时只支持百度统计、Google统计，其余统计代码可能会不准确；没开请忽略）'));
    $form->addInput($CustomContent);
    $pjaxContent = new Textarea('pjax回调', NULL, NULL, _t('Pjax回调函数'), _t('在这里可以书写回调函数内容。如果您不知道这项如何使用请忽略'));
    $form->addInput($pjaxContent);

}

/** 获取评论者归属地信息 */
function convertip($ip){  
   echo convertips($ip);
}
