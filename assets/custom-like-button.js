jQuery(document).ready(function($) {
    $('.like-button .like-toggle').on('click', function() {
        var postId = $(this).parent().data('post-id');
        var nonce = customLike.security;
        var action = ($(this).parent().hasClass('liked')) ? 'unlike' : 'like';

        $.ajax({
            url: customLike.ajax_url,
            type: 'post',
            data: {
                action: 'custom_like_action',
                nonce: nonce,
                post_id: postId,
                like_action: action
            },
            success: function(response) {
                if (response.success) {
                    var likeButton = $('.like-button[data-post-id="' + postId + '"]');
                    var likeCount = likeButton.find('.like-count');
                    likeCount.text(response.data.likes);
                    likeButton.toggleClass('liked');
                }
            }
        });
    });
});