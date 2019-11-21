/*
Template Name: Material Pro admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/

function toastr(){

$(function() {
    "use strict";
      $(".tst1").click(function(){
           $.toast({
            heading: 'RECORD UPDATED',
            text: '',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'info',
            hideAfter: 2000,
            stack: 6
          });

     });

      $(".tst2").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
          });

     });
      $(".tst3").click(function(){
           $.toast({
            heading: 'RECORD CREATED',
            text: '',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 2000,
            stack: 6
          });

     });

      $(".tst4").click(function(){
           $.toast({
            heading: 'RECORD REMOVED',
            text: '',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 2000

          });

     });
});


}
