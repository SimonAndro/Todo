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

function ajaxHandler(url,type,data)
{
    $('#loading-overlay').show();
    $.ajax({
        type: type,
        url: url, 
        data: data,
        success:function(result){
            $('#loading-overlay').hide(); 


        },
        error:function(result)
        {
            $('#loading-overlay').hide(); 
        }
    });
}

$(".general-form").on("submit",function(e)
{
    e.preventDefault();
    $('.modal').click(); // remove any open modals

    var form = $(e.currentTarget);

    //todo: validate form before submit

    var url = $(this).attr('data-url');
    var type = "POST";
    var data = form.serialize();
    ajaxHandler(url,type,data);
})
