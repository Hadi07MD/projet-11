<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
</head>
<body>
    <div id="app"></div>
    <script type="text/javascript" >

        // KeyWord : JSON From the Server
        $.post("liste-persons.php", function( data ){

            var persons = JSON.parse(data);

            persons.forEach(person => {
                

                // Insertion de l'élément html dans l'élément div
                $("#app").append(person.Nom + "," + person.Prenom);
            });
        });

    </script>
</body>
</html>