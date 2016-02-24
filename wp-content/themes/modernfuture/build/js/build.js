;(function ( $, window, document, undefined ) {
	String.prototype.splice = function(start, delCount, newSubStr) {
        return this.slice(0, start) + newSubStr + this.slice(start + Math.abs(delCount));
    };
	$(document).ready(function(){

		$('#fullpage').fullpage({
			scrollOverflow : true,
			continuousVertical : true,
			easingcss3 : 'ease-in-out',
			touchSensitivity : 10,
			anchors : ['instagramSection', 'showsSection', 'contactSection'],
			menu : $('#menu'),
			onLeave : function(index, nextIndex, direction){
				if(direction == 'down' && nextIndex == 1){
					$('.fp-scrollable').slimScroll({ scrollTo: '0px' });	
				}
				if(direction == 'up' && nextIndex == 1){
					$('.fp-scrollable').slimScroll({ scrollTo: $('.fp-scrollable')[0].scrollHeight });	
				}
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

		var app = {
			menu : {
				_init : function(){

				},
			},
			instagramSection : {
				dates : $('.instagramSection-photo-date'),
				captions : $('.instagramSection-photo-caption'),
				_init : function(){
					app.instagramSection._cleanDates();
					app.instagramSection._parseCaption();
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
							var matches = text.match(/\B[@#]([a-z0-9_!]{2,})(?![~!@#$%^&*()=+_`\-\|\/'\[\]\{\}]|[?.,]*\w)/ig);
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
			},
			_init : function(){
				app.instagramSection._init();
			},
		}
		app._init();

	});

})( jQuery, window, document );

