// JavaScript Document

$(document).ready(function() {
   tab();
   tab2();
});
function tab() {
    $('.span_tab_content').hide();
    $('.span_tab_content:first').show();
    $('.span-tab span a:first').addClass('active-span-tab');
    $('.span-tab span a').click(function(){
       var  id_content = $(this).attr("href"); 
       $('.span_tab_content').hide();
       $(id_content).fadeIn();
       $('.span-tab span a').removeClass('active-span-tab');
       $(this).addClass('active-span-tab');
       return false;
    });
 
}


function tab2() {
    $('.span_tab_content2').hide();
    $('.span_tab_content2:first').show();
    $('.span-tab2 span a:first').addClass('active-span-tab2');
    $('.span-tab2 span a').click(function(){
       var  id_content = $(this).attr("href"); 
       $('.span_tab_content2').hide();
       $(id_content).fadeIn();
       $('.span-tab2 span a').removeClass('active-span-tab2');
       $(this).addClass('active-span-tab2');
       return false;
    });
 
}
