(function($){

	     
    $.fn.rating = function(options) {
    var self = this;
  
    var settings = $.extend({
    // These are the defaults.
    color: "#556b2f",
    max_stars : 5 ,
    clearSelected : function()
    {
       $('.plugin-rating i').each(function(){
            $(this).addClass('fa-star-o').removeClass('fa-star');
        });
    },
    setRating : function()
     {
        if(self.val())
        {
            var position = parseInt(self.val())-1;
            //alert(position);
            for(var i=0;i<=position;i++)
            {
                $(`.plugin-rating i:eq(${i})`).addClass('fa-star').removeClass('fa-star-o');
            }
        }   
     }

    }, options );
    var ratingHtml =
   `<div class="plugin-rating rating">
   <i class="fa fa-star-o" aria-hidden="true"></i>
   <i class="fa fa-star-o" aria-hidden="true"></i>
   <i class="fa fa-star-o" aria-hidden="true"></i>
   <i class="fa fa-star-o" aria-hidden="true"></i>
   <i class="fa fa-star-o" aria-hidden="true"></i>
   </div>`;
        
        

        self.filter('input').each(function(){
            $(self).after(ratingHtml);
            $(self).hide();
        });
        
        settings.setRating(); 

        $(document).on('click','.plugin-rating i',function(){
        	var position = $(".plugin-rating i").index(this);
        	//set rating       	
        	          
        	self.val(position+1); 
        	settings.setRating();    	
        	
        });

        $(document).on('mouseenter','.plugin-rating i',function(){
        	var position = $(".plugin-rating i").index(this);
        	//first clear all selected stars
        	settings.clearSelected();
            for(var i=0;i<=position;i++)
        	{
        		$(`.plugin-rating i:eq(${i})`).addClass('fa-star').removeClass('fa-star-o');
        	}        	
        	
        });

        $(document).on('mouseout','.plugin-rating i',function(){
        	settings.clearSelected();
        	settings.setRating();
        });
        //this.append('asdf');
        return self;
    };
}(jQuery));

(function( $ ) {
 
    $.fn.showLinkLocation = function() {
 
        this.filter( "a" ).each(function() {
            var link = $( this );
            link.append( " (" + link.attr( "href" ) + ")" );
        });
 
        return this;
 
    };
 
}( jQuery ));