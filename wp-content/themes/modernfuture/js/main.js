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
			onLeave : function(index, nextIndex, direction){
				if(direction == 'down' && nextIndex == 1){
					$('.fp-scrollable').slimScroll({ scrollTo: '0px' });	
				}
				if(direction == 'up' && nextIndex == 1){
					$('.fp-scrollable').slimScroll({ scrollTo: $('.fp-scrollable').height() });	
				}
			},
		});		

		$(window).on('load', function(){
			$('.grid').masonry({
			  itemSelector: '.grid-item',
			  columnWidth: 360
			});
		});

		var app = {
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
						if(text.indexOf(' @') > -1 || text.indexOf(' #') > -1){
							var matches = text.match(/([@#])\w+/g);
							for(var k = 0; k < matches.length; k++){
								text = text.splice(text.search(matches[k]), matches[k].length, '<a class="instagramSection-photo-caption-link" href="http://instagram.com/' + matches[k] + '">' + matches[k] + '</a>')
							}
							app.instagramSection.captions[i].innerHTML = text;
						}
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

