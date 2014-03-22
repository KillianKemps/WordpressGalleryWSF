(function() {
   tinymce.create('tinymce.plugins.galeries', {
      init : function(ed, url) {
         ed.addButton('galeries', {
            title : 'Galeries',
            image : url.replace("js","img") + '/gallery.png',
            onclick : function() {
               jQuery('#gallery-plugin.prompt').css('z-index', '100');
               jQuery('#gallery-plugin.prompt').show();
               jQuery('#gallery-plugin.prompt form').submit(function(e){
                  e.preventDefault();
                  var galeries = jQuery('#gallery-plugin.prompt #shortcode_list').val();
                  console.log(galeries);
                  if (galeries != null && galeries != '' )
                     ed.execCommand('mceInsertContent', false, '[slider id_gallery="'+ galeries +'"]');
                  
                  jQuery('#gallery-plugin.prompt').hide();
                  jQuery('#gallery-plugin.prompt').css('z-index', 'inherit');
                  jQuery('#gallery-plugin.prompt #shortcode_list').val('');
               });
               jQuery('.shortcode_cancel').click(function(e){
                  jQuery('#gallery-plugin.prompt').hide();
                  jQuery('#gallery-plugin.prompt').css('z-index', 'inherit');
               });
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Galeries",
            author : 'Killian Kemps',
            authorurl : 'http://www.killiankemps.fr',
            infourl : 'http://www.killiankemps.fr',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('galeries', tinymce.plugins.galeries);
})();