;(function ( $, window, document, undefined ) {
	String.prototype.splice = function(start, delCount, newSubStr) {
        return this.slice(0, start) + newSubStr + this.slice(start + Math.abs(delCount));
    };
	$(document).ready(function(){
		var app = {
			menu : {
				toggleContainer : $('.menuToggleContainer'),
				toggle : $('.menuToggle'),
				container : $('.aside'),
				item : $('.menu-item'),
				_init : function(){
					app.menu.toggleContainer.click(app.menu._clickHandler);
					app.menu.item.click(app.menu._itemClickHandler);
					$(window).on('resize', app.menu._resizeHandler);
				},
				_itemClickHandler : function(){
					if($(window).width() < 1025){
						app.menu._closeMenu();
					}
				},
				_clickHandler : function(){
					if( app.menu.toggle.hasClass('fa-bars') ){
						app.menu._openMenu();
					}
					else{
						app.menu._closeMenu();	
					}
				},
				_openMenu : function(){
					app.menu.container.show();
					app.menu.toggle.removeClass('fa-bars');
					app.menu.toggle.addClass('fa-times');
				},
				_closeMenu : function(){
					app.menu.container.hide();
					app.menu.toggle.addClass('fa-bars');
					app.menu.toggle.removeClass('fa-times');
				},
				_resizeHandler : function(){
					if($(window).width() > 1024){
						app.menu.container.show();
					}
					else{
						app.menu._closeMenu();
					}
				},
			},
			instagramSection : {
				dates : $('.instagramSection-photo-date'),
				captions : $('.instagramSection-photo-caption'),
				videos : $('.instagramSection-photo-video'),
				_init : function(){
					app.instagramSection._cleanDates();
					app.instagramSection._parseCaption();
					app.instagramSection._initVideo();
					$('.fancybox').fancybox();
				},
				_cleanDates : function(){
					for(var i = 0; i < app.instagramSection.dates.length; i++){
			        	app.instagramSection.dates[i].innerHTML = moment.unix(parseInt(app.instagramSection.dates[i].innerHTML)).format('M/D/YYYY h:mm A');
					}
				},
				_parseCaption : function(){
					for(var i = 0; i < app.instagramSection.captions.length; i++){
						var text = app.instagramSection.captions[i].innerHTML;
						
						// @ tags and # tags
						if(text.indexOf('@') > -1 || text.indexOf('#') > -1){
							// var matches = text.match(/([@#])\w\S+/g);
							var matches = text.match(/\B[@#]([a-z0-9_]{2,})(?![~@#$%^&*()=+_`\-\|\/\[\]\{\}]|[?.,]*\w)/ig);
							if(matches != null){
								for(var k = 0; k < matches.length; k++){
									// @ tags
									if(matches[k].charAt(0) == "@" && matches[k].indexOf('.') == -1){
										text = text.splice(text.search(matches[k]), matches[k].length, '<a class="instagramSection-photo-caption-link" target="blank" href="http://instagram.com/' + matches[k].split(/([@])+/)[2] + '">' + matches[k] + '</a>');	
									}
									// # tags
									if(matches[k].charAt(0) == "#"){
										text = text.splice(text.search(matches[k]), matches[k].length, '<a class="instagramSection-photo-caption-link" target="blank" href="http://instagram.com/explore/tags/' + matches[k].split(/([#])+/)[2] + '">' + matches[k] + '</a>');
									}
								}
							}
							app.instagramSection.captions[i].innerHTML = text;
						}

						// emails
						var matches = text.match(/([\w\.]+)@([\w\.]+)\.(\w+)/g);
						if(matches != null){
							for(var k = 0; k < matches.length; k++){	
								text = text.splice(text.search(matches[k]), matches[k].length, '<a class="instagramSection-photo-caption-link" href="mailto:' + matches[k] + '">' + matches[k] + '</a>');	
							}
						}
						app.instagramSection.captions[i].innerHTML = text;

						// urls
						var plaintext = $(app.instagramSection.captions[i])[0].innerText;
						var matches = plaintext.match(/((https?|ftp):\/\/|www\.)[^\s/$.?#].[^\s]*/ig);
						if(matches != null){
							for(var k = 0; k < matches.length; k++){	
								text = text.splice(text.search(matches[k]), matches[k].length, '<a class="instagramSection-photo-caption-link" target="blank" href="' + matches[k] + '">' + matches[k] + '</a>');	
							}
						}
						app.instagramSection.captions[i].innerHTML = text;
					}
				},
				_initVideo : function(){
					for(var i = 0; i < app.instagramSection.videos.length; i++){
						$(app.instagramSection.videos[i]).click(function(e){
							console.log($(e.target));
							if(e.target.paused){
								e.target.play();	
								$($(e.target).siblings('.instagramSection-photo-videoButton')).addClass('instagramSection-photo-videoButton-hidden');
							}
							else{
								e.target.pause();
								$($(e.target).siblings('.instagramSection-photo-videoButton')).removeClass('instagramSection-photo-videoButton-hidden');
							}
						});
					}
				},
			},
			_resizeHandler : $(window).on('resize load', function(){
				// if mobile
				if($(window).width() < 1025){
					$.fn.fullpage.setAllowScrolling(false);
					setTimeout(function(){
						$('.instagramSectionContainer, .instagramSectionContainer .fp-section, .instagramSectionContainer .fp-tableCell, .instagramSectionContainer .fp-scrollable, .instagramSectionContainer .fp-tableCell, .instagramSectionContainer .slimScrollDiv').css('height', '');
						$('.instagramSectionContainer .fp-section, .instagramSectionContainer .fp-slide, .instagramSectionContainer .fp-tableCell').css('height', 'auto !important');
					}, 500);
					
				}
				// if desktop
				else{
					$.fn.fullpage.setAllowScrolling(true);
				}
			}),
			_init : function(){
				app.instagramSection._init();
				app.menu._init();

				$('#fullpage').fullpage({
					scrollOverflow : true,
					continuousVertical : true,
					easingcss3 : 'ease-in-out',
					touchSensitivity : 10,
					anchors : ['instagramSection', 'videosSection', 'contactSection'],
					menu : $('#menu'),
					responsiveWidth : 1025,
					onLeave : function(index, nextIndex, direction){
						if(direction == 'down' && nextIndex == 1){
							$('.instagramSectionContainer .fp-scrollable').slimScroll({ scrollTo: '0px' });	
						}
						if(direction == 'up' && nextIndex == 1){
							$('.instagramSectionContainer .fp-scrollable').slimScroll({ scrollTo: $('.instagramSectionContainer .fp-scrollable')[0].scrollHeight });	
						}
						// if(direction == 'down' && nextIndex == 2){
						// 	$('.videosSectionContainer .fp-scrollable').slimScroll({ scrollTo: '0px' });	
						// }
						// if(direction == 'up' && nextIndex == 2){
						// 	$('.videosSectionContainer .fp-scrollable').slimScroll({ scrollTo: $('.videosSectionContainer .fp-scrollable')[0].scrollHeight });	
						// }
					},
				});		
				if( $('.menu-item').hasClass('active') ){
					$('.fp-scrollable').slimScroll({ scrollTo: '0px' });
				}
				$(window).on('load', function(){
					$('.grid').masonry({
					  itemSelector: '.grid-item',
					  columnWidth: 360,
					  fitWidth: true,
					});
				});
			},
		}
		app._init();

	});

})( jQuery, window, document );

