<style>
#sidebar {
    min-width: 280px;
    max-width: 280px;
    background-color: #15283c;
    color: #fff;
    transition: all 0.3s;
    position: relative;
    z-index: 11;
    box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.4);
    float: left;
    width: 100%;
    background-image: url('images/layout_img/pattern_h.png');
    position: fixed;
    height: 100%;
    overflow: auto;
}
p {
    color: #58718a;
    font-size: 14px;
    line-height: 21px;
}
#sidebar ul li a {
    padding: 15px 25px;
    display: block;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
}
</style>
<body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><?php echo $this->Html->image('logo/logo_icon.png',['class'=>'logo_icon img-responsive']) ?></a>
                     </div>
                  </div>
                  
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><?php echo $this->Html->image('layout_img/user_img.jpg',['class'=>'img-responsive']) ?></div>
                        <div class="user_info">
                           <h6>John David</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="/admin/users/admin" ><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        
                     </li>
                     <li><a href="/insurance-companies/index"><i class="fa fa-clock-o orange_color"></i> <span>Insurance Companies</span></a></li>
                    
                     <li><a href="/insurance-policies/index"><i class="fa fa-table purple_color2"></i> <span>Insurance Policy</span></a></li>
                   
                     <li><a href="/admin/users/"><i class="fa fa-briefcase blue1_color"></i> <span>Users</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><?php echo $this->Html->image('logo/logo.png') ?></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Html->image('layout_img/user_img.jpg',['class'=>'img-responsive rounded-circle']) ?><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="/admin/users/logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
             