<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Amaze/Public/assets/css/amazeui.min.css"/>
<script src="/Amaze/Public/assets/js/amazeui.min.js"></script>
<div class="am-g">
    <div class="am-u-md-12">
        <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
            <tr>
                <th class="table-title">name</th><th class="table-title">suit</th><th class="table-title">platform <div class="am-text-primary">(Board/BSP/OS_Version)</div></th><th class="table-title">owner</th>
                <th class="table-title">start_time</th><th class="table-title">end_time</th><th class="table-author am-hide-sm-only">Operation</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                <td><a href="javascript:toTaskCase('<?php echo ($v[id]); ?>','<?php echo ($v[pid]); ?>')"><?php echo ($v[name]); ?></a></td>
                <td><?php echo ($suit); ?></td>
                <td><?php echo ($v[platform_name]); ?></td>
                <td><?php echo ($v[owner]); ?></td>
                <td><?php echo ($v[start_time]); ?></td>
                <td><?php echo ($v[end_time]); ?></td>
                <td>
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary" task_id=<?php echo ($v[id]); ?> onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" task_id=<?php echo ($v[id]); ?> onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                        </div>
                    </div>
                </td>
                <div class="am-modal am-modal-confirm" tabindex=<?php echo ($v[id]); ?> >
                    <div class="am-modal-dialog">
                        <div class="am-modal-hd">New Task</div>
                        <div class="am-modal-bd">
                            Name<input type="text" class="am-modal-prompt-input" value=<?php echo ($v[name]); ?>>
                            Platform
                            <div class="am-form-group-inline  am-cf" >
                                <select data-am-selected="{searchBox: 1,btnWidth:'60%'}"  class="am-u-sm-offset-3" placeholder="Board/BSP/OS_Version" id="edit_platform" ><!---->
                                    <option value=""></option>
                                    <?php if(is_array($platform_list)): foreach($platform_list as $key=>$vc): if($vc['id']=$v['platform']): ?><option value=<?php echo ($vc['id']); ?> selected><?php echo ($vc[Board]); ?>&nbsp;/&nbsp;<?php echo ($vc[BSP]); ?>&nbsp;/&nbsp;<?php echo ($vc[OS]); echo ($vc[Version]); ?>&nbsp;</option>
                                    <?php else: ?>
                                    <option value=<?php echo ($vc['id']); ?>><?php echo ($vc[Board]); ?>/<?php echo ($vc[BSP]); ?>/<?php echo ($vc[OS]); echo ($vc[Version]); ?></option><?php endif; endforeach; endif; ?>
                                </select>
                            </div>
                            Owner
                            <div class="am-form-group-inline  am-cf" >
                                <select data-am-selected="{searchBox: 1}"  class="am-u-md-3" placeholder="Please select..." id="edit_user" value=<?php echo ($v[owner]); ?>>
                                    <option value=""></option>
                                    <?php if(is_array($user_list)): foreach($user_list as $key=>$vc): if($vc['username']=$v['owner']): ?><option value=<?php echo ($vc[username]); ?> selected><?php echo ($vc[username]); ?></option>
                                    <?php else: ?>
                                    <option value=<?php echo ($vc[username]); ?>><?php echo ($vc[username]); ?></option><?php endif; endforeach; endif; ?>
                                </select>
                            </div>
                            start_time<input type="text" class="am-modal-prompt-input" data-am-datepicker value="<?php echo ($v[start_time]); ?>">
                            end_time<input type="text" class="am-modal-prompt-input" data-am-datepicker value="<?php echo ($v[end_time]); ?>">
                        </div>

                        <div class="am-modal-footer">
                            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
                            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
                        </div>
                    </div>
                </div>
            </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <?php echo ($page); ?>
    </div>
</div>