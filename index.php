<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('templates/inicial/head.php');?>  
    </head>
    <body>
        <?php include('templates/inicial/header.php');?>  
        <main>
            <div class="jumbotron jumbotron-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-right  ">
                            <h6 class="h6">Acceder <small> franco se la come</small></h6>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('templates/inicial/footer.php');?>  
        <script>
            $('ul li:first').addClass('active');
            $('ul li:first a').addClass('active').append('<span class="sr-only">(current)</span>');
        </script>
    </body>
</html>