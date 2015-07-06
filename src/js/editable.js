

// --------------------------------------------------
// テキストライブ編集
// http://gihyo.jp/design/serial/01/jquery-site-production/0017?page=2
// --------------------------------------------------
jQuery( function($) {

	swapbtn();

	// 一つ一つの内容を保持するためeachを利用
	// .data()を利用して最初の内容を残しておく
	$('p, h1, h2, h3, h4, h5').each( function() {
		var backup = $(this).text();

		// マウスオーバー処理
		$(this).data('backup', backup).hover(
			function() {
				if( !$('*.on')[0] && !$('*.editing')[0] ) {
					$(this).css('border','1px solid #ff9900');
				}
			},
			function() {
				if( !$(this).hasClass('on') && !$(this).hasClass('editing') ) {
					$(this).css('border','none');
				}
			}
		);

		// ダブルクリックされたときの処理
		$(this).data('backup', backup).dblclick(function() {

			if( $('*.editing')[0] && !$(this).hasClass('editing') ) {
				return;
			}

			if( !$( this ).hasClass('on') ) {
				$( this ).addClass('on');

				// 再編集の場合
				if( $(this).hasClass('editing') ) {
					resetEdit();
				}

				// 元の内容取得
				var txt = $(this).text();

				// data- の内容取得
				var inputType = $(this).data('type');
				var inputRows = $(this).data('rows');
				var inputTextAlign = $(this).data('textAlign');

				// INPUT(TEXT) の入力
				if( inputType === 'text' ) {
					$(this).html( '<input type="text" value="'+txt+'" style="
						background-color:transparent;
						outline:0;
						width:100%;
						text-align:center;
						-webkit-appearance:none;
						border: none;
						background: none;
						" />' );
				}

				// TEXTAREA の入力
				if( inputType === 'textarea' ) {
					var tag = '<textarea rows="'+inputRows+'">'+txt+'</textarea>';
					$(this).html(tag);
					$('textarea').css('width','100%').css('border','none').css('background','transparent').css('resize','none').css('text-align',inputTextAlign);
				}

				// フォーカスが外れた時の処理
				$( 'p > input, h1 > input, h2 > input, h3 > input, h4 > input, h5 > input, p > textarea, h1 > textarea, h2 > textarea, h3 > textarea, h4 > textarea, h5 > textarea' ).focus().blur( function() {
					var inputVal = $(this).val();
					var backup = $(this).parent().data('backup');

					// (1) 空白なら元の内容に戻す
					if( inputVal==='' ) {
						inputVal = this.defaultValue;
					}

					// (2) 値が変化していた場合
					if( backup !== inputVal ) {
						$( 'p.on, h1.on, h2.on, h3.on, h4.on, h5.on' ).after( '<button id="save" class="btn btn-default" onClick="save()">保存</button>' ).after( '<button id="cancel" class="btn btn-default" onClick="cancel()">キャンセル</button>' );

						$(this).parent().addClass('editing');

					// (3) 値が変化していなかった場合
					} else {
						$(this).parent().removeClass('editing').css('border','none');
					}

					// 入力された値で置き換える
					$( this ).parent().removeClass('on').text( inputVal );
				});
			}
		});
	});

	// リセットボタンは最初はクリックできないようにdisabled状態に
	// 	$( 'button' ).attr( 'disabled','disabled' ).click( function() {;
	// 		$( 'p, h1, h2, h3, h4, h5' ).each( function() {
	// 			var backup = $( this ).data( 'backup' );
	// 			$( this ).text(backup);
	// 		});
	// 		aleart('OK');
	// 		//リセットした際は再びクリックできないように変更
	// 		$( this ).attr( 'disabled','disabled' );
	// 	});
});

function save(e) {
	//alert('保存してもよろしいですか？');
	var url = 'http://localhost:9999/ajax.php';
	var type = 'POST';


	var id = $("button#save").parent(".start").attr('id');
	alert(id);

	$.ajax({
		url: url,
		type: type,
		data: {
			id: 1,
		mode: 'hoge',
		type: 'entry'
		},
		dataType: 'html',
		cache: false,
		async: true,
		timeout: 10000
	})
	.done(function( data ) {
		alert(data);
	})
	.fail(function( data ) {
		alert('ajax;fail');
		// ...
	})
	.always(function( data ) {
		alert('ajax;always');
		// ...
	});

	resetEdit();
}

function cancel() {
	//alert('キャンセルしてもよろしいですか？');
	var original = $('button#cancel').prev().data('backup');
	$('button#cancel').prev().html(original).css('border','none');
	resetEdit();
}

function resetEdit(){
	$('button#cancel').remove();
	$('button#save').remove();
	$('*.editing').removeClass('editing');
}
