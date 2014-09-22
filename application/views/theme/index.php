<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Book Mart Online Store">
    <meta name="keywords" content="Book Mart Online Store">
    <meta name="author" content="Nivin CP">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($page_title) ? $page_title : SITE_TITLE; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oxygen:400,700">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <div class="top-header wrapper">
        <div class="container">
            <div class="top-header-links">
                <ul>
                    <li>
                        <?php if( $this->session->userdata('logged_in') ): ?>
                            Hi <?php echo $this->session->userdata('first_name'); ?>, welcome to Book-Mart!
                        <?php else: ?>
                            Welcome to Book-Mart!
                        <?php endif; ?>
                    </li>
                    <?php if( $this->session->userdata('user_type') == 'admin' ): ?>
                        <li class="admin-menu">
                            <a href="#" class="admin-link">Manage</a>
                            <ul class="admin-links">
                                <li><?php echo anchor('products', 'Products'); ?></li>
                                <li><?php echo anchor('products/create', 'New Product'); ?></li>
                                <li><?php echo anchor('categories', 'Categories'); ?></li>
                                <li><?php echo anchor('orders', 'Orders'); ?></li>
                                <li><?php echo anchor('users', 'Users'); ?></li>
                                <li><?php echo anchor('pages', 'Pages'); ?></li>
                                <li><?php echo anchor('pages/home', 'Home'); ?></li>
                                <li class="last"><?php echo anchor('settings', 'Settings'); ?></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        <?php if( $this->session->userdata('logged_in') ): ?>
                            <?php echo anchor('dashboard', 'Dashboard'); ?> / 
                            <?php echo anchor('logout', 'Logout'); ?>
                        <?php else: ?>
                            <?php echo anchor('register', 'Register'); ?> / 
                            <?php echo anchor('login', 'Login'); ?>
                        <?php endif; ?>
                    </li>
                    <li>
                        <a href="#">Bag - SGD 0.00</a>
                    </li>
                    <li>
                        <a href="#">Checkout</a>
                    </li>
                    <li class="currencies">
                        <a href="#" class="active-currency">SGD</a>
                        <ul class="dropdown">
                            <li><a href="#">USD</a></li>
                            <li class="last"><a href="#">INR</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <span class="clear"></span>
        </div>
    </div>
    <div class="logo-header wrapper">
        <div class="container">
            <div class="logo">
                <a href="<?php echo base_url(); ?>" title="<?php echo SITE_TITLE; ?>">
                    <img src="<?php echo base_url('images/logo.png'); ?>" alt="Book Mart">
                </a>
            </div>
            <div class="search">
                <form action="">
                    <input type="text" class="search-box"  name="query" placeholder="Search for anything here">
                    <button type="submit" class="search-btn">submit</button>
                </form>
            </div>
            <div class="social-links">
                <ul>
                    <li><a href="https://plus.google.com" class="google" title="Google">Google</a></li>
                    <li><a href="https://www.facebook.com/" class="fb" title="Facebook">Facebook</a></li>
                    <li><a href="https://twitter.com/" class="twitter" title="Twitter">Twitter</a></li>
                    <li><a href="https://www.youtube.com/" class="yt" title="YouTube">YouTube</a></li>
                </ul>
            </div>
            <span class="clear"></span>
        </div>
    </div>
    <div class="wrapper">
        <div class="container">
            <ul class="nav">
                <li <?php echo active_menu(''); ?>>
                    <?php echo anchor('/', 'Home'); ?>
                </li>
                <?php $top_menus = top_menu(); ?>
                <?php if($top_menus): ?>
                    <?php foreach ($top_menus as $top_menu): ?>
                        <li <?php echo active_menu($top_menu->slug); ?>>
                            <?php echo anchor('category/'.$top_menu->slug, $top_menu->name); ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="custom-views">
                <?php $this->load->view($page_name); ?>
            </div>
            <div class="footer-links">
                <div class="footer-headers">
                    <div class="col col-1">Deal<br>Mart</div>
                    <div class="col col-2">Customer<br>Service</div>
                    <div class="col col-3">Meet<br>Us On</div>
                    <div class="col col-4 payment">Payment</div>
                    <span class="clear"></span>
                </div>
                <div class="footer-menus">
                    <ul class="col col-1">
                        <li><?php echo anchor('/', 'Home'); ?></li>
                        <li><?php echo anchor('/about-us', 'About Us'); ?></li>
                        <li><?php echo anchor('/user-agreement', 'User Agreement'); ?></li>
                        <li><?php echo anchor('/privacy', 'Privacy'); ?></li>
                        <li><?php echo anchor('/contact-us', 'Contact Us'); ?></li>
                    </ul>
                    <ul class="col col-2 cx-service">
                        <li><?php echo anchor('/customer-service', 'Customer Service'); ?></li>
                        <li><?php echo anchor('/product-recalls', 'Product Recalls'); ?></li>
                        <li><?php echo anchor('/order-status-tracking', 'Order Status &amp; Tracking'); ?></li>
                        <li><?php echo anchor('/shipping-policy', 'Shipping Policy'); ?></li>
                        <li><?php echo anchor('/warranty', 'Warranty'); ?></li>
                        <li><?php echo anchor('/tips-advice', 'Tips &amp; Advice'); ?></li>
                    </ul>
                    <ul class="col col-3 social-media">
                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                        <li><a href="https://twitter.com/">Twitter</a></li>
                        <li><a href="https://www.youtube.com/">Youtube</a></li>
                        <li class="last"><a href="https://plus.google.com">Google +</a></li>
                    </ul>
                    <div class="col col-4">
                        <img src="<?php echo base_url('images/payment.png'); ?>">
                    </div>
                    <span class="clear"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer wrapper">
        <div class="container">
            All rights are reserved &copy; 2014 BOOK-MART
        </div>
    </div>
    <script src="<?php echo base_url('js/core.js'); ?>"></script>
</body>
</html>