<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
$options = get_option( 'custom_css_js_form' );
$css_pos = array('Header','Footer');

/*--- for header ---*/
function custom_head_css(){
$options = get_option( 'custom_css_js_form' ); ?>
<style type="text/css">
<?php echo  $options['cuscss'];?>
</style>
<?php
}
add_action('wp_head', 'custom_head_css');

function custom_head_adcss(){
$options = get_option( 'custom_css_js_form' ); ?>
<style type="text/css">
<?php echo  $options['cusadcss'];?>
</style>
<?php
}
add_action('admin_head', 'custom_head_adcss');
/*--- for header end ---*/

/*--- for JS ---*/
if($options['csspos'] == 'Header'){
function custom_js_head(){
$options = get_option( 'custom_css_js_form' ); ?>
<script><?php echo  $options['cusjs']; ?></script>
<?php }
add_action('wp_head', 'custom_js_head');
}else{
function custom_js_foot(){
$options = get_option( 'custom_css_js_form' ); ?>
<script><?php echo  $options['cusjs']; ?></script>
<?php }
add_action('wp_footer', 'custom_js_foot', '300');
}
/*--- for JS end ---*/

//start settings page
function custom_css_js_plugin() {
if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
global $css_pos;
?>
<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php }
?>
<div id="cwcj">
<div class="main-cwcj">
<form method="post" action="options.php" class="forms1">
<?php settings_fields( 'custom_css_js_get' ); ?>
<?php $options = get_option( 'custom_css_js_form' ); ?>
<h3>Custom WP CSS & JS</h3>
<div class="form-left">
<label for="custom_css_js_form[csspos]"><?php _e( 'Position Of JS:' ); ?></label>
<select name="custom_css_js_form[csspos]">
<?php foreach ($css_pos as $option) { ?>
<option <?php if ($options['csspos'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select> 
</div> 
<div class="form-left">
<label for="custom_css_js_form[cusjs]"><?php _e( 'Custom JS: &nbsp; <i><small>Do not include &lt;script&gt; tag.</small></i>' ); ?></label>
<textarea id="custom_css_js_form[cusjs]" name="custom_css_js_form[cusjs]" rows="8" ><?php esc_attr_e( $options['cusjs']); ?></textarea>
</div> 
<div class="form-left">
<label for="custom_css_js_form[cuscss]"><?php _e( 'Custom CSS (Theme): &nbsp; <i><small>Do not include &lt;style&gt; tag.</small></i>' ); ?></label>
<textarea id="custom_css_js_form[cuscss]" name="custom_css_js_form[cuscss]" rows="8" ><?php esc_attr_e( $options['cuscss']); ?></textarea>  
</div> 
<div class="form-left">
<label for="custom_css_js_form[cusadcss]"><?php _e( 'Custom CSS (Dashboard): &nbsp; <i><small>Do not include &lt;style&gt; tag.</small></i>' ); ?></label>
<textarea id="custom_css_js_form[cusadcss]" name="custom_css_js_form[cusadcss]" rows="8" ><?php esc_attr_e( $options['cusadcss']); ?></textarea>   
</div> 
<input name="submit" id="submit" value="Save Settings" type="submit"></p>
</form>
</div>
<script language="javascript">
jQuery( document ).ready( function() {
var editor = CodeMirror.fromTextArea( document.getElementById( "custom_css_js_form[cuscss]" ), {lineNumbers: true, lineWrapping: true, styleActiveLine: true, matchBrackets: true, mode:  "css"} );
var editor = CodeMirror.fromTextArea( document.getElementById( "custom_css_js_form[cusadcss]" ), {lineNumbers: true, lineWrapping: true, styleActiveLine: true, matchBrackets: true, mode:  "css"} );
var editor = CodeMirror.fromTextArea( document.getElementById( "custom_css_js_form[cusjs]" ), {lineNumbers: true, lineWrapping: true, styleActiveLine: true, matchBrackets: true, mode:  "javascript"} );
});
</script>
<div id="cwcj-features">
<div class="getpro">
<h3>If you like this plugin then please rate us</h3>
<p><a href="https://wordpress.org/support/view/plugin-reviews/custom-wp-css-js" class="pros" target="_blank">Rate this Plugin</a></p>
</div>

<div class="our-plugins">
<h3>OUR PLUGINS:</h3>
<ul>
<li><a href="https://wordpress.org/plugins/popular-posts-count/" target="_blank"><img src="<?php echo plugins_url( '/img/popular-posts-count.png' , __FILE__ ); ?>" /><span>Popular Posts Count</span></a></li>
</ul>
</div>
</div>
<div class="clear"></div>
</div>
<?php
}
?>