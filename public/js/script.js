$('.menu-btn').click(function () {
  $(this).toggleClass('is-open');
  $(this).siblings('.menu').toggleClass('is-open');
});



// 投稿モーダル
$(function () {
  // 変数に要素を入れる
  var open = $('.modal-open'),
    close = $('.modal-close');


  //開くボタンをクリックしたらモーダルを表示する
  open.on('click', function () {

    var post = $(this).data('post');
    var id = $(this).data('id');
    container = $('.modal-container');
    $('.modal-container[data-id="' + id + '"]').addClass('active');

    $('.modal-input-post').val(post);
    $('.modal-input-id').val(id);

    return false;
  });

  //閉じるボタンをクリックしたらモーダルを閉じる
  close.on('click', function () {
    container.removeClass('active');
  });

  //モーダルの外側をクリックしたらモーダルを閉じる
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.modal-body').length) {
      container.removeClass('active');
    }
  });
});
