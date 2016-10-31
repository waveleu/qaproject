<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>高级搜索-QA内部网站</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<meta name="keywords" content="VeriSilicon,王帅" />
<meta name="description" content="哈哈哈哈" />
<link rel="stylesheet" type="text/css" href="/ExpAndImp/Template/default/css/reset.css" /> 
<link rel="stylesheet" type="text/css" href="/ExpAndImp/Template/default/css/root.css" /> 
<script type="text/javascript" src="/ExpAndImp/Template/default/js/jquery.min.js"></script>
<script type="text/javascript" src="/ExpAndImp/Template/default/js/toogle.js"></script>	
</head>
<body>
   
    <!-- start header -->
        <div id="header">
         <a href="<?php echo U('index/index');?>"><img src="/goods/Uploads/2014-12-29/54a02abc7b454.png" width="120" height="40" alt="logo" class="logo" /></a>
            
			<a href="javascript:void(0);" onclick="history.back();" class="button back"><img src="/ExpAndImp/Template/default/images/back-button.png" width="15" height="16" alt="icon" /></a>
            <a href="#" class="button search"><img src="/ExpAndImp/Template/default/images/search.png" width="16" height="16" alt="icon"/></a>
        <div class="clear"></div>
</div>
    <!-- end header -->
    
    <!-- start searchbox -->
    <div class="searchbox">
   	  <form id="searchForm" method="post" action="<?php echo U('Home/Index/index');?>">
      	<input type="text" name="search" id="textfield" class="txtbox" placeholder="请输入关键字" value="<?php echo ($search); ?>"/>
		<input type="submit" value="搜索" />
		<input type="button" id="adsearch" value="高级搜索" />
   	  </form>
    </div>
    <!-- end searchbox -->
<script>
	$("#adsearch").click(function(){
		window.location.href = "<?php echo U('Home/Search/index');?>";
	});
</script>    
  
    
    
    <!-- start page -->
    <div class="page">
    
    		
            <div class="simplebox">
            	<h1 class="titleh">高级搜索</h1>
                <div class="content">
                	
                  <form name="form1" method="post" action="<?php echo U('Home/Search/all');?>">
                  		
                    <div class="form-line">
                   	  <label class="st-label">商品名称</label>
                      <input type="text" name="title" value="<?php echo ($title); ?>"  style=" width:90%;" />
                    </div>
                  		
                    <div class="form-line">
                   	  <label class="st-label">零件号</label>
                      <input type="text" name="PNO" value="<?php echo ($PNO); ?>" style=" width:90%;" />
                    </div>
					
                    <div class="form-line">
                   	  <label class="st-label">原厂参考零件号</label>
                      <input type="text" name="old_PNO" value="<?php echo ($old_PNO); ?>" style=" width:90%;" />
                    </div>
                  		
                    <div class="form-line">
                      <label class="st-label">品牌</label>
                      <select name="brand_id" class="js_brand">
                        <option value="0">全部品牌</option>
						<?php echo ($brand_list = get_list('brand')); ?>
                        <?php if(is_array($brand_list)): $i = 0; $__LIST__ = $brand_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>                   
                      </select>
                    </div>
                  		
                    <div class="form-line js_typeBox" style="display:none;">
                   	  <label class="st-label">机型</label>
                      <select name="type_id" class="js_type">
						
                      </select>
                    </div>
                    <div class="form-line">
                      <label class="st-label">类别</label>
                      <select name="category_id">
                        <option value="0">全部类别</option>
                        <?php echo ($category_list = get_list('category')); ?>
                        <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                    
                    <div class="form-line">
                    <input type="submit" name="button" id="button" value="&nbsp;搜索&nbsp;" class="submit-button" />
                    <input type="reset" name="button" id="button2" value="&nbsp;清空&nbsp;" class="reset-button" />
                    </div>

                  </form>
                  
                </div>
      </div>
            
<script>
$(function(){
  //选择品牌
  $(".js_brand").change(function(){
      var Id = $(this).val();
    var url = "<?php echo U('Search/get_option');?>";
    $.post(url , { brand_id:Id } , function(data){
		if(data.status == 'ok'){
			$(".js_typeBox").show();
            $(".js_type").html(data.info);
        }else{
			$(".js_typeBox").hide();
        }
        
    }, 'json');
  });
})
</script>            
            <div class="footer">
            Copyright ©2015-2016 VeriSilicon版权所有
			</div>
            <!-- end footer -->
            
            
            
    
    <div class="clear"></div>
    </div>
</body>
</html>