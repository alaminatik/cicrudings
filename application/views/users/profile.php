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
                            
                        <table class="table table-bordered custom_table_design"> 

                                            <tr> 
                                                <th class="custom_th">
                                                    Users's Name
                                                </th>
                                                <td> 
                                                    <?php echo $user_profile[0]['name']; ?>
                                                </td>

                                            </tr>
                                            <tr> 
                                                <th class="custom_th">
                                                    User's Email
                                                </th>
                                                <td> 
                                                    <?php echo $user_profile[0]['email']; ?>
                                                </td>

                                            </tr>
                                            <tr> 
                                                <th class="custom_th">
                                                    User Password
                                                </th>
                                                <td> 
                                                    <?php echo $user_profile[0]['password']; ?>
                                                </td>

                                            </tr>
                                            <tr> 
                                                <th class="custom_th">
                                                    User Type
                                                </th>
                                                <td> 
                                                    <?php 
                                                    
                                                    $type = $user_profile[0]['type']; 
                                                    

                                                     if(!empty($type)){
                                                        if ($type == 1 ){
                                                            echo 'Admin';
    
                                                        } elseif ($type == 2) {
                                                            echo 'Manager';
                                                        } else {
                                                            echo ' ';
                                                        }

                                                     } else {
                                                         echo ' ';
                                                     }
                                                    

                                                    

                                                    ?>
                                                </td>

                                            </tr>
                                            

                                        </table>        
        </div>
    </div><!--/span-->

</div>