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
        .am-modal-bd{
            width:70%;
            margin:0 auto;
        }
        .am-modal-bd input{
            border:1px solid #9C9898;
        }
        .edit{
            width:70%;
            margin:0 auto;
        }
        .edit input{
            border:1px solid #9C9898;
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
                        <th class="table-title">Board_Name</th><th class="table-title">Type</th><th class="table-title">Customer</th>
                        <th class="table-title">2D_Core</th><th class="table-title">3D_Core</th><th class="table-title">2D_VG_Core</th>
                        <th class="table-title">Bitfile</th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[Name]); ?></td>
                        <td><?php echo ($v[Type]); ?></td>
                        <td><?php echo ($v[Customer]); ?></td>
                        <td><?php echo ($v['2D_Core']); ?></td>
                        <td><?php echo ($v['3D_Core']); ?></td>
                        <td><?php echo ($v['2D_VG_Core']); ?></td>
                        <td><?php echo ($v[Bitfile]); ?></td>
                        <td >
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" board_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>

                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" board_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" style="top:-200px;">
                        <div class="am-modal-dialog">
                            <div class="am-modal-hd">Edit Board Type</div>
                            <div class="am-modal-bd edit">
                                <?php if(is_array($v)): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($i % 2 );++$i; if($key!=id): if($key==Type): ?><label><?php echo ($key); ?></label>
                                            <div class="am-form-group-inline am-cf" >
                                                <select data-am-selected="{btnWidth: '80%', btnStyle: 'secondary'}"   class="am-fr" placeholder="Please select..." onchange="edit_select(this)" id="<?php echo ($v[id]); ?>" name="<?php echo ($v[id]); ?>">
                                                    <option value=""></option>
                                                    <option value="Chip" >Chip</option>
                                                    <option value="FPGA">FPGA</option>            
                                                    <option value="CModel">CModel</option>
                                                </select>
                                            </div>
                                    	<?php else: ?>
	                                        <?php if($key==Customer): ?><label id="Customer_1"><?php echo ($key); ?></label>
	                                            <div class="am-form-group-inline am-cf" >
	                                                <select data-am-selected="{btnWidth: '80%', btnStyle: 'secondary'}"   class="am-fr" placeholder="Please select..." id="Customer">
	                                                    <option value=""></option>
	                                                    <?php if(is_array($customer_list)): foreach($customer_list as $key=>$vc): if($vc==$vsub): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
	                                                        <?php else: ?>
	                                                            <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
	                                                </select>
	                                            </div>
    	                                        <?php else: ?>
	                                            <div id="<?php echo ($key); ?>">
                                                    <label><?php echo ($key); ?></label>
                                                    <input type="text" class="am-modal-prompt-input" value="<?php echo ($vsub); ?>">
                                                </div><?php endif; endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="am-modal-footer">
                                <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc">OK</span>
                                <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc">Cancel</span>
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
<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_board_modal" style="top:-20%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Board Type</div>
        <div class="am-modal-bd">
	        <div id="Name_add" class="Name_add">
                <label>Name</label>
                <input type="text" class="am-modal-prompt-input" id="Name">
            </div>
	        <div id="Type_add">
                <label>Type</label>
                <div class="am-form-group-inline am-cf">
                    <select data-am-selected="{btnWidth: '80%', btnStyle: 'secondary'}"    class="am-fr" placeholder="Please select..." onchange="new_select()" id="new_select" name="new_select">
                        <option value=""></option>
                        <option value="Chip">Chip</option>
                        <option value="FPGA">FPGA</option>            
                        <option value="CModel">CModel</option>
                    </select>
                </div>
	         </div>
	        <div id="Customer_add">
                    <label>Customer</label>
	                <div class="am-form-group-inline am-cf" >
	                    <select data-am-selected="{btnWidth: '80%', btnStyle: 'secondary'}" class="am-fr" placeholder="Please select...">
	                        <option value=""></option>
	                        <?php if(is_array($customer_list)): foreach($customer_list as $key=>$vc): ?><option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
	                    </select>
	                </div>
	         </div>
	        <div id="2D_Core_add"><label>2D_Core</label><input type="text" class="am-modal-prompt-input" ></div>
	        <div id="3D_Core_add"><label>3D_Core</label><input type="text" class="am-modal-prompt-input" ></div>
	        <div id="2D_VG_Core_add"><label>2D_VG_Core</label><input type="text" class="am-modal-prompt-input" ></div>
	        <div id="Bitfile_add"><label>Bitfile</label><input type="text" class="am-modal-prompt-input" ></div>
	        <div id="CModel_Location-P4_add"><label>CModel_Location-P4</label><input type="text" class="am-modal-prompt-input" ></div>
	        <div id="CModel_Location-Build_add"><label>CModel_Location-Build</label><input type="text" class="am-modal-prompt-input" ></div>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc"">Cancel</span>
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
        var str=(".am-modal[tabindex='id']").replace("id",id);;
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var Type=$(str+' option:selected').val();
                var customer=$('#Customer option:selected').val();
                //$.post("<?php echo U('Admin/Board/edit');?>",{id:id,Name:e.data[0],Customer:customer,Chip_Info:e.data[1],'2D_Core':e.data[2],'3D_Core':e.data[3],'2D_VG_Core':e.data[4]},
           		$.post("<?php echo U('Admin/Board/edit');?>",{id:id,Name:e.data[0],Customer:customer,'Type':Type,'2D_Core':e.data[1],'3D_Core':e.data[2],'2D_VG_Core':e.data[3],'Bitfile':e.data[4],'CModel_Location-P4':e.data[5],'CModel_Location-Build':e.data[6]},		 
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
        if(confirm('Delete This Board ?')){
            $.post("<?php echo U('Admin/Board/del');?>",{id:id},function (data) {
                window.location.reload();
            });
        }

    }
    function add() {
        $('#add_board_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
            	var customer=$('#Customer_add option:selected').val();
                var Type=$('#new_select option:selected').val();
                $.post("<?php echo U('Admin/Board/add');?>",
                        //{Name:e.data[0],Customer:customer,Chip_Info:e.data[1],'2D_Core':e.data[2],'3D_Core':e.data[3],'2D_VG_Core':e.data[4]},
                        {Name:e.data[0],Customer:customer,'Type':Type,'2D_Core':e.data[1],'3D_Core':e.data[2],'2D_VG_Core':e.data[3],'Bitfile':e.data[4],'CModel_Location-P4':e.data[5],'CModel_Location-Build':e.data[6]},
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
    	$("#2D_Core,#3D_Core,#2D_VG_Core,#Bitfile,#CModel_Location-P4,#CModel_Location-Build").css("display","none");
    	$("#2D_Core_add,#3D_Core_add,#2D_VG_Core_add,#Bitfile_add,#CModel_Location-P4_add,#CModel_Location-Build_add").css("display","none");	
    });
    function edit_select(obj){
    	var id=$(obj).attr('id');
    	if($("#"+id).val()=='Chip'){
    		$("#Customer_1,#Customer,#2D_Core,#3D_Core,#2D_VG_Core").css("display","block");
    		$("#Bitfile,#CModel_Location-P4,#CModel_Location-Build").css("display","none");
    		};
    	if($("#"+id).val()=='FPGA'){
    		$("#Customer_1,#Bitfile").css("display","block");
    		$("#Customer,#2D_Core,#3D_Core,#2D_VG_Core,#CModel_Location-P4,#CModel_Location-Build").css("display","none");
    		};
    	if($("#"+id).val()=='CModel'){
    		$("#Customer_1,#CModel_Location-P4,#CModel_Location-Build,#3D_Core").css("display","block");
    		$("#Customer,#2D_Core,#2D_VG_Core,#Bitfile").css("display","none");
    		};
    	}
    function new_select(){
    	if($("#new_select").val()=='Chip'){
    		$("#Customer_add,#2D_Core_add,#3D_Core_add,#2D_VG_Core_add").css("display","block");
    		$("#Bitfile_add,#CModel_Location-P4_add,#CModel_Location-Build_add").css("display","none");
    		};
    	if($("#new_select").val()=='FPGA'){
    		$("#Bitfile_add").css("display","block");
    		$("#Customer_add,#2D_Core_add,#3D_Core_add,#2D_VG_Core_add,#CModel_Location-P4_add,#CModel_Location-Build_add").css("display","none");
    		};
    	if($("#new_select").val()=='CModel'){
    		$("#CModel_Location-P4_add,#CModel_Location-Build_add,#3D_Core_add").css("display","block");
    		$("#Customer_add,#2D_Core_add,#2D_VG_Core_add,#Bitfile_add").css("display","none");
    		};
    	}
</script>
</body>
</html>