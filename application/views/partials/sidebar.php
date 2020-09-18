    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?php echo site_url('home'); ?>"> <img src="<?php echo base_url(); ?>assets/img/LOGOSR.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('home'); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('c_user/product'); ?>"> shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('c_user/custom_order'); ?>"> Custom Order</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       profile
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <?php if($this->session->userdata('logged_in') == TRUE){
                                            ?>
                                            <a class="dropdown-item" href="<?php echo site_url('c_user/profile'); ?>"> <?php echo $this->session->userdata('name');?></a>
                                            <a class="dropdown-item" href="<?php echo site_url('login/logout');?>">logout</a>
                                            <?php
                                        }else{
                                            ?>
                                            <a class="dropdown-item" href="<?php echo site_url('login');?>">login</a>
                                            <?php
                                        }
                                        
                                        
                                        ?>

                                        
                                    </div>
                                </li>
                                
                                
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <a href="<?php echo site_url('c_user/keranjang'); ?>"><i class="fas fa-cart-plus"></i></a>
                            
                                <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
    
                                    </div>
                                </div> -->
                                
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->
