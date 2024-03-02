          <!-- partial -->
          </div>
          <!-- main-panel ends -->
          </div>
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
          </footer>

          <!-- page-body-wrapper ends -->
          </div>
          <!-- container-scroller -->
          </div>
          </div>

          <script>
            function validateAndSendData(obj, queryFunction) {
              var spanErrorArray;
              spanErrorArray = validate_data(obj);
              if (Array.isArray(spanErrorArray) && spanErrorArray.length === 0) {
                queryFunction();
              } else {
                spanErrorArray.forEach(e => {
                  let input = e.split("_error")[0];
                  // console.log($("[name='" + input + "']"));
                  $("[name='" + input + "']").click(function(element) {
                    if ($("#" + e).show()) {
                      $("#" + e).hide();
                    }
                  })
                });
              }

            }
          </script>

          <script>
            function validate_data(object) {
              let returnArr = [];
              for (const key in object) {
                if (object.hasOwnProperty.call(object, key)) {
                  const element = object[key];
                  if (element == false) {
                    returnArr.push(key)
                    $('#' + key).show();

                    // console.log(key);
                  }
                }
              }
              return returnArr;
            }

            async function chackIsUniqueMail(elm, errorElm,keyName) {
              let chack = await fetch("http://localhost/clones/igotit/public/chackUniqeMail?"+keyName+"=" + $(elm).val());
              let result = await chack.json();
              console.log(result);
              if (result.status == 200) {
                $(errorElm).html("Email Already Exists");
                if (errorElm.hide()) {
                  $(errorElm).show().focus();
                  return false;
                };
                return false;
              } else {
                $(errorElm).html("Enter Correct Email");
                if (errorElm.show()) {
                  $(errorElm).hide();
                  return true;
                };
                return true;
              }
            }
          </script>

          </body>




          <!-- plugins:js -->
          <script src="<?php echo $this->seller_assets; ?>vendors/js/vendor.bundle.base.js"></script>
          <!-- endinject -->
          <!-- Plugin js for this page -->
          <script src="<?php echo $this->seller_assets; ?>vendors/chart.js/Chart.min.js"></script>
          <script src="<?php echo $this->seller_assets; ?>vendors/datatables.net/jquery.dataTables.js"></script>
          <script src="<?php echo $this->seller_assets; ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
          <script src="<?php echo $this->seller_assets; ?>js/dataTables.select.min.js"></script>

          <!-- End plugin js for this page -->
          <!-- inject:js -->
          <script src="<?php echo $this->seller_assets; ?>js/off-canvas.js"></script>
          <script src="<?php echo $this->seller_assets; ?>js/hoverable-collapse.js"></script>
          <script src="<?php echo $this->seller_assets; ?>js/template.js"></script>
          <script src="<?php echo $this->seller_assets; ?>js/settings.js"></script>
          <script src="<?php echo $this->seller_assets; ?>js/todolist.js"></script>
          <!-- endinject -->
          <!-- Custom js for this page-->
          <script src="<?php echo $this->seller_assets; ?>js/dashboard.js"></script>
          <script src="<?php echo $this->seller_assets; ?>js/Chart.roundedBarCharts.js"></script>
          <!-- End custom js for this page-->
          </body>

          </html>