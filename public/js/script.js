$(function () {
  $('#postModal').on('show.bs.modal', function () {
    //画面のinputタグの値を取得
    var post = $('#postInput').val()
    //モーダルのinputタグに値を反映させる。
    $('#modalInput').val(post);
  })
})
