$('.menu-btn').click(function () {
  $(this).toggleClass('is-open');
  $(this).siblings('.menu').toggleClass('is-open');
});




// $(function () {
//   const modal = $('.modal_content');
//   const overlay = $('.modal_overlay');
//   //「ボタン」をクリックしたらモーダルを表示
//   $('.modal_open').on('click', function () {
//     modal.addClass("open");
//     overlay.addClass("open");
//   });
//   // 「ボタン」をクリックしたらモーダルを非表示
//   $('.modal_delete').on('click', function () {
//     modal.removeClass("open");
//     overlay.removeClass("open");
//   });
// });


$(function () {
  // 変数に要素を入れる
  var open = $('.modal-open'),
    close = $('.modal-close'),
    container = $('.modal-container');

  //開くボタンをクリックしたらモーダルを表示する
  open.on('click', function () {
    container.addClass('active');
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
