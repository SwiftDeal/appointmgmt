jQuery(document).ready(function(){
    // binds form submission and fields to the validation engine
        jQuery("#formID").validationEngine();
        //Photo Gallery
        $("a[data-rel^='prettyPhoto']").prettyPhoto();
      });
      $('#carousel').elastislide({
              imageW    : 180,
              minItems  : 5
        });