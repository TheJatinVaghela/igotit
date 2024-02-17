<link rel="stylesheet" href="../public\assets/csslogin_register">
<?php 
// print_r($this->data);
?>



                 <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">product Table</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Procuct Name</th>
                                        <th>Product Code</th>
                                        <th>Product Retail prize</th>
                                        <th >Product Sale prize</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->data['data'] as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <td><?php echo $value['product_code'] ?></td>
                                        <td><?php echo $value['product_retailprice'] ?></td>
                                        <td><?php echo $value['product_saleprice'] ?></td>
                                        <td> <button type="button" class="btn btn-danger" name="Delete" value="<?php echo $value['product_code']; ?>" onclick="Delete()">Delete</button> </td>                                        
                                        </tr>
                                    <?php }?>
                                    
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

                    <script>
                        <?php $p_code = json_encode($value['product_code']); ?>
   async function Delete(){
    let value = <?php echo $p_code;?>;
       console.log( value);
      let data = { "product_code" :value };
      let url = "http://localhost/clones/igotit/seller/delete_product";
    $.ajax({
        url:url,
        data:JSON.stringify(data),
        processData:false,
        cache:false,
        contentType:false,
        success:function(result){
            // console.log(result);
            result = JSON.parse(result);
            console.log(result);
            if(result.status == 200){
                window.location.reload();
            }else{
                console.log(result);
            };
        }
    })
    }         

                    </script>