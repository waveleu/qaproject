<?php if (!defined('THINK_PATH')) exit();?><div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
        <?php if(is_array($cname_list)): $i = 0; $__LIST__ = $cname_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo '#'.$v; ?>"><?php echo ($v); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <?php if(is_array($data)): foreach($data as $class_name=>$v_list): ?><div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="<?php echo ($class_name); ?>">
            <table class="am-table am-table-striped am-table-hover table-main" >
                <thead>
                <tr>
                    <th class="table-title"><a href="javascript:reorder('casename');">CaseName</a></th>
                    <th class="table-title"><a href="javascript:reorder('result');">Result</a></th>
                    <th class="table-title"><a href="javascript:reorder('BugID');">BugID</a></th>
                    <th class="table-title"><a href="javascript:reorder('comments');">Comments</a></th>
                    <th class="table-title"><a href="javascript:reorder('start_time');">start_time</a></th>
                    <th class="table-title"><a href="javascript:reorder('end_time');">end_time</a></th>
                    <th class="table-author am-hide-sm-only">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($v_list)): foreach($v_list as $key=>$v): ?><tr>
                    <td title=<?php echo ($v[info]); ?>><?php echo ($v[casename]); ?></td>

                    <?php
 if($v['result']=='failed') echo "<td style='background-color: red'>".$v['result']."</td>"; elseif($v['result']=='pass') echo "<td style='background-color: green'>".$v['result']."</td>"; else echo "<td>".$v['result']."</td>"; ?>
                    <td><?php echo ($v[BugID]); ?></td>
                    <td><?php echo ($v[comments]); ?></td>
                    <td><?php echo ($v[start_time]); ?></td>
                    <td><?php echo ($v[end_time]); ?></td>

                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary" task_id=<?php echo ($v[id]); ?>   onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" task_id=<?php echo ($v[id]); ?> onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                            </div>
                        </div>
                    </td>
                </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div><?php endforeach; endif; ?>
</div>
<script>
    function tree_fresh(){
        var arr=<?php echo ($cid_list); ?>;
        zTree.checkAllNodes(false);
        $.each(arr,function (k,v) {
            var node=zTree.getNodesByParam('id',v['cid']+"0000");
            zTree.checkNode(node['0'],true,true);
        });
    }
     taskcase_info=eval('<?php echo json_encode($list);?>');
    //$("li:first").addClass('.am-active');
</script>