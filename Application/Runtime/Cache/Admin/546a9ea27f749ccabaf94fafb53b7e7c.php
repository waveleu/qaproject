<?php if (!defined('THINK_PATH')) exit();?><div class="am-g">
    <div class="am-u-md-12">
        <hr>
        <form class="am-form" action="<?php echo U('admin/Testcase/save');?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" class="am-form-field " name='pid' value=<?php echo ($pid); ?> >
                                    <!--新增Case表单-->
                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='CaseName' class="am-u-sm-2 am-form-label">CaseName</label>
                                        <div class="am-u-sm-8">
                                            <input type="text" class="am-form-field " name='CaseName'  id="CaseName" >
                                        </div>
                                        <br>
                                    </div>
                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='TestSteps' class="am-u-sm-2 am-form-label">TestSteps</label>
                                        <div class="am-u-sm-8">
                                            <input type="text" class="am-form-field " name='TestSteps'  id="TestSteps" >
                                        </div>
                                        <br>
                                    </div>

                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='Priority' class="am-u-sm-2 am-form-label">Priority</label>
                                        <div class="am-u-sm-8">
                                            <select data-am-selected id="Priority" placeholder="Please Select" name="Priority">
                                                <option value=""></option>
                                                <option value="P0">P0</option>
                                                <option value="P1">P1</option>
                                                <option value="P3">P2</option>
                                                <option value="P4">P4</option>
                                            </select>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='Automated' class="am-u-sm-2 am-form-label">Automated</label>
                                        <div class="am-u-sm-8" id="Automated">
                                            <select data-am-selected  name="Automated">
                                                <option value="Yes" selected>Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='Exception' class="am-u-sm-2 am-form-label">Exception</label>
                                        <div class="am-u-sm-10" id="Exception">
                                            <select multiple data-am-selected placeholder="Choose Project" id="Project" name="Project[]">
                                                <!--<option value=""></option>-->
                                                <?php if(is_array($project_list)): foreach($project_list as $key=>$v): ?><option value=<?php echo ($v[id]); ?>><?php echo ($v[id]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                            <select multiple data-am-selected placeholder="Choose Board" id="Board" name="Board[]">
                                                <option value=""></option>
                                                <?php if(is_array($board_list)): foreach($board_list as $key=>$v): ?><option value=<?php echo ($v[Name]); ?>><?php echo ($v[Name]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                            <select multiple data-am-selected placeholder="Choose OS" id="OS" name="OS[]">
                                                <option value=""></option>
                                                <?php if(is_array($os_list)): foreach($os_list as $key=>$v): ?><option value=<?php echo ($v[OS]); ?> title=<?php echo ($v[Comments]); ?>><?php echo ($v[OS]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='ScripLocation' class="am-u-sm-2 am-form-label">ScripLocation</label>
                                        <div class="am-u-sm-8">
                                            <input type="text" class="am-form-field " id='ScripLocation'  name="ScripLocation" >
                                        </div>
                                        <br>
                                    </div>

                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='Enviroment' class="am-u-sm-2 am-form-label">Enviroment</label>
                                        <div class="am-u-sm-8">
                                            <input type="text" class="am-form-field " id='Enviroment'  name="Enviroment" >
                                        </div>
                                        <br>
                                    </div>

                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='ExpectedResults' class="am-u-sm-2 am-form-label">ExpectedResults</label>
                                        <div class="am-u-sm-8">
                                            <input type="text" class="am-form-field " id='ExpectedResults'  name="ExpectedResults" >
                                        </div>
                                        <br>
                                    </div>

                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='From' class="am-u-sm-2 am-form-label">From</label>
                                        <div class="am-u-sm-8" id="From" >
                                            <select data-am-selected placeholder="Choose From" name="From">
                                                <option value=""></option>
                                                <option value="a">Internal</option>
                                                <option value="b">Benchmark</option>
                                                <option value="a">Customer Case</option>
                                                <option value="a">Customer Issue</option>
                                            </select>
                                            <select data-am-selected placeholder="Choose Customer"  id="Customer" name="Customer">
                                                <option value=""></option>
                                                <?php if(is_array($customer_list)): foreach($customer_list as $key=>$v): ?><option value=<?php echo ($v[Name]); ?>><?php echo ($v[Name]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                        <br>
                                    </div>


                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='BugID' class="am-u-sm-2 am-form-label">BugID</label>
                                        <div class="am-u-sm-8">
                                            <input type="text" class="am-form-field " id='BugID' name="BugID">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="am-form-group am-form-horizontal am-form-error">
                                        <label for='Comments' class="am-u-sm-2 am-form-label">Comments</label>
                                        <div class="am-u-sm-8">
                                            <input type="text" class="am-form-field " id='Comments' name="Comments">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="am-btn-group  am-u-md-offset-5 ">
                                        <button class="am-btn am-btn-primary am-radius" type="submit">提交</button>
                                        <button class="am-btn am-btn-danger am-radius" type="button">重置</button>
                                    </div>
                                </form >
    </div>
</div>