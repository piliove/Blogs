/*
Navicat MySQL Data Transfer

Source Server         : 本地MYSQL
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : myblog

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-05-28 23:03:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `auth` varchar(32) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `tid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `thumb` varchar(128) CHARACTER SET utf32 DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `goodnum` int(11) DEFAULT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '这些跑步建议，你一定要知道', '小明哥', '抛开职业跑者，对于绝大多数人来说，我们选择跑步的目的就是为了健身或者减肥。在日常跑步过程中，逞强并不可取，也不是真正的勇敢，而是不敢正视自己。 ...', '2019-05-24 21:48:52', '2', '3', '20190524/eyMrfE6L7xwx6opySxMuM67C3lRvaTrz7B76VolT.jpeg', '1705', '209', '<p><strong>1、不要空腹跑步</strong></p><p>都说饭后两小时之内不能做剧烈运动，到现在跑步赛事鸣枪的时间都特别早，有的朋友晨跑，不吃早餐空腹跑步也不值得提倡。</p><p>空腹晨跑影响肠胃，尤其是对胃的伤害非常大，人体经过一夜的新陈代谢很多器官都处于不利的状态，急需补充能量和营养物质，空腹晨跑使得胃受到刺激，加重胃的负担。</p><p>建议跑者最好以补充碳水化合物为主，摄入300-500卡路里的能量。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 25px; color: rgb(47, 47, 47); font-family: -apple-system, &quot;SF UI Text&quot;, Arial, &quot;PingFang SC&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); word-break: break-word !important;\"><span style=\"box-sizing: border-box; font-weight: 700;\">2、严格执行计划？也要学会偶尔放松啦</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 25px; color: rgb(47, 47, 47); font-family: -apple-system, &quot;SF UI Text&quot;, Arial, &quot;PingFang SC&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); word-break: break-word !important;\">跑者通常都会为制定严格的训练计划，但不计后果的去执行很不可取，学会放弃也是门哲学。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 25px; color: rgb(47, 47, 47); font-family: -apple-system, &quot;SF UI Text&quot;, Arial, &quot;PingFang SC&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); word-break: break-word !important;\">都说法无久不变，运无往不复，制定计划的时候很难提前预知天气、身体等客观因素，聪明的跑者都能灵活变通，做出适当的改变。</p><p><strong>3、热身，千万不要错过</strong><br/></p><p>有些心急的跑者喜欢换上装备直接开跑， 虽然有人能免遭其害，如果长时间如此，诸如抽筋，跟腱酸痛等毛病会时常来光顾你的身体。</p><p>不管你跑多长的距离，充分的热身都至关重要，你可以选择循序渐进的方式，开始的时候原地踏步，随后进行跨步，最后在活动一下各关节，这样能大大降低跑步受伤的概率。当然也不要忘了然后拉伸。</p><p><strong>4、别逞强，痛就要停下来</strong><br/></p><p>跑步是一项耐力运动，长时间的运动会导致疲劳，疲劳往往更容易产生伤病。跑步的时候千万不要抱着硬撑的心理，当身体出现不适的时候，其实是它在向你抗议，跑步不提倡轻伤不下火线，忽略小伤小痛会让你付出惨重的代价。</p><p><br/></p><p><br/></p>');
INSERT INTO `articles` VALUES ('2', 'CSS省略号text-overflow超出溢出显示省略号', '小红', 'DIV CSS text-overflow文本有溢出时显示css省略号clip ellipsis样式基础知识与用法实例经验教程篇', '2019-05-24 21:37:51', '1', '2', '20190522/uQZN67MAjsphnnwbglvuKar35jXM5Db0GUNURPeI.jpeg', '1307', '589', '<p><span style=\"color: rgb(51, 51, 51); font-family: tahoma, &quot;microsoft yahei&quot;, 微软雅黑; background-color: rgb(255, 255, 255);\">有时为了避免文本文字内容超出一定宽度后溢出，我们想要溢出的部分不显示但用省略号（...）显示，这个时候我们可以使用CSS text-overflow文本溢出省略号属性样式实现。</span></p>');
INSERT INTO `articles` VALUES ('13', '女人爱你到最高境界，才会“故意”打扰你', '小红姐姐', '感情里，很多男人都不喜欢过于粘人的女朋友，总觉得每天和女人在一起少了些自由。', '2019-05-25 22:14:02', '1', '2', '20190525/5tNLID3ffV80IdN0H8NypgD1tdAXkpRUV0dT39Ai.jpeg', '3675', '671', '<p>感情里，很多男人都不喜欢过于粘人的女朋友，总觉得每天和女人在一起少了些自由。不管是在婚姻里，还是在恋爱的时候，男人都渴望自由，不想一直被女人缠着。</p><p>一回头看见女人的样子，男人的心里不但不踏实，还会很心烦。在这一刻，很想把女人狠狠地推开。有的时候，两个人会因为这件事吵来吵去，最后还是没有达成一致。</p><p>两个人成为了恋人，就应该站在对方的角度思考问题，要知道对方的心里想法。这样，才知道对方的不容易，才会认真对待这份爱情，才会好好珍惜爱人。</p><p>要知道，没有人会用宝贵的时间去打扰一个不爱的人，没有人会无聊到这种地步。女人之所以打扰你，是因为想让你多陪陪她，给她一点温暖。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/16235793-34d74e086865f2cb.jpeg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>或许她的方式不对，但她这样做是想拉近两颗心。女人爱你到最高境界，才会“故意”打扰你 ，别再误会了。</p><p>想念你，想依靠在你的怀里</p><p>女人深爱着男人，就会一直粘着男人，男人走到哪女人就想跟到哪。这是女人对爱的一种表达方式，想让男人在意自己，想走进男人的心里。</p><p>单独相处的时候，她会靠近你，和你只有几毫米的距离，人多的时候，他会一直牵着你的手，即使一只手做什么事情不方便，她也不会松开你。</p><p>很多时候，女人也会想很多，怕你对她没新鲜感，但她就是忍不住的靠近你。爱一个人就是这样的，不靠近觉得缺少点什么，靠近了心安了，却又怕你会厌倦。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/16235793-fd8b09bb81f0b5c6.jpeg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>在乎你，不想看到你被灌醉</p><p>真正爱上了一个人，是很放心不下的，所以，她管得比较多。男人喜欢热闹，不管谁找吃饭，都会毫不犹豫的答应，根本不会考虑女人的感受。</p><p>下班以后没有回家，也没有给女人发一条消息，直接去参加聚会了。女人早已做好了饭菜，就等着男人回来吃饭呢，可一直没有等到男人。</p><p>心里惦记着男人，不停地给男人打电话，发消息。或许男人正开心着呢，看到女人的消息没有回复，把手机扔到了一旁。男人心里一万个不愿意，觉得女人很烦，打扰到自己了。</p><p>选择和谁在一起，就要对谁负责任，不要心里只想着自己，不要认为别人做的都是错误的。作为一个成年人，别太幼稚，别扎对方的心，别让对方感到累。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/16235793-53ba3c2e8be7fcd6.jpeg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>需要你，想每时每刻都有你</p><p>女人是很没有安全感的，习惯拉着父母的衣角，生怕父母和自己保持距离，习惯跟在男人的身后，生怕男人把自己丢掉。</p><p>没有人陪在身旁的日子，是很孤独的，女人不想有这种感觉。需要你，想一直看见你的样子，哪怕你什么也不说，她也会很满足。</p><p>或许频繁出现在你的身旁，你有些不习惯，但只要你理解她，就不会这样想了，因为她只是想让自己安心。珍惜陪在你身旁的人，珍惜打扰你的人，她是真心爱你，不掺一点假。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/16235793-a7a7a1fda053ad5a.jpeg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>心疼你，不想让你一直工作</p><p>对于一个人来说，最重要的就是身体，所以说，一定要多休息，不能让自己累到。可很多男人想成功，每天早起，晚睡，根本没太多时间休息。</p><p>或许你觉得身体能吃得消，实际上是吃不消的，长时间这样，你会垮掉的。到什么时候都要记得，人就是人，跟机器是比不了的，它可以工作24小时，你是不行的。</p><p>深爱你的女人，是很心疼你的，常常把你闹钟关掉。她不想让你那么累，不想让你一边头疼，一边工作。钱不是万能的，她不想让你因为钱而拼命。</p><p>耽误了你的工作，请不要责怪她，请不要冷落她。女人为了你做这么多，你应该感到幸福，应该珍惜她，不能辜负了她。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/16235793-2b246fb47e73af19.jpeg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p><strong>情感寄语：</strong></p><p>爱上了你，想一直陪伴着你，爱上了你，想给你爱与关心，爱上了你，想把你照顾好。</p><p>她是你的女人，你要珍惜和她在一起的每一天。两个人都爱到最高境界，谁也离不开谁，就不再担心谁会离开谁了。</p><p>找到心中的人，是很幸运的，被一个人深爱着，更是幸运的。愿每一个人都拥有真正的爱情，都能幸福、快乐的度过每一天。</p><p><br/><br/>作者：爱情摇篮<br/>链接：https://www.jianshu.com/p/66fb54063486<br/>来源：简书<br/>简书著作权归作者所有，任何形式的转载都请联系作者获得授权并注明出处。</p><p><br/></p>');
INSERT INTO `articles` VALUES ('12', '南瓜不能和它同吃，一定要小心，很多人都不知道！', '小红', '南瓜是广受百姓喜爱的家常菜，但它却有着“营养全能王”的美誉，能帮人快速补充天然营养素。', '2019-05-25 22:12:38', '1', '2', '20190525/vhV5RlZhlpQuffXPEZkWXbabJYbgHQj5P0xxF4EI.jpeg', '3200', '731', '<p>&nbsp; &nbsp; &nbsp;南瓜是广受百姓喜爱的家常菜，但它却有着“营养全能王”的美誉，能帮人快速补充天然营养素。南瓜在某些国家被誉为“神瓜”，因为它既可为粮，又可为菜，冬天吃它，好处太多了！</p><p>1、抗癌</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 南瓜含有碳水化合物、胡萝卜素、膳食纤维、氨基酸、多糖，以及多种维生素和矿物质。南瓜中所含维生素A的衍生物，可以降低机体对致癌物质的敏感程度，可以稳定上皮细胞，防止其癌变，抗击肺癌、膀胱癌和喉癌等。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 乳腺癌和卵巢癌一直是女性健康的大敌，研究表明，南瓜富含胡萝卜素，对这两种癌症有抗击作用。另外，南瓜中还含有一种能分解亚硝胺的酶，对抗击癌症有重要意义。</p><p>2、保护心脏</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 南瓜富含膳食纤维，对心脏很有好处。美国哈佛大学一项万人规模调研显示，高纤维饮食者与低纤维饮食者相比，冠心病发作风险降低40%。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 瑞典的一项最新研究也得出类似结论，高纤维饮食女性与低纤维饮食女性相比，患心脏病风险降低25%。</p><p>3、健胃消食、排毒通便</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 《本草纲目》记载南瓜“性温，味甘，入脾胃经”，中医认为其有补中益气、消炎止痛、解毒杀虫的功效，对脾胃虚弱有很好的食疗效果。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 南瓜是健胃消食高手，其中丰富的果胶还能促进溃疡的部位愈合，“吸附”细菌和有毒物质，包括铅等重金属物质，因而起到排毒的作用。</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 南瓜中的甘露醇有通大便的作用，可减少粪便中毒素对人体的危害；膳食纤维非常细软，能促进肠道蠕动，缓解便秘，同时还不伤胃黏膜。</p><p>南瓜不能和什么搭配吃</p><p>1.南瓜+菠菜</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 南瓜含丰富维生素C分解酶，会破坏菠菜中的维生素C，同时自身营养价值也会降低。</p><p>2.南瓜+红薯</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 皆属易滞气食物，如果不煮熟便食用会引起腹胀，若二者同食，更会导致肠胃气胀、腹痛、吐酸水等。</p><p>3.南瓜+羊肉</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 这两种食物都是热性之物，一起吃可能会导致腹胀、便秘等等一些疾病。患感染性疾病和发热症状者不宜食用，以防病情恶化。</p><p>4.南瓜+醋</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 醋酸会破坏南瓜中的营养元素，降低营养价值。</p><p>5.南瓜+带鱼</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 带鱼富含优质蛋白质、不饱和脂肪酸以及DHA、维生素A、维生素D等，有补虚、养肝、促进乳汁生成等作用，但与南瓜同食会身体不利。</p><p>6.南瓜+红枣</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 红枣富含维生素C，味甘性温，脸上斑多皮肤不好，多食易消化不良，而南瓜性温，二者同食不仅维生素C被破坏，还会加重消化不良等症状。</p><p>7.南瓜+螃蟹</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 南瓜和螃蟹同食并无毒副作用。不建议同食的主要原因是南瓜含有丰富的“钴”元素，“钴”元素对降血压有较好疗效。这与螃蟹的高血压患者不宜多食，有食物搭配不合理的成分，不过并不会影响身体健康。只是相互抵消了食疗作用。</p><p>8.南瓜+虾</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 虾肉中含有多种微量元素，与南瓜同时食用，能与其中的果胶反应，生成难以消化吸收的物质，导致痢疾。可以用黑豆、甘草解毒。</p><p>9.南瓜+油菜&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 南瓜和油菜与含维生素C丰富的食品搭配吃，就会把维生素C破坏。</p><p>10.南瓜+辣椒</p><p>&nbsp; &nbsp; &nbsp; &nbsp; 辣椒与南瓜相克，辣椒中的维生素C会被南瓜中的分解酶破坏。</p><p><br/></p>');
INSERT INTO `articles` VALUES ('6', '测试', '小明', '真是很美好的一天哇真是很美好的一天哇真是很美好的一天哇', '2019-05-24 16:47:17', '1', '2', '20190524/1AbXRFkrDjOy3QMPI0xbpjsVZQ9cAxSnWByQOoo8.jpeg', '4403', '547', '<p>达瓦大无</p>');
INSERT INTO `articles` VALUES ('10', '四月初四的秋名山上,格外的凉爽', '小红帽', '啊夏天嗄四月初四的秋名山上,格外的凉爽', '2019-05-24 20:43:30', '1', '2', '20190524/RbD9SuFkJZ4qGm8PsoMtQoEkTkRoSn6OxRNlcEtr.jpeg', '1397', '628', '<p>啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽啊夏天嗄四月初四的秋名山上,格外的凉爽</p>');
INSERT INTO `articles` VALUES ('8', '测试123456', '小明', '真是很美好的一天哇真是很美好的一天哇真是很美好的一天哇', '2019-05-24 16:42:52', '1', '2', '20190524/ula9wToC6fEl9TYHi04jNvU0TXYOCmfUvQmOqrHz.jpeg', '3991', '397', '<p>达瓦大哇多哇大无多</p>');
INSERT INTO `articles` VALUES ('9', '测试', '小明', '真是很美好的一天哇真是很美好的一天哇真是很美好的一天哇', '2019-05-24 16:19:52', '1', '2', '20190524/O1HoixJE9sYL7ewjvKt3dSiCd7v70qmP5A1Hw77Q.jpeg', '2529', '413', '<p>达瓦大哇多哇多哇</p>');
INSERT INTO `articles` VALUES ('11', '类似书房的书摘类app推荐！', '小明哥', '现在的读书软件层出不穷，在选择的时候犯难，让我们的选择困难症又犯了', '2019-05-25 22:10:53', '1', '2', '20190525/ZQGxjdgCAEZqjWzlcO2NyTz3rDQ13nRBEOG5YmEQ.jpeg', '3331', '880', '<p>现在的读书软件层出不穷，在选择的时候犯难，让我们的选择困难症又犯了。而且很多人换了很多种读书软件，要么是因为要付费，要么就是因为广告乱入，导致对软件的观感越来越差。那今天就给大家推荐一款使用起来轻松方便的读书软件—流书。</p><p><br/></p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/13665754-e542ecb30237bc0d.jpeg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>它和大多数读书软件相比，有以下几个优点：</p><p><strong>【无广告、无弹窗】</strong></p><p>软件页面整洁、没有广告覆盖，能够很好的提高我们的阅读质量，保证我们的阅读效率。</p><p><br/></p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/13665754-5cbea6841df170e9.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/150/format/webp\"/></p><p><strong>【没有任何收费机制】</strong></p><p>大家都知道很多读书软件都有收费机制，这就导致了我们的阅读质量不过硬；而流书没有任何的收费机制，很多的软件的扫图识别都有次数限制，而流书也没有，非常的便捷。</p><p><br/></p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/13665754-0d3893d0b63abfae.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/419/format/webp\"/></p><p><strong>【方便用零碎的时间阅读】</strong></p><p>软件开发的目的就是让大家能够在零碎的时间体验阅读的乐趣。所以采用的是书摘的阅读方式，能够轻松便捷的阅读，在做公交的时候、睡觉之前都可以打开阅读一下。</p><p><br/></p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/13665754-57331bad0ceac593.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/417/format/webp\"/></p><p>整体来说，这款软件还是非常符合我们的生活节奏的，建议大家可以下载看一下。</p><p><br/><br/>作者：流书APP<br/>链接：https://www.jianshu.com/p/055bb06fea7c<br/>来源：简书<br/>简书著作权归作者所有，任何形式的转载都请联系作者获得授权并注明出处。</p><p><br/></p>');
INSERT INTO `articles` VALUES ('14', '再多情话，抵不上一个“及时回复”', '小明明', '网上流行一句话：在乎你的人“秒回”，不在乎你的人“轮回”。', '2019-05-25 22:15:45', '1', '2', '20190525/urKbAE6PtxOwutavt6FRZhJnE2hki6As9jUmwThM.jpeg', '4474', '698', '<p>这话未免夸张，虽然现在是网络时代，通讯发达，大多数人都机不离身，可是每人都有自己的工作和生活，不可能时刻都在线，也不可能哪时都有空。</p><p><br/></p><p>但在乎你的人一定会“及时回复”！</p><p><br/></p><p>尤其是情侣，“及时回复”虽是一个小小的细节，却能检验他为人靠不靠谱，能否让你信任，会不会在乎你，值不值得你为他付出真情。</p><p><br/></p><p>“及时回复”，是情侣之间信任的基础</p><p><br/></p><p>美国学者尼娜·欧尼尔说：“信任是婚姻关系中两个人所共享的最重要特质，也是建立愉快的、成长的关系所不可或缺的。”信任是亲密交往的基础，若是连消息都不回的人，能让你信任吗？你会对他交付真心吗？</p><p><br/></p><p>爱你的人，时刻都会牵挂你，他巴不得对你时刻都在线。哪怕外表有多高冷，内心对你都是满腔热情；哪怕他的性格有多粗心大意，对你都会敏感细腻。<br/></p><p><br/></p><p>爱你的人无论工作有多忙，距离有多远，对你的关心总及时到位。他不会让你等待，不会让你孤单，他会让你有“触手可及”的存在和心安。</p><p><br/></p><p>爱你的人一定在乎你，一定会对你“及时回复”，“及时回复”是他爱你的软实力。</p><p><br/></p><p>涂磊说：“踏实的感情往往并不浪漫，一个人爱不爱你，千万不要听他说了什么，而要看他对你做了什么，说得好不如做得到位。”<br/></p><p><br/></p><p>对你甜言蜜语的人未必对你是真爱，为你做得多的人，一定是真心爱你。</p><p>“及时回复”虽然只是个小细节，却能看出一个人的人品、修养、家教，更能判断他是否在乎你，对你是不是真心，值不值得你去爱。</p><p><br/></p><p>爱你的人不会敷衍你、不会有种种借口、更不会让你担心，他不舍得让你有一丝一毫的难受。</p><p><br/></p><p>爱你的人会用你喜欢的方式待你，不爱你的人会用他喜欢的方式对你。</p><p><br/></p><p>不爱你的人，你的满腔热情对他都是多余，你的消息对他甚至是种打扰。</p><p><br/></p><p>若一个人常不回你的消息，就别再发了，他心里没有你的位置；等不到回复的消息就别等了，你的等待会是一种时间上的浪费。</p><p><br/></p><p>不爱你的人即使你卑微到尘埃里，他会轻视你的讨好；哪怕你对他的情把全世界的人都感动了，也激不起他内心的涟漪。</p><p><br/></p><p>真心要付给懂得珍惜你的人，如果他一直无视你的付出，常不“及时回复”你的消息，再爱也要放手、再痛也要割舍。</p><p><br/></p><p>一辈子很长，与其浪费时间在不爱你的人身上，不如在自己的天空下灿烂，若你的天空一片晴朗，不怕没有好的男人与你携手于风和日丽。</p><p><br/></p><p>爱你的人一定会“及时回复”，“及时回复”是让人信任的基础，是亲密关系中的软实力，再多情话都抵不过“及时回复”的温馨。</p>');
INSERT INTO `articles` VALUES ('15', '女人彻底喜欢上一个人，往往是这三种样子', '小李子', '不管是男人还是女人，一生中都会有好些心动的时刻。', '2019-05-25 22:17:24', '1', '2', '20190525/wSwZdixodJkRRdd2Q0h15QjWKYWmhddr5pFCukjk.jpeg', '2004', '911', '<p>不管是男人还是女人，一生中都会有好些心动的时刻。只是心动的次数不少，但是很多心动都不过是刹那，过去了就过去了，并谈不上真的喜欢。毕竟心动从来都不是答案，心定才是。</p><p>每个人都可能会对好些人有刹那的心动和好感，却很难得真的彻底喜欢上一个人。</p><p>彻底喜欢上一个人，和瞬间的好感，从来都是不一样的，尤其是女人，当她彻底喜欢上一个人，她会变得非常不同，她往往是下面这三种样子。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/2100084-6ac50f3c537e4fb0?imageMogr2/auto-orient/strip%7CimageView2/2/w/639/format/webp\"/></p><p><strong>不管她多么女汉子，在那个男人面前也总是很温柔。</strong></p><p>一个女人，在遇到喜欢的人之前，她的性格，可能会很爷们，很汉子，很强势，仿佛根本就不懂什么叫柔弱，但是一旦她对一个男人动了心，彻底喜欢上人家，她在那个男人面前，不自觉地，就会变得特别的温柔，总是轻声细语，情意绵绵的。</p><p>女人就是这样，她纵使是一个很强悍的女人，纵使在其他人面前一直表现得都很霸道，她在自己喜欢的人面前，永远也是小鸟依人的。她越是喜欢一个人，就越是会不自觉地变得柔软。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/2100084-1125f9ccb1477641?imageMogr2/auto-orient/strip%7CimageView2/2/w/640/format/webp\"/></p><p><strong>做什么都想着对方，对喜欢的那个男人极其体贴。</strong></p><p>喜欢上一个人就是，总是想要知道他现在干嘛，总是他开心自己就开心，总是不自觉地就想要对他各种好。当女人彻底喜欢上一个人，她总是会傻傻地把那个男人，看得比自己还更重要，方方面面关注着他，无微不至地照顾着他，总想对他好。</p><p>没有不懂体贴的女人，只有不喜欢男人的女人，女人的体贴，她不会随随便便地去给一个男人，但是他一旦对一个男人用情至深，她也就会毫不保留地，事无巨细地，各种体贴入微。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/2100084-079a1f9a58d89f6e?imageMogr2/auto-orient/strip%7CimageView2/2/w/633/format/webp\"/></p><p><strong>以前总是喜欢靠自己，现在总爱跟喜欢的男人撒娇。</strong></p><p>不要以为一个女人平时看起来特别的独立，什么都是靠自己，完全不依赖别人，那么她就是一个不懂得依靠男人，向男人撒娇的女人了。她不是不想依靠，她只是没有人依靠，他只是不想谁都去胡乱依靠，她只是在等待着那个可以依靠的人。</p><p>一旦她彻底喜欢上一个男人，她以往有多独立，现在就会变得有多粘人，她会经常跟那个男人撒娇，不管什么都总想男人帮着女人，因为这样让她感受到被爱，让她觉得很有安全感。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/2100084-43e5f525ab9dd0c5?imageMogr2/auto-orient/strip%7CimageView2/2/w/640/format/webp\"/></p><p>女人身上的这些特性，她从不会轻易给别人，只会给那个，发自真心爱着她，她也爱着的人。</p><p>当女人彻底喜欢上一个人，在那个男人面前，她会变得很温柔，她会对男人很体贴，她会经常跟男人撒娇卖萌。</p><p>那时候的女人，是她最深情的样子，也是她最可爱的样子。</p><p><br/><br/>作者：南方姑娘谭檬<br/>链接：https://www.jianshu.com/p/139feec55b83<br/>来源：简书<br/>简书著作权归作者所有，任何形式的转载都请联系作者获得授权并注明出处。</p><p><br/></p>');
INSERT INTO `articles` VALUES ('16', '推荐12个免费学编程的好网站。', '小实验', '今天给大家推荐12个可以免费学习编程的网站，希望大家哪怕找到一个自己合适的，然后好好利用起来，那么必将会有长足的进步。', '2019-05-25 22:19:06', '1', '2', '20190525/vDeskcJbv047bvaPl2DSuI6pXrCrxDgCfcRfk7LX.jpeg', '3466', '278', '<h1><strong><a href=\"https://www.shiyanlou.com/\" target=\"_blank\">12. 实验楼</a></strong></h1><p>这是我的私心。实验楼是自家网站，自家网站不放在前排，就好比有好吃的不先给好朋友吃而是给敌人吃，那我是做不到了。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/226662-435fe89024a6a237?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>image</p><p>实验楼有大量的基础课以及练手项目都是免费课程，直接在云端Linux环境中学习。从最热门的Python语言，到新兴的大数据、机器学习，并且以动手实战为主，更加扎实掌握知识。</p><p><strong><a href=\"https://www.shiyanlou.com\" target=\"_blank\">https://www.shiyanlou.com</a></strong></p><p><br/></p><h1><strong><a href=\"https://www.codecademy.com/\" target=\"_blank\">11. Codecademy</a></strong></h1><p>Codecademy的大名相信大家都听过，这个就不多介绍了，免费课程很多很全面。大家真的要好好利用资源呀。</p><p><strong><a href=\"https://www.codecademy.com/\" target=\"_blank\">https://www.codecademy.com/</a></strong></p><p><br/></p><h1><strong><a href=\"http://freecodecamp.com/\" target=\"_blank\">10. Free Code Camp</a></strong></h1><p>Free Code Camp是一个非营利组织，大家可以在该平台学习HTML，CSS以及JavaScript等前端知识。</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/226662-e2995fc8bb2d88b6?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>很有意思的是，该网站创始人Quincy Larson，当初是因为来中国旅行，看到中国小孩子学编程的热情被感动到了，因此才创立了该网站。</p><p><strong><a href=\"http://freecodecamp.com/\" target=\"_blank\">http://freecodecamp.com/</a></strong></p><p><br/></p><h1><strong><a href=\"http://www.theodinproject.com/\" target=\"_blank\">9. The Odin Project</a></strong></h1><p>奥丁就是雷神索尔的父亲，九大国度的统治者。奥丁项目这个网站是一个开源的编程，目前有Web开发，Ruby语言，数据库，以及许多前端的课程供大家学习。</p><p>&lt;header contenteditable=&quot;true&quot; style=&quot;position: absolute; bottom: 0px; right: 0px;&quot;&gt;&lt;/header&gt;</p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/226662-8f38a81c6c6d83ff?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>image</p><p>该项目有三大理念值得人敬佩：1. 教育资源应当是免费的；2. 动手才能真正地学好；3. 开源是最棒哒。</p><p><strong><a href=\"http://www.theodinproject.com/\" target=\"_blank\">http://www.theodinproject.com/</a></strong></p><p><br/></p><h1><strong><a href=\"http://online-learning.harvard.edu/course/cs50-introduction-computer-science\" target=\"_blank\">8. Harvard University CS50 Class</a></strong></h1><p>哈佛大学的计算机科学课程，大家可以学到扎实的计算机基础知识和灵活的思维方式。这个课程已经有好多年的历史，在网上也是一直疯传，网易云也有字幕版本，大家可以花时间去看看。</p><p><strong><a href=\"http://online-learning.harvard.edu/course/cs50-introduction-computer-science\" target=\"_blank\">http://online-learning.harvard.edu/course/cs50-introduction-computer-science</a></strong></p><p><br/></p><h1><strong><a href=\"http://htmldog.com/\" target=\"_blank\">7. HTML Dog</a></strong></h1><p>一听到这个名字相信大家就懂这个网站主要是干嘛的了，前端狗哇；放心狗在国外是褒义词。网站有HTML，CSS， JavaScript的教程，案例，技巧合集等等，非常值得大家去学习。</p><p><strong><a href=\"http://htmldog.com/\" target=\"_blank\">http://htmldog.com/</a></strong></p><p><br/></p><h1><strong><a href=\"https://www.khanacademy.org/\" target=\"_blank\">6. Khan Academy</a></strong></h1><p>可汗学院的大名相信大家都知道，但是有多少人真正做到每天去上面学习的呢？可汗学院几乎是全球影响力最大的在线教育平台之一，多次获得微软、谷歌等许多公司以及政府的资助。</p><p><strong><a href=\"https://www.khanacademy.org/\" target=\"_blank\">https://www.khanacademy.org/</a></strong></p><p><br/></p><h1><strong><a href=\"http://www.coursera.org/\" target=\"_blank\">5. Coursera</a></strong></h1><p>Coursera目前有与来自28个国家的145所大学合作提供在线课堂。上面的资源都是非常高质量的。但是有数据统计尽管有数百万人注册课堂，课程完成率仅有7%-9%。全世界都一样，只有少数人能够坚持下去啊。</p><p><strong><a href=\"http://www.coursera.org\" target=\"_blank\">www.coursera.org</a></strong></p><p><br/></p><h1><strong><a href=\"http://www.edx.org/\" target=\"_blank\">4. edX</a></strong></h1><p>edX是由麻省理工大学和哈佛大学联合创建的在线开放课堂，也是非盈利的组织。目前也已经有超过50所大学参与提供在线课堂等学习项目。</p><p><br/></p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/226662-213cab47b7ad2a32?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p><br/><strong><a href=\"http://www.edx.org\" target=\"_blank\">www.edx.org</a></strong></p><p><br/></p><p><br/></p><h1><strong><a href=\"https://ocw.mit.edu/index.htm\" target=\"_blank\">3. 麻省理工开放课</a></strong></h1><p>麻省理工学院的公开课。尽管很多人表示没有视频，其实有很多是音频/视频的，尤其计算机相关的一些课程。</p><p><strong><a href=\"https://ocw.mit.edu/index.htm\" target=\"_blank\">https://ocw.mit.edu/index.htm</a></strong></p><h1><strong><a href=\"https://davidwalsh.name/\" target=\"_blank\">2. David Walsh</a></strong></h1><p>David Walsh是一个拥有多年Web开发经验的工程师，该网站是他分享自己技术经验的一个博客，里面有大量的网页开发与前端相关的干货，建议大家去看看。</p><p><strong><a href=\"https://davidwalsh.name/\" target=\"_blank\">https://davidwalsh.name/</a></strong></p><p><br/></p><h1><strong><a href=\"https://www.udemy.com/\" target=\"_blank\">1. Udemy</a></strong></h1><p>Udemy也是国外大名鼎鼎的在线教育平台，上面的课程都是由各类老师们或者有特长的人自己发布。</p><p><br/></p><p><img class=\"\" src=\"//upload-images.jianshu.io/upload_images/226662-6c4d7bfacad8ae85?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp\"/></p><p>尽管很多课程都是收费的，但是目前开发相关的课程，有1200多门都是免费学习的，并且都评分不低。<br/><strong><a href=\"https://www.udemy.com\" target=\"_blank\">https://www.udemy.com</a></strong></p><p><br/></p><p><strong>我知道你们要说什么</strong>：这这这这得多好的英语水平才能用得上啊？！！！你要知道，大家都是这么想的，所以大家都没有去使用这些资源。</p><p>假如你用心提升下自己的英语，将能够超越多少人哇！其实提高英语不仅对你学习有帮助，对编程本身也有好处。当然，实在学不好英语，还有实验楼陪着你。</p><p><br/><br/>作者：实验楼<br/>链接：https://www.jianshu.com/p/2a9abfe7dfb4<br/>来源：简书<br/>简书著作权归作者所有，任何形式的转载都请联系作者获得授权并注明出处。</p><p><br/></p>');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '轮播图id',
  `title` varchar(32) DEFAULT NULL COMMENT '标题',
  `desc` varchar(128) DEFAULT NULL COMMENT '描述',
  `url` varchar(255) DEFAULT NULL COMMENT '链接',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('1', '测试11', '真是很美好的一天哇真是很美好的一天哇真是很美好的一天哇', '20190522/ZzWE42MiGuglcjP6SixGOfiCQEQgkWwrIevnqDkT.jpeg', '1');
INSERT INTO `banners` VALUES ('2', '测试22', '真是很美好的一天哇真是很美好的一天哇真是很美好的一天哇', '20190522/fkhQ85RyFJWDjc3N6BNlJldVyIXJhOXRyuz6RNoW.jpeg', '1');
INSERT INTO `banners` VALUES ('4', '夏日炎炎 来玩耍吧', '提醒女人：爱一个男人爱得发疯时，也不要做这些事情', '20190524/vrp1aXZUDKyYjzJEi1SoT0PGkoEl7mvaiCe8Wp63.jpeg', '1');

-- ----------------------------
-- Table structure for cates
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `cname` varchar(32) NOT NULL COMMENT '分类名称',
  `pid` int(11) NOT NULL COMMENT '父级id',
  `path` varchar(32) NOT NULL COMMENT '分类路劲',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cates
-- ----------------------------
INSERT INTO `cates` VALUES ('1', '技术', '0', '0');
INSERT INTO `cates` VALUES ('2', 'HTML', '1', '0,1');
INSERT INTO `cates` VALUES ('3', 'CSS', '1', '0,1');
INSERT INTO `cates` VALUES ('4', '资讯', '0', '0');
INSERT INTO `cates` VALUES ('5', '热点', '4', '0,4');
INSERT INTO `cates` VALUES ('6', 'Linux', '1', '0,1');
INSERT INTO `cates` VALUES ('7', '国际', '4', '0,4');
INSERT INTO `cates` VALUES ('8', 'HTML5', '1', '0,1');
INSERT INTO `cates` VALUES ('9', 'CSS3', '1', '0,1');
INSERT INTO `cates` VALUES ('10', '生活', '0', '0');
INSERT INTO `cates` VALUES ('11', '旅游', '10', '0,10');

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lname` char(120) DEFAULT NULL,
  `url` char(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES ('1', '百度搜索', 'www.baidu.com');
INSERT INTO `links` VALUES ('2', '新浪新闻', 'www.sina.com');
INSERT INTO `links` VALUES ('3', '搜狐', 'www.souhu.com');

-- ----------------------------
-- Table structure for tagnames
-- ----------------------------
DROP TABLE IF EXISTS `tagnames`;
CREATE TABLE `tagnames` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签云id',
  `tagname` varchar(32) NOT NULL COMMENT '标签名',
  `bgcolor` varchar(32) DEFAULT NULL COMMENT '颜色',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tagnames
-- ----------------------------
INSERT INTO `tagnames` VALUES ('1', 'HTMLSS', '#ff8080');
INSERT INTO `tagnames` VALUES ('2', 'CSS', '#ff8000');
INSERT INTO `tagnames` VALUES ('3', 'CSS3', '#00ff40');
INSERT INTO `tagnames` VALUES ('4', 'Linux', '#8080ff');
INSERT INTO `tagnames` VALUES ('6', 'PHP', '#0080ff');
INSERT INTO `tagnames` VALUES ('7', 'JAVA', '#ff80c0');
INSERT INTO `tagnames` VALUES ('8', 'C/C++', '#800000');
INSERT INTO `tagnames` VALUES ('9', 'ESP', '#808040');
INSERT INTO `tagnames` VALUES ('10', 'HTML5', '#408080');

-- ----------------------------
-- Table structure for tips
-- ----------------------------
DROP TABLE IF EXISTS `tips`;
CREATE TABLE `tips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `tid` int(9) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tips
-- ----------------------------
INSERT INTO `tips` VALUES ('24', '<p>可以的!<img src=\"http://img.baidu.com/hi/jx2/j_0063.gif\"/></p>', 'admins', '14', '2019-05-28 21:36:53');
INSERT INTO `tips` VALUES ('23', '<p>哈哈哈你真的好幽默哦!</p>', 'admins', '16', '2019-05-28 21:18:16');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户表id',
  `uname` varchar(32) NOT NULL COMMENT '用户名',
  `upass` char(60) NOT NULL COMMENT '密码',
  `profile` varchar(128) DEFAULT NULL COMMENT '用户头像',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `token` char(50) NOT NULL COMMENT '签名',
  `status` tinyint(3) DEFAULT '0' COMMENT '状态',
  `ctime` datetime DEFAULT NULL,
  `type` tinyint(3) NOT NULL DEFAULT '0' COMMENT '''0是普通用户 1是超级管理员''',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'adadad', '$2y$10$i4VwJl7mBFmtFfWs5OyQgeWmQsHhJ/AgrrXFwvUKO4BnDPVuuf5pe', '20190521/rK7wDR1jFhPKquGIrh4ahkfpKTNrXXXXSxLbp8el.jpeg', '1243@qq.com', 'g5c3BKfSpszBwlfgQiHVJTwfnlrkPHH4V9Al3HgPH8ctsE5XZk', '0', '2019-05-20 22:24:49', '0');
INSERT INTO `users` VALUES ('2', 'dashabi', '$2y$10$Lhpl8LepwhoGOBzFFQyOYeW3sL4J1oK.gmsVuPwyXCdjHzMRU1gaa', '20190520/4kUZhGfHTlOHRxvMNmTrQLMQ1WWUZNLEzteevh9y.jpeg', null, 'v1LSYThVVxTKJEWHb2gelaPqgSRWe1LGf8QSv9L2qrQ0O0v2WQ', '0', '2019-05-20 22:41:30', '0');
INSERT INTO `users` VALUES ('3', 'dadwdewads', '$2y$10$po2o6NBwRPYsh3TRh4uxWufquZigXZJxu5SOTx.cKrHLaHTCvYpqe', '20190520/aj8ncrokjLWha5Q4zo1isHHcVXzXB4rde0VFwWyN.jpeg', null, 'ha9OpkDbC2TL4kidh02NM3s46gO3GQOrSELTSybXVKrr8QucYU', '1', '2019-05-20 22:42:25', '0');
INSERT INTO `users` VALUES ('4', 'lalala', '$2y$10$Q7HwoMLkUoUU5n1NpgJUK.T/1uw4erHHwe4MtyJx4JaGTQuMB1EHG', '20190520/kRwBv040n0k73kX6JBzF7AaeSrWWnydrFego1bnR.jpeg', '111@qq.com', 'cp6twllkD8LZQh2RvbTll4mYi8obZC3ogLOmIJZd95UQbj8ZU7', '1', '2019-05-20 22:42:43', '0');
INSERT INTO `users` VALUES ('8', 'serors', '$2y$10$b2xz/Ri3fAJIcR0vqJSlNep3J0Ry.RPMk/i2VR7NUA7lBV8hBleIu', '20190520/fP8xQZ0LglZnwCsWXetFyNs1NcAS2GAjmeJ9KgXL.jpeg', null, '9pIIS0K8ehbDQhDg1Bf2swoa145HgMLlROL8oIUtcbm5svnHSZ', '0', '2019-05-20 23:34:16', '0');
INSERT INTO `users` VALUES ('9', 'nishisb', '$2y$10$b.byo58c/kkFtIhsESt81eaE7flDNhEjAjaRFUZXcisKO.SPgOoMO', '20190520/UGu73Q2Lt4s5AjDuMtQswMha47UwsmZxJEZbS19M.jpeg', '123@qq.com', 'BeulpCnahd9NKReAqjMGwTdNAg6dwYOiBfaanLnfbK5FMgfV1c', '0', '2019-05-20 23:34:42', '0');
INSERT INTO `users` VALUES ('10', 'hhahaha', '$2y$10$oYxvPRBW5sAJaP7UAnYH7./qwhdOF5fOp8XW4nwi1NW0z2l56Jc4u', '20190520/dzbE040pNM3LFHWbmZZbmjliqjMJQEgvkeZEUIQt.jpeg', null, 'EDHZ4Ca2Kpe3k7JrJaCJHjZ58HWUFIDRvmq1Hf0Y9WJchL10dW', '0', '2019-05-20 23:35:01', '0');
INSERT INTO `users` VALUES ('11', 'nuoyouguan', '$2y$10$ddQXK1oFrtQyl9JPFpWKbuzT9GkRBs6YrY20A6z6I1qR7VowHj1h.', '20190520/Dr8Fb7WveFLbNbvYpWzuE2YUKKJNgnCoeA7LZFQ5.jpeg', null, 'MQ4Kd8asUiWQ6gqn0nUV1gXygxW4kWFX8KxjutDcezdQHS6fLY', '0', '2019-05-20 23:35:23', '0');
INSERT INTO `users` VALUES ('14', 'admins', '$2y$10$jSnRZNSOhqWCUjRX.MnLFutj388SBAIXqW20jsq7.Nt3E07R5n5he', '20190521/V83gfR8qPAKqVIhvctgKZdWwaK7A6DUqETg3Bafr.jpeg', '111@qq.com', 'LWGov7bggGSKJoyHwkAsnygaSCEXJ0rP8zD6LpcBsY6ZS5w5CF', '0', '2019-05-21 14:59:52', '1');
INSERT INTO `users` VALUES ('15', 'lishfhf', '$2y$10$LZ4a3ETvQ9miQzIAspyTbOzB1OFaD1HiK0ywxbFuQOC/J.mVOIIgG', '20190524/PELUoH3NeEqLYqHwJ7beWGqh66fTythSeKS0Gtlb.jpeg', null, '919Y4taSbI4k77aWjofY4pgwUify1uNOJ4WIVw2jInBafoUcGd', '0', '2019-05-24 16:11:32', '0');
INSERT INTO `users` VALUES ('16', 'awdwada', '$2y$10$teoG6Yh2GHDoz.kdaN4gJ..f3LvYG4PpSmy9BVwoytsHp4X.NlBoa', null, null, 'p1e2bckGFMEq8aD4ZHiYoNdPtCeAkLmIksmTxkhewL7WzR1Tb6', '0', null, '0');
INSERT INTO `users` VALUES ('17', 'wdadwadwa', '$2y$10$nj3KogKEq9qCqg36Z1FXxuA1JhDLYN76msYqJnOr/3w3vzGn2gvlW', null, null, 'GHdFNxdVRUzw3WHVvUaGtQcuS9nbYEwST8NqPLocVEaykZj3rg', '0', null, '0');

-- ----------------------------
-- Table structure for users_articles
-- ----------------------------
DROP TABLE IF EXISTS `users_articles`;
CREATE TABLE `users_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `tid` int(11) NOT NULL COMMENT '文章id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users_articles
-- ----------------------------
INSERT INTO `users_articles` VALUES ('1', '14', '2');
INSERT INTO `users_articles` VALUES ('2', '14', '10');
INSERT INTO `users_articles` VALUES ('3', '14', '6');
INSERT INTO `users_articles` VALUES ('4', '14', '8');
INSERT INTO `users_articles` VALUES ('5', '14', '1');
