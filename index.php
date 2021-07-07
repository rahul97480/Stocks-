    <?php
    session_start();
    include 'functions.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="wrap">
            <div class="container">
                <div class="row">
                    <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Form Name </legend>
                            <!-- File Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="filebutton">Enter Share Name You Want to Track</label>
                                <div class="col-md-4">
                                    <input type="text" name="share_name" id="share_name" class="input-large" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="filebutton">From Date</label>
                                <div class="col-md-4">
                                    <input type="date" name="from_date" id="from_date" class="input-large" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="filebutton">To Date</label>
                                <div class="col-md-4">
                                    <input type="date" name="to_date" id="to_date" class="input-large" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="filebutton">Select File</label>
                                <div class="col-md-4">
                                    <input type="file" name="file" id="file" class="input-large" required>
                                </div>
                            </div>
                            <p><?php 
                            if(isset($_SESSION['error'])){
                                echo  "<div style='color:red'>"."{$_SESSION['error']}"."</div><br />";
                                unset($_SESSION['error']);
                            }?></p>
                            <p><?php 
                            if(isset($_SESSION['result'])){
                                echo  "<div style='color:green'>"."{$_SESSION['result']}"."</div><br />";
                                unset($_SESSION['result']);
                            }?></p>
                            
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                                <div class="col-md-4">
                                    <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <?php
                   //get_all_records();
                ?>
                     <div>
                <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"   
                          enctype="multipart/form-data">
                      <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                                </div>
                       </div>                    
                </form>           
     </div>
            </div>
        </div>
    </body>
    </html>