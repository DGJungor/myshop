<?php 
					require("../public/config.php");
					require("../public/Model.php");

					 date_default_timezone_set("PRC");
					  
					  $mod = new Model_n("friendlink");
					  $total = $mod->total();
				  
					  $list = $mod->select();
					  // var_dump($list);

 
?>
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<em>友情连接</em>
								<?php
									foreach($list as $row){
										  if($row['state']==1){
										  	echo "<a href=\"{$row['link']} \">{$row['linkname']}</a>
											<b>|</b>";
										  }
   
									}
								?>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Jun.com 版权所有. <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">Jun</a> - Collect from <a href="http://www.cssmoban.com/" title="" target="_blank">星星商城</a></em>
							</p>
						</div>
					</div>
		
