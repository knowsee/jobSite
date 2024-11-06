
<script type="text/javascript" src="<?= base_url('static/') ?>assets/js/froala_editor.min.js"></script>
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/char_counter.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/code_view.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/colors.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/emoticons.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/file.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/fullscreen.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/image.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/image_manager.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/line_breaker.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/table.min.css">
<link rel="stylesheet" href="<?= base_url('static/') ?>assets/css/et/plugins/video.min.css">
<!-- Include the plugin files. -->
<script src="<?= base_url('static/') ?>assets/js/plugins/align.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/char_counter.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/code_view.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/colors.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/emoticons.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/entities.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/file.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/font_family.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/font_size.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/fullscreen.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/image.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/image_manager.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/inline_style.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/line_breaker.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/link.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/lists.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/paragraph_format.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/paragraph_style.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/quote.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/save.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/table.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/url.min.js"></script>
<script src="<?= base_url('static/') ?>assets/js/plugins/video.min.js"></script>

<script type="text/javascript" src="<?= base_url('static/') ?>assets/js/fullscreen.min.js"></script>
<script>
$(function() {
  callText();
});
function callText() {
    $('textarea').froalaEditor({
        heightMin: 500,
        heightMax: 1000,
        toolbarButtons: ['fullscreen', '|', 'bold', 'italic', 'strikeThrough', 'underline', '|', 'paragraphFormat', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '|',  'quote', 'insertHR', 'undo', 'redo', 'clearFormatting', 'selectAll', 'insertLink', 'insertTable'],
        fontFamilySelection: true,
        fontSizeSelection: true,
        paragraphFormatSelection: true,
        imageInsertButtons: ['imageByURL'],
        imageEditButtons: ['imageReplace', 'imageAlign', 'imageRemove', '|', 'imageLink', 'linkOpen', 'linkEdit', 'linkRemove', '-', 'imageDisplay', 'imageStyle', 'imageAlt', 'imageSize']
  });
}
</script>
