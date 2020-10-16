<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Users Profile</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h1><?php 
             $message=$this->session->userdata('message');
             if($message){
                 echo $message;
                 $this->session->unset_userdata('message');
             }
        
        ?>
        </h1>
        
        <a style='color:red;'><?php 
        // echo '<pre>';
        //             print_r($user_byid[0]['id']);
        //             exit;
        echo validation_errors(); ?></a>
                        <form class="form-horizontal" action="<?php echo base_url(); ?>updateuser" method="post">
                            <fieldset>

                                <div class="input-prepend" title="Username">
                                    <span class="add-on"><i class="halflings-icon user"></i></span>
                                    <input class="input-large span10" name="id" value='<?php echo $user_byid[0]['id']; ?>' id="username" type="hidden" placeholder="id"/>
                                    <input class="input-large span10" name="name" value='<?php echo $user_byid[0]['name']; ?>' id="username" type="text" placeholder="Name"/>
                                    <a style='color:red;'><?php //echo form_error('name'); ?></a>
                                    
                                </div>
                                
                                <div class="clearfix"></div>
                                <div class="input-prepend" title="Username">
                                    <span class="add-on"><i class="halflings-icon user"></i></span>
                                    <input class="input-large span10" name="email" value='<?php echo $user_byid[0]['email']; ?>' id="username" type="email" placeholder="Email"/>
                                    <?php //echo form_error('email'); ?>
                                </div>
                                
                                <div class="clearfix"></div>

                                <div class="input-prepend" title="Password">
                                    <span class="add-on"><i class="halflings-icon lock"></i></span>
                                    <input class="input-large span10" name="password" value='<?php echo $user_byid[0]['password']; ?>' id="password" type="password" placeholder="Password"/>
                                    <?php //echo form_error('password'); ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="input-prepend" >
                                    <span class="add-on"><i class="halflings-icon user"></i></span>
                                    <select id="selectError3" class="input-large span10" name="type">
                                        <option disabled="true" selected="">Type</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Manger</option>
                                    </select>
                                    <?php //echo form_error('type'); ?>
                                </div>

                                <!-- <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label> -->

                                <div class="button-login">	
                                    <button type="submit" name='user_register' class="btn btn-primary">update</button>
                                </div>
                                <div class="clearfix"></div>
                            </fieldset>
                        </form>            
        </div>
    </div><!--/span-->

</div>