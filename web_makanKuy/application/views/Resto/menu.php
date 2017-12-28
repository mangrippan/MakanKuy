<!DOCTYPE html>
<div id="content">
    <div class="inner" style="min-height: 700px;">
          <div class="row">
                <div class="col-lg-12">
                    <h1> Menu </h1>
                </div>
          </div>
          <hr />
          <div class="row col-lg-12">
                <div class="col-lg-3">
                    <h4> Tambah Menu </h4>
                </div>
                <?php echo form_open_multipart('Resto/do_upload');?>

                <div class="col-lg-1">
                      <input type="file" name="tambah_menu" />
                      <input type="hidden" name="id_resto" value="<?php echo $this->session->userdata("resto")->id_restoran?>">
                </div>
                <br/><br/>
                <div class="col-lg-9" style="float:right">
                  <input type="submit" value="Upload" class="btn btn-success"/>
                </div>
                </form>
          </div>
          <hr/>

          <div class="panel panel-default">
                <div class="panel-body">
                <p style="text-align:center">
                  <?php foreach ($foto_menu as $new) { var_dump($new->foto_menu);?>
            			<a id="example5" href="<?php echo base_url();?>assets/image_upload/<?php echo $new->foto_menu?>">
                  <img src="<?php echo base_url();?>assets/image_upload/<?php echo $new->foto_menu?>" alt="" /></a>

                  <a id="example5" href="<?php echo base_url();?>assets/img/demoBig.jpg">
                  <img src="<?php echo base_url();?>assets/img/1G.jpg" alt="" /></a>
                <?php } ?>
            	</p>
            	</div>
         </div>
    </div><!--inner-->
    </div> <!--content-->
</div>
<?php $this->load->view('Layout/Footer');?>
