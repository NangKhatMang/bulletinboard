$(document).ready(function(){
    $('.postDetail').click(function(){
        var post_id = $(this).data('id');
        // alert(post_id);

        $.ajax({
            url:'/post/show/'+post_id,
            method:'GET',
            dataType:'json',
            success:function(data){
                console.log(data);
                $('#postDetailModal').modal('show');
                $('#post-title').html(data.post.title);
                $('#posted-date').html('posted at - '+data.post.created_at);
                $('#post-desc').html(data.post.description);
                $('#posted-user').html('- by '+data.user.name+' -');
            }
        });
    });
    $('.postDelete').click(function(){
        var post_id = $(this).data('id');
        $.ajax({
            type:"GET",
            success:function(){
            $("#post_id").val(post_id);
            },
        })
    });
    $('.userDelete').click(function(){
        var usertId = $(this).data('id');
        $.ajax({
            type:"GET",
            success:function(){
            $("#user_id").val(usertId);
            },
        })
    });
});