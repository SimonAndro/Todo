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

    $("#add-todo").click(function(){
        $("#todo-form").toggle()
    })

    $("#add-doing").click(function(){
        $("#doing-form").toggle()
    })

    $("#add-done").click(function(){
        $("#done-form").toggle()
    })

    $(".task").click(function(){
        $("#task-info").show(50)
    })

    $("#arrow-rght").click(function(){
        $("#task-info").hide(50)
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
            console.log(result);

        },
        error:function(result)
        {
            $('#loading-overlay').hide(); 
            console.log(result);
        }
    });
}

$(".general-form").on("submit",function(e){
    e.preventDefault();
    $('.modal').click(); // remove any open modals

    var form = $(e.currentTarget);

    //todo: validate form before submit

    var url = $(this).attr('action');
    var type = "POST";
    var data = form.serialize();
    ajaxHandler(url,type,data);
});
