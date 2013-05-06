/*
 * fadeSlideShow
 * v.1.0.1
 *
 * Copyright (c) 2010 Pascal Bajorat (http://www.pascal-bajorat.com)
 * Dual licensed under the MIT (below)
 * and GPL (http://www.gnu.org/licenses/gpl.txt) licenses.
 *
 *
 * http://www.pascal-bajorat.com

MIT License

Copyright (c) 2010 Pascal Bajorat

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

 */

jQuery.fn.fadeSlideShow = function(options) {
	return this.each(function(){
		settings = jQuery.extend({
     		width: 800, // default width of the slideshow
     		height: 600, // default height of the slideshow
			speed: 'slow', // default animation transition speed
			interval: 8000 // default interval between image change
	 	}, options);
		
		// set style for wrapper element
		jQuery(this).css({
			width: settings.width,
			height: settings.height,
			position: 'relative',
			overflow: 'hidden'
		});
		
		// set styles for child element
		jQuery('> *',this).css({
			position: 'absolute',
			width: settings.width,
			height: settings.height
		});
		
		// count number of slides
		Slides = jQuery('> *', this).length;
		Slides = Slides - 1;
		ActSlide = Slides;
		
		jQslide = jQuery('> *', this);
		
		intval = setInterval(function(){
			jQslide.eq(ActSlide).fadeOut(settings.speed);
			if(ActSlide <= 0){
				jQslide.fadeIn(settings.speed);
				ActSlide = Slides;
			}else{
				ActSlide = ActSlide - 1;	
			}
		}, settings.interval);
	});
};

jQuery.log = function(message) {
  if(window.console) {
     console.debug(message);
  } else {
     alert(message);
  }
};

