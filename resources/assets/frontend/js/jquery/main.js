// custom post
//<![CDATA[
(function($) {
//custome
var q = jQuery.noConflict();
q(document).ready(function () {
	function resizeBoxes()
	{
	    var h = 0;
	    q('div.view').each(function() 
	    {
	        var b = $(this);
	        if (h < b.height()) h = b.height();
	    });     
	    q('div.view').height(h);
	}   
// Optimalisation: Store the references outside the event handler:
    var $window = q(window),
        $pane = q('#pane1');
        //Smooth scrolling when click to nav
        //variable
    var sizeLarge = 1038,
    	sizeMedium = 668,
    	sizeSmall = 428;
    var home = document.getElementById('home');
        var transition = q('.transition-support'),
        	navbar  = q('.navbar'),
        	navbarSecondary  = q('.secondary-navbar'),
        	navbarPrimary  = q('.primary-navbar'),
        	primaryHeader  = q('.primary-header'),
        	secondaryHeader  = q('.secondary-header'),
        	iconMenu = q('.icon-menu'),
        	navbarHide = 'navbar-hide',
        	header = q('.header'),
        	navbarOverlay = q('.navbar-overlay'),
        	navbarDefault = q('.navbar-default'),
        	navbarLink = q('.navbar-link'),
        	navbarShow = 'navbar-show',
			body = q('body'),
			container = q('#container'), //container css class
			push = q('.push'), //css class to add pushy capability
			pushyLeft = 'pushy-left', //css class for left menu position
			pushOpen = 'push-open', //css class when menu is open (left position)
			pullHide = 'pull-hide', //css class when menu is open (right position)
			pageOverlay = q('.page-overlay'), //site overlay
			menuBtn = q('#navigation-button'), //css classes to toggle the menu
			menuBtnFocus = q('.menu-btn'), //css class to focus when menu is closed w/ esc key
			menuLinkFocus = q(navbar.data('focus')), //focus on link when menu is open
			menuSpeed = 200, //jQuery fallback menu speed
			menuWidth = navbar.width() + 'px', //jQuery fallback menu width
			submenuClass = '.pushy-submenu',
			submenuOpenClass = 'pushy-submenu-open',
			submenuClosedClass = 'pushy-submenu-closed',
			submenu = q(submenuClass);
	var pathname = window.location.hash; // Returns path only
	var cssTransforms3d = (function csstransforms3d(){
		var el = document.createElement('p'),
		supported = false,
		transforms = {
		    'webkitTransform':'-webkit-transform',
		    'OTransform':'-o-transform',
		    'msTransform':'-ms-transform',
		    'MozTransform':'-moz-transform',
		    'transform':'transform'
		};

		if(document.body !== null) {
			// Add it to the body to get the computed style
			document.body.insertBefore(el, null);

			for(var t in transforms){
			    if( el.style[t] !== undefined ){
			        el.style[t] = 'translate3d(1px,1px,1px)';
			        supported = window.getComputedStyle(el).getPropertyValue(transforms[t]);
			    }
			}

			document.body.removeChild(el);

			return (supported !== undefined && supported.length > 0 && supported !== "none");
		}else{
			return false;
		}
	})();
    
    function closeContent(){
		if( navbar.hasClass(navbarShow) ){
			body.removeClass(pushOpen);
		}else{
			body.removeClass(pullHide);
		}
	}

    
	function openFallback(){
		//animate menu position based on CSS class
		if( navbar.hasClass(navbarHide) ){
			body.removeClass(pullHide).addClass(pushOpen);
			q(".navbar-hide").removeClass(navbarHide).addClass(navbarShow);
			navbar.animate({top: "0px"}, menuSpeed);
			q('.logo').css('fill','#1d1f1e');
			q(navbarPrimary).find(navbarLink).css('color','#1d1f1e');
			q('.navigation-show').find(iconMenu).css('color','#1d1f1e');
			//container.animate({top: menuWidth}, menuSpeed);
			//css class to add pushy capability
			push.animate({top: menuWidth}, menuSpeed);
		}else{
			body.addClass(pullHide).removeClass(pushOpen);
			navbar.animate({top: '0px'}, menuSpeed);
			//container.animate({top: menuWidth}, menuSpeed);
			push.animate({top: menuWidth}, menuSpeed);
			q('.page-overlay').animate('-webkit-transform','rotate(180deg)');
		}

		//focus on link in menu
		if(menuLinkFocus){
			menuLinkFocus.focus();
		}
	}
    function closeFallback(){
		//animate menu position based on CSS class
		if( navbar.hasClass(navbarShow) ){
			body.removeClass(pushOpen).addClass(pullHide);
			navbar.animate({top: "-10" + menuWidth}, menuSpeed);
			q('.navbar-show').removeClass(navbarShow).addClass(navbarHide);
			//container.animate({top: "0px"}, menuSpeed);
			//css class to add pushy capability
			push.animate({top: "0px"}, menuSpeed);
		}else{
			body.removeClass(pullHide).removeClass(pushOpen);
			navbar.animate({top: "" + menuWidth}, menuSpeed);
			//container.animate({top: "0px"}, menuSpeed);
			push.animate({top: "0px"}, menuSpeed);
		}
	}

        
    if( navbar.hasClass(navbarShow) ){
		body.toggleClass(pushOpen);
	}else{
		body.toggleClass(pullHide);
	}
	var opened = false;
	//toggle menu
	menuBtn.on('click', function(){
	setTimeout(function() {
		if (opened) {
			closeFallback();
			opened = false;
		} else {
			openFallback();
			opened = true;
		}
		},100);
	});
	
	//close menu when clicking site overlay
	q('.navbar-item').on('click', function(){
		setTimeout(function() {
		if (opened) {
			closeFallback();
			opened = false;
		}
		},100);
	});
	// Modal
	var formModal = q('.modal-auth'),
		formModalContact = q('.modal-contact'),
		formLogin = formModal.find('#form-signin'),
		formSignup = formModal.find('#form-signup'),
		formContact = formModalContact.find('#form-contact'),
		formForgotPassword = formModal.find('#form-resetpassword'),
		formModalTab = q('.modal-tab'),
		tabLogin = formModalTab.children('li').eq(0).children('a'),
		tabSignup = formModalTab.children('li').eq(1).children('a'),
		forgotPasswordLink = formLogin.find('.cd-form-bottom-message a'),
		backToLoginLink = formForgotPassword.find('.cd-form-bottom-message a'),
		mainNav = q('.site-content');

	//open modal
	mainNav.on('click', function(event){
		q(event.target).is(mainNav) && mainNav.children('ul').toggleClass('is-visible');
	});

	//open sign-up form
	mainNav.on('click', '.click-signup', signup_selected);
	//open login-form form
	mainNav.on('click', '.click-signin', login_selected);
	
	mainNav.on('click', '.click-contact', contact_selected);

	//close modal
	formModal.on('click', function(event){
		if( q(event.target).is(formModal) || q(event.target).is('.close-form') ) 		{
			formModal.removeClass('is-visible');
			q('.close-form').css('display','none');
		}			
	});
	formModalContact.on('click', function(event){
		if( q(event.target).is(formModalContact) || q(event.target).is('.close-form') ) 		{
			formModalContact.removeClass('is-visible');
			q('.close-form').css('display','none');
		}			
	});
	//close modal when clicking the esc keyboard button
	q(document).keyup(function(event){
    	if(event.which=='27'){
    		formModal.removeClass('is-visible');
    		formModalContact.removeClass('is-visible');
    		q('.close-form').css('display','none');
	    }
    });

	//switch from a tab to another
	formModalTab.on('click', function(event) {
		event.preventDefault();
		( q(event.target).is( tabLogin ) ) ? login_selected() : signup_selected();
	});

	//hide or show password
	q('.hide-password').on('click', function(){
		var togglePass= q(this),
			passwordField = togglePass.prev('input');
		
		( 'password' == passwordField.attr('type') ) ? passwordField.attr('type', 'text') : passwordField.attr('type', 'password');
		( 'Hide' == togglePass.text() ) ? togglePass.text('Show') : togglePass.text('Hide');
		//focus and move cursor to the end of input field
		passwordField.putCursorAtEnd();
	});

	//show forgot-password form 
	forgotPasswordLink.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});

	//back to login from the forgot-password form
	backToLoginLink.on('click', function(event){
		event.preventDefault();
		login_selected();
	});

	function login_selected(){
		mainNav.children('ul').removeClass('is-visible');
		formModal.addClass('is-visible');
		formLogin.addClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.removeClass('is-selected');
		tabLogin.addClass('selected');
		tabSignup.removeClass('selected');
		q('.close-form').css('display','block');
	}

	function signup_selected(){
		mainNav.children('ul').removeClass('is-visible');
		formModal.addClass('is-visible');
		formLogin.removeClass('is-selected');
		formSignup.addClass('is-selected');
		formForgotPassword.removeClass('is-selected');
		tabLogin.removeClass('selected');
		tabSignup.addClass('selected');
		q('.close-form').css('display','block');
	}
	
	function contact_selected(){
		mainNav.children('ul').removeClass('is-visible');
		formModalContact.addClass('is-visible');
		formContact.addClass('is-selected');
		q('.close-form').css('display','block');
	}

	function forgot_password_selected(){
		formLogin.removeClass('is-selected');
		formSignup.removeClass('is-selected');
		formForgotPassword.addClass('is-selected');
	}

	//REMOVE THIS - it's just to show error messages 
	formLogin.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		formLogin.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});
	formSignup.find('input[type="submit"]').on('click', function(event){
		event.preventDefault();
		formSignup.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});


	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if(!Modernizr.input.placeholder){
		q('[placeholder]').focus(function() {
			var input = q(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = q(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		q('[placeholder]').parents('form').submit(function() {
		  	q(this).find('[placeholder]').each(function() {
				var input = q(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	}



//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
    	// If this function exists...
    	if (this.setSelectionRange) {
      		// ... then use it (Doesn't work in IE)
      		// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
      		var len = q(this).val().length * 2;
      		this.focus();
      		this.setSelectionRange(len, len);
    	} else {
    		// ... otherwise replace the contents with itself
    		// (Doesn't work in Google Chrome)
      		q(this).val(q(this).val());
    	}
	});
};
	//scroll
	q('.primary-navbar > ul > li > a').click(function (e) {
        e.preventDefault();
        var curLink = q(this);
        var scrollPoint = q(curLink.attr('href')).position().top;
        q('body,html').animate({
            scrollTop: scrollPoint
        }, 500,'swing');
        var windowsize = $window.width();
        if (windowsize < sizeLarge) {
        closeFallback();
		opened = false;
        }
    })
    q(window).scroll(function () {
        onScrollHandle();
    });
	function onScrollHandle() {
                //Navbar shrink when scroll down
                q(".navbar-default").toggleClass("navbar-collapse", q(this).scrollTop() > 0);
                //Get current scroll position
                var currentScrollPos = q(document).scrollTop();
                //Iterate through all node
                q('.primary-navbar > ul > li > a').each(function () {
                    var curLink = q(this);
                    var refElem = q(curLink.attr('href'));
                    //Compare the value of current position and the every section position in each scroll
                    if (refElem.position().top <= currentScrollPos && refElem.position().top + refElem.height() > currentScrollPos) {
                        //Remove class active in all nav
                        q('#navbar > ul > li').removeClass("active");
                        //Add class active
                        curLink.parent().addClass("active");
                        if(curLink.parent().find('.actice')){
                        var
                        idActive = refElem.attr('id'),
                        hrefActive = q(this).attr('href'),
                        withoutHash = hrefActive.replace('#', ' | ');
                        q('.side-left').find('.side-panel-text').find('#side-transition-left').text(withoutHash).fadeIn(100);
                        //get height
					    /*
						var r = 0;
						q(hrefActive).each(function() {
						    q(this).height() > r && (r = q(this).height())
						}), q(".side-panel").css("top", r);
                        }
*/
                    }
                    else {
                        curLink.parent().removeClass("active");
                    }
                    
                }
                
            });
            }
	
	// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = q('header').outerHeight();

q(window).scroll(function(event){
    didScroll = true;
});
q(window).resize(function(event){
    didResize = true;
});

setInterval(function() {
        hasResized();
        didResize = false;
}, 100);
setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 100);
function hasResized() {
	var windowSize = $window.width();
	if(windowSize > sizeLarge) {
		body.removeClass('medium').removeClass('small').addClass('large');
		large = true;
	}else if(windowSize > sizeMedium) {
		body.removeClass('large').removeClass('small').addClass('medium');
		medium = true;
	}else {
		body.removeClass('large').removeClass('medium').addClass('small');	
		small = true;
	}
}

function hasScrolled() {
    var st = q(this).scrollTop();
    var windowSize = $window.width();
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    setTimeout(function() {
    if (lastScrollTop > Math.abs(q('#home').height() + q('#about').height()) && st > q('#home').height() + q('#about').height()) {
     	q('#home').find('.content-slide').css('position','relative');
    }else {
        q('#home').find('.content-slide').css('position','fixed');
    }
    },0);
    if(q('.header').hasClass('primary-header') && windowSize > sizeMedium ){
    	if (lastScrollTop > Math.abs(q('#home').height() + 50) && st > q('#home').height()) {
         q('.side-panel-text').css('color','#1d1f1e');
/* 	     q('.primary-header').find(navbarOverlay).css('background-color','rgba(255,255,255,1)'); */
	     q('.logo').css('fill','#1d1f1e');
		 q(navbarPrimary).find(navbarLink).css('color','#1d1f1e');
        }else{
		 q('.side-panel-text').css('color','rgba(255,255,255,1)');
	     /* q('.primary-header').find(navbarOverlay).css('background-color','rgba(255,255,255,0)'); */
	     q('.logo').css('fill','rgba(255,255,255,1)');
	     
	     q(navbarPrimary).find(navbarLink).css('color','rgba(255,255,255,1)');
        }
     }else{
	     q(navbarPrimary).find(navbarLink).css('color','#1d1f1e');
     }
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        q('.primary-header').removeClass('navbar-down').addClass('navbar-up');
    } else {
        // Scroll Up
        if(st + q(window).height() < q(document).height()) {
            q('.primary-header').removeClass('navbar-up').addClass('navbar-down');
        }
    }
    
    lastScrollTop = st;
}
        
	var e = q(this).scrollTop();
    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize < sizeLarge) {
            transition.find(".primary-navbar").removeClass("primary-navbar").addClass("secondary-navbar"),
        transition.find(".primary-header").removeClass("primary-header").addClass("secondary-header"),
        transition.find(".transition-navigation").removeClass("hide").addClass("show");
        body.toggleClass(pullHide);
		q('.navbar-up').removeClass('navbar-up').addClass('navbar-down');
        } 
        else {
	    transition.find(".secondary-navbar").removeClass("secondary-navbar").addClass("primary-navbar"),
        transition.find(".secondary-header").removeClass("secondary-header").addClass("primary-header"),
        transition.find(".transition-navigation").removeClass("show").addClass("hide");
        closeFallback();
		opened = false;
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    q(window).resize(checkWidth);
        	
	
	! function(e) {
    q.fn.visible = function(s) {
        var l = q(this),
            a = q(window),
            t = a.scrollTop(),
            o = t + a.height(),
            n = l.offset().top,
            i = n + l.height(),
            r = s === !0 ? i : n,
            d = s === !0 ? n : i;
        return o >= d && r >= t
    }
	}(jQuery);
	var L = q(window),
	    N = q(".scroll-to-reveal");
	N.each(function(s, l) {
	    var l = q(l);
	    l.visible(!0) && l.addClass("already-visible")
	}), L.scroll(function(s) {
	    N.each(function(s, l) {
	        var l = q(l);
	        l.visible(!0) && l.addClass("scroll-to-inner")
	    })
	});
	var L = q(window),
	    N = q(".scroll-to-reveal");
	N.each(function(s, l) {
	    var l = q(l);
	    l.visible(!0) && l.addClass("already-visible")
	}), L.scroll(function(s) {
	    N.each(function(s, l) {
	        var l = q(l);
	        l.visible(!0) && l.addClass("scroll-to-inner")
	    })
	});
	
	});
	
	q(window).on('load', function() { // makes sure the whole site is loaded 
	q('#loading').fadeOut(); // will first fade out the loading animation 
	q('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
	
	q('body').delay(350).css({'display':'block'});
	})
	
})(jQuery);
		//]]>