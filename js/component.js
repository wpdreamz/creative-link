jQuery(document).ready(function(){

	jQuery('.creative_link .cl-effect-1 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-2 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-2 a').hover(function(){
		jQuery(this).parent().css('background-color',jQuery(this).data('back-hover'));
	    }, function(){
	    jQuery(this).parent().css('background-color',jQuery(this).data('back-color'));
	});
	jQuery('.creative_link .cl-effect-3 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-4 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-5 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-6 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-7 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});

	jQuery('.creative_link .cl-effect-8 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-9 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-10 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link.cl-effect-13 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});

	jQuery('.creative_link.cl-effect-18 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-19 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-19 a').hover(function(){
		jQuery(this).find('span').css('background',jQuery(this).data('back-hover'));
	    }, function(){
	    jQuery(this).find('span').css('background',jQuery(this).data('back-color'));
	});
	jQuery('.creative_link .cl-effect-20 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});
	jQuery('.creative_link .cl-effect-20 a').hover(function(){
		jQuery(this).parent().css('background-color',jQuery(this).data('back-hover'));
	    }, function(){
	    jQuery(this).parent().css('background-color',jQuery(this).data('back-color'));
	});
	jQuery('.creative_link .cl-effect-21 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});

	jQuery('.creative_link').hover(function() {

      var shadowcolor = jQuery(this).find('.creative-link-13-link-bottom').data('color');
      jQuery( this ).find('.creative-link-13-link-bottom').css("display",'inline-block');
     	jQuery( this ).find('.creative-link-13-link-bottom').css("text-shadow","10px 0 "+shadowcolor+", -10px 0 "+shadowcolor);
      	jQuery( this ).find('.creative-link-13-link-bottom').css("color",shadowcolor);
      }, function(){
	    jQuery( this ).find('.creative-link-13-link-bottom').css("text-shadow","none");
      	jQuery( this ).find('.creative-link-13-link-bottom').css("display",'none');
     });

	jQuery('.creative_link .cl-effect-11 a, .creative_link .cl-effect-13 a, .creative_link .cl-effect-14 a, .creative_link .cl-effect-15 a, .creative_link .cl-effect-16 a').hover(function(){
	    jQuery(this).css("color", jQuery(this).data('texthover'));
	    }, function(){
	    jQuery(this).css("color", jQuery(this).data('textcolor'));
	});

	// jQuery('.creative_link.cl-effect-2 a').hover(function(){
	// 	console.log(jQuery(this));
	//     jQuery(this).find('.style-2-back::before').css("background-color", jQuery(this).data('back-hover'));
	//     }, function(){
	//     jQuery(this).find('.style-2-back').css("background-color", jQuery(this).data('back-color'));	
	// });

});

