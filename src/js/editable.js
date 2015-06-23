// http://gihyo.jp/design/serial/01/jquery-site-production/0017?page=2

jQuery( function($) {

	// 一つ一つの内容を保持するためeachを利用
	$( 'p, h1, h2, h3, h4, h5' ).each( function() {
		var backup = $( this ).text();

		// .data()を利用して最初の内容を残しておく
		$( this ).data( 'backup', backup ).click( function() {

			if( $('*.editing')[0] && !$( this ).hasClass('editing') ) {
				//				alert('編集中のコンテンツがあります');
				return;
			}

			if( !$( this ).hasClass( 'on' ) ) {
				$( this ).addClass( 'on' );

				if( $( this ).hasClass( 'editing' ) ) {
					$( 'button#save' ).remove();
					$( 'button#cancel' ).remove();
				}

				var txt = $( this ).text();
				$( this ).html( '<input type="text" value="'+txt+'" class="form-control" />' );

				// フォーカスが外れた時の処理
				$( 'p > input, h1 > input, h2 > input, h3 > input, h4 > input, h5 > input' ).focus().blur( function() {
					var inputVal = $( this ).val();
					var backup = $( this ).parent().data( 'backup' );

					// 空白なら元の内容に戻す
					if( inputVal==='' ) {
						inputVal = this.defaultValue;
					}

					// .data()の内容と比較し変化していた場合
					if( backup !== inputVal ) {
						// 						$( 'button' ).removeAttr( 'disabled' );	// クリックできるように

						//						$( this ).parent().css( 'border', '1px solid red' );
						$( 'p.on, h1.on, h2.on, h3.on, h4.on, h5.on' )
					.after( '<button id="save" class="btn btn-default" onClick="save()">保存</button>' );
				$( 'p.on, h1.on, h2.on, h3.on, h4.on, h5.on' )
					.after( '<button id="cancel" class="btn btn-default" onClick="cancel()">キャンセル</button>' );
				$( this ).parent().addClass( 'editing' );
					} else {
						$( this ).parent().removeClass( 'editing' );
					}

					$( this ).parent().removeClass( 'on' ).text( inputVal );
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
		timeout: 10000             // タイムアウトの指定
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



	post_edit();
}

function cancel() {
	//alert('キャンセルしてもよろしいですか？');
	var original = $('button#cancel').prev().data('backup');
	$('button#cancel').prev().html(original);
	post_edit();
}

function post_edit(){
	$('button#cancel').remove();
	$('button#save').remove();
	$('*.editing').removeClass('editing');
}
