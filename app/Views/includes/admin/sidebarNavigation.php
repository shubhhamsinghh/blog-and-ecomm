<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    
                <?php if(session()->has('loggedUser') == true){?>
                    <li class="nav-title">Admin</li>

                    <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminEnquiry')?>" class="nav-link">
                            <i class="icon icon-speedometer"></i> Contact Enquiry
                        </a>                        
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminAbout')?>" class="nav-link">
                            <i class="icon icon-doc"></i> About Us
                        </a>                        
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminServices')?>" class="nav-link">
                            <i class="icon icon-badge"></i> Services
                        </a>                        
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="adminSEOServices" class="nav-link ">
                            <i class="icon icon-badge"></i> SEO Services
                        </a>                        
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminPlan')?>" class="nav-link ">
                            <i class="icon icon-paper-plane"></i> Pricing Plan
                        </a>                        
                    </li>

                    

                    <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminCategory')?>" class="nav-link">
                            <i class="icon icon-globe"></i> Categories
                        </a>                        
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminBlog')?>" class="nav-link ">
                            <i class="icon icon-layers"></i> Blog
                        </a>                        
                    </li>

                     <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminLink')?>" class="nav-link">
                            <i class="icon icon-link"></i> Social Link
                        </a>                        
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="<?=base_url('adminAddress')?>" class="nav-link">
                            <i class="icon icon-notebook"></i> Address
                        </a>                        
                    </li>

                  <?php }else{ ?>
                  <li class="nav-title">User</li>
                     <li class="nav-item">
                        <a href="<?=base_url('dashboard')?>" class="nav-link ">
                            <i class="icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
                   <?php } ?>
                   

                </ul>
            </nav>
        </div>