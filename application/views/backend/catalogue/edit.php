<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
   <!-- begin:: Page -->
   <div class="m-grid m-grid--hor m-grid--root m-page">
      <?php include VIEWS_PATH_BACKEND."/menu.php"; ?>
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
         <?php include VIEWS_PATH_BACKEND."/leftMenu.php"; ?>	
         <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
               <div class="d-flex align-items-center">
                  <div class="mr-auto">
                     <h3 class="m-subheader__title m-subheader__title--separator">
                        <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> -  Edit
                     </h3>
                  </div>
               </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
               <div class="m-portlet">
                  <!--begin::Form-->
                  <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$rsCatalogue[0]['catalogue_id']; ?>" method="post" role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                     <?php if(isset($error)){ ?>
                     <div class="form-group has-error">
                        <div class="col-lg-12">
                           <label for="inputError" class="control-label"><?php echo $error;?></label>
                        </div>
                     </div>
                     <?php } ?>    
                     <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                           <label class="col-lg-2 col-form-label">
                            Title:
                           </label>
                           <div class="col-lg-6">
                              <input name="cataloguetitle" type="text" class="form-control m-input" placeholder="catalogue Title" value="<?php echo $rsCatalogue[0]['catalogue_title']; ?>">
                               <input name="cataloguetitleOld" type="hidden" value="<?php echo $rsCatalogue[0]['catalogue_title']; ?>">
                              <span class="m-form__help">
                              Please enter  title
                              </span>
                           </div>
                        </div>
                        <div class="form-group m-form__group row">
                           <label class="col-lg-2 col-form-label">
                            Type:
                           </label>
                           <div class="col-lg-6">
                              <select name="catalogue_type" id="catalogue_type" class="form-control m-input" style="width:auto;">						
                                  <option value="1" <?php if($rsCatalogue[0]['catalogue_type'] == 1){ echo 'selected=""';} ?>>Contract</option>
                                  <option value="2" <?php if($rsCatalogue[0]['catalogue_type'] == 2){ echo 'selected=""';} ?>>Retail</option>
                                  <option value="3" <?php if($rsCatalogue[0]['catalogue_type'] == 3){ echo 'selected=""';} ?>>Company Profile</option>
                              </select>
                           </div>
                        </div>
                         <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                      Catalogue file :
                                </label>
                       
                                <div class="col-lg-6">
                                    <div style="margin-bottom:10px;" class="imageurl">
                                    <img id="imgurl" src="<?=TOOLS_BASE_URL;?>/filemanager/img/ico/pdf.jpg" style="max-width:100px; padding:5px; border:solid 1px #ccc;">                                   
                                    </div>
                                    <input type="text" name="cataloguefileurl" readonly="readonly" id="fileurl" class="form-control" value="<?= BASE_URL.$rsCatalogue[0]['catalogue_file'] ?>" onchange="setVal(this);">
                                    <div style="margin-right:10px;">
                                         <a data-toggle="modal"  href="javascript:;" data-target="#Modalfileurl" onClick="openKCFinder('cataloguefileurl');" class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x" id="link-file" class="link"><i class="flaticon-attachment"></i></a>
                                        <a class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x" onClick="reset_value('fileurl');" id="link-file" class="link"><i class="fa fa-refresh"></i></a>
                                     </div>
                                    <span class="m-form__help" style="color:#00F;">
                                       Max 2 MB PDF
                                    </span>
                                </div>
                        </div> 
                         <script>
                        function setVal(sel)
                            {
                                var url ='<?=TOOLS_BASE_URL;?>/filemanager/img/ico/pdf.jpg';
                                $("#imgurl").attr("src", url);

                              }
                        </script>
                        <div class="modal fade" id="Modalfileurl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">
                                                                        &times;
                                                                </span>
                                                        </button>
                                                </div>
                                            <div class="modal-body">
                                    <iframe class="filemanager" src="<?=TOOLS_BASE_URL;?>/filemanager/dialog.php?editor=tinymce&type=2&lang=en_EN&popup=0&crossdomain=0&field_id=fileurl&relative_url=0&akey=2063c1608d6e0baf80249c42e2be5804&fldr=Catalogue%2F&5c94a07ba98b4&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                        </div>
                                        </div>
                                </div>
                        </div>
                         
                        
                        
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                           <div class="m-form__actions m-form__actions--solid">
                              <div class="row">
                                 <div class="col-lg-2"></div>
                                 <div class="col-lg-6">
                                    <input name="tbEdit" class="btn btn-info btn-sm" type="submit" value="Edit">&nbsp;
                                    <input name="cancel" class="btn btn-danger btn-sm" type="button" value="Cancel" onClick="location.href='<?php echo BASE_URL_BACKEND.'/catalogue'; ?>'">                                                      
                                 </div>
                              </div>
                           </div>
                        </div>
                
                  <!--end::Form-->
                  </div>
                  </form>
                  <!--end::Form-->
               </div>
            </div>
         </div>
      </div>
      <?php include VIEWS_PATH_BACKEND."/footer.php"; ?>
   </div>
   <!-- end:: Page -->
   <!--begin::Base Scripts -->
   <script src="<?php echo BACKEND_BASE_URL; ?>/vendors/base/vendors.bundle.js" type="text/javascript"></script>
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
   <!--end::Base Scripts -->   
   <!--begin::Page Vendors -->
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
   <!--end::Page Snippets -->
   
</body>
<!-- end::Body -->
</html>