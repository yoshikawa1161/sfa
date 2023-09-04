//テーブル選択時の処理
jQuery(function($) {
    $('tbody tr[data-href]').addClass('clickable').click(function() {
        window.location = $(this).attr('data-href');
    }).find('a').hover(function() {
        $(this).parents('tr').unbind('click');
    }, function() {
        $(this).parents('tr').click(function() {
            window.location = $(this).attr('data-href');
        });
    });
});

  // 名刺画像プレビュー処理
    // 画像が選択される度に、この中の処理が走る
    $('#name_card').on('change', function (ev) {
        const reader = new FileReader();
        // ファイル名を取得
        const fileName = ev.target.files[0].name;
        // 画像が読み込まれた時の動作を記述
        reader.onload = function (ev) {
            $('#name_card_img_prv').attr('src', ev.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    })
  