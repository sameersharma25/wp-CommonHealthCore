<?php $health_data= health_care_get_options(); ?>
<style>
body{
font-family: <?php echo wp_kses_post($health_data['default_font_family']);?> !important ;
}
.btn,
.post-tags a{
border:1px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.btn:hover,
.post-tags a:hover{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
border:1px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.color{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}

.pics  .img-thumbnail{
 border: 5px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.news .date a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.news .category a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.news button {
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.news .owl-carousel .item  .overlay  a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
border:2px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.gallerys   .owl-carousel .item  .overlay  a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
border:2px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.clients .owl-theme .owl-controls .owl-page.active span,
.clients .owl-theme .owl-controls.clickable .owl-page:hover span{
background-color: <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.appoinment{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.footer .widget-footer li a:hover::before,
.sidebar-widget li a:hover::before,
.footer .widget-footer a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.footer-bottom a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.sidebar-widget .line{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.sidebar-widget .nav a:focus,
.sidebar-widget .nav a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.sidebar-widget .img-thumbnail .overlay a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
border:2px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.rightside a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.bg{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.bg:hover{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.rightside .right-widget .img-thumbnail  .overlay a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
border:2px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.space .pagination a:hover{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.masanary a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.blogs .post  .owl-theme .owl-controls .owl-buttons div{
background-color : <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.service-icon a{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.services .service  a{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.services .service a .icon{
border:2px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.services .service a:hover .icon{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.service4 .col-xs-3 .icon{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.services .service4  a{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.services .service4 a .icon{
border:2px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.services .service4 a:hover .icon{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.carousel-indicators li{
border: 1px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.carousel-indicators .active{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.sidebar-widget .tagcloud a{
border: 1px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.widget-footer .tagcloud a:hover,
.sidebar-widget .tagcloud a:hover{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
border:1px solid <?php echo wp_kses_post($health_data['theme_color']);?> !important ;
color:#fff !important;
}
.news .owl-theme .owl-controls .owl-buttons div {
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.news .overlay{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.gallerys .overlay {
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}
.feedback form .btn,
.text .link,
.carousel-caption .btn,
.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}	
.carousel-caption{
border-left-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;
}	
.news .owl-theme .owl-controls .owl-page.active span,
 .news .owl-theme .owl-controls.clickable .owl-page:hover span	{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ; 
 }
.footer .widget-footer caption,
.sidebar .sidebar-widget caption{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ; 
}
.blogs .rightside .line{
border-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ; 
 }
.rightside .post-area .img-thumbnail .overlay{
 background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  
}
.overlay:hover{
 opacity:0.6 !important ; 
 }
 .footer .widget-footer li a:hover,
.sidebar-widget li a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  
}
/* MENU CSS */ 
.navbar-collapse .navbar-nav > .active > a,
 .navbar-collapse .navbar-nav > .active > a:focus,
 .navbar-collapse  .navbar-nav > .active > a:hover {
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ; 
}
.navbar-collapse .navbar-nav > li > a:focus, .navbar-collapse .navbar-nav > li > a:hover{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ; 
}
.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover{
background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  
}
.dropdown-menu > li > a:hover{
 background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  
}
.nav .open > a, .nav .open > a:focus, .nav .open > a:hover{
background-color:#fff !important;
 color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  
}
.dropdown-menu  .open > a, .dropdown-menu  .open > a:focus, .dropdown-menu  .open > a:hover{
 background-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  
color:#fff !important;
}
/* MENU CSS */ 

.comment .comment-reply-link{
color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  	
}
.comment .avatar{
border-color:<?php echo wp_kses_post($health_data['theme_color']);?> !important ;  	
}
.btn, .post-tags a:hover{
color:#fff !important;
}
.logo a{
color:<?php echo wp_kses_post($health_data['title_font_color']);?> !important ;
}
.post_title{
color:<?php echo wp_kses_post($health_data['post_title_font_color']);?> !important ;
}
.carousel-caption > p{
color:<?php echo wp_kses_post($health_data['slider_description_font_color']);?> !important ;
}

</style>