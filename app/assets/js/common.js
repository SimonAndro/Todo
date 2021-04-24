$(document).ready(function(){

    $('#hide-menu').click(function(){
        $("#left-menu").hide()
        $(".right-side").removeClass("col-sm-10")
        $(".right-side").addClass("col-sm-11")
        $(".menu-icon").addClass("col-sm-1")
        $(".menu-icon").show()
    })

    $("#show-menu").click(function(){
        $("#left-menu").show()
        $(".right-side").removeClass("col-sm-11")
        $(".right-side").addClass("col-sm-10")
        $(".menu-icon").removeClass("col-sm-1")
        $(".menu-icon").hide()
    })
})