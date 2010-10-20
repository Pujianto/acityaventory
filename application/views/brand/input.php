<?php echo form_open('brand/submit','id=brandForm'); ?>
<div id="form_input">
<table>
    <tr>
      <td>Brand Name</td>
      <td colspan="2"><?php echo form_input($brand_name); ?></td>
    </tr>
    <tr>
      <td>Brand Description</td>
      <td colspan="2"><?php echo form_textarea($desc); ?></td>
    </tr>
    <tr>
        <td ><input type="hidden" name="id" value="" id="brand_id" /></td>
        <td ><?php echo form_submit('submit','Save','id="submit"'); ?></td>
        <td ><?php echo form_reset('reset','Reset'); ?></td>
    </tr>
</table>    
</div>
<div align="right">
    <a href="#" id="hide"><img src="<?php echo base_url();?>images/nav.png" alt="Show / Hide " title="Show / Hide Form" /></a>
</div>
<hr>
<div id="form_show">
    <?php $this->load->view('brand/show'); ?>
</div>
<? echo form_close()?>
<div id="growl"></div>
<script type="text/javascript" language="javascript" charset="utf-8">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascript/form_js/brand_post.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>javascript/form_js/form.js"></script>
