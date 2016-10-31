<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/qaweb/Public/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/qaweb/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/qaweb/Public/assets/css/admin.css">
    <style>
        .am-form-group{
            display: block;
            margin: 5px auto 0 auto;
            border-radius: 0;
            padding: 5px;
            line-height: 1.8rem;
            width: 80%;
            border: 1px solid #dedede;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
        }
    </style>
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Board Type</strong></div>

        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span>new Board Type</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">Board_Name</th><th class="table-title">Customer</th>
                        <th class="table-title">2D_Core</th><th class="table-title">3D_Core</th><th class="table-title">2D_VG_Core</th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[Name]); ?></td>
                        <td><?php echo ($v[Customer]); ?></td>
  
                        <td><?php echo ($v['2D_Core']); ?></td>
                        <td><?php echo ($v['3D_Core']); ?></td>
                        <td><?php echo ($v['2D_VG_Core']); ?></td>
                        <td >
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" board_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>

                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" board_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" >
                        <div class="am-modal-dialog">
                            <div class="am-modal-hd">Edit Board Type</div>
                            <div class="am-modal-bd">
                                <?php if(is_array($v)): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($i % 2 );++$i; if($key!=id): if($key==Type): echo ($key); ?>
                                            <div class="am-form-group-inline am-cf" >
                                                <select data-am-selected   class="am-fr" placeholder="Please select..." onchange="edit_select(this)" id="<?php echo ($v[id]); ?>" name="<?php echo ($v[id]); ?>">
                                                    <option value=""></option>
                                                    <option value="Chip" >Chip</option>
                                                    <option value="FPGA">FPGA</option>            
                                                    <option value="CModel">CModel</option>
                                                </select>
                                            </div>
                                    	<?php else: ?>
	                                        <?php if($key==Customer): ?><span id="Customer_1"><?php echo ($key); ?></span>
	                                            <div class="am-form-group-inline am-cf" id="Customer">
	                                                <select data-am-selected   class="am-fr" placeholder="Please select..." >
	                                                    <option value=""></option>
	                                                    <?php if(is_array($customer_list)): foreach($customer_list as $key=>$vc): if($vc==$vsub): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
	                                                        <?php else: ?>
	                                                            <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
	                                                </select>
	                                            </div>
	                                        <?php else: ?>
	                                            <div id="<?php echo ($key); ?>"><?php echo ($key); ?><input type="text" class="am-modal-prompt-input" value="<?php echo ($vsub); ?>"></div><?php endif; endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="am-modal-footer">
                                <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
                                <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- content end -->


//add new board
<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_board_modal" >
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Board Type</div>
        <div class="am-modal-bd">
	        <div id="Name_add">Name<input type="text" class="am-modal-prompt-input" id="Name"></div>
	        <div id="Type_add">Type
	                <div class="am-form-group-inline am-cf" >
	                    <select data-am-selected    class="am-fr" placeholder="Please select..." onchange="new_select()" id="new_select" name="new_select">
	                        <option value=""></option>
	                        <option value="Chip">Chip</option>
                            <option value="FPGA">FPGA</option>            
                            <option value="CModel">CModel</option>
	                    </select>
	                </div>
	         </div>
	        <div id="Customer_add">Customer
	                <div class="am-form-group-inline am-cf" >
	                    <select data-am-selected    class="am-fr" placeholder="Please select...">
	                        <option value=""></option>
	                        <?php if(is_array($customer_list)): foreach($customer_list as $key=>$vc): ?><option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
	                    </select>
	                </div>
	         </div>
	        <div id="2D_Core_add">2D_Core<input type="text" class="am-modal-prompt-input" ></div>
	        <div id="3D_Core_add">3D_Core<input type="text" class="am-modal-prompt-input" ></div>
	        <div id="2D_VG_Core_add">2D_VG_Core<input type="text" class="am-modal-prompt-input" ></div>
	        <div id="Bitfile_add">Bitfile<input type="text" class="am-modal-prompt-input" ></div>
	        <div id="CModel_Location-P4_add">CModel_Location-P4<input type="text" class="am-modal-prompt-input" ></div>
	        <div id="CMpdel_Location-Build_add">CMpdel_Location-Build<input type="text" class="am-modal-prompt-input" ></div>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
        </div>
    </div>
</div>
</div>




<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/qaweb/Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/qaweb/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>
<script src="/qaweb/Public/assets/js/app.js"></script>
<script>
    function edit(obj) {
        var id=$(obj).attr('board_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var customer=$(str+' option:selected').val();
                //$.post("<?php echo U('Admin/Board/edit');?>",{id:id,Name:e.data[0],Customer:customer,Chip_Info:e.data[1],'2D_Core':e.data[2],'3D_Core':e.data[3],'2D_VG_Core':e.data[4]},
           		$.post("<?php echo U('Admin/Board/edit');?>",{id:id,Name:e.data[0],Customer:customer,'2D_Core':e.data[1],'3D_Core':e.data[2],'2D_VG_Core':e.data[3]},		 
           			function () {
                       	window.location.reload();
                });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {
        var id=$(obj).attr('board_id');
        console.log(id);
        if(confirm('确定删除？')){
            $.post("<?php echo U('Admin/Board/del');?>",{id:id},function (data) {
                window.location.reload();
            });
        }

    }
    function add() {
        $('#add_board_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var customer=$('#add_board_modal option:selected').val();
                $.post("<?php echo U('Admin/Board/add');?>",
                        //{Name:e.data[0],Customer:customer,Chip_Info:e.data[1],'2D_Core':e.data[2],'3D_Core':e.data[3],'2D_VG_Core':e.data[4]},
                        {Name:e.data[0],Customer:customer,'2D_Core':e.data[2],'3D_Core':e.data[3],'2D_VG_Core':e.data[4]},
                        function (data) {
                            window.location.reload();
                });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }
    
    $(document).ready(function(){
    	$("#Customer_1,#Customer,#2D_Core,#3D_Core,#2D_VG_Core,#Bitfile,#CModel_Location-P4,#CMpdel_Location-Build").css("visibility","hidden");
    	$("#Customer_add,#2D_Core_add,#3D_Core_add,#2D_VG_Core_add,#Bitfile_add,#CModel_Location-P4_add,#CMpdel_Location-Build_add").css("visibility","hidden");	
    });
    function edit_select(obj){
    	var id=$(obj).attr('id');
    	if($("#"+id).val()=='Chip'){
    		$("#Customer_1,#Customer,#2D_Core,#3D_Core,#2D_VG_Core").css("visibility","visible");
    		$("#Bitfile,#CModel_Location-P4,#CMpdel_Location-Build").css("visibility","hidden");
    		};
    	if($("#"+id).val()=='FPGA'){
    		$("#Bitfile,#Customer").css("visibility","visible");
    		$("#Customer_1,#Customer,#2D_Core,#3D_Core,#2D_VG_Core,#CModel_Location-P4,#CMpdel_Location-Build").css("visibility","hidden");
    		};
    	if($("#"+id).val()=='CModel'){
    		$("#CModel_Location-P4,#CMpdel_Location-Build").css("visibility","visible");
    		$("#Customer_1,#Customer,#2D_Core,#3D_Core,#2D_VG_Core,#Bitfile").css("visibility","hidden");
    		};
    	}
    function new_select(){
    	if($("#new_select").val()=='Chip'){
    		$("#Customer_add,#2D_Core_add,#3D_Core_add,#2D_VG_Core_add").css("visibility","visible");
    		$("#Bitfile_add,#CModel_Location-P4_add,#CMpdel_Location-Build_add").css("visibility","hidden");
    		};
    	if($("#new_select").val()=='FPGA'){
    		$("#Bitfile_add").css("visibility","visible");
    		$("#Customer_add,#2D_Core_add,#3D_Core_add,#2D_VG_Core_add,#CModel_Location-P4_add,#CMpdel_Location-Build_add").css("visibility","hidden");
    		};
    	if($("#new_select").val()=='CModel'){
    		$("#CModel_Location-P4_add,#CMpdel_Location-Build_add").css("visibility","visible");
    		$("#Customer_add,#2D_Core_add,#3D_Core_add,#2D_VG_Core_add,#Bitfile_add").css("visibility","hidden");
    		};
    	}
</script>
</body>
</html>