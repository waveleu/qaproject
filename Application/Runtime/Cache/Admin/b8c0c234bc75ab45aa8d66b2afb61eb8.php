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
            border: 1px solid #9C9898;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
        }
        .am-modal-bd{
            width:90%;
            text-align:center;
            margin:0 auto;
        }
        .am-modal-bd label{
            width:26%;
            display:inline-block;
            text-align:right;
            padding-left:0px;
        }
        .am-modal-bd input{
            width:60%;
        }
    </style>
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">BSP</strong></div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span> new BSP</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">id</th><th class="table-title">BSP_Name</th><th class="table-title">Customer</th><th class="table-title">Comments</th>
                        <th class="table-title">Date</th><th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[id]); ?></td>
                        <td><?php echo ($v[Name]); ?></td>
                        <td><?php echo ($v[Customer]); ?></td>
                        <td><?php echo ($v[Comments]); ?></td>
                        <td><?php echo ($v[Date]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" bsp_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" bsp_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" style="top:-20%;">
                            <div class="am-modal-dialog">
                                <div class="am-modal-hd">Edit BSP</div>
                                <div class="am-modal-bd" style="text-align:left;">
                                  <label>Name:</label>
                                  <input type="text" class="am-modal-prompt-input" value="<?php echo ($v[Name]); ?>" style="display:inline;border:1px solid #9C9898;"><br/><br/>
                                   <label>Customer:</label> 
                                   <input type="text" class="am-modal-prompt-input" value="<?php echo ($v[Comments]); ?>" style="display:inline;border:1px solid #9C9898;"><br/><br/>
                                    <label>Date:</label>
                                    <input type="text" class="am-modal-prompt-input" data-am-datepicker value="<?php echo ($v[Date]); ?>" style="display:inline;border:1px solid #9C9898;"> 
                                </div>
                                <div class="am-modal-footer">
                                    <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
                                    <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;"">Cancel</span>
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


//add new bsp
<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_board_modal" style="top:-15%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New BSP</div>
        <div class="am-modal-bd">
          <label>Name:</label>
          <input type="text" class="am-modal-prompt-input" id="Name" style="display:inline;border:1px solid #9C9898;"><br/><br/> 
          <label>Customer:</label>
          <div class="am-form-group-inline" style="display:inline;">
            <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary'}"   class="am-fr" placeholder="Please select...">
               <option value=""></option>
             <?php if(is_array($customer_list)): foreach($customer_list as $key=>$vc): ?><option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
            </select>
          </div><br/><br/>   
          <label>Comments:</label>   
          <input type="text" class="am-modal-prompt-input" style="display:inline;border:1px solid #9C9898;"><br/><br/>   
          <label>Date:</label>
          <input type="text" class="am-modal-prompt-input" style="display:inline;border:1px solid #9C9898;"  data-am-datepicker="{format: 'yyyy-mm'}">                  
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;"">Cancel</span>
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
        var id=$(obj).attr('bsp_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var customer=$(str+' option:selected').val();
                 $.post("<?php echo U('Admin/Bsp/edit');?>",
                        {id:id,Name:e.data[0],Customer:customer,Comments:e.data[1],Date:e.data[2]},
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
        var id=$(obj).attr('bsp_id');
        if(confirm('Delete This Bsp ?')){
            $.post("<?php echo U('Admin/Bsp/del');?>",{id:id},function (data) {
                window.location.reload();
            })
        }

    }
    function add() {
        $('#add_board_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var customer=$('#add_board_modal option:selected').val();
                $.post("<?php echo U('Admin/Bsp/add');?>",
                        {Name:e.data[0],Customer:customer,Comments:e.data[1],Date:e.data[2]},
                        function () {
                            window.location.reload();
                });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }


</script>
</body>
</html>