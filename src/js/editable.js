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
					$( 'button#editing' ).remove();
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
					};

					// .data()の内容と比較し変化していた場合
					if( backup !== inputVal ) {
// 						$( 'button' ).removeAttr( 'disabled' );	// クリックできるように

//						$( this ).parent().css( 'border', '1px solid red' );
						$( 'p.on, h1.on, h2.on, h3.on, h4.on, h5.on' )
							.after( '<button id="editing" class="btn btn-default" onClick="save()">保存</button>' );
						$( 'p.on, h1.on, h2.on, h3.on, h4.on, h5.on' )
							.after( '<button id="editing" class="btn btn-default" onClick="cancel()">キャンセル</button>' );
						$( this ).parent().addClass( 'editing' );
					} else {
						$( this ).parent().removeClass( 'editing' );
					};

					$( this ).parent().removeClass( 'on' ).text( inputVal );
				});
			};
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

function save() {
	alert('保存してもよろしいですか？');
	$('button#editing').remove();
}

function cancel() {
// 	alert('キャンセルしてもよろしいですか？');
	$( *.editing ).data('backup');
	$('button#editing').remove();

//	$( '*.editing' ).css('border', '0' );
	$( '*.editing' ).removeClass('editing');
}