<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Form Builder</title>
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12" id="content">
               <h1 class="jumbotron">Form Builder HTML</h1>
               <form role="form" class="form" method="post" id="form" action="result.php">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="title">Form Setting</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Action</label>
                                <input type="text" name="action" class="form-control" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Method</label>
                                <select class="form-control" name="method">
                                    <option value="POST">POST</option>
                                    <option value="GET">GET</option>
                                </select>
                            </div>
                        </div>
                    </div>
                  </div>
                  <?php for($i = 1; $i < 20; $i++) { ?>
                  <div class="panel panel-default" id="form-<?=$i;?>">
                     <div class="panel-heading">
                        <h4 class="title">Form <?=$i;?></h4>
                     </div>
                     <div class="panel-body">
                        <div class="row">
                           <div class="form-group col-md-3"> <label>Name</label> <input type="text" name="form[<?=$i;?>][form_name]" class="form-control" /> </div>
                           <div class="form-group col-md-3">
                              <label>Type</label>
                              <select class="form-control form_type" name="form[<?=$i;?>][form_type]" onchange="checkType(<?=$i;?>)">
                                 <option value="text">Textbox</option>
                                 <option value="textarea">Textarea</option>
                                 <option value="select">Select</option>
                                 <option value="radio">Radio</optio> 
                                 <option value="checkbox">Checkbox</option>
                                 <option value="date">Date</option>
                              </select>
                           </div>
                           <div class="form-group col-md-3"> <label>List</label> <input type="checkbox" name="form[<?=$i;?>][form_list]" class="form-control" /> </div>
                           <div class="form-group col-md-3"> <label>Label</label> <input type="text" name="form[<?=$i;?>][form_label]" class="form-control" /> </div>
                        </div>
                        <div class="row value_form" id="template-value-form">
                            <?php for($a = 1; $a <= 6; $a++) { ?>
                            <div class="form-group col-md-2">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4>Option</h4>
                                    </div>
                                    <div class="panel-body"> <label>Value</label> <input type="text" name="form[<?=$i;?>][form_value][]" class="form-control"
                                        /> <br><label>Display</label><input type="text" name="form[<?=$i;?>][form_display][]" class="form-control"
                                        /> </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php } ;?>
                  <div class="row">
                     <div class="col-md-12">
                        <button class="btn btn-info" id="add-new">Add New</button>
                        <button class="btn btn-success">Submit</button>
                     </div>
                  </div>
               </form>
               <br>
            </div>
         </div>
      </div>
      
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script>

          function checkType(id) {
         
             var el = $('#form-' + id);
             var val = el.find('.form_type').val();
             var unDisabledVal = ['checkbox', 'radio', 'select'];
         
             console.log(unDisabledVal.includes(val));
             if (unDisabledVal.includes(val)) {
                 el.find('.value_form').css('display', 'block');
                 el.find('[name=add-val]').prop('disabled',false);
                 console.log(1)
                 // el.find('[name=form_value').prop('disabled',false);
                 // el.find('[name=form_display]').prop('disabled',false);
             } else {
                 el.find('.value_form').css('display', 'none');
                 el.find('[name=add-val]').prop('disabled',true);
                 // el.find('[name=form_value').prop('disabled',true);
                 // el.find('[name=form_display]').prop('disabled',true);
             }
         }
         
         $(function(){
             $('.value_form').css('display', 'none');
         })

      </script>
   </body>
</html>