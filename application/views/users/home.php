<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Users</h2>
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
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php 
                    // echo '<pre>';
                    // print_r($user_info);
                    // exit;
                    foreach($user_info as $key=> $category){?>
                    <tr>
                        <td><?php echo ($key+1);?></td>
                        <td class="center"><?php echo $category['name'];?></td>
                        <td class="center"><?php echo $category['email'];?></td>
                        <td class="center">
                        <?php echo $category['password'];?>
                        </td>
                        <td class="center">
                        <?php echo $category['type'];?>
                        </td>
                        <td class="center">
                            
                            <a class="btn btn-info" href="<?php echo base_url();?>edituser/<?php echo $category['id'];?>" title="edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="<?php echo base_url();?>deleteuser/<?php echo $category['id'];?>" onclick="return check_delete();" title="delete">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>