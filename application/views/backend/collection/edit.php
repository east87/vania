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
                  <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$row_id; ?>" method="post" role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                     <?php if(isset($error)){ ?>
                     <div class="form-group has-error">
                        <div class="col-lg-12">
                           <label for="inputError" class="control-label"><?php echo $error;?></label>
                        </div>
                     </div>
                     <?php } ?>    
                     <div class="m-portlet__body">
                     <div class="form-group m-form__group row">
                           <label class="col-lg-2 col-form-label">Category</label>
                           <div class="col-lg-4">
                               <select class="form-control m-input" name="categoryparent" id="categoryparent" required="">
                                 <option value="">----</option>
                                 <?php foreach($CategoryParent as $parent){ ?>
                                 <option value="<?php echo $parent['category_id'];?>" <?php if($parent['category_id'] == $categoryparent) { echo "selected";} ?>> <?php echo $parent['category_title']?> </option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-lg-4 id_child">
                            <select class="form-control m-input" name="category_id" id="category_id" required="">
                                <option value="<?= $category_id;?>">----</option>
                            </select>
                           </div> 
                        </div>
                        <script language="javascript">
                           $(document).ready(function(){                                 
                           $('#categoryparent').change(function(){                           
                                var id_category = $('#categoryparent').val();                           
                                //alert(id_category);                           
                              if(id_category == 0) {
                                  $(".id_child").hide();                           
                              }                           
                              else{                           
                                 $.post("<?php echo BASE_URL_BACKEND.'/category/getParent';?>/"+id_category+"",                           
                               function(obj){
                           
                                   $(".id_child").show();   
                                   $('#category_id').html(obj);
                           
                               }); 
                              }
                           });
                           });
                           
                        </script>     
                         
                     <?php echo formGenerate($controller,$rsContent);?>  
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                           <div class="m-form__actions m-form__actions--solid">
                              <div class="row">
                                 <div class="col-lg-2"></div>
                                 <div class="col-lg-6">
                                    <input name="tbEdit" class="btn btn-info btn-sm" type="submit" value="Edit">&nbsp;
                                    <a href="<?php echo BASE_URL_BACKEND.'/'.$controller; ?>" name="cancel" class="btn btn-danger btn-sm" > Cancel </a>                                                    
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
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/custom/components/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>   
  
   <!--end::Page Snippets -->
   
</body>
<!-- end::Body -->
</html>