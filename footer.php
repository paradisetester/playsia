<?php
/**
 * The footer template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
					<?php do_action( 'avada_after_main_content' ); ?>

				</div>  <!-- fusion-row -->
			</main>  <!-- #main -->
			<?php do_action( 'avada_after_main_container' ); ?>

			<?php global $social_icons; ?>

			<?php
			/**
			 * Get the correct page ID.
			 */
			$c_page_id = Avada()->fusion_library->get_page_id();
			?>

			<?php
			/**
			 * Only include the footer.
			 */
			?>
			<?php if ( ! is_page_template( 'blank.php' ) ) : ?>
				<?php $footer_parallax_class = ( 'footer_parallax_effect' === Avada()->settings->get( 'footer_special_effects' ) ) ? ' fusion-footer-parallax' : ''; ?>

				<div class="fusion-footer<?php echo esc_attr( $footer_parallax_class ); ?>">
					<?php get_template_part( 'templates/footer-content' ); ?>
				</div> <!-- fusion-footer -->
			<?php endif; // End is not blank page check. ?>

			<?php
			/**
			 * Add sliding bar.
			 */
			?>
			<?php if ( Avada()->settings->get( 'slidingbar_widgets' ) && ! is_page_template( 'blank.php' ) ) : ?>
				<?php get_template_part( 'sliding_bar' ); ?>
			<?php endif; ?>
		</div> <!-- wrapper -->

		<?php
		/**
		 * Check if boxed side header layout is used; if so close the #boxed-wrapper container.
		 */
		$page_bg_layout = ( $c_page_id ) ? get_post_meta( $c_page_id, 'pyre_page_bg_layout', true ) : 'default';
		?>
		<?php if ( ( ( 'Boxed' === Avada()->settings->get( 'layout' ) && 'default' === $page_bg_layout ) || 'boxed' === $page_bg_layout ) && 'Top' !== Avada()->settings->get( 'header_position' ) ) : ?>
			</div> <!-- #boxed-wrapper -->
		<?php endif; ?>
		<?php if ( ( ( 'Boxed' === Avada()->settings->get( 'layout' ) && 'default' === $page_bg_layout ) || 'boxed' === $page_bg_layout ) && 'framed' === Avada()->settings->get( 'scroll_offset' ) && 0 !== intval( Avada()->settings->get( 'margin_offset', 'top' ) ) ) : ?>
			<div class="fusion-top-frame"></div>
			<div class="fusion-bottom-frame"></div>
			<?php if ( 'None' !== Avada()->settings->get( 'boxed_modal_shadow' ) ) : ?>
				<div class="fusion-boxed-shadow"></div>
			<?php endif; ?>
		<?php endif; ?>
		<a class="fusion-one-page-text-link fusion-page-load-link"></a>
		    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php the_title();?></h5>
			
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
			
                <div class="modal-body">
               <p id="myModal-content"></p>
                </div>
        
            </div>
        </div>
    </div>
	  <!-- click Modal -->
  <div class="modal fade" id="clickModal" tabindex="-1">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Form</h4>
        </div>
        <div class="modal-body">
          <p>Sample Text</p>
        </div>
      
      </div>
      
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
        jQuery(document).ready(function($)
 {
	jQuery(document).on("change",".filter_date",function($)
 {          
          var publish_date =  jQuery(this).val();
          var post_type = 'event';
          var divClass = ".events-list1";
        cvf_load_all_posts(1,post_type,'',divClass,'',publish_date);
        
    });

jQuery(document).on("change","#event_select,#event_location_select",function($)
    { 	
      var cat =	jQuery('#event_select').val();
      var event_locations =	jQuery('#event_location_select').val();
      var post_type = 'event';
      var divClass = ".events-list1";
      cvf_load_all_posts(1,post_type,cat,divClass,'','',event_locations);

		 
		});

jQuery(document).on("change","#leagues_select,#location_select",function($)
 { 					var cats =	jQuery('#leagues_select').val();
					var loc_cat =	jQuery('#location_select').val();
					var post_types = 'isa_leagues';
					var divClasss = ".events-list2";
				cvf_load_all_posts(1,post_types,cats,divClasss,loc_cat);
		});
jQuery(document).on("change","#camps_clinics_select",function($)
 {          
          var camps_clinics_location =jQuery('#camps_clinics_select').val();
          var post_type = 'camps_and_clinics';
          var divClass = ".events-list2";
        cvf_load_all_posts(1,post_type,'',divClass,'','','',camps_clinics_location);
        
    });

		
		
            // This is required for AJAX to work on our page
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

            function cvf_load_all_posts(page,post_type,cat='',divClass,loc_cat='',publish_date='',event_locations='',camps_clinics_location='',){
                // Start the transition
                  console.log(camps_clinics_location);

                $(divClass).fadeIn().css('background','#ccc');
	             
                var data = {					
					category: cat,
					loc_cat: loc_cat,
					post_type: post_type,
          event_locations:event_locations,
					publish_date:publish_date,
          camps_clinics_location:camps_clinics_location,
                    page: page,
                    action: "demo-pagination-load-posts"
                };

                // Send the data
                $.post(ajaxurl, data, function(response) {                   
                    $(divClass).html(response);                  
                    $(divClass).css({'background':'none', 'transition':'all 1s ease-out'});
					
                });
            }

            
        }); 
 
	</script>	
<script>

    /* Widget Mode - WaiverForever Waiver Widget */

    (function(w, f, id, src, tid, sdk){

        if (w.getElementById(id)){ return; }

        var s, s0 = w.getElementsByTagName(f)[0], l = src + '?templateId=' + tid;

        if (sdk) l += '&sdkMode=yes';

        s = w.createElement(f); s.id = id; s.defer = 1; s.src = l;

        s0.parentNode.insertBefore(s, s0);

    }(document, 'script', 'wf-embed-waiver-script', 'https://cdn.waiverforever.com/qs3/ew.js?templateId=omgFjEqVtJ1598475208', 'omgFjEqVtJ1598475208', 0));

jQuery('.Sign-Waiver').click(function()
{
jQuery('.wf-embed-waiver-sign-btn-class').click();

});


    jQuery(function() {

      function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}
<?php 
    global $post;
   
?>

var regslug='<?php echo $post->post_name; ?>';
var mapname="";
//console.log(regslug);
  if(regslug=='testing')
          {
           mapname='world';
         }

  if(regslug=='north-american-region')
          {
           mapname='usa';

         }
         if(regslug=='caribbean-region')
          {
            jQuery('.caribbeanregion').click(function(e)
          {
              e.preventDefault();
           jQuery('.color_inbox:first-child').click();

           });
          }
      
         if(regslug=='european-region')
          {
             mapname='europe';
          }

        if(regslug=='africaaustralia-region')
          {
            jQuery('.africregion').click(function(e)
          {
              e.preventDefault();
           jQuery('.color_inbox:first-child').click();

           });

          }
          if(regslug=='asia-pacific-region')
          {
             mapname='asia';
          }

     

      jQuery('#world-map').JSMaps({
        map: mapname,
        mapFolder: 'https://playisa.com/wp-content/themes/Avada-Child-Theme/js/maps/',
        strokeWidth: 0.5,
        onStateClick : function(res) {
          var stateregion=res.name;
          stateregion = stateregion.trim();
          stateregion =convertToSlug(stateregion);
          var regslug='<?php echo $post->post_name; ?>';
          //console.log(regslug);
     

         if(regslug=='testing')
          {

          window.location = 'https://playisa.com/regionmaps/' + stateregion;
         }
         else{
           jQuery('.color_inbox:first-child').click();
         }




   }

      });

    });
    
jQuery(document).ready(function() {

   jQuery(".slidingDiv").hide();
    jQuery(".show_hide").show();

   jQuery('.show_hide').click(function() {
          
         //$(".slidingDiv").slideToggle();
        var isvisible = jQuery(this).next('.slidingDiv').is(':visible');
      jQuery('.slidingDiv').not( jQuery(this).next('.slidingDiv')).hide();
         if ( isvisible ) {
		
          jQuery(this).next('.slidingDiv').hide();
         } else{
           jQuery(this).next('.slidingDiv').show(); 
         }
    });

});

jQuery("#closeButton").click(function () {
    jQuery("#sheet").css("display", "none");
});
jQuery('input,textarea,phone').focus(function(){
   jQuery(this).data('placeholder',jQuery(this).attr('placeholder'))
          .attr('placeholder','');
}).blur(function(){
  jQuery(this).attr('placeholder',jQuery(this).data('placeholder'));
});


  
    jQuery(document).ready(function(){
       jQuery(".btn").click(function(){
		   var customfiled = $(this).attr('data-custom');
           
		   jQuery("#myModal-content").html(customfiled);
		   jQuery("#myModal").modal('show');
        });
    });
	 jQuery('.color_r').click(function(){
     jQuery('.region-worldmap').addClass('active_maps');
    jQuery('.region-worldmap').hide();

   jQuery('.region_image img').attr('src','https://playisa.com/wp-content/uploads/2020/12/'+jQuery(this).attr('data-img'))
});
	 jQuery('.map_Back_button').click(function(event){
       //event.preventDefault();
    jQuery('.region-worldmap').show();
    jQuery('.region_image img').hide(); 
   });


	 jQuery(document).ready(function(){
       jQuery(".lesson_form").click(function(){
		   jQuery("#clickModal").modal('show');
        });
    });
 jQuery(function() {
      jQuery( '.nav-link' ).on( 'click', function() {
          jQuery( this ).parent().find( 'a.Button--active' ).removeClass( 'Button--active' );
            jQuery( this ).addClass( 'Button--active' );
      });
});
 jQuery(function() {
    jQuery('.northamrica-box').hide();
    jQuery('.caribbean-box').hide();
     jQuery('.european-box').hide();
      jQuery('.africa-australia-box').hide();
       jQuery('.asia-pacific-box').hide();
     
 jQuery('.area_click,.color_r').click(function(){
	   //event.preventDefault();
	 jQuery('.map_container').addClass('active_map');
 jQuery('.region_imagee img').attr('src','https://playisa.com/wp-content/uploads/'+jQuery(this).attr('href'))
 });
	 jQuery('.map_Back_buttons').click(function(){
	 	 //event.preventDefault();
	 	    jQuery('.region_imagee img').hide(); 
		jQuery('.map_container').removeClass('active_map'); 
	 });
});


 //    jQuery('.northamrica-box').hide();
 //    jQuery('.caribbean-box').hide();
 //     jQuery('.european-box').hide();
 //      jQuery('.africa-australia-box').hide();
 //       jQuery('.asia-pacific-box').hide();
     
 // jQuery('.area_click,.color_r').click(function(event){
 //     event.preventDefault();
 //   jQuery('.map_container').addClass('active_map');
 // jQuery('.region_imagee img').attr('src','https://playisa.com/wp-content/uploads/'+jQuery(this).attr('href'))
 // });
 //   jQuery('.map_Back_buttons').click(function(event){
 //     event.preventDefault();
 //        jQuery('.region_imagee img').hide(); 
 //    jQuery('.map_container').removeClass('active_map'); 
 //   });

 
//   jQuery('.world-box').show();
//    jQuery('.mbox').hide();
//     jQuery('.standingtable').hide();
//    jQuery('.mapping').hide();
//  jQuery('.area_click,.color_r').click(function(event){
//   jQuery('.confrence_title').hide();
//   var areacity=jQuery(this).attr('data-city');
//   jQuery(".region-title").html(areacity);
//     event.preventDefault();
//    var hrefs= jQuery(this).attr('href');
//   jQuery('.mbox').each(function(){
// var mapbox=jQuery(this).attr('data-img');
// if(hrefs == mapbox){
// jQuery(this).show();
// jQuery('.world-box').hide(); 
//   }

//   });
//   jQuery('.map_container').addClass('active_map');
// var mainmap=jQuery(this).attr('data-city');
// jQuery('.mapping').each(function(){
// var inregion=jQuery(this).attr('data-city'); 
// if(mainmap == inregion){
//   jQuery(this).show();
//    jQuery(this).next('map').show();
// }
// });

// jQuery('.region_imagee img').attr('src','https://playisa.com/wp-content/uploads/'+jQuery(this).attr('href'))
//     jQuery('.region_images').hide(); 

//  });


//     jQuery('.map_Back_buttons').click(function(event){
//      event.preventDefault();
//        jQuery('.region_images').show();
//        jQuery('.world-box').show();
//            jQuery('.mbox').hide(); 
//         jQuery('.region_imagee img,.mbox').hide();
//    jQuery('.standingtable').hide();
//      jQuery('.map_container').removeClass('active_map'); 
//       jQuery('.confrence_title').show();
//    });

jQuery('.standingtable').hide();
 jQuery('.color_inbox').click(function(){

  var areacity=jQuery(this).attr('data-city');
jQuery('.tabs_inner_reg  li').each(function(){
  var city=jQuery(this).find('a').attr('data-city');
  if(city==areacity){
    jQuery('.standingtable').show();
    jQuery(this).find('a').click();

  }
});
   });

 function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}

 jQuery(document).ready(function() {

    setTimeout(function() {
  var success = GetURLParameter('success');
//console.log(success);
if (success == 'yes') {

 var href=jQuery('#registrationform .wpuf-form li:last-child a:first-child').attr('href');
 window.location.href=href;
 }
}, 2500);
});

        </script>
<script>


jQuery(document).ready(function(){
    jQuery('.World-content').show();
   jQuery(".regio-selct").change(function(){
      jQuery('.World-content').hide();

 jQuery(this).find("option:selected").each(function(){
            var optionValue = jQuery(this).attr("value");
            if(optionValue){

                jQuery(".box").not("." + optionValue).hide();
                jQuery("." + optionValue).show();
            } else{
               jQuery(".box").hide();
                   jQuery('.World-content').show();
  
            }


        });

    }).change();

    jQuery('.world-region').click(function(event){
  jQuery('.World-content').show();
   jQuery('.north-amercia').hide();

  });
 
      jQuery(".age-selct").change(function(){
      	jQuery('.north-amercia').hide();
       jQuery(this).find("option:selected").each(function(){
            var optionValue = jQuery(this).attr("value");
            if(optionValue){
                jQuery(".agebox").not("." + optionValue).hide();
                jQuery("." + optionValue).show();
            } else{
               jQuery(".agebox").hide();
  
            }

        });

    }).change();

});
jQuery(document).ready(function() {
 jQuery('.filter-slect select').niceSelect();
});





</script>
<script>
// The javascript snippet below will redirect the browser to the mobile results if a mobile device is accessing the page.
 
window.mobilecheck = function() {
var check = false;
(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
return check; }
if(window.mobilecheck()) {
window.location.href = 'https://tourneymachine.com/Public/Results/Tournament.aspx?IDTournament=h2021022400000987811ec9dc963bf45';
}
</script>

		<?php wp_footer(); ?>


	</body>
</html>