 <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                            
                            
                        </div>
                        
                        <ul>
                        <li ><a  href="?page=pm">All</a></li>

                        <?php Category_List($conn ); ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                    
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0948 459 460</h5>
                                <span>Support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="ATNtoy/background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Category Management</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Cstegory Management</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


   	<?php
		
		if(isset($_GET["id"]))
		{
			$id = $_GET['id'];
			$result = pg_query($conn, "SELECT * from category where cat_id = '$id'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$cat_id = $row['cat_id'];
			$cat_name = $row['cat_name'];
			$cat_des = $row['cat_des'];
	?>
<div class="container">
	<h2>Updating Product Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID" readonly 
								  value='<?php echo $row['cat_id'] ?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name" 
								  value='<?php echo $row['cat_name'] ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $row['cat_des']?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="site-btn" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="site-btn" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=cat'" />
                              	
						</div>
					</div>
				</form>
	</div>

	<?php
		if(isset($_POST['btnUpdate']))
		{
			$id = $_POST['txtID'];
			$name = $_POST['txtName'];
			$des = $_POST['txtDes'];
			$err="";
			if($name=="")
			{
				$err .= "</br>Enter name</br>";
			}
			if ($err !="")
			{
				echo $err;
			}
			else
			{
				pg_query($conn, "UPDATE Category set cat_name = '$name', cat_des ='$des' where cat_id = '$id'");
				echo '<meta http-equiv="refresh" content="0;URL =?page=cat"/>';
			}
		}
	?>

    <?php
		}
		else
		{
			echo '<meta http-equiv="refresh" content="0;URL =?page=pm"/>';
		}
	?>