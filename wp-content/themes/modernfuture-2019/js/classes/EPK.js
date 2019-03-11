import $ from 'jquery';
import Masonry from 'masonry-layout';

let	EPK = {
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
		EPK.masonryData.forEach(EPK._setupMasonry);
		if( EPK.heroContent.length > 0 ){
			$(window).on('scroll load', EPK._fadeHeroContent);
			EPK.heroContent.on('click', EPK._heroContentClickHandler);
		}
		$(window).on('scroll resize load', EPK._handleFades);
	},
	_heroContentClickHandler : function(){
		$('html, body').animate({
			scrollTop : $(window).height(),
		}, 600);
	},
	_handleFades : function(){
		for( let i = 0; i < EPK.fadeEls.length; i++ ){
			if( $(window).scrollTop() + $(window).height() > $(EPK.fadeEls[i]).offset().top + $(window).height() * 0.05 && i !== EPK.fadeEls.length - 1 ){
				$(EPK.fadeEls[i]).removeClass('fade-up');
			}
			else if( $(window).scrollTop() + $(window).height() > $(EPK.fadeEls[i]).offset().top && i == EPK.fadeEls.length - 1 ){
				$(EPK.fadeEls[i]).removeClass('fade-up');
			}
		}
	},
	_fadeHeroContent : function(){
		EPK.heroContent.css('opacity', EPK._map(
			$(window).scrollTop(), 0, EPK.hero.height() * 0.75, 1, 0
		));
	},
	_map : function(n,i,o,r,t){return i>o?i>n?(n-i)*(t-r)/(o-i)+r:r:o>i?o>n?(n-i)*(t-r)/(o-i)+r:t:void 0;},
	_setupMasonry : function(el, index){
		document.querySelectorAll(el.grid).forEach(function(grid, index){
			new Masonry(grid, {
				itemSelector : el.gridItem,
			});
		});
	},
};

EPK._init();

export default EPK;