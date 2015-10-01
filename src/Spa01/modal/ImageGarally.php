<!-- モーダル（id="image-gararry-modal"） -->
<div class="modal fade" id="image_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">画像ギャラリー</h4>
</div><!-- / .modal-header -->
<div class="modal-body">
<textarea name="content"></textarea>
</div><!-- / .modal-body -->

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
<button type="button" class="btn btn-primary">更新</button>
</div><!-- / .modal-footer -->
</div><!-- / .modal-content -->
</div><!-- / .modal-dialog -->
</div><!-- / .modal -->

<script type="text/javascript">
$('img').wrap('<a href="#image_modal" role="button" data-toggle="modal"></a>');

tinymce.init({
    selector:   "textarea",
    width:      '100%',
    height:     270,
		plugins: "save image imagetools",
		image_advtab: true,
		image_description: true,
		image_dimensions: false,
		image_title: true,
		imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
		menubar: false,
		toolbar: "save | image | undo redo",
});

// Prevent bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
		e.stopImmediatePropagation();
	}
});

</script>

