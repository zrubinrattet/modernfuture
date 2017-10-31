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
			epk : {
				masonryData : [
					{
						grid : '.epk-pqprojects-grid-item-quotescontainer-quotes', 
						gridItem : '.epk-pqprojects-grid-item-quotescontainer-quotes-quote'
					},
				],
				heroContent : $('.epk-hero-content'),
				hero : $('.epk-hero'),
				fadeEls : $('.fade'),
				_init : function(){
					app.epk.masonryData.forEach(app.epk._setupMasonry);
					if( app.epk.heroContent.length > 0 ){
						$(window).on('scroll load', app.epk._fadeHeroContent);
						app.epk.heroContent.on('click', app.epk._heroContentClickHandler);
					}
					$(window).on('scroll resize load', app.epk._handleFades);
				},
				_heroContentClickHandler : function(){
					$('html, body').animate({
						scrollTop : $(window).height(),
					}, 600);
				},
				_handleFades : function(){
					for( var i = 0; i < app.epk.fadeEls.length; i++ ){
						if( $(window).scrollTop() + $(window).height() > $(app.epk.fadeEls[i]).offset().top + $(window).height() * 0.05 && i !== app.epk.fadeEls.length - 1 ){
							$(app.epk.fadeEls[i]).removeClass('fade-up');
						}
						else if( $(window).scrollTop() + $(window).height() > $(app.epk.fadeEls[i]).offset().top && i == app.epk.fadeEls.length - 1 ){
							$(app.epk.fadeEls[i]).removeClass('fade-up');
						}
					}
				},
				_fadeHeroContent : function(){
					app.epk.heroContent.css('opacity', app.epk._map(
						$(window).scrollTop(), 0, app.epk.hero.height() * 0.75, 1, 0
					));
				},
				_map : function(n,i,o,r,t){return i>o?i>n?(n-i)*(t-r)/(o-i)+r:r:o>i?o>n?(n-i)*(t-r)/(o-i)+r:t:void 0;},
				_setupMasonry : function(el, index){
					var grids = document.querySelectorAll(el.grid);
					grids.forEach(function(grid, index){
						new Masonry(grid, {
							itemSelector : el.gridItem,
						});
					});
				},
			},
			_resizeHandler : $(window).on('resize load', function(){
				// if mobile
				if($(window).width() < 1025){
					$.fn.fullpage.setAllowScrolling(false);
					setTimeout(function(){
						$('.instagramSectionContainer, .instagramSectionContainer .fp-section, .instagramSectionContainer .fp-tableCell, .instagramSectionContainer .fp-scrollable, .instagramSectionContainer .fp-tableCell, .instagramSectionContainer .slimScrollDiv').css('height', '');
						$('.instagramSectionContainer .fp-section, .instagramSectionContainer .fp-slide, .instagramSectionContainer .fp-tableCell').css('height', 'auto !important');
						$('.videosSectionContainer, .videosSectionContainer .fp-section, .videosSectionContainer .fp-tableCell, .videosSectionContainer .fp-scrollable, .videosSectionContainer .fp-tableCell, .videosSectionContainer .slimScrollDiv').css('height', '');
						$('.videosSectionContainer .fp-section, .videosSectionContainer .fp-slide, .videosSectionContainer .fp-tableCell').css('height', 'auto !important');
					}, 500);
					
				}
				// if desktop
				else{
					$.fn.fullpage.setAllowScrolling(true);
				}
			}),
			_orientationchangeHandler : $(window).on('orientationchange', function(){
				if(window.orientation != 0){
					$('.landscape').show();
					$('#fullpage').hide();
				}
				else{
					$('.landscape').hide();
					$('#fullpage').show();
				}
			}),
			_init : function(){
				app.instagramSection._init();
				app.menu._init();
				app.epk._init();

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
					},
					afterRender : function(){
						$('.slimScrollBar').css({
							'background' : 'rgb(255,255,255)',
							'opacity' : '0.2',
						});
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

