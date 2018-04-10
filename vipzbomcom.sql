-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-04-10 16:02:17
-- 服务器版本： 5.5.46
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vipzbomcom`
--

-- --------------------------------------------------------

--
-- 表的结构 `kw_config`
--

CREATE TABLE IF NOT EXISTS `kw_config` (
  `id` int(11) NOT NULL COMMENT '网站基本信息配置',
  `oauth` varchar(250) NOT NULL COMMENT '授权登陆页面',
  `sitename` varchar(50) NOT NULL DEFAULT '' COMMENT '网站名称',
  `hotsearch` varchar(250) NOT NULL,
  `header` text NOT NULL COMMENT '全局代码',
  `logo1` varchar(50) NOT NULL COMMENT '网站logo',
  `logo2` varchar(50) NOT NULL DEFAULT '' COMMENT '网站底部logo',
  `img1` varchar(50) NOT NULL COMMENT '一般为二维码',
  `file` varchar(50) NOT NULL,
  `siteurl` varchar(100) NOT NULL DEFAULT '' COMMENT '网站地址',
  `siteurl_wap` varchar(100) NOT NULL,
  `webqq` varchar(255) NOT NULL DEFAULT '' COMMENT '网站qq',
  `link1` varchar(255) NOT NULL,
  `link2` varchar(255) NOT NULL,
  `link3` varchar(255) NOT NULL,
  `link4` varchar(255) NOT NULL,
  `link5` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL DEFAULT '',
  `tel` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `fax` varchar(50) NOT NULL COMMENT '传真',
  `address` varchar(500) NOT NULL,
  `filetype` varchar(50) NOT NULL DEFAULT '' COMMENT '上传文件类型',
  `filesize` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上传文件大小',
  `pictype` varchar(50) NOT NULL DEFAULT '' COMMENT '上传图片类型',
  `picsize` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上传图片大小',
  `seotitle` varchar(100) NOT NULL DEFAULT '' COMMENT '网站标题',
  `keywords` varchar(250) NOT NULL DEFAULT '' COMMENT '网站关键字',
  `description` text NOT NULL COMMENT '网站描述',
  `indexabout` varchar(250) NOT NULL DEFAULT '',
  `indexcontact` varchar(250) NOT NULL DEFAULT '',
  `copyright` text NOT NULL COMMENT '网站版权信息',
  `icpcode` varchar(50) NOT NULL COMMENT '备案号',
  `isStatic` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '纯静态',
  `isPseudoStatic` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '开启伪静态',
  `isstate` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '网站是否关闭状态',
  `showinfo` varchar(100) NOT NULL DEFAULT '' COMMENT '网站要显示的内容',
  `appid` varchar(200) NOT NULL COMMENT '公众号',
  `appsecret` varchar(200) NOT NULL COMMENT '公众号秘钥',
  `access_token` varchar(500) NOT NULL COMMENT '自定义token',
  `jsapi_ticket` varchar(500) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kw_config`
--

INSERT INTO `kw_config` (`id`, `oauth`, `sitename`, `hotsearch`, `header`, `logo1`, `logo2`, `img1`, `file`, `siteurl`, `siteurl_wap`, `webqq`, `link1`, `link2`, `link3`, `link4`, `link5`, `phone`, `tel`, `email`, `fax`, `address`, `filetype`, `filesize`, `pictype`, `picsize`, `seotitle`, `keywords`, `description`, `indexabout`, `indexcontact`, `copyright`, `icpcode`, `isStatic`, `isPseudoStatic`, `isstate`, `showinfo`, `appid`, `appsecret`, `access_token`, `jsapi_ticket`) VALUES
(1, '', '', '', '', '2017112310262240.png', '2017111818174622.png', '2017112311235355.png', '2017083115390156.png', '', '', '', '', '', '', '', '', '', '', '', '', '', 'csv|zip|rar|7z|png', 20480, 'png|jpg|jpeg|gif', 2048, '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `kw_login`
--

CREATE TABLE IF NOT EXISTS `kw_login` (
  `id` int(11) NOT NULL COMMENT '管理员登录记录表',
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `isstate` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否成功状态',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT 'ip地址',
  `sendtime` varchar(10) NOT NULL DEFAULT '' COMMENT '登录时间'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kw_login`
--

INSERT INTO `kw_login` (`id`, `username`, `password`, `isstate`, `ip`, `sendtime`) VALUES
(1, 'admin', '', 0, '127.0.0.1', '1511173400'),
(2, 'admin', '', 0, '114.102.131.248', '1520330279');

-- --------------------------------------------------------

--
-- 表的结构 `kw_logs`
--

CREATE TABLE IF NOT EXISTS `kw_logs` (
  `id` int(11) NOT NULL COMMENT '管理员操作日志表',
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `content` varchar(100) NOT NULL DEFAULT '' COMMENT '操作内容',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT 'ip地址',
  `sendtime` varchar(10) NOT NULL DEFAULT '' COMMENT '操作时间',
  `order` tinyint(1) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kw_logs`
--

INSERT INTO `kw_logs` (`id`, `username`, `content`, `ip`, `sendtime`, `order`) VALUES
(1, 'Hidden', '删除message内容', '114.102.129.22', '1520488364', 0),
(2, 'Hidden', '删除message内容', '114.102.129.22', '1520492043', 0),
(3, 'Hidden', '删除message内容', '114.102.129.22', '1520492290', 0),
(4, 'Hidden', '删除message内容', '114.102.129.22', '1520492304', 0);

-- --------------------------------------------------------

--
-- 表的结构 `kw_manager`
--

CREATE TABLE IF NOT EXISTS `kw_manager` (
  `id` int(11) NOT NULL COMMENT '管理员表',
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `realname` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `bigmymenu` varchar(255) NOT NULL DEFAULT '' COMMENT '大栏目权限',
  `smallmymenu` varchar(255) NOT NULL DEFAULT '' COMMENT '小栏目权限',
  `login_num` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `uniques` int(10) NOT NULL DEFAULT '0',
  `isstate` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '帐号状态',
  `sendtime` varchar(10) NOT NULL DEFAULT '' COMMENT '添加时间'
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kw_manager`
--

INSERT INTO `kw_manager` (`id`, `username`, `password`, `realname`, `bigmymenu`, `smallmymenu`, `login_num`, `uniques`, `isstate`, `sendtime`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '超级管理员', 'super', 'super', 7, 0, 1, '1401328990');

-- --------------------------------------------------------

--
-- 表的结构 `kw_message`
--

CREATE TABLE IF NOT EXISTS `kw_message` (
  `id` int(11) NOT NULL,
  `realname` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL COMMENT '区分不同表单',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `isstate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sendtime` varchar(10) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kw_message`
--

INSERT INTO `kw_message` (`id`, `realname`, `phone`, `address`, `province`, `city`, `ip`, `isstate`, `sendtime`) VALUES
(133, '咯的', '15241254125', '', '山西省', '太原市', '1.30.160.4', 0, '1520909258'),
(132, '吕磊', '15736887231', '', '陕西省', '汉中市', '61.129.8.250', 0, '1520730566'),
(131, '啊啊', '13553895357', '', '安徽省', '合肥市', '183.192.201.97', 0, '1520728927'),
(130, '王新君', '18255369629', '', '安徽省', '合肥市', '223.104.34.10', 0, '1520725061'),
(129, '代兵', '18555401305', '', '安徽省', '合肥市', '58.243.254.129', 0, '1520708825'),
(128, '谢海波', '13912399166', '', '山西省', '太原市', '117.136.66.5', 0, '1520698651'),
(127, '谢海波', '13912391633', '', '山西省', '太原市', '61.151.178.169', 0, '1520698638'),
(126, '姜玲玲', '18756953321', '', '安徽省', '合肥市', '117.136.103.204', 0, '1520697611'),
(125, '胡日望', '15956965378', '', '安徽省', '合肥市', '111.38.202.198', 0, '1520695411'),
(124, '郑州', '18913664567', '', '安徽省', '合肥市', '61.129.7.217', 0, '1520694057'),
(123, '施强', '15955194066', '', '安徽省', '合肥市', '36.5.172.27', 0, '1520693600'),
(122, '王欣', '13637094903', '', '安徽省', '合肥市', '59.108.53.154', 0, '1520692339'),
(121, '张强', '15369765877', '', '河北省', '沧州市', '124.237.15.77', 0, '1520691651'),
(120, '闫孝华', '13075991448', '', '福建省', '福州市', '61.151.178.164', 0, '1520691102'),
(119, '闫孝华', '13075991445', '', '福建省', '福州市', '61.151.178.164', 0, '1520689605'),
(118, '杨有照', '13809005833', '', '江苏省', '南京市', '49.71.225.77', 0, '1520688837'),
(117, '周正莲', '13637090136', '', '安徽省', '合肥市', '223.104.34.96', 0, '1520688521'),
(116, '何', '15956570855', '', '安徽省', '合肥市', '183.162.14.203', 0, '1520686180'),
(115, '毕志伟', '18056578917', '', '安徽省', '合肥市', '36.60.172.250', 0, '1520683485'),
(114, 'coco', '13761229600', '', '上海市', '市辖区', '223.104.212.184', 0, '1520682986'),
(113, '魏群', '15255187079', '', '安徽省', '合肥市', '61.151.178.168', 0, '1520681063'),
(112, '程渡进', '18056004799', '', '安徽省', '合肥市', '121.51.32.144', 0, '1520674499'),
(111, '沈少龙', '13956026821', '', '安徽省', '合肥市', '101.226.226.221', 0, '1520667066'),
(110, '林', '18058669522', '', '福建省', '福州市', '140.243.171.142', 0, '1520663947'),
(105, '安妮', '13636404096', '', '上海市', '市辖区', '223.104.212.216', 0, '1520655760'),
(106, '张', '18505161866', '', '江苏省', '徐州市', '117.136.68.78', 0, '1520656317'),
(107, '张倩中', '18217092104', '', '安徽省', '合肥市', '61.151.178.176', 0, '1520657377'),
(108, '李军', '13918135928', '', '上海市', '市辖区', '101.228.253.249', 0, '1520657520'),
(109, '程城', '13118707656', '', '云南省', '昭通市', '39.128.65.231', 0, '1520661581'),
(104, '王伟', '15156829940', '', '安徽省', '合肥市', '117.136.103.251', 0, '1520496362'),
(103, '呗', '18326920316', '', '北京市', '市辖区', '101.90.124.254', 0, '1520496237');

-- --------------------------------------------------------

--
-- 表的结构 `kw_news`
--

CREATE TABLE IF NOT EXISTS `kw_news` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(11) NOT NULL,
  `ty` int(11) NOT NULL,
  `tty` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ftitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dotlike` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relative` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isgood` tinyint(4) NOT NULL DEFAULT '0',
  `istop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `istop2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `isstate` tinyint(4) NOT NULL DEFAULT '1',
  `disorder` int(11) NOT NULL DEFAULT '0',
  `sendtime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `kw_news_cats`
--

CREATE TABLE IF NOT EXISTS `kw_news_cats` (
  `id` int(11) NOT NULL COMMENT '新闻分类表',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '一级Id',
  `catname` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `catname2` varchar(50) NOT NULL DEFAULT '',
  `contentTemplate` int(11) NOT NULL,
  `img1` varchar(50) NOT NULL DEFAULT '',
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `pagesize` tinyint(3) unsigned NOT NULL DEFAULT '8' COMMENT '分页数',
  `seotitle` varchar(100) NOT NULL DEFAULT '' COMMENT 'seo标题',
  `keywords` varchar(150) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(250) NOT NULL DEFAULT '' COMMENT '描述',
  `linkurl` varchar(100) NOT NULL DEFAULT '',
  `weblinkurl` varchar(100) NOT NULL DEFAULT '',
  `htmlname` varchar(50) NOT NULL DEFAULT '' COMMENT '生成html名称',
  `path` varchar(100) NOT NULL COMMENT '路径',
  `dir` varchar(30) NOT NULL COMMENT '当前文件夹名称',
  `showtype` tinyint(1) NOT NULL DEFAULT '0',
  `ishtml` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否生成html',
  `imgsize` varchar(100) NOT NULL,
  `isgood` tinyint(1) NOT NULL DEFAULT '0',
  `iscats` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许分类',
  `ishidden` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `isstate` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '分类状态',
  `disorder` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `sendtime` varchar(10) NOT NULL DEFAULT '' COMMENT '添加时间'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kw_news_cats`
--

INSERT INTO `kw_news_cats` (`id`, `pid`, `catname`, `catname2`, `contentTemplate`, `img1`, `img2`, `img3`, `pagesize`, `seotitle`, `keywords`, `description`, `linkurl`, `weblinkurl`, `htmlname`, `path`, `dir`, `showtype`, `ishtml`, `imgsize`, `isgood`, `iscats`, `ishidden`, `isstate`, `disorder`, `sendtime`) VALUES
(1, 0, '留言管理', '', 0, '', '', '', 8, '', '', '', '', '', '', '', '', 7, 0, '', 0, 0, 1, 1, 0, ''),
(2, 1, '留言管理', '', 0, '', '', '', 8, '', '', '', '', '', '', '', '', 7, 0, '', 0, 0, 1, 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `kw_pic`
--

CREATE TABLE IF NOT EXISTS `kw_pic` (
  `id` int(11) unsigned NOT NULL COMMENT '新闻分类表',
  `ti` int(11) unsigned NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `img1` varchar(30) NOT NULL,
  `disorder` int(11) NOT NULL,
  `isstate` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '分类状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kw_config`
--
ALTER TABLE `kw_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `config` (`isstate`);

--
-- Indexes for table `kw_login`
--
ALTER TABLE `kw_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log` (`username`,`sendtime`);

--
-- Indexes for table `kw_logs`
--
ALTER TABLE `kw_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs` (`username`,`sendtime`);

--
-- Indexes for table `kw_manager`
--
ALTER TABLE `kw_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager` (`username`,`isstate`);

--
-- Indexes for table `kw_message`
--
ALTER TABLE `kw_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kw_news`
--
ALTER TABLE `kw_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kw_news_pid_index` (`pid`),
  ADD KEY `kw_news_ty_index` (`ty`),
  ADD KEY `kw_news_tty_index` (`tty`);

--
-- Indexes for table `kw_news_cats`
--
ALTER TABLE `kw_news_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newscats` (`pid`,`catname`,`iscats`,`ishidden`,`isstate`,`sendtime`);

--
-- Indexes for table `kw_pic`
--
ALTER TABLE `kw_pic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newscats` (`title`,`isstate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kw_config`
--
ALTER TABLE `kw_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '网站基本信息配置',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kw_login`
--
ALTER TABLE `kw_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员登录记录表',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kw_logs`
--
ALTER TABLE `kw_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员操作日志表',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kw_manager`
--
ALTER TABLE `kw_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员表',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kw_message`
--
ALTER TABLE `kw_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `kw_news`
--
ALTER TABLE `kw_news`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kw_news_cats`
--
ALTER TABLE `kw_news_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '新闻分类表',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kw_pic`
--
ALTER TABLE `kw_pic`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '新闻分类表';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
