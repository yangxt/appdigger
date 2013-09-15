
<!doctype html>
<html lang="en">
<head>
<title>app digger ' master</title>
<link rel="stylesheet" href="../css/master.css">
<!-- meta -->
<meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8" />
<meta name = "keywords" content = "app,tmt,tencent">
<meta name = "description" content = "app share">
<meta name="author" content="freestyle21" />
<link rel="stylesheet" href="../css/master.css">
<script src="../js/jquery.js"></script>
</head>

<body>
	<!--[if lt IE 9]>
		<div class = "ltie">
			<p>您的浏览器已经过时了，为了更好的浏览体验，请下载<a href = 'http://www.google.co.kr/intl/zh-CN/chrome/browser/'>chrome</a>或<a href = 'http://www.mozilla.org/en-US/firefox/new/' >firefox</a>浏览器 ~ ~ </p>
		</div>
	<![endif]--> 
	<div class="mod-master">
		<p class="mod-master__name">"爱屁屁" 分享会</p>
        
		<p class="mod-master__input">
			第
            <?php if(is_null($master[0]['version'])) :?>
                <input type="text" id="num" value="1" placeholder="number" autofocus="true">
            <?php else :?>
            	<input type="text" id="num" value="<?php echo ($master[0]['version'])?>" placeholder="number" autofocus="true">    
            <?php endif;?>
			期
		</p>
         <?php if($master[0]['can'] === '0' ||  $master === FALSE )  :?>
        		<p class="mod-master__control">
        			<a href="" id="begin" class="mod-master__begin">开始 </a>	
        		</p>
         <?php else :?>
              <p class="mod-master__control">
                  <a href="" id="begin" class="mod-master__begin on">结束</a> 
              </p>
         <?php endif;?>
	</div>
    	<script>
    		(function() {
    			var begin = document.getElementById('begin');
    				

    			$('#num').blur(function() {
    				var num = document.getElementById('num').value;
    				
    				if(isNaN(num)) {
    					$('#num').addClass('fail');
    					return false;
    				} else {
    					$('#num').addClass('ok')
    				}	
    			});
    			begin.onclick = function () {
    				var num = document.getElementById('num').value;

    				if(isNaN(num)) {
    					alert('期数只能为数字哦，亲.');
    					$('#num').focus();
    					return false;
    				} 
    				var can = 0;
    				var cur = this.text;
                    var that = this;
    				if(cur === '开始') {
    					this.innerHTML = '结束';
                        $(this).addClass('on'); 
    					can = 1;
    				} else {
    					this.innerHTML = '开始'
                        $(this).removeClass('on');
    					can = 0;
    				}
					console.log(num + ''+can);
    				$.ajax({
                        type:'POST',
                        url: 'master/master_set',
                        timeout: 10000,
                        dataType: 'json',
                        data: {'num':num,'can':can},
                        success: function(json) {
                            
                            alert('successful!');
                        },
                        error: function() {
                            alert('failed! if you need help, contact alanqu please.');
                            that.innerHTML = '开始'
                            $(that).removeClass('on');
                            can = 0;
                        }
                    }); 
    				return false;
    			};	
    		})();
    		
    </script>
</div>
</body>
</html>