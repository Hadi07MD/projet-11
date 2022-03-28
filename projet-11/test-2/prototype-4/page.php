<body>
    hello
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

load_panier();

function load_panier    ()
{
    $.ajax({
   url:"panier.php",
   method:"POST",
   success:function(data)
   {
    $('body').html(data);
   }
  });
}


</script>