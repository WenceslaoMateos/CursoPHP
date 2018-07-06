<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('templates/inicial/head.php');?>  
    </head>
    <body>
        <?php include('templates/inicial/header.php');?>  
        <?php include('templates/inicial/footer.php');?>  
        <script>
            $('ul li:first').addClass('active');
            $('ul li:first a').addClass('active').append('<span class="sr-only">(current)</span>');
        </script>
    </body>
</html>