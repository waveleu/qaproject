<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <title>Amaze UI Admin table Examples</title>
    <script type="text/javascript" src="/qaweb/Public/assets/js/jquery-1.8.3.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
    <link rel="stylesheet" href="/qaweb/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/qaweb/Public/assets/css/admin.css">
</head>
<body>
    <div class="am-g" style="width:1000px;">
    <div style="width:1000px;">
        <div class="container" id="edit_page" style="width:1000px;">
            <div class="am-g" style="width:1000px;">
                <div style="width:1000px;margin-left:0px;">
                    <hr>
                    <form name="edit_form" class="am-form" action="<?php echo U('admin/Testcase/save');?>" method="post" enctype="multipart/form-data" style="width:1000px;">
                        <input type="hidden" class="am-form-field " name='id' id="id" >
                        <input type="hidden" class="am-form-field " name='pid' id="pid" >
                        <!--新增Case表单-->
                        
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='CaseName' class="am-u-sm-2 am-form-label am-fl" style="margin-top:-6px;">CaseName:</label>
                            <div class="am-u-sm-8">
                                <input type="text" class="am-form-field " name='CaseName'  id="CaseName" style="width:320px;">
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='TestSteps' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">TestSteps:</label>
                            <div class="am-u-sm-8">
                                <input type="text" class="am-form-field " name='TestSteps'  id="TestSteps" style="width:320px;">
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='Priority' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">Priority:</label>
                            <div class="am-u-sm-8">
                                <select id="Priority" placeholder="Please Select" id="Priority" name="Priority" data-am-selected="{btnWidth: '25.3%', btnStyle: 'secondary'}">
                                    <option value=""></option>
                                    <?php $priority_arr=array('P0','P1','P2','P3');?>
                                    <?php if(is_array($priority_arr)): foreach($priority_arr as $key=>$v): if($v==$data[Priority]): ?><option value=<?php echo ($data[Priority]); ?> selected><?php echo ($data[Priority]); ?></option>
                                    <?php else: ?>
                                    <option value=<?php echo ($v); ?>><?php echo ($v); ?></option><?php endif; endforeach; endif; ?>
                                </select>
                            </div>
                            <br>
                        </div>

                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='Automated' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">Automated:</label>
                            <div class="am-u-sm-8" id="Automated">
                                <select data-am-selected="{btnWidth: '25.3%', btnStyle: 'secondary'}"  name="Automated" >
                                    <?php if($data[Automated]==Yes): ?><option value="Yes" selected>Yes</option>
                                        <option value="No">No</option>
                                    <?php else: ?>
                                        <?php if($data[Automated]==No): ?><option value="Yes" >Yes</option>
                                            <option value="No" selected>No</option>
                                        <?php else: ?>
                                            <option value="Yes" >Yes</option>
                                            <option value="No" selected>No</option><?php endif; endif; ?>
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='Project1' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">Project:</label>
                            <div class="am-u-sm-10" id="Project1">
                                <select multiple data-am-selected="{btnWidth:'20%', btnStyle: 'secondary'}" placeholder="Choose Project" id="Project" name="Project[]">
                                    <?php if(is_array($project_list)): foreach($project_list as $key=>$v): if(in_array($v[name],$data[Project])) echo '<option value=',$v[name].' selected>',$v[name].'</option>'; else echo '<option value=',$v[name].' >',$v[name].'</option>'; endforeach; endif; ?>
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='Board1' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">Board Type:</label>
                            <div class="am-u-sm-10" id="Board1">
                            <select multiple data-am-selected="{btnWidth: '20%', btnStyle: 'secondary'}" placeholder="Choose Board" id="Board" name="Board[]">
                                <option value=""></option>
                                <?php if(is_array($board_list)): foreach($board_list as $key=>$v): if(in_array($v[Name],$data[Board])) echo '<option value=',$v[Name].' selected>',$v[Name].'</option>'; else echo '<option value=',$v[Name].' >',$v[Name].'</option>'; endforeach; endif; ?>
                            </select>
                                </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='OS1' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">OS:</label>
                            <div class="am-u-sm-10" id="OS1">
                            <select multiple data-am-selected="{btnWidth: '20%', btnStyle: 'secondary'}" placeholder="Choose OS" id="OS" name="OS[]" >
                                <option value=""></option>
                                <?php if(is_array($os_list)): foreach($os_list as $key=>$v): if(in_array($v[OS],$data[OS])) echo '<option value=',$v[OS].' title=',$v[Comments].' selected>',$v[OS].'</option>'; else echo '<option value=',$v[OS].' title=',$v[Comments].' >',$v[OS].'</option>'; endforeach; endif; ?>
                            </select>
                                </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='ScripLocation' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">ScripLocation:</label>
                            <div class="am-u-sm-8">
                                <input type="text" class="am-form-field " id='ScripLocation'  name="ScripLocation" style="width:320px;">
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='ScripLocation' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">Gold Location:</label>
                            <div class="am-u-sm-8">
                                <input type="text" class="am-form-field " id='ScripLocation'  name="ScripLocation" style="width:320px;">
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='ExpectedResults' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">ExpectedResults:</label>
                            <div class="am-u-sm-8">
                                <input type="text" class="am-form-field " id='ExpectedResults'  name="ExpectedResults" style="width:320px;">
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='OS1' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">Customer:</label>
                            <div class="am-u-sm-10" id="OS1">
                            <select multiple data-am-selected="{btnWidth: '19.8%', btnStyle: 'secondary'}" placeholder="Choose OS" id="OS" name="OS[]" >
                                <option value=""></option>
                                <?php if(is_array($os_list)): foreach($os_list as $key=>$v): if(in_array($v[OS],$data[OS])) echo '<option value=',$v[OS].' title=',$v[Comments].' selected>',$v[OS].'</option>'; else echo '<option value=',$v[OS].' title=',$v[Comments].' >',$v[OS].'</option>'; endforeach; endif; ?>
                            </select>
                                </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error" id="customer_hide">
                            <label for='From' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">From:</label>
                            <div class="am-u-sm-8 "  >
                                <select data-am-selected="{btnWidth: '25%', btnStyle: 'secondary'}" placeholder="Choose From" id="From" name="From">
                                    <option value=""></option>
                                    <?php if(is_array($from_list)): foreach($from_list as $key=>$v): if($v[Name]==$data[From]): ?><option value="<?php echo ($v[name]); ?>" selected><?php echo ($v[name]); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo ($v[name]); ?>"><?php echo ($v[name]); ?></option><?php endif; endforeach; endif; ?>
                                </select>
                                <select data-am-selected="{btnWidth: '25%', btnStyle: 'secondary'}"  placeholder="Choose Customer"  id="Customer" name="Customer" style="display: none">
                                    <option value=""></option>
                                    <?php if(is_array($customer_list)): foreach($customer_list as $key=>$v): if($v[Name]==$data[Customer]): ?><option value="<?php echo ($v[Name]); ?>" selected><?php echo ($v[Name]); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo ($v[Name]); ?>"><?php echo ($v[Name]); ?></option><?php endif; endforeach; endif; ?>
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='BugID' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">BugID:</label>
                            <div class="am-u-sm-8">
                                <input type="text" class="am-form-field " id='BugID' name="BugID" style="width:320px;">
                            </div>
                            <br>
                        </div>
                        <div class="am-form-group am-form-horizontal am-form-error">
                            <label for='Comments' class="am-u-sm-2 am-form-label" style="margin-top:-6px;">Comments:</label>
                            <div class="am-u-sm-8">
                                <input type="text" class="am-form-field " id='Comments' name="Comments" style="width:320px;">
                            </div>
                            <br>
                        </div>
                        <input type="text" class="am-form-field " name="pid" style="display:none;width:1px;hight:1px;" value=<?php echo ($edata['pid']); ?>>
                        <div class="am-u-md-offset-5" style="margin:20px 85px;">
                            <button class="am-btn am-btn-secondary am-radius" type="button" onclick="update()" style="margin-left:82px;">Submit</button>
                            <button class="am-btn am-btn-danger am-radius" type="button" onclick="reset1()" style="margin-left:40px;">Reset</button>
                        </div>
                        <?php $edata=json_encode($data);?>
                        <script defer language="javascript">
                           window.onload=function () {
                               $.each(<?php echo ($edata); ?>,function (k,v) {
                                   var name="#"+k;
                                   $(name).val(v);
                               });
                           }
                        </script>
                    </form >
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function update() {
            document.edit_form.submit();
            //window.parent.location.reload();
        }
        function reset1() {
            $.each(<?php echo ($edata); ?>,function (k,v) {
                var name="#"+k;
                $(name).val(v);
            });
        }
        function controll_visible(){
        	if($("#From").val()!="Customer Case" && $("#From").val()!="Customer Issue")
        		{$("#Customer").css("visibility","hidden");
        		}
        	else $("#Customer").css("visibility","visible");
        }
    </script>

    <script src="/qaweb/Public/assets/js/amazeui.min.js"></script>
    <script src="/qaweb/Public/assets/js/jquery-1.8.3.min.js"></script>
</body>

</html>