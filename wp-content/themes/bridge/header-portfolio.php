<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_proya;
global $wp_query;
global $qode_toolbar;
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
		echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
	} ?>

	<title><?php wp_title(''); ?></title>
	<?php
	/**
	 * qode_header_meta hook
	 *
	 * @see qode_header_meta() - hooked with 10
	 * @see qode_user_scalable_meta() - hooked with 10
	 */
	do_action('qode_header_meta');
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_proya['favicon_image']; ?>">
	<link rel="apple-touch-icon" href="<?php echo $qode_options_proya['favicon_image']; ?>"/>
	<!--[if gte IE 9]>
		<style type="text/css">
			.gradient {
				 filter: none;
			}
		</style>
	<![endif]-->

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=676844459090871";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <?php
        $content_class = "";
        if(get_post_meta($id, "qode_revolution-slider", true) == "" && get_post_meta($id, "qode_show-page-title", true) && !is_category() && !is_tag() && !is_author() && (isset($qode_options_proya['enable_google_map']) && ($header_transparency === '' || $header_transparency == 1))){
            if($qode_options_proya['header_bottom_appearance'] == "fixed"){
                $content_class = "content_top_margin";
            }else {
                $content_class = "content_top_margin_none";
            }
        }

        if(get_post_meta($id, "qode_revolution-slider", true) != ""){
            $content_class .= " has_slider";
        }
    ?>

    <?php
    if(isset($qode_options_proya['paspartu']) && $qode_options_proya['paspartu'] == 'yes'){

    $paspartu_additional_classes = "";
    if(isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'no'){
        $paspartu_additional_classes .= " disable_top_paspartu";
    }
    if(isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'no'){
        $paspartu_additional_classes .= " disable_bottom_paspartu";
    }
    if(isset($qode_options_proya['paspartu_on_top']) && $qode_options_proya['paspartu_on_top'] == 'no' && isset($qode_options_proya['paspartu_on_bottom_slider']) && $qode_options_proya['paspartu_on_bottom_slider'] == 'yes'){
        $paspartu_additional_classes .= " paspartu_on_bottom_slider";
    }
    if(isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'yes' && isset($qode_options_proya['paspartu_on_bottom_fixed']) && $qode_options_proya['paspartu_on_bottom_fixed'] == 'yes'){
        $paspartu_additional_classes .= " paspartu_on_bottom_fixed";
    }
    ?>


    <div class="paspartu_outer <?php echo $paspartu_additional_classes; ?>">
        <div class="paspartu_left"></div>
        <div class="paspartu_right"></div>
        <?php if(isset($qode_options_proya['paspartu_on_bottom']) && $qode_options_proya['paspartu_on_bottom'] == 'yes' && isset($qode_options_proya['paspartu_on_bottom_fixed']) && $qode_options_proya['paspartu_on_bottom_fixed'] == 'yes'){ ?>
            <div class="paspartu_bottom"></div>
        <?php }?>
        <div class="paspartu_inner">
        <?php
        }
        ?>

<div class="content <?php echo $content_class; ?>">
<?php
$animation = get_post_meta($id, "qode_show-animation", true);
if (!empty($_SESSION['qode_animation']) && $animation == "")
	$animation = $_SESSION['qode_animation'];

?>
			<?php if($qode_options_proya['page_transitions'] == "1" || $qode_options_proya['page_transitions'] == "2" || $qode_options_proya['page_transitions'] == "3" || $qode_options_proya['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">

					<?php
					/**
					 * qode_ajax_meta hook
					 *
					 * @hooked qode_ajax_meta - 10
					 */
					do_action('qode_ajax_meta'); ?>

					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">
			<?php if($qode_options_proya['page_transitions'] == "1" || $qode_options_proya['page_transitions'] == "2" || $qode_options_proya['page_transitions'] == "3" || $qode_options_proya['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<?php do_action('qode_visual_composer_custom_shortcodce_css');?>
			<?php } ?>