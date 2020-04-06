$(document).ready(function() {

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    $('#downloadCatalogue').click(function() {
        $('#downloadCatalogueModal').modal('show');
    });

    $('#downloadCompro').click(function() {
        $('#downloadComproModal').modal('show');
    });
    $('.switch-contract-navbar-top').click(function() {
        window.location.href = 'https://contract.vania.id';
    });

    $('.switch-retail-navbar-top').click(function() {
        window.location.href = 'https://retail.vania.id';
    });



    $(window).on('load', function() {
        //$('#downloadCatalogueModal').modal('show');
        //$('#ModalCompro').modal('show');
        var modal = getCookie("modal");
        if (modal === "true") {
            $("#popUpModalOn").hide();
        } else {
            setTimeout(() => {
                $('#popUpModalOn').modal('show');
            }, 100);
            var cname = "modal";
            var cvalue = "true";
            var d = new Date();
            d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
    });

    $("body").append(`
  <div class="modal fade" id="downloadCatalogueModal" tabindex="-1" role="dialog" aria-labelledby="downloadCatalogueModalLabel" aria-hidden="false">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body background-yo">
            <div class="row">
              <div class="col-md-12">
                <div class="modal-title">
                    Download PDF
                </div>
                <form id="form-catalogue" action="/">
                <div class="modal-sub-title">
                  FILENAME: Placeholder.pdf
                  <p style="font-size: 14px;">we will send the pdf file you want directly to your email. Please enter the correct email address in the fields below.</p>
                  <input name="catalogue_name" id="catalogue_name"  class="inside-form-catalogue-input" type="text" placeholder="Enter your name"/>
                  <input name="catalogue_phone"  id ="catalogue_phone" class="inside-form-catalogue-input" type="text" placeholder="Enter your phone number"/>
                  <input name="catalogue_email" id="catalogue_email" class="inside-form-catalogue-input" type="email" placeholder="Enter your email address" />
                  <button type="submit" onclick="myFunctionCata()" class="inside-form-catalogue-input-button" id="formCatalogueSubmit">SUBMIT</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="modal fade" id="downloadComproModal" tabindex="-1" role="dialog" aria-labelledby="downloadComproModalLabel" aria-hidden="false">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body background-yo">
            <div class="row">
              <div class="col-md-12">
                <div class="modal-title">
                    Download PDF
                </div>
                <form id="form-compro" action="/">
                <div class="modal-sub-title">
                  FILENAME: Company Profile.pdf
                  <p style="font-size: 14px;">we will send the pdf file you want directly to your email. Please enter the correct email address in the fields below.</p>
                  <input name="compro_name" id="compro_name"  class="inside-form-catalogue-input" type="text" placeholder="Enter your name"/>
                  <input name="compro_phone"  id ="compro_phone" class="inside-form-catalogue-input" type="text" placeholder="Enter your phone number"/>
                  <input name="compro_email" id="compro_email" class="inside-form-catalogue-input" type="email" placeholder="Enter your email address" />
                  <button type="submit" onclick="myFunctionCompro()" class="inside-form-catalogue-input-button" id="formComproSubmit">SUBMIT</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="popUpModalOn" tabindex="-1" role="dialog" aria-labelledby="popUpModalOnLabel" aria-hidden="false">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="modal-title">
                <span>
                  GET THE LATEST UPDATES
                </span><br/>
                <span>
                  & OUR PROMOTION!
                </span>
              </div>
              <div class="modal-sub-title">
                By subscribe through enter your email below
              </div>
            </div>
          </div>
            <form id="form-newsletter" action="/">
          <div class="modal-bottom-border">
            <div class="input-group">           
              <input type="email" id="subs_email" name="subs_email" class="form-control py-2 darkness" style="color:#fff; border-width: 2px; border-right-width: 2px;" placeholder="Enter your email here ....">             
              <button id="btn-subs" type="submit" onclick="myFunctionSUBS()" class="btn darkness custom-input-append" style="border: 1px solid #fff; border-left: 0;">
              <i class="fa fa-newspaper-o" aria-hidden="true"></i>
              </button>                 
            </div>
          </div>
            <label class="error" id="notife_subs"></label>
          </form>
    
        </div>
      </div>
    </div> 
    
    <div class="modal fade" id="ModalCompro" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content darkness">
              <div class="modal-body" style="background: none!important; color: #4d4d4d;">
                <h1 class="text-center dark">MESSAGE SENT</h1>
                <p class="text-center dark" style="padding-top: 1ch; padding-bottom: 2ch;">Thank you for request company profile. <br> Please check your email to get download our company profile.</p>
                <div class="text-center">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    
    <div class="modal fade" id="ModalCatalog" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content darkness">
              <div class="modal-body" style="background: none!important; color: #4d4d4d;">
                <h1 class="text-center dark">MESSAGE SENT</h1>
                <p class="text-center dark" style="padding-top: 1ch; padding-bottom: 2ch;">Thank you for request catalogue. <br> Please check your email to get download catalogue link. Or Please check your spam if you not get any email.</p>
                <div class="text-center">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
              </div>
            </div>
          </div>
        </div>
<div class="modal fade" id="ModalSubs" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content darkness">
              <div class="modal-body" style="background: none!important; color: #4d4d4d;">
                <h1 class="text-center dark">MESSAGE SENT</h1>
                <p class="text-center dark" style="padding-top: 1ch; padding-bottom: 2ch;">Thank you for subscribing to our website. <br> We will send you email about our product promo and interesting content.</p>
                <div class="text-center">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
              </div>
            </div>
          </div>
        </div>`);

  
    setTimeout(function() {
        if ($('#instaFeed-style1').length != 0) {
            var instaFeedStyle1 = new Instafeed({
                target: 'instaFeed-style1',
                get: 'user',
                userId: 1915919653,
                limit: '12',
                accessToken: '1915919653.159ad47.1799b34cd3534dafa0c21af2e37747a0',
                resolution: "low_resolution",
                error: {
                    template: '<div class="col-md-12 col-sm-12 col-xs-12"><span class=text-center>No Images Found</span></div>'
                },
                template: '<div class="swiper-slide swiper-slide col-md-3 instafeed-style1">\n\
                            <a class="insta-link" href="{{link}}" target="_blank"><img src="{{image}}" class="appr_slide thumb img-fluid mx-auto d-block insta-image" />\n\
                            <div class="insta-counts">\n\
                            <span><i class="fa fa-heart-o fa-2x"></i> <span class="count-number">{{likes}}</span></span><span>\n\
                            <i class="fa fa-comment-o"></i> \n\
                            <span class="count-number">{{comments}}</span></span></div></a>\n\
                            </div>',
                after: function() {

                    var swiperFourSlides = new Swiper('.swiper-four-slides', {
                        allowTouchMove: true,
                        slidesPerView: 4,
                        preventClicks: false,
                        pagination: {
                            el: '.swiper-pagination-four-slides',
                            clickable: true
                        },
                        autoplay: {
                            delay: 3000
                        },
                        keyboard: {
                            enabled: true
                        },
                        navigation: {
                            nextEl: '.clientnext',
                            prevEl: '.clientprev'
                        },
                        breakpoints: {
                            1199: {
                                slidesPerView: 3
                            },
                            991: {
                                slidesPerView: 2
                            },
                            767: {
                                slidesPerView: 1
                            }
                        },
                        on: {
                            resize: function() {
                                swiperFourSlides.update();
                            }
                        }
                    });
                }
            });
            instaFeedStyle1.run();
        }
    }, 500);

    $("body").append(`
    <a href="https://wa.me/628111298787"  target="_blank">
      <i class="whatsapp"></i>
    </a>`);
    $("body").append(`
    <a href="https://www.tokopedia.com/vaniajakarta"  target="_blank">
      <i class="tokped"></i>
    </a>`);
         $("body").append(`
    <a href="https://shopee.co.id/ecommerce.vania"  target="_blank">
      <i class="shopee"></i>
    </a>`);

});