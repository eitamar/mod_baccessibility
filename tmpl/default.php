<?php 
// No direct access
defined('_JEXEC') or die;

//$javascript[] = "//activate plugin after dom ready";
$javascript[] = "jQuery(document).ready(function ($) {";
$javascript[] = "    $(this).baccessibility({";
//general options
$javascript[] = "       use_notifications : ".( $params->get('use_notifications') ? 'true':'false' ).",";

//links underline
$javascript[] = "       lu_elm:\".b-acc-toggle-underline\",";
$javascript[] = "       lu_tags: \"a\",";

//contrast
$javascript[] = "       ct_dark_elm: \".b-acc-dark-btn\",";
$javascript[] = "       ct_bright_elm: \".b-acc-bright-btn\",";
$javascript[] = "       ct_grayscale_elm: \".b-acc-grayscale\",";
$javascript[] = "       ct_reset_elm: \".b-acc-contrast-reset\",";

//toolbar
$javascript[] = "       tb_wrapper_elm: \"#b-acc-toolbarWrap\",";
$javascript[] = "       tb_btn_elm: \".b-acc_hide_toolbar\",";

//fontsizer
$javascript[] = "       fs_tags: \"".$params->get('fontsizer_tags')."\",";
$javascript[] = "       fs_size_jump: ".$params->get('fontsizer_size').",";
$javascript[] = "       fs_increase_elm: \"#b-acc-fontsizer button.big-letter\",";
$javascript[] = "       fs_decrease_elm: \"#b-acc-fontsizer button.small-letter\",";
$javascript[] = "       fs_reset_elm: \".b-acc-font-reset\",";


$javascript[] = "   });";
$javascript[] = "});";

$doc->addScriptDeclaration(implode(' ', $javascript));

?>

<nav id="b-acc-toolbarWrap" role="navigation" class="b-acc-hide <?php echo $params['toolbar_side']; ?> close-toolbar">
    <?php
        if ($params['use_awesome']) {
     ?>
            <button title="<?php echo JText::_('MOD_BACCESSIBILITY_ACCESSIBILITY_OPTIONS'); ?>" tabindex="0" class="b-acc_hide_toolbar <?php echo $params['toolbar_position']; ?> b-acc-icon-<?php echo $params['icon_size']; ?>">
                <span><i class="fa fa-wheelchair fa-3x"></i></span>
            </button>
    <?php
        } else {
    ?>
	<button tabindex="0" class="b-acc_hide_toolbar $params['toolbar_position']; b-acc-icon-<?php echo $params['icon_size']; ?>">
		<span>Accessibility</span>
	</button>
	<?php
        }
    ?>
	<ul id="b-acc_toolbar" data-underlines="0">
        <?php if ($module->showtitle) : ?>
            <h3 tabindex="0"><?php echo $module->title; ?></h3>
        <?php endif; ?>
        <li id="b-acc-fontsizer" data-size-tags="<?php echo $params['fontsizer_tags']; ?>" data-size-jump="<?php echo $params['fontsizer_size']; ?>">
			<button class="small-letter" tabindex="0"><i class="fa fa-search-plus"></i> Decrease font size</button>
			<button class="big-letter" tabindex="0"><i class="fa fa-search-minus"></i> Increase font size</button>
			<button class="b-acc-font-reset b-acc-hide" tabindex="0"><i class="fa fa-refresh"></i> Default font sizes</button>
		</li>
		<li id="b-acc-contrast">
			<button class="b-acc-bright-btn" tabindex="0"><i class="fa fa-sun-o"></i> Bright contrast</button>
			<button class="b-acc-dark-btn" tabindex="0"><i class="fa fa-moon-o"></i> Dark contrast</button>
			<button class="b-acc-grayscale" tabindex="0"><i class="fa fa-gg-circle"></i> Grayscale</button>
            <button class="b-acc-contrast-reset" tabindex="0"><i class="fa fa-refresh"></i> Reset contrast</button>
		</li>
		<li id="b-acc-keyboard-navigation">
			<button id="b-acc-keyboard" tabindex="0"><i class="fa fa-keyboard-o"></i> Keyboard Navigation</button>
		</li>
		<li id="b-acc-links">
			<button class="b-acc-toggle-underline" tabindex="0"><i class="fa fa-underline"></i> Toggle underline</button>
		</li>
	</ul>
</nav>
