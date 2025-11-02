$(document).ready(function(){
        
        $("#show").click(function(){
            $("#password").attr("type", "text");
            $("#show").hide();
            $("#hide").show();
        });
        $("#hide").click(function(){
            $("#password").attr("type", "password");
            $("#hide").hide();
            $("#show").show();
        });


    });