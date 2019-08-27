<?php echo $this->getLayout()->createBlock('core/template')->setTemplate('page/html/summerPopUp2.phtml')->toHtml(); ?>


<?php

/** Settings */
$themeName = 'alphafrost';
$enabled = false;
$cookie = 1;

$width  = '750px';
$height = '500px';
?>

<?php if ($enabled): ?>
<script type="text/javascript">

    jQuery(document).ready(function () {
        summerPopUp();
    });

    function summerPopUp() {

        var check_cookie = jQuery.cookie('<?php echo $themeName ?>_dontshowtsummerpopup');
        if (check_cookie == null || check_cookie == 'false') {
            jQuery.fancybox({
                'padding': '0',
                'width': '<?php echo $width ?>',
                'height': '<?php echo $height ?>',
                'autoSize': false,
                'autoHeight': true,
                'type': 'inline',
                'scrolling': 'no',
                'href': '#summer_popup'
            });
            jQuery("#underDev").trigger('click');
            jQuery.cookie('<?php echo $themeName ?>_dontshowtsummerpopup', 'true', {expires: <?php echo $cookie; ?>});
        }
    }

    function popupClose() {
        parent.jQuery.fancybox.close();
    }

</script>
<center style="display:none;">
    <div id="summer_popup">
        <?php echo $this->getLayout()->createBlock('cms/block')->setBlockId('summer_popup')->toHtml();?>
    </div>
</center>
<?php endif; ?>

<style>
    /* FIX POP UP HEIGHT */
    .fancybox-inner {
        height: auto !important;
    }
</style>
