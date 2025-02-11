<?php
    session_start();
    ob_start();
    include"admin/inc/db.php"
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Dashboard</title>
    <?php include"inc/css.php" ?>
    
  </head>

  <body style="background: #F4F4F4;">

    <main>
      <section>
        <div class="container-fluid">
          <div class="row">
          <?php include"inc/asideseller.php" ?>
            <div class="col-10 p-4" style="background: #F4F4F4;">
              <div class="d-flex justify-content-between align-items-center">
                <h4 class="" style="margin: 0px auto; color:#023021;">Welcome to Seller Dashboard</h4>
                <div>
                  <?php  
                      if ( !empty( $_SESSION['email'] ) ) { ?>
                          <div class="dropdown">
                            <div class="d-flex align-items-center showlog">
                                <?php 
                                    if ( !empty( $_SESSION['image'] ) ) {
                                        echo '<img src="admin/assets/images/role/' . $_SESSION['image'] . '" alt="" style="width: 60px; border-radius: 20%;">';
                                    }
                                    else { 
                                        echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width: 60px; border-radius: 20%;">';
                                    }
                                ?>
                                <h5 class="ps-3"><?php echo $_SESSION['name']; ?></h5>
                            </div>  
                          </div>
                      <?php }
                  ?>
                </div>
              </div>
              
              
              <hr class="pb-2">
              <?php  
                  $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

                  if ( $do == 'Manage' ) { ?>
                    <!-- STRAT: PACKAGE PART -->
                    <section class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center pb-3">
                                    <h3 style="letter-spacing: 3px; color:#023021; font-size: 40px; font-weight:600;">Find the Best Plan that's Right for Your Business</h3>
                                    <p style="letter-spacing: 1px; color:#023021;">We Have the Features and Service You Deserve!</p>
                                </div>

                                <?php  
                                    $rentDivSql = "SELECT * FROM package WHERE status = 1 ORDER BY id ASC";
                                    $rentDivQuery = mysqli_query( $db, $rentDivSql );

                                    while ( $row = mysqli_fetch_assoc( $rentDivQuery ) ) {
                                        $id             = $row['id'];
                                        $name           = $row['name'];
                                        $details        = $row['details'];
                                        $basic_price    = $row['basic_price'];
                                        $discount_price = $row['discount_price'];
                                        $dis_percent    = $row['dis_percent'];
                                        $renew          = $row['renew'];
                                        $rent_flat      = $row['rent_flat'];
                                        $rent_store     = $row['rent_store'];
                                        $rent_hotel     = $row['rent_hotel'];
                                        $buy_flat       = $row['buy_flat'];
                                        $buy_store      = $row['buy_store'];
                                        $buy_hotel      = $row['buy_hotel'];
                                        $buy_property   = $row['buy_property'];
                                        $status         = $row['status'];
                                        $join_date      = $row['join_date'];
                                        ?>

                                        <div class="col-lg-4">
                                            <div class="cards border border-light-subtle p-5 bg-light" style="border-radius: 10px; filter: drop-shadow(0px 0px 12px #ccc); height: 100%;">
                                                <?php  
                                                    if ( $id == 2 ) { ?>
                                                        <div class="text-cards">
                                                            <p style="letter-spacing: 2px; color:#023021; font-size: 18px; font-weight:500; color: #fff; text-align: right;">Most <br> Popular</p>
                                                        </div>
                                                    <?php }
                                                ?>
                                                
                                                <h3 class="pb-2" style="letter-spacing: 2px; color:#023021; font-size: 40px; font-weight:600; text-transform: capitalize;"><?php echo $name; ?></h3>
                                                <p style="letter-spacing: 1px; color:#023021; font-size: 16px; font-weight:500; "><?php echo $details; ?></p>

                                                <h1 style="letter-spacing: 2px; color:#023021; font-size: 50px; font-weight:600; padding-bottom: 0px; ">TK <?php echo $discount_price; ?><span style="font-size: 30px; font-weight: 400;">/mo</span></h1>
                                                <p style="letter-spacing: 1px; color:#023021; font-size: 16px; font-weight:500; "><?php echo $dis_percent; ?>% OFF</p>
                                                <h5 class="text-danger">Renew at TK <?php echo $basic_price; ?>/mo</h5>
                                                <hr>

                                                <h5 class="text-success pb-3 py-1">GET THE OFFER</h5>

                                                <?php  
                                                    if ( !empty($rent_flat) ) { ?>
                                                        <div class="d-flex offer">
                                                            <i class="fa-solid fa-check me-3"></i>
                                                            <p><strong><?php echo $rent_flat; ?></strong> Rent Apartment</p>
                                                        </div>
                                                    <?php }
                                                ?>

                                                <?php  
                                                    if ( !empty($rent_hotel) ) { ?>
                                                        <div class="d-flex offer">
                                                            <i class="fa-solid fa-check me-3"></i>
                                                            <p><strong><?php echo $rent_hotel; ?></strong> Rent Hotel</p>
                                                        </div>
                                                    <?php }
                                                ?>

                                                <?php  
                                                    if ( !empty($rent_store) ) { ?>
                                                        <div class="d-flex offer">
                                                            <i class="fa-solid fa-check me-3"></i>
                                                            <p><strong><?php echo $rent_store; ?></strong> Rent Store</p>
                                                        </div>
                                                    <?php }
                                                ?>

                                                <?php  
                                                    if ( !empty($buy_flat) ) { ?>
                                                        <div class="d-flex offer">
                                                            <i class="fa-solid fa-check me-3"></i>
                                                            <p><strong><?php echo $buy_flat; ?></strong> Sell Apartment</p>
                                                        </div>
                                                    <?php }
                                                ?>

                                                <?php  
                                                    if ( !empty($buy_hotel) ) { ?>
                                                        <div class="d-flex offer">
                                                            <i class="fa-solid fa-check me-3"></i>
                                                            <p><strong><?php echo $buy_hotel; ?></strong> Sell Hotel</p>
                                                        </div>
                                                    <?php }
                                                ?>

                                                <?php  
                                                    if ( !empty($buy_store) ) { ?>
                                                        <div class="d-flex offer">
                                                            <i class="fa-solid fa-check me-3"></i>
                                                            <p><strong><?php echo $buy_store; ?></strong> Sell Store</p>
                                                        </div>
                                                    <?php }
                                                ?>

                                                <?php  
                                                    if ( !empty($buy_property) ) { ?>
                                                        <div class="d-flex offer">
                                                            <i class="fa-solid fa-check me-3"></i>
                                                            <p><strong><?php echo $buy_property; ?></strong> Sell Plots</p>
                                                        </div>
                                                    <?php }
                                                ?>
                                                <form method="GET">
                                                    <div class="d-grid gap-2">
                                                        <a href="checkout.php?price=<?php echo $discount_price; ?>&pak=<?php echo $name; ?>&email=<?php echo $_SESSION['email']; ?>" class="btn btn-success quBtn">GET STARTED</a>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>

                                        <?php
                                    }
                                                                        
                                ?>

                                

                            </div>
                        </div>
                    </section>
                    <!-- END: PACKAGE PART -->
                  <?php }

                  else if ( $do == 'allRentProducts' ) { ?>    

                    <div class="row py-3">
                      <div class="col-lg-6">
                        <h4 class="" style="margin: 0px auto; color:#023021;">My All Rent Products</h4>
                      </div>
                      <div class="col-lg-6 text-end">
                        <a href="sellerDashboard.php?do=Add" class="btn btn-dark">Add New Rent Product</a>
                      </div>
                    </div>              
                          

                    <!-- Table Start -->
                    <div class="table-responsive py-3">
                      <table id="example" class="table table-striped table-hover table-bordered" >
                        <thead class="table-dark">
                          <tr>
                            <th scope="col text-center">Id</th>
                            <th scope="col text-center">Title</th>
                            <th scope="col text-center">Category</th>
                            <th scope="col text-center">Price</th>
                            <th scope="col text-center">Status</th>
                            <th scope="col text-center">Join Date</th>
                            <th scope="col text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                            $sesEmail = $_SESSION['email'];
                            $sql = "SELECT * FROM rent_subcategory WHERE ow_email='$sesEmail' ORDER BY sub_id DESC";
                            $query = mysqli_query($db, $sql);
                            $count = mysqli_num_rows($query);

                            if ( $count == 0 ) { ?>
                              <div class="alert alert-danger text-center" role="alert">
                                Sorry! No Data Found..
                              </div>
                           <?php }
                           else {
                              $i = 0;
                              while ( $row = mysqli_fetch_assoc($query) ) {
                                $sub_id       = $row['sub_id'];
                                $is_parent    = $row['is_parent'];
                                $subcat_name  = $row['subcat_name'];
                                $slug         = $row['slug'];
                                $ow_name      = $row['ow_name'];
                                $ow_email     = $row['ow_email'];
                                $ow_phone     = $row['ow_phone'];
                                $district     = $row['district'];
                                $division_id  = $row['division_id'];
                                $location     = $row['location'];
                                $price        = $row['price'];
                                $bed          = $row['bed'];
                                $kitchen      = $row['kitchen'];
                                $washroom     = $row['washroom'];
                                $totalroom    = $row['totalroom'];
                                $area_size    = $row['area_size'];
                                $floor        = $row['floor'];
                                $rank         = $row['rank'];
                                $decoration   = $row['decoration'];
                                $desk         = $row['desk'];
                                $wifi         = $row['wifi'];
                                $hottub       = $row['hottub'];
                                $currency     = $row['currency'];
                                $ac           = $row['ac'];
                                $pool         = $row['pool'];
                                $park         = $row['park'];
                                $gym          = $row['gym'];
                                $luggage      = $row['luggage'];
                                $drwaing      = $row['drwaing'];
                                $dinning      = $row['dinning'];
                                $balcony      = $row['balcony'];
                                $garage       = $row['garage'];
                                $breakfast    = $row['breakfast'];
                                $restourant    = $row['restourant'];
                                $availability    = $row['availability'];
                                $short_desc   = $row['short_desc'];
                                $long_desc    = $row['long_desc'];
                                $ow_image     = $row['ow_image'];
                                $img_one      = $row['img_one'];
                                $img_two      = $row['img_two'];
                                $img_three    = $row['img_three'];
                                $img_four     = $row['img_four'];
                                $img_five     = $row['img_five'];
                                $img_six      = $row['img_six'];
                                $status       = $row['status'];
                                $google_map   = $row['google_map'];
                                $join_date    = $row['join_date'];
                                $i++;
                                ?>

                                <tr>
                                  <th scope="row"><?php echo $i; ?></th>
                                  <td><?php echo $subcat_name; ?></td>
                                  <td>
                                    <?php  
                                      $rentcategorySql = "SELECT * FROM rent_category WHERE cat_id = '$is_parent' AND status = 1 ORDER BY name ASC";
                                      $rentcategoryQuery = mysqli_query($db, $rentcategorySql);

                                      while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
                                        $cat_id     = $row['cat_id'];
                                        $cat_name     = $row['name'];
                                        ?>
                                        <span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span>
                                        <?php
                                      }
                                    ?>
                                  </td>
                                  <td><?php echo $price; ?></td>
                                  <td><?php 
                                    if ( $status == 1 ) { ?>
                                      <span class="badge text-bg-primary">Active</span>
                                    <?php }
                                    else if ( $status == 2 ) { ?>
                                      <span class="badge text-bg-warning">Pending</span>
                                    <?php }
                                    else if ( $status == 3 ) { ?>
                                      <span class="badge text-bg-info">Approve</span>
                                    <?php }
                                     else if ( $status == 4 ) { ?>
                                      <span class="badge text-bg-danger">Decline</span>
                                    <?php }
                                    else if ( $status == 0 ) { ?>
                                      <span class="badge text-bg-danger">Not Active</span>
                                    <?php }
                                  ?></td>
                                  <td><?php echo $join_date; ?></td>
                                  <td class="text-center">
                                    <div class="action-btn">
                                      <ul>
                                        <li>
                                          <a href="sellerDashboard.php?do=Edit&editId=<?php echo $sub_id ; ?>" class="btn btn-outline-primary" style="margin: 0px 15px;"><i class="fa-solid fa-pencil"></i> Edit and check</a> 
                                          <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#dId<?php echo $sub_id ; ?>"><i class="fa-regular fa-eye-slash"></i> Delete</a>
                                        </li>
                                      </ul>
                                    </div>

                                    <!-- START: MODAL -->
                                <div class="modal fade" id="dId<?php echo $sub_id ; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Delete?</h1>                                       
                                      </div>

                                      <div class="modal-footer justify-content-around">
                                        <?php  
                                            if ( $status == 1 ) {
                                                echo "Sorry! Please Contact with Support. Thanks";
                                            }
                                            else { ?>
                                                <ul>
                                                  <li>
                                                    <a href="sellerDashboard.php?do=Delete&dData=<?php echo $sub_id ; ?>" class="btn btn-primary">Yes</a>
                                                    <a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
                                                  </li>
                                                </ul>
                                            <?php }
                                        ?>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                    <!-- END: MODAL -->
                                </tr>

                                <?php
                              }
                           }

                            

                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- Table End -->

                  <?php }

                  else if ($do == "Delete") {
                        if (isset($_GET['dData'])) {
                            $deleteData = $_GET['dData'];
                            $deleteSQL = "DELETE FROM rent_subcategory WHERE sub_id='$deleteData' ";
                            $deleteQuery = mysqli_query($db, $deleteSQL);

                            if ($deleteQuery) {
                                header("Location: sellerDashboard.php?do=allRentProducts");
                            } else {
                                die("Mysqli_Error" . mysqli_error($db));
                            }
                        }
                    }

                  else if ( $do == 'Add' ) { ?>    

                    <div class="row pt-3 pb-2">
                      <div class="col-lg-6">
                        <h4 class="" style="margin: 0px auto; color:#023021;">Add New Rent Products</h4>
                      </div>
                      <div class="col-lg-6 text-end">
                        <a href="sellerDashboard.php?do=allRentProducts" class="btn btn-dark">My All Products</a>
                      </div>
                    </div>    
                    <hr class="">

                    <div class="p-5 bg-light">
                      <!-- START : FORM -->
                      <form action="sellerDashboard.php?do=Store" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label>Sub Category Name</label>
                              <input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name..">
                            </div>
                            <div class="mb-3">
                              <input type="hidden" name="ow_name" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['name']; ?>">
                              <input type="hidden" name="ow_email" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['email']; ?>">
                              <?php  
                                $sesEmail = $_SESSION['email'];
                                $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                $query = mysqli_query($db, $sql);

                                while ( $row = mysqli_fetch_assoc($query) ) {
                                  $name    = $row['name'];
                                  $email  = $row['email'];
                                  $phone     = $row['phone'];
                                  ?>
                                  <input type="hidden" name="ow_phone" class="form-control" required autocomplete="off" value="<?php echo $phone; ?>">
                                  <?php
                                } 
                              ?>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Division</label>
                                  <select class="form-select" name="division">
                                    <option>Select the Division</option>
                                    <?php  
                                      $sql = "SELECT * FROM rent_division WHERE status=1 ORDER BY priority ASC";
                                      $query = mysqli_query($db, $sql);

                                      while ( $row = mysqli_fetch_assoc($query) ) {
                                        $id       = $row['id'];
                                          $name       = $row['name'];
                                          $priority     = $row['priority'];
                                          $status     = $row['status'];
                                          ?>
                                            
                                          <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                          <?php
                                      }
                                    ?>
                                    
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>District</label>
                                  <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district..">
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label>House Number & Location</label>
                              <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location..">
                            </div>

                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Category Name</label>
                                  <select class="form-select" name="is_parent" required>
                                    <option>Please Select the Category</option>
                                    <?php
                                    $catSql = "SELECT * FROM rent_category WHERE status=1";
                                    $catQuery = mysqli_query($db, $catSql);

                                    while ($row = mysqli_fetch_assoc($catQuery)) {
                                      $cat_id = $row['cat_id'];
                                      $catname = $row['name'];
                                    ?>
                                      <option value="<?php echo $cat_id ?>"> - <?php echo $catname; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Price <sup>(Taka)</sup></label>
                                  <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Bed</label>
                                  <input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Kitchen</label>
                                  <input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Drawing</label>
                                  <input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Dinning</label>
                                  <input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Balcony</label>
                                  <input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Garage</label>
                                  <input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage..">
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Bathroom</label>
                                  <input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom..">
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Total Room</label>
                                  <input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room..">
                                </div>
                              </div>

                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Area Size <sup>(Sq Ft)</sup></label>
                                  <input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area..">
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
                                  <input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area..">
                                </div>
                              </div>

                              <label for="">For Hotel And Other Category</label>

                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Ranking For Hotel</label>
                                  <select name="rank" class="form-select">
                                    <option>select Here</option>
                                    <option value="1">5 Star</option>
                                    <option value="2">4 Star</option>
                                    <option value="3">3 Star</option>
                                    <option value="4">2 Star</option>
                                    <option value="5">1 Star</option>
                                  </select>
                                </div>
                              </div>                      

                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Decoration</label>
                                  <select name="decoration" class="form-select">
                                    <option>select Here</option>
                                    <option value="1">Furnished</option>
                                    <option value="2">Semi-Furnished</option>
                                    <option value="3">Non-Furnished</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-lg-3">
                                
                                <div class="form-check">
                                  <input name="desk" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Front desk [24-hour]
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="wifi" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Free Wi-Fi in all rooms!
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="hottub" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Hot tub
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="currency" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Currency exchange
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="breakfast" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Breakfast
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="restourant" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Restourant
                                  </label>
                                </div>
                                
                              </div>

                              <div class="col-lg-3">
                                
                                <div class="form-check">
                                  <input name="ac" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Air conditioning
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="pool" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Swimming pool(indoor)
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="park" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Car park
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="gym" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Fitness center
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="luggage" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Luggage storage
                                  </label>
                                </div>
                                
                              </div>

                            </div>

                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label>Short Description</label>
                              <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."></textarea>
                            </div>
                            <div class="mb-3">
                              <label>Long Description</label>
                              <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."></textarea>
                            </div>
                            <div class="mb-3">
                              <label>Google Embed Map URL <sup>(iframe)</sup></label>
                              <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"></textarea>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Available on</label>
                                  <input type="date" name="availabe" class="form-control">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <input type="hidden" name="status" value="2">
                                </div>
                              </div>                      
                            </div>

                            <?php  
                                $sesEmail = $_SESSION['email'];
                                $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                $query = mysqli_query($db, $sql);

                                while ( $row = mysqli_fetch_assoc($query) ) {
                                  $name    = $row['name'];
                                  $email  = $row['email'];
                                  $phone     = $row['phone'];
                                  $ow_image     = $row['image'];
                                  ?>
                                  <input type="hidden" class="form-control" name="ow_image" value="<?php echo $ow_image; ?>">
                                  <?php
                                } 
                              ?>


                            <div class="row">
                              <label for="">Products Images</label>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image One</label>
                                  <input type="file" class="form-control" name="img_one">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Two</label>
                                  <input type="file" class="form-control" name="img_two">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Three</label>
                                  <input type="file" class="form-control" name="img_three">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Four</label>
                                  <input type="file" class="form-control" name="img_four">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Five</label>
                                  <input type="file" class="form-control" name="img_five">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Six</label>
                                  <input type="file" class="form-control" name="img_six">
                                </div>
                              </div>
                            </div>


                            <div class="mb-3">
                              <div class="d-grid gap-2">
                                <input type="submit" name="addSubCat" class="btn btn-dark px-5" value="Add New Product">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <!-- END : FORM -->
                      
                    </div>

                  <?php }                  

                  else if ($do == "Store") {
                    if (isset($_POST['addSubCat'])) {
                        // START: Code for actual check the condition of package limit
                        $activeEmail = $_SESSION['email'];
                        // Transaction
                        $sql = "SELECT * FROM transactions WHERE user_email='$activeEmail' AND status=1";
                        $query = mysqli_query($db, $sql);

                        while ( $row = mysqli_fetch_assoc( $query ) ) {
                            $id               = $row['id'];
                            $transaction_id   = $row['transaction_id'];
                            $user_email       = $row['user_email'];
                            $package_name     = $row['package_name'];
                            $price            = $row['price'];
                            $transaction_date = $row['transaction_date'];
                            $renewal_date     = $row['renewal_date'];
                            $status           = $row['status'];

                            // Package
                            $pacsql = "SELECT * FROM package WHERE name='$package_name' AND status=1";
                            $pacquery = mysqli_query($db, $pacsql);

                            while ( $row = mysqli_fetch_assoc( $pacquery ) ) {
                                $pacid              = $row['id'];
                                $name               = $row['name'];
                                $details            = $row['details'];
                                $basic_price        = $row['basic_price'];
                                $discount_price     = $row['discount_price'];
                                $dis_percent        = $row['dis_percent'];
                                $renew              = $row['renew'];
                                $rent_flat          = $row['rent_flat'];
                                $rent_store         = $row['rent_store'];
                                $rent_hotel         = $row['rent_hotel'];
                                $buy_flat           = $row['buy_flat'];
                                $buy_store          = $row['buy_store'];
                                $buy_hotel          = $row['buy_hotel'];
                                $buy_property       = $row['buy_property'];
                                $status             = $row['status'];
                                $join_date          = $row['join_date'];

                                // Start: Rent Sub Category
                                $childSql = "SELECT * FROM rent_subcategory WHERE ow_email ='$activeEmail' ORDER BY subcat_name ASC";
                                $childQuery = mysqli_query($db, $childSql);
                                $childSqlCount = mysqli_num_rows($childQuery);
                                echo "Row count". $childSqlCount;
                                while ($row = mysqli_fetch_assoc($childQuery)) {
                                  $sub_id       = $row['sub_id'];
                                  $is_parent    = $row['is_parent'];
                                  $subcat_name  = $row['subcat_name'];
                                  $slug         = $row['slug'];
                                  $ow_name      = $row['ow_name'];
                                  $ow_email     = $row['ow_email'];
                                  $ow_phone     = $row['ow_phone'];
                                  $district     = $row['district'];
                                  $division_id  = $row['division_id'];
                                  $location     = $row['location'];
                                  $price        = $row['price'];
                                  $bed          = $row['bed'];
                                  $kitchen      = $row['kitchen'];
                                  $washroom     = $row['washroom'];
                                  $totalroom    = $row['totalroom'];
                                  $area_size    = $row['area_size'];
                                  $floor        = $row['floor'];
                                  $rank         = $row['rank'];
                                  $decoration   = $row['decoration'];
                                  $desk         = $row['desk'];
                                  $wifi         = $row['wifi'];
                                  $hottub       = $row['hottub'];
                                  $currency     = $row['currency'];
                                  $ac           = $row['ac'];
                                  $pool         = $row['pool'];
                                  $park         = $row['park'];
                                  $gym          = $row['gym'];
                                  $luggage      = $row['luggage'];
                                  $drwaing      = $row['drwaing'];
                                  $dinning      = $row['dinning'];
                                  $balcony      = $row['balcony'];
                                  $garage       = $row['garage'];
                                  $breakfast    = $row['breakfast'];
                                  $restourant    = $row['restourant'];
                                  $availability    = $row['availability'];
                                  $short_desc   = $row['short_desc'];
                                  $long_desc    = $row['long_desc'];
                                  $ow_image     = $row['ow_image'];
                                  $img_one      = $row['img_one'];
                                  $img_two      = $row['img_two'];
                                  $img_three    = $row['img_three'];
                                  $img_four     = $row['img_four'];
                                  $img_five     = $row['img_five'];
                                  $img_six      = $row['img_six'];
                                  $status       = $row['status'];
                                  $google_map   = $row['google_map'];
                                  $join_date    = $row['join_date'];

                                  echo $is_parent;
                                }
                                // End: Rent Sub Category

                                // Start Condition
                                // if ( $pacid == 1 ) {
                                //     if ( $rent_flat >= 1 ) {
                                //         // code...
                                //     }
                                // }
                                // else if( $pacid == 2 ) {
                                //     echo "$name";
                                // }
                                // else if( $pacid == 3 ) {
                                //     echo "$name";
                                // }
                                // End Condition

                             

                            }
                        }
                        // END: Code for actual check the condition of package limit
                      
                    }
                  } 

                  else if ( $do == 'Edit' ) { ?>    


                    <div class="row pt-3 pb-2">
                      <div class="col-lg-6">
                        <h4 class="" style="margin: 0px auto; color:#023021;">Edit Rent Products</h4>
                      </div>
                      <div class="col-lg-6 text-end">
                        <a href="sellerDashboard.php?do=allRentProducts" class="btn btn-dark">My All Products</a>
                      </div>
                    </div>    
                    <hr class="">

                    <div class="p-5 bg-light">
                      <!-- START : FORM -->
                      <?php  
                        if ( isset($_GET['editId']) ) {
                          $editIdStore =  $_GET['editId'];
                          $editSql = "SELECT * FROM rent_subcategory WHERE sub_id='$editIdStore'";
                          $editQuery = mysqli_query( $db, $editSql );

                          while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
                              $sub_id       = $row['sub_id'];
                              $is_parent    = $row['is_parent'];
                              $subcat_name  = $row['subcat_name'];
                              $slug         = $row['slug'];
                              $ow_name      = $row['ow_name'];
                              $ow_email     = $row['ow_email'];
                              $ow_phone     = $row['ow_phone'];
                              $district     = $row['district'];
                              $division_id  = $row['division_id'];
                              $location     = $row['location'];
                              $price        = $row['price'];
                              $bed          = $row['bed'];
                              $kitchen      = $row['kitchen'];
                              $washroom     = $row['washroom'];
                              $totalroom    = $row['totalroom'];
                              $area_size    = $row['area_size'];
                              $floor        = $row['floor'];
                              $rank         = $row['rank'];
                              $decoration   = $row['decoration'];
                              $desk         = $row['desk'];
                              $wifi         = $row['wifi'];
                              $hottub       = $row['hottub'];
                              $currency     = $row['currency'];
                              $ac           = $row['ac'];
                              $pool         = $row['pool'];
                              $park         = $row['park'];
                              $gym          = $row['gym'];
                              $luggage      = $row['luggage'];
                              $drwaing      = $row['drwaing'];
                              $dinning      = $row['dinning'];
                              $balcony      = $row['balcony'];
                              $garage       = $row['garage'];
                              $breakfast    = $row['breakfast'];
                              $restourant    = $row['restourant'];
                              $availability    = $row['availability'];
                              $short_desc   = $row['short_desc'];
                              $long_desc    = $row['long_desc'];
                              $ow_image     = $row['ow_image'];
                              $img_one      = $row['img_one'];
                              $img_two      = $row['img_two'];
                              $img_three    = $row['img_three'];
                              $img_four     = $row['img_four'];
                              $img_five     = $row['img_five'];
                              $img_six      = $row['img_six'];
                              $substatus       = $row['status'];
                              $google_map   = $row['google_map'];
                              $join_date    = $row['join_date'];
                              ?>
                              <form action="sellerDashboard.php?do=Update" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name.." value="<?php echo $subcat_name; ?>">
                                  </div>
                                  <div class="mb-3">
                                    <input type="hidden" name="ow_name" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['name']; ?>">
                                    <input type="hidden" name="ow_email" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['email']; ?>">
                                    <?php  
                                      $sesEmail = $_SESSION['email'];
                                      $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                      $query = mysqli_query($db, $sql);

                                      while ( $row = mysqli_fetch_assoc($query) ) {
                                        $name    = $row['name'];
                                        $email  = $row['email'];
                                        $phone     = $row['phone'];
                                        ?>
                                        <input type="hidden" name="ow_phone" class="form-control" required autocomplete="off" value="<?php echo $phone; ?>">
                                        <?php
                                      } 
                                    ?>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Division</label>
                                        <select class="form-select" name="division">
                                          <option>Select the Division</option>
                                          <?php  
                                            $sql = "SELECT * FROM rent_division WHERE status=1 ORDER BY priority ASC";
                                            $query = mysqli_query($db, $sql);

                                            while ( $row = mysqli_fetch_assoc($query) ) {
                                              $id       = $row['id'];
                                                $name       = $row['name'];
                                                $priority     = $row['priority'];
                                                $status     = $row['status'];
                                                ?>
                                                  
                                                <option value="<?php echo $id; ?>" <?php if ( $id == $division_id ) {
                                                  echo "selected";
                                                } ?>><?php echo $name; ?></option>
                                                <?php
                                            }
                                          ?>
                                          
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>District</label>
                                        <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district.." value="<?php echo $district; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label>House Number & Location</label>
                                    <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location.." value="<?php echo $location; ?>">
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Category Name</label>
                                        <select class="form-select" name="is_parent">
                                          <option>Please Select the Category</option>
                                          <?php
                                          $catSql = "SELECT * FROM rent_category WHERE status=1";
                                          $catQuery = mysqli_query($db, $catSql);

                                          while ($row = mysqli_fetch_assoc($catQuery)) {
                                            $cat_id = $row['cat_id'];
                                            $catname = $row['name'];
                                          ?>
                                            <option value="<?php echo $cat_id ?>" <?php if ( $cat_id == $is_parent ) {
                                              echo "selected";
                                            } ?>> - <?php echo $catname; ?></option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Price <sup>(Taka)</sup></label>
                                        <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Bed</label>
                                        <input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Kitchen</label>
                                        <input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Drawing</label>
                                        <input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing.." value="<?php echo $drwaing; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Dinning</label>
                                        <input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning.." value="<?php echo $dinning; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Balcony</label>
                                        <input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony.." value="<?php echo $balcony; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Garage</label>
                                        <input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage.." value="<?php echo $garage; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Bathroom</label>
                                        <input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Total Room</label>
                                        <input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>">
                                      </div>
                                    </div>

                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Area Size <sup>(Sq Ft)</sup></label>
                                        <input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
                                        <input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>">
                                      </div>
                                    </div>

                                    <label for="">For Hotel And Other Category</label>

                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Ranking For Hotel</label>
                                        <select name="rank" class="form-select">
                                          <option>select Here</option>
                                          <option value="1" <?php if ( $rank == 1 ) {
                                            echo "selected";
                                          } ?>>5 Star</option>
                                          <option value="2" <?php if ( $rank == 2 ) {
                                            echo "selected";
                                          } ?>>4 Star</option>
                                          <option value="3" <?php if ( $rank == 3 ) {
                                            echo "selected";
                                          } ?>>3 Star</option>
                                          <option value="4" <?php if ( $rank == 4 ) {
                                            echo "selected";
                                          } ?>>2 Star</option>
                                          <option value="5" <?php if ( $rank == 5 ) {
                                            echo "selected";
                                          } ?>>1 Star</option>
                                        </select>
                                      </div>
                                    </div>                      

                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Decoration</label>
                                        <select name="decoration" class="form-select">
                                          <option>select Here</option>
                                          <option value="1" <?php if ( $decoration == 1 ) {
                                            echo "selected";
                                          } ?>>Furnished</option>
                                          <option value="2" <?php if ( $decoration == 2 ) {
                                            echo "selected";
                                          } ?>>Semi-Furnished</option>
                                          <option value="3" <?php if ( $decoration == 3 ) {
                                            echo "selected";
                                          } ?>>Non-Furnished</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col-lg-3">
                                      
                                      <div class="form-check">
                                        <input name="desk" class="form-check-input" type="checkbox" value="1" <?php if ( $desk == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Front desk [24-hour]
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="wifi" class="form-check-input" type="checkbox" value="1" <?php if ( $wifi == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Free Wi-Fi in all rooms!
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="hottub" class="form-check-input" type="checkbox" value="1" <?php if ( $hottub == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Hot tub
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="currency" class="form-check-input" type="checkbox" value="1"<?php if ( $currency == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Currency exchange
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="breakfast" class="form-check-input" type="checkbox" value="1"<?php if ( $breakfast == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Breakfast
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="restaurant" class="form-check-input" type="checkbox" value="1" <?php if ( $restourant == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Restourant
                                        </label>
                                      </div>
                                      
                                    </div>

                                    <div class="col-lg-3">
                                      
                                      <div class="form-check">
                                        <input name="ac" class="form-check-input" type="checkbox" value="1" <?php if ( $ac == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Air conditioning
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="pool" class="form-check-input" type="checkbox" value="1" <?php if ( $pool == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Swimming pool(indoor)
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="park" class="form-check-input" type="checkbox" value="1" <?php if ( $park == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Car park
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="gym" class="form-check-input" type="checkbox" value="1" <?php if ( $gym == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Fitness center
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="luggage" class="form-check-input" type="checkbox" value="1" <?php if ( $luggage == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Luggage storage
                                        </label>
                                      </div>
                                      
                                    </div>

                                  </div>

                                </div>
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label>Short Description</label>
                                    <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."><?php echo $short_desc; ?></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label>Long Description</label>
                                    <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."><?php echo $long_desc; ?></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
                                    <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"><?php echo $google_map; ?></textarea>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Available on</label>
                                        <input type="date" name="available" class="form-control" value="<?php echo $availability; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <input type="hidden" name="status" value="<?php echo $substatus; ?>">
                                      </div>
                                    </div>                      
                                  </div>

                                  <?php  
                                      $sesEmail = $_SESSION['email'];
                                      $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                      $query = mysqli_query($db, $sql);

                                      while ( $row = mysqli_fetch_assoc($query) ) {
                                        $name    = $row['name'];
                                        $email  = $row['email'];
                                        $phone     = $row['phone'];
                                        $ow_image     = $row['image'];
                                        ?>
                                        <input type="hidden" class="form-control" name="ow_image" value="<?php echo $ow_image; ?>">
                                        <?php
                                      } 
                                    ?>


                                  <div class="row">
                                    <label for="">Products Images</label>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image One</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_one)) {
                                              echo '<img src="admin/assets/images/subcategory/' . $img_one . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_one">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Two</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_two)) {
                                              echo '<img src="admin/assets/images/subcategory/' . $img_two . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_two">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Three</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_three)) {
                                              echo '<img src="admin/assets/images/subcategory/' . $img_three . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_three">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Four</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_four)) {
                                              echo '<img src="admin/assets/images/subcategory/' . $img_four . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_four">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Five</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_five)) {
                                              echo '<img src="admin/assets/images/subcategory/' . $img_five . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_five">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Six</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_six)) {
                                              echo '<img src="admin/assets/images/subcategory/' . $img_six . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_six">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="mb-3">
                                    <div class="d-grid gap-2">
                                      <input type="hidden" name="rentSubId" value="<?php echo $sub_id; ?>">
                                      <input type="submit" name="updateRentSubCat" class="btn btn-dark px-5" value="Update Rent Product Info">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                              <?php
                            }

                        }
                      ?>
                      
                      <!-- END : FORM -->
                      
                    </div>

                  <?php }

                  else if ($do == "Update") {
                    if (isset($_POST['updateRentSubCat'])) {
                      $updateIdStore    = mysqli_real_escape_string($db, $_POST['rentSubId']);
                      $subname          = mysqli_real_escape_string($db, $_POST['subname']);
                      $ow_name          = mysqli_real_escape_string($db, $_POST['ow_name']);
                      $ow_email         = mysqli_real_escape_string($db, $_POST['ow_email']);
                      $ow_phone         = mysqli_real_escape_string($db, $_POST['ow_phone']);
                      $division         = mysqli_real_escape_string($db, $_POST['division']);
                      $district         = mysqli_real_escape_string($db, $_POST['district']);
                      $location         = mysqli_real_escape_string($db, $_POST['location']);
                      $price            = mysqli_real_escape_string($db, $_POST['price']);
                      $bed              = mysqli_real_escape_string($db, $_POST['bed']);
                      $kitchen          = mysqli_real_escape_string($db, $_POST['kitchen']);
                      $drawing          = mysqli_real_escape_string($db, $_POST['drawing']);
                      $dinning          = mysqli_real_escape_string($db, $_POST['dinning']);
                      $balcony          = mysqli_real_escape_string($db, $_POST['balcony']);
                      $garage           = mysqli_real_escape_string($db, $_POST['garage']);
                      $washroom         = mysqli_real_escape_string($db, $_POST['washroom']);
                      $totalRoom        = mysqli_real_escape_string($db, $_POST['totalRoom']);
                      $areaSize         = mysqli_real_escape_string($db, $_POST['areaSize']);
                      $floor            = mysqli_real_escape_string($db, $_POST['floor']);
                      $rank             = mysqli_real_escape_string($db, $_POST['rank']);
                      $decoration       = mysqli_real_escape_string($db, $_POST['decoration']);
                      $desk             = mysqli_real_escape_string($db, $_POST['desk']);
                      $wifi             = mysqli_real_escape_string($db, $_POST['wifi']);
                      $hottub           = mysqli_real_escape_string($db, $_POST['hottub']);
                      $currency         = mysqli_real_escape_string($db, $_POST['currency']);
                      $breakfast        = mysqli_real_escape_string($db, $_POST['breakfast']);
                      $restaurant       = mysqli_real_escape_string($db, $_POST['restaurant']);
                      $ac               = mysqli_real_escape_string($db, $_POST['ac']);
                      $pool             = mysqli_real_escape_string($db, $_POST['pool']);
                      $park             = mysqli_real_escape_string($db, $_POST['park']);
                      $gym              = mysqli_real_escape_string($db, $_POST['gym']);
                      $luggage          = mysqli_real_escape_string($db, $_POST['luggage']);
                      $sdesc            = mysqli_real_escape_string($db, $_POST['sdesc']);
                      $ldesc            = mysqli_real_escape_string($db, $_POST['ldesc']);
                      $map              = mysqli_real_escape_string($db, $_POST['map']);
                      $available        = $_POST['available'];
                      $is_parent        = mysqli_real_escape_string($db, $_POST['is_parent']);
                      $status           = mysqli_real_escape_string($db, $_POST['status']);
                      $imgOwn           = mysqli_real_escape_string($db, $_POST['ow_image']);

                      // For Image
                      // For Image One
                      $img_one    = mysqli_real_escape_string($db, $_FILES['img_one']['name']);
                      $tmpImgOne    = $_FILES['img_one']['tmp_name'];

                      if (!empty($img_one)) {
                        $oldImgOneSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgOneSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_one = $row['img_one'];
                          unlink('admin/assets/images/subcategory/' . $old_Img_one);
                        }

                        $img1 = rand(0, 999999) . "_" . $img_one;
                        move_uploaded_file($tmpImgOne, 'admin/assets/images/subcategory/' . $img1);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making
                        $updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_one='$img1' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allRentProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }

                      // For Image Two
                      $img_two    = mysqli_real_escape_string($db, $_FILES['img_two']['name']);
                      $tmpImgTwo    = $_FILES['img_two']['tmp_name'];

                      if (!empty($img_two)) {
                        $oldImgTwoSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgTwoSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Two = $row['img_two'];
                          unlink('admin/assets/images/subcategory/' . $old_Img_Two);
                        }

                        $img2 = rand(0, 999999) . "_" . $img_two;
                        move_uploaded_file($tmpImgTwo, 'admin/assets/images/subcategory/' . $img2);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making

                        $updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_two='$img2' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allRentProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }


                      // For Image Three
                      $img_three    = mysqli_real_escape_string($db, $_FILES['img_three']['name']);
                      $tmpImgThree  = $_FILES['img_three']['tmp_name'];

                      if (!empty($img_three)) {
                        $oldImgThreeSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgThreeSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Three = $row['img_three'];
                          unlink('admin/assets/images/subcategory/' . $old_Img_Three);
                        }

                        $img3 = rand(0, 999999) . "_" . $img_three;
                        move_uploaded_file($tmpImgThree, 'admin/assets/images/subcategory/' . $img3);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making

                        $updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_three='$img3' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allRentProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }

                      // For Image Four
                      $img_four   = mysqli_real_escape_string($db, $_FILES['img_four']['name']);
                      $tmpImgFour   = $_FILES['img_four']['tmp_name'];

                      if (!empty($img_four)) {
                        $oldImgFourSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgFourSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Four = $row['img_four'];
                          unlink('admin/assets/images/subcategory/' . $old_Img_Four);
                        }

                        $img4 = rand(0, 999999) . "_" . $img_four;
                        move_uploaded_file($tmpImgFour, 'admin/assets/images/subcategory/' . $img4);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making
                        $updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_four='$img4' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allRentProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }

                      // For Image Five
                      $img_five     = mysqli_real_escape_string($db, $_FILES['img_five']['name']);
                      $tmpImgFive   = $_FILES['img_five']['tmp_name'];

                      if (!empty($img_five)) {
                        $oldImgFiveSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgFiveSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Five = $row['img_five'];
                          unlink('admin/assets/images/subcategory/' . $old_Img_Five);
                        }

                        $img5 = rand(0, 999999) . "_" . $img_five;
                        move_uploaded_file($tmpImgFive, 'admin/assets/images/subcategory/' . $img5);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making
                        $updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_five='$img5' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allRentProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }


                    // For Image Six
                    $img_six    = mysqli_real_escape_string($db, $_FILES['img_six']['name']);
                    $tmpImgSix    = $_FILES['img_six']['tmp_name'];

                    if (!empty($img_six)) {
                      $oldImgSixSql = "SELECT * FROM rent_subcategory WHERE sub_id='$updateIdStore'";
                      $oldImageQuery = mysqli_query($db, $oldImgSixSql);

                      while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                        $old_Img_Six = $row['img_six'];
                        unlink('admin/assets/images/subcategory/' . $old_Img_Six);
                      }

                      $img6 = rand(0, 999999) . "_" . $img_six;
                      move_uploaded_file($tmpImgSix, 'admin/assets/images/subcategory/' . $img6);

                      // Start: For Slug Making
                      function createSlug($subname)
                      {
                        // Convert to Lower case
                        $slug = strtolower($subname);

                        // Remove Special Character
                        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                        // Replace multiple spaces or hyphens with a single hyphen
                        $slug = preg_replace('/[\s-]+/', ' ', $slug);

                        // Replace spaces with hyphens
                        $slug = preg_replace('/\s/', '-', $slug);

                        // Trim leading and trailing hyphens
                        $slug = trim($slug, '-');

                        return $slug;
                      }
                      $slug = createSlug($subname);
                      // End: For Slug Making
                      $updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_six='$img6' WHERE sub_id='$updateIdStore' ";
                      $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                      if ($updateRentCatQuery) {
                        header("Location: sellerDashboard.php?do=allRentProducts");
                      } else {
                        die("Mysql Error." . mysqli_error($db));
                      }
                    } 

                    else {

                      // Start: For Slug Making
                      function createSlug($subname)
                      {
                        // Convert to Lower case
                        $slug = strtolower($subname);

                        // Remove Special Character
                        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                        // Replace multiple spaces or hyphens with a single hyphen
                        $slug = preg_replace('/[\s-]+/', ' ', $slug);

                        // Replace spaces with hyphens
                        $slug = preg_replace('/\s/', '-', $slug);

                        // Trim leading and trailing hyphens
                        $slug = trim($slug, '-');

                        return $slug;
                      }
                      $slug = createSlug($subname);
                      // End: For Slug Making

                      $updateRentCatSql = "UPDATE rent_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status' WHERE sub_id='$updateIdStore' ";
                      $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                      if ($updateRentCatQuery) {
                        header("Location: sellerDashboard.php?do=allRentProducts");
                      } else {
                        die("Mysql Error." . mysqli_error($db));
                      }

                    }
                  } 
                }

                  else if ( $do == 'Invoice' ) { ?>                    
                    <h4 class="" style="margin: 0px auto; color:#023021;">My Invoice</h4>      

                    <!-- Table Start -->
                    <div class="table-responsive py-3">
                      <table id="example" class="table table-striped table-hover table-bordered" >
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">Invoice Id</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Renewal Date</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                            $sesEmail = $_SESSION['email'];
                            $sql = "SELECT * FROM transactions WHERE user_email='$sesEmail' ORDER BY id DESC";
                            $query = mysqli_query($db, $sql);
                            $count = mysqli_num_rows($query);

                            if ( $count == 0 ) { ?>
                              <div class="alert alert-danger text-center" role="alert">
                                Sorry! No Data Found..
                              </div>
                           <?php }
                           else {
                              $i = 0;
                              while ( $row = mysqli_fetch_assoc($query) ) {
                                $id               = $row['id'];
                                $transaction_id   = $row['transaction_id'];
                                $user_email       = $row['user_email'];
                                $package_name     = $row['package_name'];
                                $price            = $row['price'];
                                $transaction_date = $row['transaction_date'];
                                $renewal_date     = $row['renewal_date'];
                                $status           = $row['status'];
                                $i++;
                                ?>

                                <tr>
                                  <th scope="row"><?php echo $i; ?></th>
                                  <td><?php echo $package_name; ?></td>
                                  <td><?php echo $price; ?></td>
                                  <td><?php echo $transaction_id; ?></td>
                                  <td><?php echo $transaction_date; ?></td>
                                  <td><?php echo $renewal_date; ?></td>
                                  <td><?php 
                                    if ( $status == 1 ) { ?>
                                      <span class="badge text-bg-primary">Active</span>
                                    <?php }
                                    else if ( $status == 0 ) { ?>
                                      <span class="badge text-bg-warning">Pending</span>
                                    <?php }
                                  ?></td>
                                </tr>

                                <?php
                              }
                           }

                            

                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- Table End -->

                  <?php }

                  else if ( $do == 'Profile' ) { ?>                  
                    <div class="col-lg-12">
                      <div class="" style="border-left: 3px double #ffc107; padding: 0 2%;">
                          <h1 class="mt-5 mb-4" style="letter-spacing: 2px; color:#023021; font-size: 25px; font-weight:600;">Seller Information</h1>
                      </div>
                      <div class="user bg-light p-4" style="border-top: 4px solid #ffc107; border-radius: 10px;">

                        <?php  
                          $profileId = $_SESSION['email'];
                          $sql = "SELECT * FROM role WHERE email='$profileId' AND status=1";
                          $query = mysqli_query( $db, $sql );

                          while( $row = mysqli_fetch_assoc($query) ) {
                            $id       = $row['id'];
                              $name       = $row['name'];
                              $email      = $row['email'];
                              $phone      = $row['phone'];
                              $address      = $row['address'];
                              $password     = $row['password'];
                              $role       = $row['role'];
                              $image      = $row['image'];
                              $nid        = $row['nid'];
                              $status     = $row['status'];
                              $join_date    = $row['join_date'];
                              ?>
                              <form action="" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" required autocomplete="off" placeholder="enter name.." value="<?php echo $name; ?>">
                                  </div>

                                  <div class="mb-3">
                                    <label>Email Address</label>
                                    <p name="email" class="form-control text-danger"><?php echo $email; ?></p>
                                    <input type="hidden" name="email" class="form-control" required autocomplete="off" placeholder="enter name.." value="<?php echo $email; ?>">
                                  </div>

                                  <div class="mb-3">
                                    <label>Phone No</label>
                                    <input type="tel" name="phone" class="form-control" required autocomplete="off" placeholder="+880 1...." value="<?php echo "$phone"; ?>">
                                  </div>

                                  <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" autocomplete="off" placeholder="**********">
                                  </div>
                                  <div class="mb-3">
                                    <label>Re-Password</label>
                                    <input type="password" name="repassword" class="form-control" autocomplete="off" placeholder="**********">
                                  </div>

                                  <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" id="" cols="30" rows="3" required autocomplete="off" placeholder="address.."><?php echo $address; ?></textarea>
                                  </div>
                                  
                                </div>
                                <div class="col-lg-6">
                                  

                                  <input type="hidden" value="4" name="role">
                                  <input type="hidden" value="1" name="status">

                                  <div class="mb-3">
                                    <label for="">User Image</label>
                                    <br><br>
                                      <?php 
                                            if ( !empty( $image ) ) {
                                          echo '<img src="admin/assets/images/role/' . $image . '" alt="" style="width: 60%;">';
                                            }
                                            else { 
                                          echo '<img src="admin/assets/images/dummy.jpg" alt="" style="width: 60%;">';
                                            }
                                          ?>
                                      <br><br>
                                    <input type="file" class="form-control" name="image">
                                  </div>

                                  <div class="mb-3">
                                    <label for="">Nid Card</label>
                                    <br><br>
                                    <?php 
                                          if ( !empty( $nid ) ) {
                                        echo '<img src="admin/assets/images/role/nid/' . $nid . '" alt="" style="width: 100%;">';
                                          }
                                          else { 
                                        echo 'Not Uploaded';
                                          }
                                        ?>
                                    <br><br>
                                    <input type="file" class="form-control" name="nid">
                                  </div>

                                  <div class="mb-3">
                                    <div class="d-grid gap-2">
                                      <input type="hidden" name="updateId" value="<?php echo $id; ?>">
                                      <input type="submit" name="updateRole" class="btn btn-dark px-5 quBtn" value="Update">
                                    </div>                      
                                  </div>

                                  
                                </div>
                              </div>    
                            </form>
                              <?php
                          }
                        ?>

                        <!-- START : FORM -->
                        

                        <?php  
                          if (isset( $_POST['updateRole'] )) {

                              $updateIdStore  = mysqli_real_escape_string($db, $_POST['updateRole']);
                              $updateId     = mysqli_real_escape_string($db, $_POST['updateId']);
                              $name       = mysqli_real_escape_string($db, $_POST['name']);
                              $email      = mysqli_real_escape_string($db, $_POST['email']);
                              $phone      = mysqli_real_escape_string($db, $_POST['phone']);
                              $address    = mysqli_real_escape_string($db, $_POST['address']);
                              $password     = mysqli_real_escape_string($db, $_POST['password']);
                              $repassword   = mysqli_real_escape_string($db, $_POST['repassword']);
                              $role       = mysqli_real_escape_string($db, $_POST['role']);
                              $status     = mysqli_real_escape_string($db, $_POST['status']);

                              $image      = mysqli_real_escape_string($db, $_FILES['image']['name']);
                              $tmpImg     = $_FILES['image']['tmp_name'];

                              $nid      = mysqli_real_escape_string($db, $_FILES['nid']['name']);
                              $tmpNidImg    = $_FILES['nid']['tmp_name'];

                              if ( !empty( $password ) && !empty($image) && !empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  // DELETE OLD IMAGE FROM FOLDER
                                  $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                  while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                    $oldImg = $row['image'];
                                    unlink("admin/assets/images/role/$img" . $oldImg);
                                  } 
                                  $img = rand(0, 999999) . "_" . $image;
                                  move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);

                                  // DELETE NID FROM FOLDER
                                  $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                  while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                    $oldNid = $row['nid'];
                                    unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                  } 
                                  $nidImg = rand(0, 999999) . "_" . $nid;
                                  move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', image='$img', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( !empty( $password ) && !empty($image) && empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  // DELETE OLD IMAGE FROM FOLDER
                                  $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                  while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                    $oldImg = $row['image'];
                                    unlink("admin/assets/images/role/$img" . $oldImg);
                                  } 
                                  $img = rand(0, 999999) . "_" . $image;
                                  move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);


                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( !empty( $password ) && empty($image) && !empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  // DELETE NID FROM FOLDER
                                  $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                  $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                  while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                    $oldNid = $row['nid'];
                                    unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                  } 
                                  $nidImg = rand(0, 999999) . "_" . $nid;
                                  move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( empty( $password ) && !empty($image) && !empty($nid) ) {
                                // DELETE OLD IMAGE FROM FOLDER
                                $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                  $oldImg = $row['image'];
                                  unlink("admin/assets/images/role/$img" . $oldImg);
                                } 
                                $img = rand(0, 999999) . "_" . $image;
                                move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);

                                // DELETE NID FROM FOLDER
                                $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                  $oldNid = $row['nid'];
                                  unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                } 
                                $nidImg = rand(0, 999999) . "_" . $nid;
                                move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', image='$img', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else if ( empty( $password ) && empty($image) && !empty($nid) ) {
                                

                                // DELETE NID FROM FOLDER
                                $oldNidSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldNidQuery = mysqli_query( $db, $oldNidSql );

                                while ( $row = mysqli_fetch_assoc($oldNidQuery) ){
                                  $oldNid = $row['nid'];
                                  unlink("admin/assets/images/role/nid/$nidImg" . $oldNid);
                                } 
                                $nidImg = rand(0, 999999) . "_" . $nid;
                                move_uploaded_file($tmpNidImg, 'admin/assets/images/role/nid/' . $nidImg);


                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', nid='$nidImg', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else if ( empty( $password ) && !empty($image) && empty($nid) ) {
                                // DELETE OLD IMAGE FROM FOLDER
                                $oldImgSql = "SELECT * FROM role WHERE id='$updateId'";
                                $oldIMgQuery = mysqli_query( $db, $oldImgSql );

                                while ( $row = mysqli_fetch_assoc($oldIMgQuery) ){
                                  $oldImg = $row['image'];
                                  unlink("admin/assets/images/role/$img" . $oldImg);
                                } 
                                $img = rand(0, 999999) . "_" . $image;
                                move_uploaded_file($tmpImg, 'admin/assets/images/role/' . $img);

                                


                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', image='$img', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else if ( !empty( $password ) && empty($image) && empty($nid) ) {
                                if ( $password == $repassword ) {
                                  $hassedPass = sha1($password);

                                  

                                  // Sql Update
                                  $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', password='$hassedPass', role='$role', status='$status', join_date=now() WHERE id='$updateId'";
                                  $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                  if ($updateRoleQuery) {
                                    header("Location: sellerDashboard.php?do=Manage");
                                  }
                                  else {
                                    die ( "Mysqli Error." . mysqli_error($db) );
                                  }

                                }
                                
                              }

                              else if ( empty( $password ) && empty($image) && empty($nid) ) {

                                // Sql Update
                                $updateRoleSql = "UPDATE role SET name='$name', email='$email', phone='$phone', address='$address', role='$role', status='$status', join_date=now() WHERE id='$updateId'";
                                $updateRoleQuery = mysqli_query( $db, $updateRoleSql );

                                if ($updateRoleQuery) {
                                  header("Location: sellerDashboard.php?do=Manage");
                                }
                                else {
                                  die ( "Mysqli Error." . mysqli_error($db) );
                                }
                                
                              }

                              else { ?>
                                <div class="alert alert-warning text-center" role="alert">
                                  Sorry! please password and repassword use same input.
                                </div>
                              <?php }         

                              

                            }
                        ?>

                        
                        <!-- END : FORM -->
                      </div>
                    </div>             
                  <?php }

                  else if ( $do == 'Support' ) { ?>
                    <!-- STRAT: PACKAGE PART -->
                    <section class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center pb-3">
                                    <h3 style="letter-spacing: 3px; color:#023021; font-size: 40px; font-weight:600;">Contact Us!</h3>
                                    <p style="letter-spacing: 1px; color:#023021;">We Have the Features and Service You Deserve!</p>
                                </div>

                                <div class="py-2">

                                    <h6 style="color: #000;">Phone No: 01731-578788</h6>
                                    <h6 style="color: #000;">Email Address: Shohanurrahmanshohan.cs@gmail.com</h6>
                                    <h6 style="color: #000;">Website: <a href="https://shohancs.com/">https://shohancs.com/</a></h6>
                                    <h6 style="color: #000;">Linkdin: <a href="https://www.linkedin.com/in/shohancs/">https://www.linkedin.com/in/shohancs/</a></h6>
                                    <h6 style="color: #000;">Github: <a href="https://github.com/shohancs">https://github.com/shohancs</a></h6>
                                </div>
                                <!-- START: QUESTION PART -->
                                 <section class="pb-5">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 question_part">
                                                <div class="bg-white " style="margin: 10% auto; width: 65%;">
                                                    <h4 class="px-5 py-3" style="background: #1a7e00; color: #fff;">Got Questions? Ask Away!</h4 class="p-3">
                                                    <form action="" method="POST" class="px-5 py-5">
                                                        <div class="row">
                                                            <!--  -->
                                                            <?php  
                                                                if ( !empty( $_SESSION['email'] ) ) { ?>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Message</label>
                                                                        <textarea name="msg" id="" class="form-control" placeholder="write here..." rows="5" required></textarea>
                                                                    </div>
                                                                    <div class="d-grid gap-2">
                                                                        <?php  
                                                                            if ( isset( $_SESSION['email'] ) ) {
                                                                                $sesId = $_SESSION['email'];

                                                                                $sql = "SELECT * FROM role WHERE email='$sesId'";
                                                                                $query = mysqli_query($db, $sql);

                                                                                while ( $row = mysqli_fetch_assoc($query) ) {
                                                                                    $id             = $row['id'];
                                                                                    $name           = $row['name'];
                                                                                    $email          = $row['email'];
                                                                                    $phone          = $row['phone'];
                                                                                    $address        = $row['address'];
                                                                                    $password       = $row['password'];
                                                                                    $role           = $row['role'];
                                                                                    $image          = $row['image'];
                                                                                    $nid            = $row['nid'];
                                                                                    $status         = $row['status'];
                                                                                    ?>
                                                                                    <input type="hidden" name="fname" value="<?php echo $name; ?>">
                                                                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                                                    <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                                                                                    <input type="hidden" name="role" value="<?php echo $role; ?>">
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                        <input type="hidden" name="status" value="2">
                                                                        
                                                                        <!--  -->
                                                                        <?php  
                                                                            if ( !empty( $_SESSION['email'] ) ) { ?>
                                                                                <input type="submit" name="masg" value="SUBMIT" class="btn btn-primary quBtn">
                                                                            <?php }
                                                                            else { ?>
                                                                                <div class="alert alert-info my-4 text-center" role="alert">
                                                                                  Login to reserve you service. <a href="login.php">Click Here</a>
                                                                                </div>
                                                                           <?php }
                                                                        ?>
                                                                        <!--  -->
                                                                        
                                                                    </div>
                                                                <?php }
                                                                else { ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="" class="form-label">First Name</label>
                                                                            <input type="text" name="fname" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="" class="form-label">Last Name</label>
                                                                            <input type="text" name="lname" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="" class="form-label">Email Address</label>
                                                                            <input type="email" name="email" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label for="" class="form-label">Phone</label>
                                                                            <input type="tel" name="phone" class="form-control" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Message</label>
                                                                        <textarea name="msg" id="" class="form-control" placeholder="write here..." rows="5" required></textarea>
                                                                    </div>
                                                                    <div class="d-grid gap-2">
                                                                        <input type="hidden" name="status" value="2">
                                                                        <input type="hidden" name="role" value="3">
                                                                        <input type="submit" name="masg" value="SUBMIT" class="btn btn-primary quBtn">
                                                                        
                                                                    </div>
                                                               <?php }
                                                            ?>
                                                            <!--  -->
                                                            
                                                        </div>
                                                        
                                                    </form>
                                                    <?php  
                                                        if ( isset($_POST['masg']) ) {
                                                            $fname  = mysqli_real_escape_string($db, $_POST['fname']);
                                                            $lname  = mysqli_real_escape_string($db, $_POST['lname']);
                                                            $email  = mysqli_real_escape_string($db, $_POST['email']);
                                                            $phone  = mysqli_real_escape_string($db, $_POST['phone']);
                                                            $msg    = mysqli_real_escape_string($db, $_POST['msg']);
                                                            $role   = mysqli_real_escape_string($db, $_POST['role']);
                                                            $status = mysqli_real_escape_string($db, $_POST['status']);

                                                            $sql = "INSERT INTO message (role, status, fname, lname, email, phone, msg, join_date) VALUES('$role', '$status', '$fname', '$lname', '$email', '$phone', '$msg', now())";
                                                            $query = mysqli_query($db, $sql);

                                                            if ( $query ) {
                                                                header('Location: sellerDashboard.php?do=Support');
                                                            }
                                                            else {
                                                                die("Mysqli_Error" . mysqli_error($db));
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                 </section>
                                <!-- END: QUESTION PART -->

                                

                            </div>
                        </div>
                    </section>
                    <!-- END: PACKAGE PART -->
                  <?php }


                  // For Buy

                  else if ( $do == 'allBuyProducts' ) { ?>    

                    <div class="row py-3">
                      <div class="col-lg-6">
                        <h4 class="" style="margin: 0px auto; color:#023021;">My All Buy Products</h4>
                      </div>
                      <div class="col-lg-6 text-end">
                        <a href="sellerDashboard.php?do=buyAdd" class="btn btn-dark">Add New Buy Product</a>
                      </div>
                    </div>              
                          

                    <!-- Table Start -->
                    <div class="table-responsive py-3">
                      <table id="example" class="table table-striped table-hover table-bordered" >
                        <thead class="table-dark">
                          <tr>
                            <th scope="col text-center">Id</th>
                            <th scope="col text-center">Title</th>
                            <th scope="col text-center">Category</th>
                            <th scope="col text-center">Price</th>
                            <th scope="col text-center">Status</th>
                            <th scope="col text-center">Join Date</th>
                            <th scope="col text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                            $sesEmail = $_SESSION['email'];
                            $sql = "SELECT * FROM buy_subcategory WHERE ow_email='$sesEmail' ORDER BY sub_id DESC";
                            $query = mysqli_query($db, $sql);
                            $count = mysqli_num_rows($query);

                            if ( $count == 0 ) { ?>
                              <div class="alert alert-danger text-center" role="alert">
                                Sorry! No Data Found..
                              </div>
                           <?php }
                           else {
                              $i = 0;
                              while ( $row = mysqli_fetch_assoc($query) ) {
                                $sub_id       = $row['sub_id'];
                                $is_parent    = $row['is_parent'];
                                $subcat_name  = $row['subcat_name'];
                                $slug         = $row['slug'];
                                $ow_name      = $row['ow_name'];
                                $ow_email     = $row['ow_email'];
                                $ow_phone     = $row['ow_phone'];
                                $district     = $row['district'];
                                $division_id  = $row['division_id'];
                                $location     = $row['location'];
                                $price        = $row['price'];
                                $bed          = $row['bed'];
                                $kitchen      = $row['kitchen'];
                                $washroom     = $row['washroom'];
                                $totalroom    = $row['totalroom'];
                                $area_size    = $row['area_size'];
                                $floor        = $row['floor'];
                                $rank         = $row['rank'];
                                $decoration   = $row['decoration'];
                                $desk         = $row['desk'];
                                $wifi         = $row['wifi'];
                                $hottub       = $row['hottub'];
                                $currency     = $row['currency'];
                                $ac           = $row['ac'];
                                $pool         = $row['pool'];
                                $park         = $row['park'];
                                $gym          = $row['gym'];
                                $luggage      = $row['luggage'];
                                $drwaing      = $row['drwaing'];
                                $dinning      = $row['dinning'];
                                $balcony      = $row['balcony'];
                                $garage       = $row['garage'];
                                $breakfast    = $row['breakfast'];
                                $restourant    = $row['restourant'];
                                $availability    = $row['availability'];
                                $short_desc   = $row['short_desc'];
                                $long_desc    = $row['long_desc'];
                                $ow_image     = $row['ow_image'];
                                $img_one      = $row['img_one'];
                                $img_two      = $row['img_two'];
                                $img_three    = $row['img_three'];
                                $img_four     = $row['img_four'];
                                $img_five     = $row['img_five'];
                                $img_six      = $row['img_six'];
                                $status       = $row['status'];
                                $google_map   = $row['google_map'];
                                $join_date    = $row['join_date'];
                                $i++;
                                ?>

                                <tr>
                                  <th scope="row"><?php echo $i; ?></th>
                                  <td><?php echo $subcat_name; ?></td>
                                  <td>
                                    <?php  
                                      $rentcategorySql = "SELECT * FROM buy_category WHERE id = '$is_parent' AND status = 1 ORDER BY name ASC";
                                      $rentcategoryQuery = mysqli_query($db, $rentcategorySql);

                                      while ($row = mysqli_fetch_assoc($rentcategoryQuery)) {
                                        $cat_id     = $row['id'];
                                        $cat_name     = $row['name'];
                                        ?>
                                        <span class="badge rounded-pill text-bg-primary"><?php echo $cat_name; ?></span>
                                        <?php
                                      }
                                    ?>
                                  </td>
                                  <td><?php echo $price; ?></td>
                                  <td><?php 
                                    if ( $status == 1 ) { ?>
                                      <span class="badge text-bg-primary">Active</span>
                                    <?php }
                                    else if ( $status == 2 ) { ?>
                                      <span class="badge text-bg-warning">Pending</span>
                                    <?php }
                                    else if ( $status == 3 ) { ?>
                                      <span class="badge text-bg-info">Approve</span>
                                    <?php }
                                     else if ( $status == 4 ) { ?>
                                      <span class="badge text-bg-danger">Decline</span>
                                    <?php }
                                    else if ( $status == 0 ) { ?>
                                      <span class="badge text-bg-danger">Not Active</span>
                                    <?php }
                                  ?></td>
                                  <td><?php echo $join_date; ?></td>
                                  <td class="text-center">
                                    <div class="action-btn">
                                      <ul>
                                        <li>
                                          <a href="sellerDashboard.php?do=buyEdit&editId=<?php echo $sub_id ; ?>" class="btn btn-outline-primary" style="margin: 0px 15px;"><i class="fa-solid fa-pencil"></i> Edit and check</a> 
                                          <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#dId<?php echo $sub_id ; ?>"><i class="fa-regular fa-eye-slash"></i> Delete</a>
                                        </li>
                                      </ul>
                                    </div>

                                    <!-- START: MODAL -->
                                <div class="modal fade" id="dId<?php echo $sub_id ; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Alert!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to Delete?</h1>                                       
                                      </div>

                                      <div class="modal-footer justify-content-around">
                                        <?php  
                                            if ( $status == 1 ) {
                                                echo "Sorry! Please Contact with Support. Thanks";
                                            }
                                            else { ?>
                                                <ul>
                                                  <li>
                                                    <a href="sellerDashboard.php?do=buyDelete&dData=<?php echo $sub_id ; ?>" class="btn btn-primary">Yes</a>
                                                    <a href="" class="btn btn-dark" data-bs-dismiss="modal">No</a>
                                                  </li>
                                                </ul>
                                            <?php }
                                        ?>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                    <!-- END: MODAL -->
                                </tr>

                                <?php
                              }
                           }

                            

                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- Table End -->

                  <?php }

                  else if ($do == "buyDelete") {
                        if (isset($_GET['dData'])) {
                            $deleteData = $_GET['dData'];
                            $deleteSQL = "DELETE FROM buy_subcategory WHERE sub_id='$deleteData' ";
                            $deleteQuery = mysqli_query($db, $deleteSQL);

                            if ($deleteQuery) {
                                header("Location: sellerDashboard.php?do=allBuyProducts");
                            } else {
                                die("Mysqli_Error" . mysqli_error($db));
                            }
                        }
                    }

                  else if ( $do == 'buyAdd' ) { ?>    

                    <div class="row pt-3 pb-2">
                      <div class="col-lg-6">
                        <h4 class="" style="margin: 0px auto; color:#023021;">Add New Buy Products</h4>
                      </div>
                      <div class="col-lg-6 text-end">
                        <a href="sellerDashboard.php?do=allBuyProducts" class="btn btn-dark">My All Buy Products</a>
                      </div>
                    </div>    
                    <hr class="">

                    <div class="p-5 bg-light">
                      <!-- START : FORM -->
                      <form action="sellerDashboard.php?do=buyStore" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label>Sub Category Name</label>
                              <input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name..">
                            </div>
                            <div class="mb-3">
                              <input type="hidden" name="ow_name" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['name']; ?>">
                              <input type="hidden" name="ow_email" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['email']; ?>">
                              <?php  
                                $sesEmail = $_SESSION['email'];
                                $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                $query = mysqli_query($db, $sql);

                                while ( $row = mysqli_fetch_assoc($query) ) {
                                  $name    = $row['name'];
                                  $email  = $row['email'];
                                  $phone     = $row['phone'];
                                  ?>
                                  <input type="hidden" name="ow_phone" class="form-control" required autocomplete="off" value="<?php echo $phone; ?>">
                                  <?php
                                } 
                              ?>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Division</label>
                                  <select class="form-select" name="division">
                                    <option>Select the Division</option>
                                    <?php  
                                      $sql = "SELECT * FROM buy_division WHERE status=1 ORDER BY priority ASC";
                                      $query = mysqli_query($db, $sql);

                                      while ( $row = mysqli_fetch_assoc($query) ) {
                                        $id       = $row['id'];
                                          $name       = $row['name'];
                                          $priority     = $row['priority'];
                                          $status     = $row['status'];
                                          ?>
                                            
                                          <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                          <?php
                                      }
                                    ?>
                                    
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>District</label>
                                  <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district..">
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label>House Number & Location</label>
                              <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location..">
                            </div>

                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Category Name</label>
                                  <select class="form-select" name="is_parent">
                                    <option>Please Select the Category</option>
                                    <?php
                                    $catSql = "SELECT * FROM buy_category WHERE status=1";
                                    $catQuery = mysqli_query($db, $catSql);

                                    while ($row = mysqli_fetch_assoc($catQuery)) {
                                      $cat_id = $row['id'];
                                      $catname = $row['name'];
                                    ?>
                                      <option value="<?php echo $cat_id ?>"> - <?php echo $catname; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Price <sup>(Taka)</sup></label>
                                  <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Bed</label>
                                  <input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Kitchen</label>
                                  <input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Drawing</label>
                                  <input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Dinning</label>
                                  <input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Balcony</label>
                                  <input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony..">
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="mb-3">
                                  <label>Garage</label>
                                  <input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage..">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Area Size <sup>(Sq Ft)</sup></label>
                                  <input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area..">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                    <label>Katha <sup>(size)</sup></label>
                                    <input type="text" name="katha" class="form-control"  autocomplete="off" placeholder="enter size of area katha..">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label>Bathroom</label>
                                  <input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom..">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label>Total Room</label>
                                  <input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room..">
                                </div>
                              </div>

                              
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
                                  <input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area..">
                                </div>
                              </div>

                              <label for="">For Hotel And Other Category</label>

                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Ranking For Hotel</label>
                                  <select name="rank" class="form-select">
                                    <option>select Here</option>
                                    <option value="1">5 Star</option>
                                    <option value="2">4 Star</option>
                                    <option value="3">3 Star</option>
                                    <option value="4">2 Star</option>
                                    <option value="5">1 Star</option>
                                  </select>
                                </div>
                              </div>                      

                              <div class="col-lg-3">
                                <div class="mb-3">
                                  <label>Decoration</label>
                                  <select name="decoration" class="form-select">
                                    <option>select Here</option>
                                    <option value="1">Furnished</option>
                                    <option value="2">Semi-Furnished</option>
                                    <option value="3">Non-Furnished</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-lg-3">
                                
                                <div class="form-check">
                                  <input name="desk" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Front desk [24-hour]
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="wifi" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Free Wi-Fi in all rooms!
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="hottub" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Hot tub
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="currency" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Currency exchange
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="breakfast" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Breakfast
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="restourant" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Restourant
                                  </label>
                                </div>
                                
                              </div>

                              <div class="col-lg-3">
                                
                                <div class="form-check">
                                  <input name="ac" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Air conditioning
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="pool" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Swimming pool(indoor)
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="park" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Car park
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="gym" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Fitness center
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input name="luggage" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Luggage storage
                                  </label>
                                </div>
                                
                              </div>

                            </div>

                          </div>
                          <div class="col-lg-6">
                            <div class="mb-3">
                              <label>Short Description</label>
                              <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."></textarea>
                            </div>
                            <div class="mb-3">
                              <label>Long Description</label>
                              <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."></textarea>
                            </div>
                            <div class="mb-3">
                              <label>Google Embed Map URL <sup>(iframe)</sup></label>
                              <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"></textarea>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Available on</label>
                                  <input type="date" name="availabe" class="form-control">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <input type="hidden" name="status" value="2">
                                </div>
                              </div>                      
                            </div>

                            <?php  
                                $sesEmail = $_SESSION['email'];
                                $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                $query = mysqli_query($db, $sql);

                                while ( $row = mysqli_fetch_assoc($query) ) {
                                  $name    = $row['name'];
                                  $email  = $row['email'];
                                  $phone     = $row['phone'];
                                  $ow_image     = $row['image'];
                                  ?>
                                  <input type="hidden" class="form-control" name="ow_image" value="<?php echo $ow_image; ?>">
                                  <?php
                                } 
                              ?>


                            <div class="row">
                              <label for="">Products Images</label>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image One</label>
                                  <input type="file" class="form-control" name="img_one">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Two</label>
                                  <input type="file" class="form-control" name="img_two">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Three</label>
                                  <input type="file" class="form-control" name="img_three">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Four</label>
                                  <input type="file" class="form-control" name="img_four">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Five</label>
                                  <input type="file" class="form-control" name="img_five">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label>Image Six</label>
                                  <input type="file" class="form-control" name="img_six">
                                </div>
                              </div>
                            </div>


                            <div class="mb-3">
                              <div class="d-grid gap-2">
                                <input type="submit" name="addSubCat" class="btn btn-dark px-5" value="Add New Buy Product">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <!-- END : FORM -->
                      
                    </div>

                  <?php }                  

                  else if ($do == "buyStore") {
                    if (isset($_POST['addSubCat'])) {
                      $subname    = mysqli_real_escape_string($db, $_POST['subname']);
                      $ow_name    = mysqli_real_escape_string($db, $_POST['ow_name']);
                      $ow_email     = mysqli_real_escape_string($db, $_POST['ow_email']);
                      $ow_phone     = mysqli_real_escape_string($db, $_POST['ow_phone']);
                      $division   = mysqli_real_escape_string($db, $_POST['division']);
                      $district     = mysqli_real_escape_string($db, $_POST['district']);
                      $location     = mysqli_real_escape_string($db, $_POST['location']);
                      $price      = mysqli_real_escape_string($db, $_POST['price']);
                      $bed      = mysqli_real_escape_string($db, $_POST['bed']);
                      $kitchen    = mysqli_real_escape_string($db, $_POST['kitchen']);
                      $drawing    = mysqli_real_escape_string($db, $_POST['drawing']);
                      $dinning    = mysqli_real_escape_string($db, $_POST['dinning']);
                      $balcony    = mysqli_real_escape_string($db, $_POST['balcony']);
                      $garage     = mysqli_real_escape_string($db, $_POST['garage']);
                      $washroom     = mysqli_real_escape_string($db, $_POST['washroom']);
                      $totalRoom    = mysqli_real_escape_string($db, $_POST['totalRoom']);
                      $areaSize     = mysqli_real_escape_string($db, $_POST['areaSize']);
                      $katha     = mysqli_real_escape_string($db, $_POST['katha']);
                      $floor      = mysqli_real_escape_string($db, $_POST['floor']);
                      $rank       = mysqli_real_escape_string($db, $_POST['rank']);
                      $decoration   = mysqli_real_escape_string($db, $_POST['decoration']);
                      $desk       = mysqli_real_escape_string($db, $_POST['desk']);
                      $wifi       = mysqli_real_escape_string($db, $_POST['wifi']);
                      $hottub     = mysqli_real_escape_string($db, $_POST['hottub']);
                      $currency     = mysqli_real_escape_string($db, $_POST['currency']);
                      $breakfast    = mysqli_real_escape_string($db, $_POST['breakfast']);
                      $restourant   = mysqli_real_escape_string($db, $_POST['restourant']);
                      $ac       = mysqli_real_escape_string($db, $_POST['ac']);
                      $pool       = mysqli_real_escape_string($db, $_POST['pool']);
                      $park       = mysqli_real_escape_string($db, $_POST['park']);
                      $gym      = mysqli_real_escape_string($db, $_POST['gym']);
                      $luggage    = mysqli_real_escape_string($db, $_POST['luggage']);
                      $sdesc      = mysqli_real_escape_string($db, $_POST['sdesc']);
                      $ldesc      = mysqli_real_escape_string($db, $_POST['ldesc']);
                      $map      = mysqli_real_escape_string($db, $_POST['map']);
                      $availabe   = $_POST['availabe'];
                      $is_parent    = mysqli_real_escape_string($db, $_POST['is_parent']);
                      $status     = mysqli_real_escape_string($db, $_POST['status']);
                      $imgOwn     = mysqli_real_escape_string($db, $_POST['ow_image']);

                      // For Image One
                      $img_one    = mysqli_real_escape_string($db, $_FILES['img_one']['name']);
                      $tmpImgOne    = $_FILES['img_one']['tmp_name'];

                      if (!empty($img_one)) {
                        $img1 = rand(0, 999999) . "_" . $img_one;
                        move_uploaded_file($tmpImgOne, 'admin/assets/images/buy_subcategory/' . $img1);
                      } else {
                        $img1 = '';
                      }

                      // For Image Two
                      $img_two    = mysqli_real_escape_string($db, $_FILES['img_two']['name']);
                      $tmpImgTwo    = $_FILES['img_two']['tmp_name'];

                      if (!empty($tmpImgTwo)) {
                        $img2 = rand(0, 999999) . "_" . $img_two;
                        move_uploaded_file($tmpImgTwo, 'admin/assets/images/buy_subcategory/' . $img2);
                      } else {
                        $img2 = '';
                      }

                      // For Image Three
                      $img_three    = mysqli_real_escape_string($db, $_FILES['img_three']['name']);
                      $tmpImgThree  = $_FILES['img_three']['tmp_name'];

                      if (!empty($img_three)) {
                        $img3 = rand(0, 999999) . "_" . $img_three;
                        move_uploaded_file($tmpImgThree, 'admin/assets/images/buy_subcategory/' . $img3);
                      } else {
                        $img3 = '';
                      }

                      // For Image Four
                      $img_four   = mysqli_real_escape_string($db, $_FILES['img_four']['name']);
                      $tmpImgFour   = $_FILES['img_four']['tmp_name'];

                      if ($img_four) {
                        $img4 = rand(0, 999999) . "_" . $img_four;
                        move_uploaded_file($tmpImgFour, 'admin/assets/images/buy_subcategory/' . $img4);
                      } else {
                        $img4 = '';
                      }

                      // For Image Five
                      $img_five     = mysqli_real_escape_string($db, $_FILES['img_five']['name']);
                      $tmpImgFive   = $_FILES['img_five']['tmp_name'];

                      if (!empty($img_five)) {
                        $img5 = rand(0, 999999) . "_" . $img_five;
                        move_uploaded_file($tmpImgFive, 'admin/assets/images/buy_subcategory/' . $img5);
                      } else {
                        $img5 = '';
                      }

                      // For Image Six
                      $img_six    = mysqli_real_escape_string($db, $_FILES['img_six']['name']);
                      $tmpImgSix    = $_FILES['img_six']['tmp_name'];

                      if (!empty($img_six)) {
                        $img6 = rand(0, 999999) . "_" . $img_six;
                        move_uploaded_file($tmpImgSix, 'admin/assets/images/buy_subcategory/' . $img6);
                      } else {
                        $img6 = '';
                      }


                      // Start: For Slug Making
                      function createSlug($subname)
                      {
                        // Convert to Lower case
                        $slug = strtolower($subname);

                        // Remove Special Character
                        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                        // Replace multiple spaces or hyphens with a single hyphen
                        $slug = preg_replace('/[\s-]+/', ' ', $slug);

                        // Replace spaces with hyphens
                        $slug = preg_replace('/\s/', '-', $slug);

                        // Trim leading and trailing hyphens
                        $slug = trim($slug, '-');

                        return $slug;
                      }
                      $slug = createSlug($subname);
                      // End: For Slug Making

                      $addSubCategorySql = "INSERT INTO buy_subcategory ( subcat_name, slug, is_parent, ow_name, ow_email, ow_phone, district, division_id, location, price, bed, kitchen, washroom, totalroom, area_size, katha, floor, rank, decoration, desk, wifi, hottub, currency, breakfast, restourant, ac, pool, park, gym, luggage, drwaing, dinning, balcony, garage, availability, short_desc, long_desc, ow_image, img_one, img_two, img_three, img_four, img_five, img_six, status, google_map, join_date ) VALUES ( '$subname', '$slug', '$is_parent', '$ow_name', '$ow_email', '$ow_phone', '$district', '$division', '$location', '$price', '$bed', '$kitchen', '$washroom', '$totalRoom', '$areaSize', '$katha', '$floor', '$rank', '$decoration', '$desk', '$wifi', '$hottub', '$currency', '$breakfast', '$restourant', '$ac', '$pool', '$park', '$gym', '$luggage', '$drawing', '$dinning', '$balcony', '$garage', '$availabe', '$sdesc', '$ldesc', '$imgOwn', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$status', '$map', now() )";
                      $addQuery = mysqli_query($db, $addSubCategorySql);

                      if ($addQuery) {
                        header("Location: sellerDashboard.php?do=allBuyProducts");
                      } else {
                        die("Mysql Error." . mysqli_error($db));
                      }
                    }
                  } 

                  else if ( $do == 'buyEdit' ) { ?>    


                    <div class="row pt-3 pb-2">
                      <div class="col-lg-6">
                        <h4 class="" style="margin: 0px auto; color:#023021;">Edit Rent Products</h4>
                      </div>
                      <div class="col-lg-6 text-end">
                        <a href="sellerDashboard.php?do=allBuyProducts" class="btn btn-dark">My All Buy Products</a>
                      </div>
                    </div>    
                    <hr class="">

                    <div class="p-5 bg-light">
                      <!-- START : FORM -->
                      <?php  
                        if ( isset($_GET['editId']) ) {
                          $editIdStore =  $_GET['editId'];
                          $editSql = "SELECT * FROM buy_subcategory WHERE sub_id='$editIdStore'";
                          $editQuery = mysqli_query( $db, $editSql );

                          while ( $row = mysqli_fetch_assoc( $editQuery ) ) {
                              $sub_id       = $row['sub_id'];
                              $is_parent    = $row['is_parent'];
                              $subcat_name  = $row['subcat_name'];
                              $slug         = $row['slug'];
                              $ow_name      = $row['ow_name'];
                              $ow_email     = $row['ow_email'];
                              $ow_phone     = $row['ow_phone'];
                              $district     = $row['district'];
                              $division_id  = $row['division_id'];
                              $location     = $row['location'];
                              $price        = $row['price'];
                              $bed          = $row['bed'];
                              $kitchen      = $row['kitchen'];
                              $katha        = $row['katha'];
                              $washroom     = $row['washroom'];
                              $totalroom    = $row['totalroom'];
                              $area_size    = $row['area_size'];
                              $floor        = $row['floor'];
                              $rank         = $row['rank'];
                              $decoration   = $row['decoration'];
                              $desk         = $row['desk'];
                              $wifi         = $row['wifi'];
                              $hottub       = $row['hottub'];
                              $currency     = $row['currency'];
                              $ac           = $row['ac'];
                              $pool         = $row['pool'];
                              $park         = $row['park'];
                              $gym          = $row['gym'];
                              $luggage      = $row['luggage'];
                              $drwaing      = $row['drwaing'];
                              $dinning      = $row['dinning'];
                              $balcony      = $row['balcony'];
                              $garage       = $row['garage'];
                              $breakfast    = $row['breakfast'];
                              $restourant    = $row['restourant'];
                              $availability    = $row['availability'];
                              $short_desc   = $row['short_desc'];
                              $long_desc    = $row['long_desc'];
                              $ow_image     = $row['ow_image'];
                              $img_one      = $row['img_one'];
                              $img_two      = $row['img_two'];
                              $img_three    = $row['img_three'];
                              $img_four     = $row['img_four'];
                              $img_five     = $row['img_five'];
                              $img_six      = $row['img_six'];
                              $substatus       = $row['status'];
                              $google_map   = $row['google_map'];
                              $join_date    = $row['join_date'];
                              ?>
                              <form action="sellerDashboard.php?do=buyUpdate" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="subname" class="form-control" required autocomplete="off" placeholder="enter sub category name.." value="<?php echo $subcat_name; ?>">
                                  </div>
                                  <div class="mb-3">
                                    <input type="hidden" name="ow_name" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['name']; ?>">
                                    <input type="hidden" name="ow_email" class="form-control" required autocomplete="off" value="<?php echo $_SESSION['email']; ?>">
                                    <?php  
                                      $sesEmail = $_SESSION['email'];
                                      $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                      $query = mysqli_query($db, $sql);

                                      while ( $row = mysqli_fetch_assoc($query) ) {
                                        $name    = $row['name'];
                                        $email  = $row['email'];
                                        $phone     = $row['phone'];
                                        ?>
                                        <input type="hidden" name="ow_phone" class="form-control" required autocomplete="off" value="<?php echo $phone; ?>">
                                        <?php
                                      } 
                                    ?>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Division</label>
                                        <select class="form-select" name="division">
                                          <option>Select the Division</option>
                                          <?php  
                                            $sql = "SELECT * FROM buy_division WHERE status=1 ORDER BY priority ASC";
                                            $query = mysqli_query($db, $sql);

                                            while ( $row = mysqli_fetch_assoc($query) ) {
                                              $id       = $row['id'];
                                                $name       = $row['name'];
                                                $priority     = $row['priority'];
                                                $status     = $row['status'];
                                                ?>
                                                  
                                                <option value="<?php echo $id; ?>" <?php if ( $id == $division_id ) {
                                                  echo "selected";
                                                } ?>><?php echo $name; ?></option>
                                                <?php
                                            }
                                          ?>
                                          
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>District</label>
                                        <input type="text" name="district" class="form-control"  autocomplete="off" placeholder="enter district.." value="<?php echo $district; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label>House Number & Location</label>
                                    <input type="text" name="location" class="form-control"  autocomplete="off" placeholder="enter area location.." value="<?php echo $location; ?>">
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Category Name</label>
                                        <select class="form-select" name="is_parent">
                                          <option>Please Select the Category</option>
                                          <?php
                                          $catSql = "SELECT * FROM buy_category WHERE status=1";
                                          $catQuery = mysqli_query($db, $catSql);

                                          while ($row = mysqli_fetch_assoc($catQuery)) {
                                            $cat_id = $row['id'];
                                            $catname = $row['name'];
                                          ?>
                                            <option value="<?php echo $cat_id ?>" <?php if ( $cat_id == $is_parent ) {
                                              echo "selected";
                                            } ?>> - <?php echo $catname; ?></option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Price <sup>(Taka)</sup></label>
                                        <input type="number" name="price" class="form-control"  autocomplete="off" placeholder="enter price.." value="<?php echo $price; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Bed</label>
                                        <input type="number" name="bed" class="form-control"  autocomplete="off" placeholder="enter number of bed.." value="<?php echo $bed; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Kitchen</label>
                                        <input type="number" name="kitchen" class="form-control"  autocomplete="off" placeholder="enter number of kitchen.." value="<?php echo $kitchen; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Drawing</label>
                                        <input type="number" name="drawing" class="form-control"  autocomplete="off" placeholder="drawing.." value="<?php echo $drwaing; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Dinning</label>
                                        <input type="number" name="dinning" class="form-control"  autocomplete="off" placeholder="enter number of dinning.." value="<?php echo $dinning; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Balcony</label>
                                        <input type="number" name="balcony" class="form-control"  autocomplete="off" placeholder="enter number of balcony.." value="<?php echo $balcony; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-2">
                                      <div class="mb-3">
                                        <label>Garage</label>
                                        <input type="number" name="garage" class="form-control"  autocomplete="off" placeholder="enter number of garage.." value="<?php echo $garage; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Area Size <sup>(Sq Ft)</sup></label>
                                        <input type="number" name="areaSize" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $area_size; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>Katha <sup>(size)</sup></label>
                                            <input type="text" name="katha" class="form-control"  autocomplete="off" placeholder="enter size of area katha.." value="<?php echo $katha; ?>">
                                        </div>
                                      </div>
                                    <div class="col-lg-4">
                                      <div class="mb-3">
                                        <label>Bathroom</label>
                                        <input type="number" name="washroom" class="form-control"  autocomplete="off" placeholder="enter number of washroom.." value="<?php echo $washroom; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="mb-3">
                                        <label>Total Room</label>
                                        <input type="number" name="totalRoom" class="form-control"  autocomplete="off" placeholder="enter number of total room.." value="<?php echo $totalroom; ?>">
                                      </div>
                                    </div>

                                    
                                    <div class="col-lg-4">
                                      <div class="mb-3">
                                        <label>Floor Number <sup>(1st->2nd->3rd..)</sup></label>
                                        <input type="number" name="floor" class="form-control"  autocomplete="off" placeholder="enter size of area.." value="<?php echo $floor; ?>">
                                      </div>
                                    </div>

                                    <label for="">For Hotel And Other Category</label>

                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Ranking For Hotel</label>
                                        <select name="rank" class="form-select">
                                          <option>select Here</option>
                                          <option value="1" <?php if ( $rank == 1 ) {
                                            echo "selected";
                                          } ?>>5 Star</option>
                                          <option value="2" <?php if ( $rank == 2 ) {
                                            echo "selected";
                                          } ?>>4 Star</option>
                                          <option value="3" <?php if ( $rank == 3 ) {
                                            echo "selected";
                                          } ?>>3 Star</option>
                                          <option value="4" <?php if ( $rank == 4 ) {
                                            echo "selected";
                                          } ?>>2 Star</option>
                                          <option value="5" <?php if ( $rank == 5 ) {
                                            echo "selected";
                                          } ?>>1 Star</option>
                                        </select>
                                      </div>
                                    </div>                      

                                    <div class="col-lg-3">
                                      <div class="mb-3">
                                        <label>Decoration</label>
                                        <select name="decoration" class="form-select">
                                          <option>select Here</option>
                                          <option value="1" <?php if ( $decoration == 1 ) {
                                            echo "selected";
                                          } ?>>Furnished</option>
                                          <option value="2" <?php if ( $decoration == 2 ) {
                                            echo "selected";
                                          } ?>>Semi-Furnished</option>
                                          <option value="3" <?php if ( $decoration == 3 ) {
                                            echo "selected";
                                          } ?>>Non-Furnished</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col-lg-3">
                                      
                                      <div class="form-check">
                                        <input name="desk" class="form-check-input" type="checkbox" value="1" <?php if ( $desk == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Front desk [24-hour]
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="wifi" class="form-check-input" type="checkbox" value="1" <?php if ( $wifi == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Free Wi-Fi in all rooms!
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="hottub" class="form-check-input" type="checkbox" value="1" <?php if ( $hottub == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Hot tub
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="currency" class="form-check-input" type="checkbox" value="1"<?php if ( $currency == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Currency exchange
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="breakfast" class="form-check-input" type="checkbox" value="1"<?php if ( $breakfast == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Breakfast
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="restaurant" class="form-check-input" type="checkbox" value="1" <?php if ( $restourant == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Restourant
                                        </label>
                                      </div>
                                      
                                    </div>

                                    <div class="col-lg-3">
                                      
                                      <div class="form-check">
                                        <input name="ac" class="form-check-input" type="checkbox" value="1" <?php if ( $ac == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Air conditioning
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="pool" class="form-check-input" type="checkbox" value="1" <?php if ( $pool == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Swimming pool(indoor)
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="park" class="form-check-input" type="checkbox" value="1" <?php if ( $park == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Car park
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="gym" class="form-check-input" type="checkbox" value="1" <?php if ( $gym == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Fitness center
                                        </label>
                                      </div>

                                      <div class="form-check">
                                        <input name="luggage" class="form-check-input" type="checkbox" value="1" <?php if ( $luggage == 1 ) {
                                          echo "checked";
                                        } ?> id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Luggage storage
                                        </label>
                                      </div>
                                      
                                    </div>

                                  </div>

                                </div>
                                <div class="col-lg-6">
                                  <div class="mb-3">
                                    <label>Short Description</label>
                                    <textarea name="sdesc" class="form-control" cols="30" rows="3" id="editor" placeholder="write short description..."><?php echo $short_desc; ?></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label>Long Description</label>
                                    <textarea name="ldesc" class="form-control" cols="30" rows="4" id="editor1" placeholder="write long description..."><?php echo $long_desc; ?></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label>Google Embed Map URL <sup>(iframe)</sup></label>
                                    <textarea name="map" rows="2" class="form-control"  placeholder="iframe url code"><?php echo $google_map; ?></textarea>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Available on</label>
                                        <input type="date" name="available" class="form-control" value="<?php echo $availability; ?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <input type="hidden" name="status" value="<?php echo $substatus; ?>">
                                      </div>
                                    </div>                      
                                  </div>

                                  <?php  
                                      $sesEmail = $_SESSION['email'];
                                      $sql = "SELECT * FROM role WHERE email='$sesEmail'";
                                      $query = mysqli_query($db, $sql);

                                      while ( $row = mysqli_fetch_assoc($query) ) {
                                        $name    = $row['name'];
                                        $email  = $row['email'];
                                        $phone     = $row['phone'];
                                        $ow_image     = $row['image'];
                                        ?>
                                        <input type="hidden" class="form-control" name="ow_image" value="<?php echo $ow_image; ?>">
                                        <?php
                                      } 
                                    ?>


                                  <div class="row">
                                    <label for="">Products Images</label>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image One</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_one)) {
                                              echo '<img src="admin/assets/images/buy_subcategory/' . $img_one . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_one">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Two</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_two)) {
                                              echo '<img src="admin/assets/images/buy_subcategory/' . $img_two . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_two">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Three</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_three)) {
                                              echo '<img src="admin/assets/images/buy_subcategory/' . $img_three . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_three">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Four</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_four)) {
                                              echo '<img src="admin/assets/images/buy_subcategory/' . $img_four . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_four">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Five</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_five)) {
                                              echo '<img src="admin/assets/images/buy_subcategory/' . $img_five . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_five">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label>Image Six</label>
                                        <br><br>
                                          <?php
                                            if (!empty($img_six)) {
                                              echo '<img src="admin/assets/images/buy_subcategory/' . $img_six . '" alt="" style="width: 100%;">';
                                            } else {
                                              echo '<h5>No Image Uploaded!!</h5>';
                                            }
                                          ?>
                                          <br><br>
                                        <input type="file" class="form-control" name="img_six">
                                      </div>
                                    </div>
                                  </div>


                                  <div class="mb-3">
                                    <div class="d-grid gap-2">
                                      <input type="hidden" name="rentSubId" value="<?php echo $sub_id; ?>">
                                      <input type="submit" name="updateRentSubCat" class="btn btn-dark px-5" value="Update Rent Product Info">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                              <?php
                            }

                        }
                      ?>
                      
                      <!-- END : FORM -->
                      
                    </div>

                  <?php }

                  else if ($do == "buyUpdate") {
                    if (isset($_POST['updateRentSubCat'])) {
                      $updateIdStore    = mysqli_real_escape_string($db, $_POST['rentSubId']);
                      $subname          = mysqli_real_escape_string($db, $_POST['subname']);
                      $ow_name          = mysqli_real_escape_string($db, $_POST['ow_name']);
                      $ow_email         = mysqli_real_escape_string($db, $_POST['ow_email']);
                      $ow_phone         = mysqli_real_escape_string($db, $_POST['ow_phone']);
                      $division         = mysqli_real_escape_string($db, $_POST['division']);
                      $district         = mysqli_real_escape_string($db, $_POST['district']);
                      $location         = mysqli_real_escape_string($db, $_POST['location']);
                      $price            = mysqli_real_escape_string($db, $_POST['price']);
                      $bed              = mysqli_real_escape_string($db, $_POST['bed']);
                      $kitchen          = mysqli_real_escape_string($db, $_POST['kitchen']);
                      $drawing          = mysqli_real_escape_string($db, $_POST['drawing']);
                      $dinning          = mysqli_real_escape_string($db, $_POST['dinning']);
                      $balcony          = mysqli_real_escape_string($db, $_POST['balcony']);
                      $garage           = mysqli_real_escape_string($db, $_POST['garage']);
                      $katha            = mysqli_real_escape_string($db, $_POST['katha']);
                      $washroom         = mysqli_real_escape_string($db, $_POST['washroom']);
                      $totalRoom        = mysqli_real_escape_string($db, $_POST['totalRoom']);
                      $areaSize         = mysqli_real_escape_string($db, $_POST['areaSize']);
                      $floor            = mysqli_real_escape_string($db, $_POST['floor']);
                      $rank             = mysqli_real_escape_string($db, $_POST['rank']);
                      $decoration       = mysqli_real_escape_string($db, $_POST['decoration']);
                      $desk             = mysqli_real_escape_string($db, $_POST['desk']);
                      $wifi             = mysqli_real_escape_string($db, $_POST['wifi']);
                      $hottub           = mysqli_real_escape_string($db, $_POST['hottub']);
                      $currency         = mysqli_real_escape_string($db, $_POST['currency']);
                      $breakfast        = mysqli_real_escape_string($db, $_POST['breakfast']);
                      $restaurant       = mysqli_real_escape_string($db, $_POST['restaurant']);
                      $ac               = mysqli_real_escape_string($db, $_POST['ac']);
                      $pool             = mysqli_real_escape_string($db, $_POST['pool']);
                      $park             = mysqli_real_escape_string($db, $_POST['park']);
                      $gym              = mysqli_real_escape_string($db, $_POST['gym']);
                      $luggage          = mysqli_real_escape_string($db, $_POST['luggage']);
                      $sdesc            = mysqli_real_escape_string($db, $_POST['sdesc']);
                      $ldesc            = mysqli_real_escape_string($db, $_POST['ldesc']);
                      $map              = mysqli_real_escape_string($db, $_POST['map']);
                      $available        = $_POST['available'];
                      $is_parent        = mysqli_real_escape_string($db, $_POST['is_parent']);
                      $status           = mysqli_real_escape_string($db, $_POST['status']);
                      $imgOwn           = mysqli_real_escape_string($db, $_POST['ow_image']);

                      // For Image
                      // For Image One
                      $img_one    = mysqli_real_escape_string($db, $_FILES['img_one']['name']);
                      $tmpImgOne    = $_FILES['img_one']['tmp_name'];

                      if (!empty($img_one)) {
                        $oldImgOneSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgOneSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_one = $row['img_one'];
                          unlink('admin/assets/images/buy_subcategory/' . $old_Img_one);
                        }

                        $img1 = rand(0, 999999) . "_" . $img_one;
                        move_uploaded_file($tmpImgOne, 'admin/assets/images/buy_subcategory/' . $img1);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making
                        $updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha', floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_one='$img1' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allBuyProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }

                      // For Image Two
                      $img_two    = mysqli_real_escape_string($db, $_FILES['img_two']['name']);
                      $tmpImgTwo    = $_FILES['img_two']['tmp_name'];

                      if (!empty($img_two)) {
                        $oldImgTwoSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgTwoSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Two = $row['img_two'];
                          unlink('admin/assets/images/buy_subcategory/' . $old_Img_Two);
                        }

                        $img2 = rand(0, 999999) . "_" . $img_two;
                        move_uploaded_file($tmpImgTwo, 'admin/assets/images/buy_subcategory/' . $img2);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making

                        $updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha',  floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_two='$img2' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allBuyProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }


                      // For Image Three
                      $img_three    = mysqli_real_escape_string($db, $_FILES['img_three']['name']);
                      $tmpImgThree  = $_FILES['img_three']['tmp_name'];

                      if (!empty($img_three)) {
                        $oldImgThreeSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgThreeSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Three = $row['img_three'];
                          unlink('admin/assets/images/buy_subcategory/' . $old_Img_Three);
                        }

                        $img3 = rand(0, 999999) . "_" . $img_three;
                        move_uploaded_file($tmpImgThree, 'admin/assets/images/buy_subcategory/' . $img3);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making

                        $updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha',  floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_three='$img3' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allBuyProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }

                      // For Image Four
                      $img_four   = mysqli_real_escape_string($db, $_FILES['img_four']['name']);
                      $tmpImgFour   = $_FILES['img_four']['tmp_name'];

                      if (!empty($img_four)) {
                        $oldImgFourSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgFourSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Four = $row['img_four'];
                          unlink('admin/assets/images/buy_subcategory/' . $old_Img_Four);
                        }

                        $img4 = rand(0, 999999) . "_" . $img_four;
                        move_uploaded_file($tmpImgFour, 'admin/assets/images/buy_subcategory/' . $img4);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making
                        $updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha',  floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_four='$img4' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allBuyProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }

                      // For Image Five
                      $img_five     = mysqli_real_escape_string($db, $_FILES['img_five']['name']);
                      $tmpImgFive   = $_FILES['img_five']['tmp_name'];

                      if (!empty($img_five)) {
                        $oldImgFiveSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
                        $oldImageQuery = mysqli_query($db, $oldImgFiveSql);

                        while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                          $old_Img_Five = $row['img_five'];
                          unlink('admin/assets/images/buy_subcategory/' . $old_Img_Five);
                        }

                        $img5 = rand(0, 999999) . "_" . $img_five;
                        move_uploaded_file($tmpImgFive, 'admin/assets/images/buy_subcategory/' . $img5);

                        // Start: For Slug Making
                        function createSlug($subname)
                        {
                          // Convert to Lower case
                          $slug = strtolower($subname);

                          // Remove Special Character
                          $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                          // Replace multiple spaces or hyphens with a single hyphen
                          $slug = preg_replace('/[\s-]+/', ' ', $slug);

                          // Replace spaces with hyphens
                          $slug = preg_replace('/\s/', '-', $slug);

                          // Trim leading and trailing hyphens
                          $slug = trim($slug, '-');

                          return $slug;
                        }
                        $slug = createSlug($subname);
                        // End: For Slug Making
                        $updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha',  floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_five='$img5' WHERE sub_id='$updateIdStore' ";
                        $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                        if ($updateRentCatQuery) {
                          header("Location: sellerDashboard.php?do=allBuyProducts");
                        } else {
                          die("Mysql Error." . mysqli_error($db));
                        }
                      }


                    // For Image Six
                    $img_six    = mysqli_real_escape_string($db, $_FILES['img_six']['name']);
                    $tmpImgSix    = $_FILES['img_six']['tmp_name'];

                    if (!empty($img_six)) {
                      $oldImgSixSql = "SELECT * FROM buy_subcategory WHERE sub_id='$updateIdStore'";
                      $oldImageQuery = mysqli_query($db, $oldImgSixSql);

                      while ($row = mysqli_fetch_assoc($oldImageQuery)) {
                        $old_Img_Six = $row['img_six'];
                        unlink('admin/assets/images/buy_subcategory/' . $old_Img_Six);
                      }

                      $img6 = rand(0, 999999) . "_" . $img_six;
                      move_uploaded_file($tmpImgSix, 'admin/assets/images/buy_subcategory/' . $img6);

                      // Start: For Slug Making
                      function createSlug($subname)
                      {
                        // Convert to Lower case
                        $slug = strtolower($subname);

                        // Remove Special Character
                        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                        // Replace multiple spaces or hyphens with a single hyphen
                        $slug = preg_replace('/[\s-]+/', ' ', $slug);

                        // Replace spaces with hyphens
                        $slug = preg_replace('/\s/', '-', $slug);

                        // Trim leading and trailing hyphens
                        $slug = trim($slug, '-');

                        return $slug;
                      }
                      $slug = createSlug($subname);
                      // End: For Slug Making
                      $updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha',  floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status', img_six='$img6' WHERE sub_id='$updateIdStore' ";
                      $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                      if ($updateRentCatQuery) {
                        header("Location: sellerDashboard.php?do=allBuyProducts");
                      } else {
                        die("Mysql Error." . mysqli_error($db));
                      }
                    } 

                    else {

                      // Start: For Slug Making
                      function createSlug($subname)
                      {
                        // Convert to Lower case
                        $slug = strtolower($subname);

                        // Remove Special Character
                        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

                        // Replace multiple spaces or hyphens with a single hyphen
                        $slug = preg_replace('/[\s-]+/', ' ', $slug);

                        // Replace spaces with hyphens
                        $slug = preg_replace('/\s/', '-', $slug);

                        // Trim leading and trailing hyphens
                        $slug = trim($slug, '-');

                        return $slug;
                      }
                      $slug = createSlug($subname);
                      // End: For Slug Making

                      $updateRentCatSql = "UPDATE buy_subcategory SET subcat_name='$subname', slug='$slug', is_parent='$is_parent', ow_name='$ow_name', ow_email='$ow_email', ow_phone='$ow_phone', district='$district', division_id='$division', location='$location', price='$price', bed='$bed', kitchen='$kitchen', washroom='$washroom', totalroom='$totalRoom', area_size='$areaSize', katha='$katha',  floor='$floor', rank='$rank', decoration='$decoration', desk='$desk', wifi='$wifi', hottub='$hottub', currency='$currency', ac='$ac', pool='$pool', park='$park', gym='$gym', luggage='$luggage', drwaing='$drwaing', dinning='$dinning', balcony='$balcony', garage='$garage', breakfast='$breakfast', restourant='$restaurant', availability='$available', short_desc='$sdesc', long_desc='$ldesc', google_map='$map', status='$status' WHERE sub_id='$updateIdStore' ";
                      $updateRentCatQuery = mysqli_query($db, $updateRentCatSql);

                      if ($updateRentCatQuery) {
                        header("Location: sellerDashboard.php?do=allBuyProducts");
                      } else {
                        die("Mysql Error." . mysqli_error($db));
                      }

                    }
                  } 
                }
              ?>
          </div>
        </div>
      </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




    <?php 
      ob_end_flush();
    ?>
  </body>



  
</html>