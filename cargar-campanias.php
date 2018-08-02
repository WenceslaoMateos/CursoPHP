<!DOCTYPE html>
<html>
    <head>
        <?php include('templates/inicial/head.php');?>  
        <title>Carga de sensores</title>
    </head>
<body>
    <?php include('templates/online/header.php');?>  
    <main>
        <form action="cargaCampaniasDB.php" method="post" name="archivo" enctype="multipart/form-data" class="col-sm-5 mt-5">
            <div class="custom-file mb-3">
                <input class="custom-file-input" name="camp[]" type="file" accept=".dat" multiple required id="input1">
                <label class="custom-file-label" for="input1">Adjuntar campañas...</label>
            </div>
            <div class="custom-file mb-3">
                <input class="custom-file-input" name="formato[]" type="file" accept=".txt" multiple required id="input2">
                <label class="custom-file-label" for="input2">Adjuntar formatos...</label>
            </div>
            <input class="btn btn-primary ml-5" type="submit" name="Enviar" value="Enviar">
        </form>
    </main>
    <?php include('templates/inicial/footer.php');?>      
    <script>
        $('ul li:nth-child(2)').addClass('active');
        $('ul li:nth-child(2) a').addClass('active').append('<span class="sr-only">(current)</span>');
    </script>
    </body>
</html>