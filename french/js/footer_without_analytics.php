           
            
           
           <footer class="page-section bg-gray-lighter footer pb-40">
                <div class="container">
                                       
                    <!-- Social Links -->
                    <div class="footer-social-links mb-40 mb-xs-60">
                        
                        <a rel="canonical" href="https://www.facebook.com/dgsmsproducts/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a rel="canonical" href="https://twitter.com/" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a rel="canonical" href="https://ca.linkedin.com/in/dgsms-ideabytes-inc-38b5b8121" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
                        
                        
                    </div>
                     
                    
                    <!-- End Social Links -->  
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
                       <div class="footer-made">
                            	&#9400; Images and text are copyright of Ideabytes® Inc.
                        </div>
                        <!-- End Copyright -->
                        
                        
                        
                    </div>
                    <!-- End Footer Text --> 
                     <!-- Top Link -->
                 <div class="local-scroll">
                     <a rel="canonical" href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                
                    
                 </div>
                
            </footer>
           
           
           
        
        </div>
        <!-- End Page Wrap -->
        
        
        <!-- JS 
   <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
             
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/gmap3.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>  -->    
		<script type="text/javascript" src="js/bootstrap.min.js"></script>   		
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68708438-1', 'auto');
  ga('send', 'pageview');

</script>
        
    </body>

</html>
<script>
var requestUri = window.location.href;
$(document).ready(function () {
  $(".nav li").removeClass("active");//this will remove the active class from  
                                     //previously active menu item 
 
  if(requestUri.indexOf("checklist") !== -1){
	  $('#checklist_menu').addClass('active');
  }else if(requestUri.indexOf("packaging") !== -1){
	  $('#packaging_menu').addClass('active');
  }else if((requestUri.indexOf("dgsms.php") !== -1) || (requestUri.indexOf("dgsds.php") !== -1) || (requestUri.indexOf("dgsos.php") !== -1) || (requestUri.indexOf("dgrma") !== -1)){
	  $('#products_menu').addClass('active');
  }else if((requestUri.indexOf("about") !== -1) || (requestUri.indexOf("membership") !== -1) || (requestUri.indexOf("white-papers") !== -1) || (requestUri.indexOf("what-is-saas") !== -1) || (requestUri.indexOf("what-is-saas") !== -1) || (requestUri.indexOf("licensing") !== -1) || (requestUri.indexOf("system-requirements") !== -1) || (requestUri.indexOf("privacy") !== -1) || (requestUri.indexOf("gallery") !== -1)){
	  $('#about_menu').addClass('active');
  }else if(requestUri.indexOf("testmonials") !== -1){
	  $('#testmonials_menu').addClass('active');
  }else if(requestUri.indexOf("contact") !== -1){
	  $('#contact_menu').addClass('active');
  }else{
	  $('#home_menu').addClass('active');
  }
});
</script>