
<!-- footer-area-start -->
     
<footer>
        <div class="footer-area s-overfellow black-bg pt-120 pb-100">
            <div class="shape-left-footer">
                <img src="assets/img/footer/shape.png" alt="shape">
            </div>
            <div class="footer-fly">
                <img src="assets/img/footer/fly.png" alt="fly">
            </div>
            <div class="container">
                <div class="row position-r">
                    <div class="col-lg-4 col-md-6 mb-20 wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".3s">
                        <div class="footer-widget">
                            <div class="f-title">
                                <h4>About Company</h4>
                                <p>
                                    Onec dictum mollis aliquam integer at odio et massa blandit
                                    dictum nec sed ex lorem ipsum dolor sit the amet.
                                </p>
                            </div>
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="#"><img src="assets/img/team-member/fb.svg" alt="facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/img/team-member/x.svg" alt="twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/img/team-member/threads.svg" alt="threads"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/img/team-member/insta.svg" alt="instagram"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-20 wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".3s">
                        <div class="footer-widget mr-ft">
                            <div class="f-title">
                                <h4>Our Services</h4>
                                <ul>
                                    <li><a href="services">Air Frieght</a></li>
                                    <li><a href="services">Sea Frieght</a></li>
                                    <li><a href="services">Road Frieght</a></li>
                                    <li><a href="services">Rail Frieght</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-20 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s">
                        <div class="footer-widget">
                            <div class="f-title">
                                <h4>Quicks Links</h4>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="about">About us</a></li>
                                    <li><a href="services">Services</a></li>
                                    <li><a href="login">Login</a></li>
                                    <li><a href="contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-20 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
                        <div class="footer-widget">
                            <div class="f-title">
                                <h4>Gallery</h4>
                                 <ul>
                                <li>
                                    <img src="assets/img/header/pin.svg" alt="pin">
                                    <span style="color: white;">3F, 227-1 Sinseon-ro, Nam-gu, Busan,
                                    Suite L78530</span>
                                </li>
                                <li>
                                    <img src="assets/img/header/call.svg" alt="mail">
                                    <a href="tel:+1(814)529-7254">+1(814)529-7254</a>
                                </li>
                                <li><img src="assets/img/header/mail.svg" alt="mail">
                                <a href="mailto:info@hermes-freight.com"> info@hermes-freight.com</a></li>
                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-botom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-bootom">
                            <div class="author">
                                <span>2024 © All Rights Reserved, Hermes Freight</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <!-- JS here -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/headroom.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/mobile-menu.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="../assets/plugins/toastr/toastr.min.js"></script>


    <script>
        window._conf = function($msg='',$func='',$params = []){
	     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
	     $('#confirm_modal .modal-body').html($msg)
	     $('#confirm_modal').modal('show')
	  }
	   window.alert_toast= function($msg = 'TEST',$bg = 'success' ,$pos=''){
	   	 var Toast = Swal.mixin({
	      toast: true,
	      position: $pos || 'top-end',
	      showConfirmButton: false,
	      timer: 5000
	    });
	      Toast.fire({
	        icon: $bg,
	        title: $msg
	      })
	  }
    </script>
</body>


</html>